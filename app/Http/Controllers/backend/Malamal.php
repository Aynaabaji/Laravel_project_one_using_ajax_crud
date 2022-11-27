<?php

namespace App\Http\Controllers\backend;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Jinish;

class Malamal extends Controller
{
    public function index(){
        return view('backend.product.home');
    }


    public function store(Request $request){
        $malamal = new Jinish;
        $malamal->name = $request->name;
        $malamal->email = $request->email;
        $malamal->barcode = $request->barcode;
        $malamal->size = $request->size;
        $malamal->quantity = $request->quantity;
        $malamal->color = $request->color;
        $malamal->price = $request->price;
        $malamal->stock = $request->stock;
        $malamal->stock_Count = $request->stock_Count;
        $malamal->save();
        return redirect()->route('manageProduct');
    }


    public function manage(){
        $jinish = Jinish::all();
        return view('backend.product.manage',compact('jinish'));
    }

    public function destroy($id){
        $product = Jinish::find($id);

        $product->delete();
        return redirect()->route('manageProduct');
    }


    public function edit($id){
        $edit = Jinish::find($id);
        return view('backend.product.edit',compact('edit'));
    }


    public function update(Request $request,$id){
        $update = Jinish::find($id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->barcode = $request->barcode;
        $update->size = $request->size;
        $update->quantity = $request->quantity;
        $update->color = $request->color;
        $update->price = $request->price;
        $update->stock = $request->stock;
        $update->stock_Count = $request->stock_Count;
        $update->update();
        return redirect()->route('manageProduct');
    }


    public function stockToggle($id){
        $stock = Jinish::find($id);
        if($stock->stock == 1){
            $stock->stock = 0;
            $stock->update();
            return back();
        }
        else{
            $stock->stock = 1;
            $stock->update();
            return back();
        }
    }

}