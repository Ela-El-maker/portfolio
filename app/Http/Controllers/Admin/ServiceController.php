<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceDataTable $dataTable)
    {
        //

        return $dataTable->render('admin.service.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => ['required', 'max:100'],
            'description' => ['required', 'max:400'],
            'status' => ['required', 'in:planning,inprogress,completed'], // Ensure status is one of the enum values

        ]);

        // Create a new Service instance
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->status = $request->status; // Set the status

        // Save the service to the database
        $service->save();

        // Display success message
        toastr()->success('Service Created Successfully', 'Congrats');

        // Redirect to the service index page
        return redirect()->route('admin.service.index');
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
        $service = Service::findorfail($id);
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'max:100'],
            'description' => ['required', 'max:400'],
            'status' => ['required', 'in:planning,inprogress,completed'],
        ]);

        $service = Service::findorfail($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();

        toastr()->success('Service Updated Successfully', 'Congrats');
        return redirect()->route('admin.service.index');
    }

     public function toggleStatus(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->show = $request->input('status') == 1;
        $service->save();

        return response()->json(['success' => true]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $service = Service::findorfail($id);
        $service->delete();
    }
}
