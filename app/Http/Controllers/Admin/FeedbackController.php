<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FeedbackDataTable;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FeedbackDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request ->validate([
            'name' => ['required', 'max:100'],
            'company' => ['', 'max:100'],
            'description'=> ['required','max:1000']
        ]);

        $feedback = new Feedback();

        $feedback->name = $request->name;
        $feedback->company = $request->company;
        $feedback->description = $request->description;

        $feedback ->save();
        toastr()->success('Feedback Created Successfully!', 'Congrats');
        return redirect()->route('admin.feedback.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $feedback = Feedback::findOrFail($id);
        return view('admin.feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $feedbacks = Feedback::findorfail($id);
        return view('admin.feedback.edit', compact('feedbacks'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request ->validate([
            'name' => ['required', 'max:100'],
            'company' => ['', 'max:100'],
            'description'=> ['required','max:1000']
        ]);

        $feedback =  Feedback::findorfail($id);

        $feedback->name = $request->name;
        $feedback->company = $request->company;
        $feedback->description = $request->description;

        $feedback ->save();
        toastr()->success('Feedback Updated Successfully!', 'Congrats');
        return redirect()->route('admin.feedback.index');
    }

       public function toggleStatus(Request $request, $id)
    {
        $item = Feedback::findOrFail($id);
        $item->show = $request->input('status') == 1;
        $item->save();

        return response()->json(['success' => true]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $feedback = Feedback::findorfail($id);
        $feedback->delete();
    }
}
