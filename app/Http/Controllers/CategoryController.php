<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'color' => 'required',
        ]);

        try {
            $category = new Category();

            $category->user_id = Auth::user()->id;
            $category->name = $request->input('name');
            $category->color = $request->input('color');

            $category->save();
        }
        catch(Exception $e) {
            return redirect()->back();
        }

        return redirect()->route('home');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update_post(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:100',
            'color' => 'required',
        ]);

        try {
            $category->name = $request->input('name');
            $category->color = $request->input('color');

            $category->save();
        }
        catch(Exception $e) {
            return redirect()->back();
        }

        return redirect()->route('home');
    }

    public function destroy_get(Category $category)
    {
        try {
            $category->delete();
        }
        catch(Exception $e) {
            return redirect()->back();
        }

        return redirect()->route('home');
    }
}
