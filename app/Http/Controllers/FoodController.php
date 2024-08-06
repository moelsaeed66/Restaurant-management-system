<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods=Food::all();
//dd($foods);
        return view('admin.foods.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $foodRequest)
    {
        $validate=$foodRequest->validated();
//        Food::create([
//            'title'=>$foodRequest->title,
//            'price'=>$foodRequest->price,
//            'description'=>$foodRequest->description,
//            'image'=>$foodRequest->image
//        ]);
        $data=$foodRequest->except('image');
        $data['image']=$this->uploadImage($foodRequest);

        Food::create($data);


        return redirect()->route('foods.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return view('admin.foods.show',compact('food'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $food=Food::findOrFail($id);
        if(!$food)
        {
            abort(404);
        }
        return view('admin.foods.edit',compact('food'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $foodRequest, string $id)
    {
//        $foodRequest->validated();
        $food=Food::findOrFail($id);
        $old_image=$food->image;
        $data=$foodRequest->except('image');
        $new_image=$this->uploadImage($foodRequest);
        if($new_image)
        {
            $data['image']=$new_image;
        }
        $food->update($data);

        return redirect()->route('foods.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food=Food::findOrFail($id);
        if($food->image)
        {
            Storage::disk('public')->delete($food->image);
        }
        $food->delete();
        return redirect()->route('foods.index');
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
