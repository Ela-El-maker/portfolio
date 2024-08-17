<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WorkingOnDataTable;
use App\Http\Controllers\Controller;
use App\Models\WorkingOn;
use Illuminate\Http\Request;

class WorkingOnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WorkingOnDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.working-on.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.working-on.create');

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
            'dueDate' =>['date'],
    
        ]);


        

        $workingOnGrowth = new WorkingOn();
        $workingOnGrowth->name = $request->name;
        $workingOnGrowth->description = $request->description;
        $workingOnGrowth->dueDate = $request->dueDate;
        $workingOnGrowth->save();


        toastr()->success('Project Created Successfully', 'Congrats');
        return redirect()->route('admin.working-on.index');

    
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
        $editWorks = WorkingOn::findorfail($id);
        return view('admin.working-on.edit', compact('editWorks'));
    
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
            'dueDate' =>['date'],
    
        ]);


        

        $workingOnGrowth =  WorkingOn::findorfail($id);
        $workingOnGrowth->name = $request->name;
        $workingOnGrowth->description = $request->description;
        $workingOnGrowth->dueDate = $request->dueDate;
        $workingOnGrowth->save();


        toastr()->success('Project Updated Successfully', 'Congrats');
        return redirect()->route('admin.working-on.index');

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $worksGrowth = WorkingOn::findorfail($id);
        $worksGrowth->delete();
    }
}
