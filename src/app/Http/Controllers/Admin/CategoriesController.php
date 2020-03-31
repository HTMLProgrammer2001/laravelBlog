<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $this->validate($request, [
           'title' => 'required'
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index');
    }

    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category){
        $this->validate($request, [
           'title' => 'required'
        ]);

        $category->fill($request->all());
        $category->save();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category){
        $category->delete();

        return redirect()->route('categories.index');
    }

    public function show(Category $category){
        return abort(404);
    }
}
