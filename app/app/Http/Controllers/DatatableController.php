<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function category(Category $category)
    {
        $arCategories = Category::all()->toArray();
        unset($arCategories[0]['created_at']);
        unset($arCategories[0]['updated_at']);
        foreach ($arCategories as  &$category) {
            $category['category_active'] = $category['category_active'] === 'a' 
                ? '<span class="text-green-600 font-bold">Ativo</span>'
                : '<span class="text-red-600 font-bold">Inativo</span>';
        }
        return json_encode($arCategories);
    }

    public function product(Product $product)
    {
        $arProduct = Product::all()->toArray();
        unset($arProduct[0]['created_at']);
        unset($arProduct[0]['updated_at']);
        foreach ($arProduct as  &$product) {
            $product['product_active'] = $product['product_active'] === 'a' 
                ? '<span class="text-green-600 font-bold">Ativo</span>'
                : '<span class="text-red-600 font-bold">Inativo</span>';
        }
        return json_encode($arProduct);
    }
}
