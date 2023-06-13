<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index',['categories'=> Category::paginate(10)]);
    }
    public function create(){
        $category = new Category();
        return view('admin.category.form',['category'=>$category]);
    }
    public function store(CategoryRequest $request){
        $category = Category::create($request->validated());
        return to_route('admin.category.index')->with('success', 'La Categorie a bien été créée');
    }
    public function edit(Category $category){
        return view('admin.category.form',['category'=>$category]);
    }
    public function update(CategoryRequest $request, Category $category){
        $category->update($request->validated());
        return to_route('admin.category.index')->with('success', 'La Categorie a bien été modifiée');
    }
    public function destroy(Category $category){
        $category->delete();
        return to_route('admin.category.index')->with('success', 'La Categorie a bien été supprimée');
    }
}
