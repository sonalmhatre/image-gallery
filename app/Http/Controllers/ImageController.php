<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
      
        $request->validate([
            'title' => 'required|string|max:255',
            'tag' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if(!empty($request->file('image'))){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $data['image_url'] =  'images/'.$imageName;
        }
        Image::create($data);

        return redirect()->route('gallery.index')->with('success', 'Image uploaded successfully.');
    }
    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'tag' => 'required',
        ]);
        if(!empty($request->file('image'))){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $image_url =  'images/'.$imageName;
        }
        $image = Image::findOrFail($id);
        $image->update([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag,
            'image_url' => isset($image_url)?$image_url:$image->image_url
        ]);
        return redirect('/gallery')->with('success', 'Image updated successfully');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect('/gallery')->with('success', 'Image deleted successfully');
    }
}
