<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterSocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocialLink;
use Illuminate\Http\Request;

class FooterSocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialLinkDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.footer-social-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.footer-social-link.create');
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
                'icon' => ['required'],
                'url' => ['required', 'url'],
                
            ]
        );

        $footerItem = new FooterSocialLink();

        
        $footerItem->icon = $request->icon;
        $footerItem->url = $request->url;
        

        $footerItem->save();


        toastr()->success('Footer Social Created Successfully!', 'Congrats');
        return redirect()->route('admin.footer-social-link.index');
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
        $footerEdit = FooterSocialLink::findorfail($id);
        return view('admin.footer-social-link.edit', compact('footerEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'icon' => ['required'],
                'url' => ['required', 'url'],
                
            ]
        );

        $footerItem =  FooterSocialLink::findorfail($id);

        
        $footerItem->icon = $request->icon;
        $footerItem->url = $request->url;
        

        $footerItem->save();


        toastr()->success('Footer Social Updated Successfully!', 'Congrats');
        return redirect()->route('admin.footer-social-link.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $footerItem = FooterSocialLink::findorfail($id);
        $footerItem-> delete();
    }
}
