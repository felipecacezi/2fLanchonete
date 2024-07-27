<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\Currency;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::leftJoin('files', 'products.file_id', '=', 'files.id')
            ->orderBy('products.category_id')
            ->get()
            ->toArray();

        $categories = Category::where('category_active', 'a')
            ->get()
            ->toArray();

        $productsFinal = [];
        
        foreach ($products as $keyProd => &$product) {
            $product['productImgUrl'] = Storage::url($product['file_path']);
            $product['product_price'] = Currency::convertCentsToReal($product['product_price']);
            foreach ($categories as $key => $value) {            
                if ($product['category_id'] == $value['id']) {
                    $productsFinal[$value['category_name']][] = $product;
                }
            }
        }

        return view(
            'welcome', 
            compact('productsFinal')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
