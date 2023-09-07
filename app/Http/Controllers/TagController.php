<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\tags\CreateTagRequest;
use App\Http\Requests\tags\UpdateTagRequest;
use App\Models\Post;
use Illuminate\View\View;



class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $tagpost = Tag::all();
        return view('admin/tag/index')->with('tagpost',$tagpost);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/tag/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $tagpost = new Tag([
            'name' => $request->get('name'),]);
        $tagpost->save();
        return redirect('/admin/dashboard/tag/index')->with('flash_message', 'Added data sucesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function search(Request $request)
{
    // Get the selected tags from the request
    $selectedTags = $request->input('tags');

    // Use the selected tags to filter the products
    $products = Post::whereHas('tags', function ($query) use ($selectedTags) {
        $query->whereIn('id', $selectedTags);
    })->get();

    // Pass the products to your view
    return view('products.index', ['products' => $products]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $tagpost = Tag::find($id);
        return view('admin/tag/edit')->with('tagpost',$tagpost);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $tagpost = Tag::find($id);
        $tagpost->name = $request->get('name');

        $tagpost->save();
        return redirect('admin/dashboard/tag/index')->with('flash_message', 'Edited data sucesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Tag::destroy($id);
        return redirect('admin/dashboard/tag/index')->with('flash_message', 'Data Deleted!');
    }
}
