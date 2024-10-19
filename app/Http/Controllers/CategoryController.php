<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index(Request $request): Response
    {
        $categories = Category::all();
    }

    public function create(Request $request): Response
    {
        $category = Category::find($category);
    }

    public function edit(Request $request, Category $category): Response
    {
        $category = Category::find($category);
    }

    public function store(CategoryStoreRequest $request): Response
    {
        $category = Category::create($request->validated());

        return redirect()->route('category.index');
    }

    public function show(Request $request, Category $category): Response
    {
        $category = Category::find($category);
    }

    public function update(CategoryUpdateRequest $request, Category $category): Response
    {
        $category->save();

        return redirect()->route('category.index');
    }

    public function destroy(Request $request, Category $category): Response
    {
        $category->delete();
    }
}
