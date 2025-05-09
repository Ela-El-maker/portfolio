<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class TyperTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TyperTitleDataTable $dataTable)
    {
        // return view('admin.typer-title.index');

        return $dataTable->render('admin.typer-title.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.typer-title.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => ['required', 'max:200']
        ]);

        $create = new TyperTitle();
        $create->title = $request->title;

        $create->save();

        toastr()->success('Typer Title Created Successfully!', 'Congrats');
        return redirect()->route('admin.typer-title.index');
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
        $title = TyperTitle::findorfail($id);
        return view('admin.typer-title.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => ['required', 'max:200'],
        ]);

        $edit = TyperTitle::findorfail($id);
        $edit->title = $request->title;

        $edit->save();

        toastr()->success('Typer Title Updated Successfully!', 'Congrats');
        return redirect()->route('admin.typer-title.index');
    }

    public function toggleStatus(Request $request, $id)
    {
        $title = TyperTitle::findOrFail($id);
        $title->show = $request->input('status') == 1;
        $title->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $title = TyperTitle::findorfail($id);
        $title->delete();
    }
}
