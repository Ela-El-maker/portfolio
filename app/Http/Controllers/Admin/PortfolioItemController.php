<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.portfolio-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.portfolio-item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        $request->validate(
            [
                'image' => ['required', 'image', 'max:5000'],
                'title' => ['required', 'max:200'],
                'description' => ['required'],
                'category_id' => ['required', 'numeric'],
                'client' => ['max:200'],
                'website' => ['url'],
            'status' => ['required', 'in:draft,published'],

            ]
        );

        $imagePath = handleUpload('image');

        $portfolioItem = new PortfolioItem();

        $portfolioItem->image = $imagePath;
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->status = $request->status;
        $portfolioItem->save();


        toastr()->success('Portfolio Item Created Successfully!', 'Congrats');
        return redirect()->route('admin.portfolio-item.index');
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
        $portfolioItems = PortfolioItem::findorfail($id);
        $categories = Category::all();
        return view('admin.portfolio-item.edit', compact('portfolioItems','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'image' => ['image', 'max:5000'],
                'title' => ['required', 'max:200'],
                'description' => ['required'],
                'category_id' => ['required', 'numeric'],
                'client' => ['max:200'],
                'website' => ['url'],
            'status' => ['required', 'in:draft,published'],

            ]
        );

        $portfolioItem = PortfolioItem::findorfail($id);

        $imagePath = handleUpload('image', $portfolioItem);



        $portfolioItem->image = (!empty($imagePath) ? $imagePath : $portfolioItem->image);
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->status = $request->status;
        $portfolioItem->save();


        toastr()->success('Portfolio Item Updated Successfully!', 'Congrats');
        return redirect()->route('admin.portfolio-item.index');
    }

     public function toggleStatus(Request $request, $id)
    {
        $item = PortfolioItem::findOrFail($id);
        $item->show = $request->input('status') == 1;
        $item->save();

        return response()->json(['success' => true]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $portfolioItem = PortfolioItem::findorfail($id);
        deleteFileIfExists($portfolioItem->image);
        $portfolioItem->delete();
    }
}
