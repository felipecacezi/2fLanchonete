<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Helpers\FileHelper;
use App\Models\MenuConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function getCdn($id = null)
    {
        return FileHelper::getCdn($id);
    }

   public function store(Request $request)
   {
        try {
            $fileStored = Storage::put(
                "/img/{$request->tenantId}", 
                $request->file('file')
            );

            $fileId = File::create([
                'file_name' => $request->file('file')->getClientOriginalName(),
                'file_path' => $fileStored,
                'file_active' => 1,
                'file_tenant' => $request->tenantId
            ])->id;

            return response(
                [
                    'msg' => 'Arquivo armazenado com sucesso.',
                    'data' => [
                        'filePath' => $fileStored,
                        'fileId' => $fileId
                    ],
                    'status' => 201
                ],
                201,                
            );

        } catch (\Throwable $th) {
            Storage::delete('public/img/'.$request->file('file')->getClientOriginalName());
            throw new \Exception(
                "Ocorreu um erro ao realizar o upload do arquivo", 
                500
            );
        }

        
   }

   public function destroy(Request $request, $id)
   {
        try {
            $arFile = FileHelper::findFile($id);
            FileHelper::deleteFile($arFile);
            
            return response(
                [
                    'msg' => 'Arquivo deletado com sucesso.',
                    'data' => [],
                    'status' => 200
                ],
                200,                
            );
        } catch (\Throwable $th) {
            throw new \Exception(
                "Ocorreu um erro ao inativar o arquivo", 
                500
            );
        }
   }
}
