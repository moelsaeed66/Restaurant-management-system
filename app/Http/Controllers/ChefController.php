<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs=Chef::all();
        return view('admin.chefs.index',compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.chefs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
            'speciality'=>['required','string','max:255'],
            'image'=>['image'],
        ]);

        $data=$request->except('image');
        $data['image']=$this->uploadImage($request);

        Chef::create($data);

        return redirect()->route('chefs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chef $chef)
    {
        return view('admin.chefs.edit',compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chef $chef)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
            'speciality'=>['required','string','max:255'],
            'image'=>['image'],
        ]);
        $old_image=$chef->image;
        $data=$request->except('image');
        $new_image=$this->uploadImage($request);
        if($new_image)
        {
            $data['image']=$new_image;
        }
        $chef->update($data);
        return redirect()->route('chefs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect()->route('chefs.index');
    }
    protected function uploadImage(Request $request)
    {
        if(!$request->hasFile('image'))
        {
            return;
        }
        $file=$request->file('image');
        $path=$file->store('uploads','public');
        return $path;
    }
}
