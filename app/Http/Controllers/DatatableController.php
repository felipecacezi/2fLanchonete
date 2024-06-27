<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function category(Category $category)
    {
        $arCategories = Category::all()->toArray();
        return json_encode($arCategories);
    }
}
