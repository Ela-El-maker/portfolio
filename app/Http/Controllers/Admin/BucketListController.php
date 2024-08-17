<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BucketListDataTable;
use App\Http\Controllers\Controller;
use App\Models\BucketList;
use Illuminate\Http\Request;

class BucketListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BucketListDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.bucketlist.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.bucketlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         //
         $request->validate([
            'name' => ['required','max:200'],
            'description' => ['required','max:1000'],
            'startDate' =>['date'],
    
        ]);


        

        $bucketListGrowth = new BucketList();
        $bucketListGrowth->name = $request->name;
        $bucketListGrowth->description = $request->description;
        $bucketListGrowth->startDate = $request->startDate;
        $bucketListGrowth->save();


        toastr()->success('Project Created Successfully', 'Congrats');
        return redirect()->route('admin.bucket-list.index');

    
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

        $editBuckelist = BucketList::findorfail($id);
        return view('admin.bucketlist.edit', compact('editBuckelist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => ['required','max:200'],
            'description' => ['required','max:1000'],
            'startDate' =>['date'],
    
        ]);


        

        $bucketListGrowth = BucketList::findorfail($id);
        $bucketListGrowth->name = $request->name;
        $bucketListGrowth->description = $request->description;
        $bucketListGrowth->startDate = $request->startDate;
        $bucketListGrowth->save();


        toastr()->success('Project Updated Successfully', 'Congrats');
        return redirect()->route('admin.bucket-list.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $buckelistGrowth = BucketList::findorfail($id);
        $buckelistGrowth->delete();
   
    }
}
