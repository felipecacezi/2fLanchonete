<?php

namespace App\Helpers;

use App\Models\File;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function getCdn(int $id = null):string
    {
        $file = File::find($id);

        if (isset($file->file_path)){
            $path = Storage::url($file->file_path);
        } else {
            $path = '';
        }
        
        return $path;
    }

    public static function findFile(int $id = null):File
    {
        $file = File::find($id);
        return $file;
    }

    public static function deleteFile(File $arFile):bool
    {
        try {
            Storage::delete($arFile->file_path);
            $arFile->delete();
            return true;

        } catch (\Throwable $th) {
            throw new \Exception("Erro ao deletar o arquivo", 500);            
        }
    }
}