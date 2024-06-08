<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SEOSetting;
use Illuminate\Http\Request;

class SEOSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $seoSetting= SEOSetting::first();
        return view('admin.setting.seo-setting.index', compact('seoSetting'));
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
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:500'],
            'keywords' => ['required', 'max:300'],


        ]);
        SEOSetting::updateorcreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' =>$request->description,
                'keywords' =>$request->keywords,

            ]
            );

            toastr()->success('SEO Updated successfully!', 'Success');
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
