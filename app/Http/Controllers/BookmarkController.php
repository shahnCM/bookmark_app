<?php

namespace App\Http\Controllers;

use Auth;
use App\Bookmark;
use App\Category;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Bookmark $bookmark)
    {
        return view('bookmark.edit', compact('bookmark'));
    }

    public function create_get(Category $category)
    {
        return view('bookmark.create', compact('category'));
    }

    public function store_post(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:100',
            'link' => 'required',
        ]);

        try {
            $bookmark = new Bookmark();

            $bookmark->category_id = $category->id;
            $bookmark->name = $request->input('name');
            $bookmark->link = $request->input('link');

            $bookmark->save();
        }
        catch(Exception $e) {
            return redirect()->back();
        }

        return redirect()->route('home');
    }

    public function update_post(Request $request, Bookmark $bookmark)
    {
        $request->validate([
            'name' => 'required|max:100',
            'link' => 'required',
        ]);

        try {
            $bookmark->name = $request->input('name');
            $bookmark->link = $request->input('link');

            $bookmark->save();
        }
        catch(Exception $e) {
            return redirect()->back();
        }

        return redirect()->route('home');
    }

    public function destroy_get(Bookmark $bookmark)
    {
        try {
            $bookmark->delete();
        }
        catch(Exception $e) {
            return redirect()->back();
        }

        return redirect()->route('home');
    }

    public function destroy_get_id($id)
    {
        $bookmark = Bookmark::findOrFail($id);

        try {
            $bookmark->delete();
        }
        catch(Exception $e) {
            return redirect()->back();
        }

        return redirect()->route('home');
    }
}
