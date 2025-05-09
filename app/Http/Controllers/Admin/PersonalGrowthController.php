<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PersonalGrowthDataTable;
use App\Http\Controllers\Controller;
use App\Models\PersonalGrowth;
use Illuminate\Http\Request;

class PersonalGrowthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PersonalGrowthDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.personal-growth.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.personal-growth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required','max:200'],
            'description' => ['required','max:1000'],
            'startDate' =>['date'],
            'dueDate' =>['date'],
            'status' => ['required', 'in:draft,published'],

        ]);




        $personalGrowth = new PersonalGrowth();
        $personalGrowth->name = $request->name;
        $personalGrowth->description = $request->description;
        $personalGrowth->startDate = $request->startDate;
        $personalGrowth->dueDate = $request->dueDate;
        $personalGrowth->status = $request->status;
        $personalGrowth->save();


        toastr()->success('Project Created Successfully', 'Congrats');
        return redirect()->route('admin.personal-growth.index');

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
        $growth = PersonalGrowth::findorfail($id);
        return view('admin.personal-growth.edit', compact('growth'));
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
            'dueDate' =>['date'],
            'status' => ['required', 'in:draft,published'],


        ]);

        $personalGrowth = PersonalGrowth::findorfail($id);
        $personalGrowth->name = $request->name;
        $personalGrowth->description = $request->description;
        $personalGrowth->startDate = $request->startDate;
        $personalGrowth->dueDate = $request->dueDate;
        $personalGrowth->status = $request->status;
        $personalGrowth->save();


        toastr()->success('Project Updated Successfully', 'Congrats');
        return redirect()->route('admin.personal-growth.index');
    }

     public function toggleStatus(Request $request, $id)
    {
        $growth = PersonalGrowth::findOrFail($id);
        $growth->show = $request->input('status') == 1;
        $growth->save();

        return response()->json(['success' => true]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $personalGrowth = PersonalGrowth::findorfail($id);
        $personalGrowth->delete();
    }
}
