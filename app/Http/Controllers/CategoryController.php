<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        // Logic to get the category based on the $id
        // Example: You could fetch category data from a database
        $category = Category::findOrFail($id);

        return view('category.show', compact('category'));
    }
}
