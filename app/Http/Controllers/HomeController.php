<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('crud.index',[
            'products'=>Home::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Name field is required !!',
            'price.required' => 'Price field is required !!',
            'image.required' => 'Image field is required !!',
        ]);
        $product = new Home();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $this->saveImage($request);
        $product->save();
        return redirect(route('products.index'));
    }
    public function saveImage(Request $request){
        $image = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $dir = 'asset/image/';
        $imageUrl = $dir.$imageName;
        $image->move($dir,$imageName);
        return $imageUrl;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id){
        $product = Home::find($id);
        if ($product->status==1){
            $product->status =0;
        }else{
            $product->status=1;
        }
        $product->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('crud.edit',[
           'product' => Home::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Home::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        if ($request->file('image')){
            if ($product->image !=null){
                unlink($product->image);
            }
            $product->image = $this->saveImage($request);
        }
        $product->status = $request->status;
        $product->save();
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Home::find($id);
        if ($product->image){
            unlink($product->image);
        }
        $product->delete();
        return back();
    }
}
