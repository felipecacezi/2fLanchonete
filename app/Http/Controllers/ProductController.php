<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\Currency;
use Illuminate\Http\Request;

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
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
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
        $arProduct = Product::find($id);
        $arProduct->toArray();
        $arProduct['product_price'] = Currency::convertCentsToReal($arProduct['product_price']);
        return view(
            'product.edit',
            compact('arProduct')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
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
            dd($th);
            throw new \Exception("Ocorreu um erro ao editar o produto", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
