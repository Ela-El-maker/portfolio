<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterHelpLinksDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterHelpLinks;
use Illuminate\Http\Request;

class FooterHelpLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterHelpLinksDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.footer-help-links.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.footer-help-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'max:100'],
                'url' => ['required', 'url'],
                
            ]
        );

        $footerItem = new FooterHelpLinks();

        
        $footerItem->name = $request->name;
        $footerItem->url = $request->url;
        

        $footerItem->save();


        toastr()->success('Footer Help Created Successfully!', 'Congrats');
        return redirect()->route('admin.footer-help-links.index');
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
        $helpLinksEdit = FooterHelpLinks::findorfail($id);
        return view('admin.footer-help-links.edit', compact('helpLinksEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'max:100'],
                'url' => ['required', 'url'],
                
            ]
        );

        $footerItem =  FooterHelpLinks::findorfail($id);

        
        $footerItem->name = $request->name;
        $footerItem->url = $request->url;
        

        $footerItem->save();


        toastr()->success('Footer Help Updated Successfully!', 'Congrats');
        return redirect()->route('admin.footer-help-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $footerItem = FooterHelpLinks::findorfail($id);
        $footerItem->delete();
    }
}
