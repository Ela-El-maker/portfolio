<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.about.index');
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
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000'],
            'resume' => ['', 'max:10000','mimes:pdf,csv,txt'],
            'image' => ['max:5000', 'image']
        ]);

        // dd($request->all());
        // $about = About::first();
        // if ($request->hasFile('image')) {



        //     if ($about && File::exists(public_path($about->image))) {
        //         File::delete(public_path($about->image));
        //     }


        //     $image = $request->file('image');
        //     $imageName = rand() . $image->getClientoriginalName();
        //     $image->move(public_path('/uploads'), $imageName);

        //     $imagePath = "/uploads/" . $imageName;

        //     // dd($imagePath);

        // }

        $about = About::first();
        $imagePath = handleUpload('image',$about);

        $resumePath = handleUpload('resume',$about);

        About::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'resume' => (!empty($imagePath) ? $imagePath : $about->image),
                'image' => (!empty($resumePath) ? $resumePath : $about->resume),
            ]
        );

        // dd('success');
        // return handleUpload('image');

        
        toastr()->success('About Updated Successfully!', 'Congrats');
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
