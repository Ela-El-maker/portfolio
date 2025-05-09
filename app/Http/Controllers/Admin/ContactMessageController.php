<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactMessageDataTable;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Termwind\render;

class ContactMessageController extends Controller
{
    //
    public function contactUs() {}

    /**
     * Display the specified resource.
     */
    public function showMessage(string $id)
    {
        //
        // Find the contact message by ID
        $contactMessage = ContactMessage::findOrFail($id);

        // Return a view with the contact message data
        return view('admin.contacts.view', compact('contactMessage'));
    }

    public function storeContact(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        ContactMessage::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'company' => $request->company,
            'message' => $request->message,
            'created_at' => Carbon::now(),


        ]);
        $notification = [
            'message' => 'Message Received Successfully. Thank you!!!',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
    public function getMessages(ContactMessageDataTable $dataTable)
    {
        return $dataTable->render('admin.contacts.index');
    }

    public function toggleStatus(Request $request, $id)
    {
        $item = ContactMessage::findOrFail($id);
        $item->show = $request->input('status') == 1;
        $item->save();

        return response()->json(['success' => true]);
    }

    public function deleteMessages($id)
    {
        try {
            $item = ContactMessage::findOrFail($id);


            if ($item->delete()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Message deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to delete the item.'
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Error deleting item: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while deleting the item.'
            ], 500);
        }

        return redirect()->route('admin.get.messages')->with($notification);
    }
}
