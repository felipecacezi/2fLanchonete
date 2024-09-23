<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'category.list',
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'category.create',
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        try {
            $request->validated();
            $newCategory = Category::create($request->all())->id;

            return response(
                [
                    'msg' => 'Categoria criada com sucesso.',
                    'data' => [
                        'category_id' => $newCategory
                    ],
                    'status' => 201
                ],
                201,                
            );

        } catch (\Throwable $th) {
            throw new \Exception(
                "Ocorreu um erro ao gravar a categoria", 
                500
            );
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, $id)
    {
        $arCategory = Category::find($id);
        return view(
            'category.edit',
            compact('arCategory')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request)
    {
        try {
            $request->validated();
            $arCategory = Category::find($request->id);
            if (!$arCategory) {
                throw new \Exception(
                    "Impossível editar a categoria, motivo: categoria não encontrada", 
                    404
                );
            }
            unset($request->id);
            $arCategory->update($request->all());
            return response(
                [
                    'msg' => 'Categoria editada com sucesso.',
                    'data' => [],
                    'status' => 201
                ],
                201,                
            );
        } catch (\Throwable $th) {
            throw new \Exception("Ocorreu um erro ao editar a categoria", 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        try {
            if (!$id) {
                throw new \Exception(
                    "Impossível deletar a categoria, motivo: categoria não encontrada", 
                    404
                );
            }

            $arCategory = Category::find($id);
            if (!$arCategory) {
                throw new \Exception(
                    "Impossível deletar a categoria, motivo: categoria não encontrada", 
                    404
                );
            }

            $arCategory->update([
                'category_active' => 'i'
            ]);
            
            return response(
                [
                    'msg' => 'Categoria deletada com sucesso.',
                    'data' => [],
                    'status' => 201
                ],
                201,                
            );
        } catch (\Throwable $th) {
            throw new \Exception("Ocorreu um erro ao deletar a categoria", 500);
        }
    }

    public function autocomplete($word)
    {
        $categories = Category::where('category_active', 'a')
            ->where('category_name', 'like', '%'.$word.'%')
            ->get();    
            
        if (isset($categories) && !empty($categories)) {
            $categories = $categories->toArray();
        } else {
            $categories = [];
        }        

        return $categories;
    }
}
