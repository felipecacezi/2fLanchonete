<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Helpers\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\FileController;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view(
            'product.create', 
            compact('categories')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        try {
            $request->validated();
            $data = $request->all();
            $data['product_price'] = Currency::convertRealToCents($data['product_price']);
            $newProduct = Product::create($data)->id;

            return response(
                [
                    'msg' => 'Produto criado com sucesso.',
                    'data' => [
                        'product_id' => $newProduct
                    ],
                    'status' => 201
                ],
                201,
            );

        } catch (\Throwable $th) {
            throw new \Exception(
                "Ocorreu um erro ao gravar o produto",
                500
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {        
        $fileController = new FileController();
        $arProduct = Product::select('products.*', 'categories.category_name', 'categories.id as category_id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->get()
            ->toArray();
        $arProduct = array_shift($arProduct);
        $arProduct['product_price'] = Currency::convertCentsToReal($arProduct['product_price']);
        $categories = Category::all();
        return view(
            'product.edit',
            compact('arProduct', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request)
    {
        try {
            $request->validated();
            $data = $request->all();
            $arProduct = Product::find($request->id);


            if (!$arProduct) {
                throw new \Exception(
                    "Impossível editar o produto, motivo: produto não encontrado", 
                    404
                );
            }
            $data['product_price'] = Currency::convertRealToCents($data['product_price']);
            unset($request->id);
            $arProduct->update($data);
            return response(
                [
                    'msg' => 'Produto editado com sucesso.',
                    'data' => [],
                    'status' => 201
                ],
                201,                
            );
        } catch (\Throwable $th) {
            throw new \Exception("Ocorreu um erro ao editar o produto", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            if (!$id) {
                throw new \Exception(
                    "Impossível inativar o produto, motivo: produto não encontrado", 
                    404
                );
            }
            $arProduct = Product::find($id);
            if (!$arProduct) {
                throw new \Exception(
                    "Impossível inativar o produto, motivo: produto não encontrado", 
                    404
                );
            }
            $arProduct->update([
                'product_active' => 'i'
            ]);
            return response(
                [
                    'msg' => 'Produto inativado com sucesso.',
                    'data' => [],
                    'status' => 201
                ],
                201,                
            );
        } catch (\Throwable $th) {
            throw new \Exception("Ocorreu um erro ao inativar o produto", 500);
        }
    }
}
