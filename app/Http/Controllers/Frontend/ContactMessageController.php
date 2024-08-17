<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\ContactMessageDataTable;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ContactMessageDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.contacts.index');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('frontend.sections.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Create a new ContactMessage instance and save to the database
    ContactMessage::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
    ]);

    // Return a JSON response
    return response()->json(['status' => 'success', 'message' => 'Your message has been sent!']);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Find the contact message by ID
    $contactMessage = ContactMessage::findOrFail($id);

    // Return a view with the contact message data
    return view('admin.contacts.view', compact('contactMessage'));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $message = ContactMessage::findorfail($id);
        $message->delete();
    }
}
