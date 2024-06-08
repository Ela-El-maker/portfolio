<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfoContact;
use Illuminate\Http\Request;

class FooterInfoContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $infoContact = FooterInfoContact::first();
        return view('admin.footer-contact-info.index', compact('infoContact'));
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
            'address' => ['', 'max:100'],
            'phone' => ['', 'max:100'],
            'email' => ['email', 'max:100'],

        ]);
        FooterInfoContact::updateorcreate(
            ['id' => $id],
            [
                'address' => $request->address,
                'phone' =>$request->phone,
                'email' =>$request->email,

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
