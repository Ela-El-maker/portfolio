<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceSectionSetting;
use Illuminate\Http\Request;

class ServiceSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $serviceSection = ServiceSectionSetting::first();
        return view('admin.service-section-setting.index', compact('serviceSection'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         // dd($request->all());
         $request->validate([
            'title' => ['required', 'max:100'],
            'sub_title' => ['required', 'max:300'],
        ]);

        ServiceSectionSetting::updateorcreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' =>$request->sub_title,
            ]
            );

            toastr()->success('Section Updated successfully!', 'Success');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
