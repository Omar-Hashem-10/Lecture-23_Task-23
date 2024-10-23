<?php

namespace App\Http\Controllers\Admin;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\MajorRequest;

class MajorController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // abort_if(Gate::denies('isAdmin'), 403);

        Gate::authorize('isAdmin');

        $majors = Major::orderBy('id', 'desc')->get();
        return view('web.admin.sections.majors.index', compact("majors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.admin.sections.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = $request->file('image')->storeAS('/majors', 'major-clinic.jpg',  'public');
            $data['image'] = 'storage/' . $fileName;
        }

        Major::create($data);
        return redirect()->route('admin.majors.index')->with('success', 'Stored Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
            return view('web.admin.sections.majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorRequest $request, Major $major)
    {
        $data = $request->validated();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = $request->file('image')->storeAS('/majors', 'major-clinic.jpg',  'public');
            $data['image'] = 'storage/' . $fileName;
        }
        $major->update($data);
        return redirect()->route('admin.majors.index')->with('success', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $image_path = $major->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $major->delete();
        return redirect()->route('admin.majors.index')->with('success', 'Deleted successfully!');
    }
}
