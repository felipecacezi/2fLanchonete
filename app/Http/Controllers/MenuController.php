<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\Currency;
use App\Models\Category;
use App\Models\MenuConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::leftJoin('files', 'products.file_id', '=', 'files.id')
                ->orderBy('products.category_id')
                ->get()
                ->toArray();

            $categories = Category::where('category_active', 'a')
                ->get()
                ->toArray();

            
            
            foreach ($products as $keyProd => &$product) {
                $product['productImgUrl'] = Storage::url($product['file_path']);
                $product['product_price'] = Currency::convertCentsToReal($product['product_price']);
                foreach ($categories as $key => $value) {            
                    if ($product['category_id'] == $value['id']) {
                        $productsFinal[$value['category_name']][] = $product;
                    }
                }
            }

            $menuConfigs = MenuConfig::leftJoin('files', 'menu_configs.file_id', '=', 'files.id')
                ->first()
                ->toArray();
            $menuConfigs['menu_cover_url'] = Storage::url($menuConfigs['file_path']);

            return view(
                'menu', 
                compact(['productsFinal', 'menuConfigs'])
            );
        } catch (\Throwable $th) {
            $productsFinal = [];
            $menuConfigs = [];
            return view(
                'menu', 
                compact(['productsFinal', 'menuConfigs'])
            );
        }        
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
    public function edit()
    {
        $configs = MenuConfig::first(); 
        return view(
            'menuConfig.edit', 
            compact('configs')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $configs = MenuConfig::first();    
            $msg = "";
            if (!$configs) {
                MenuConfig::create($request->all());
                $msg = 'Categoria criada com sucesso.';
            } else {
                $configs->update($request->all());
                $msg = 'Categoria editada com sucesso.';
            }

            return response(
                [
                    'msg' => $msg,
                    'data' => [],
                    'status' => 201
                ],
                201,                
            );
        } catch (\Throwable $th) {
            throw new \Exception("Ocorreu um erro ao gravar as configurações do cardápio.", 500);
        }            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
