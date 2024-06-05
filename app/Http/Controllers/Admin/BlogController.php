<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'image' => ['required', 'image', 'max:5000'],
                'title' => ['required', 'max:200'],
                'description' => ['required'],
                'category_id' => ['required', 'numeric'],
               
            ]
        );

        $imagePath = handleUpload('image');

        $blogItem = new Blog();

        $blogItem->image = $imagePath;
        $blogItem->title = $request->title;
        $blogItem->description = $request->description;
        $blogItem->category_id = $request->category_id;
    

        $blogItem->save();


        toastr()->success('Blog Created Successfully!', 'Congrats');
        return redirect()->route('admin.blog.index');
    
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
    public function edit(string $id)
    {
        //
        $blogEdit = Blog::findorfail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit', compact('categories', 'blogEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'image' => ['', 'image', 'max:5000'],
                'title' => ['required', 'max:200'],
                'description' => ['required'],
                'category_id' => ['required', 'numeric'],
               
            ]
        );
        $blogItem =  Blog::findorfail($id);
        $imagePath = handleUpload('image', $blogItem);

    
        $blogItem->image = (!empty($imagePath) ? $imagePath : $blogItem->image);
        $blogItem->title = $request->title;
        $blogItem->description = $request->description;
        $blogItem->category_id = $request->category_id;
    

        $blogItem->save();


        toastr()->success('Blog Updated Successfully!', 'Congrats');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blogItem = Blog::findorfail($id);
        deleteFileIfExists($blogItem->image);
        $blogItem->delete();
    }
}
