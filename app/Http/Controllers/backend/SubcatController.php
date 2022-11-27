<?php

namespace App\Http\Controllers\backend;
use App\Models\backend\CategoryModel;
use App\Models\backend\Subcat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use File;


class SubcatController extends Controller
{
    public function imform(){
        $cats = CategoryModel::all();
        return view("backend.subcat.add")->with(compact('cats'));
    }

    public function addImg(Request $rqst){
        if($rqst->image){
            $picture = $rqst->file('image');
            $customName = rand().".".$picture->getClientOriginalExtension();
            $location = public_path('backend/slider/'.$customName);
            Image::make($picture)->save($location);
        }

        $img = new Subcat;
        $img->cat_id = $rqst->cat_id;
        $img->name = $rqst->name;
        $img->image = $customName;
        $img->status = $rqst->status;

        $img->save();

        return redirect()->route('scshow');
    }


    public function show(){
        $cats = Subcat::all();
        return view('backend.subcat.manage',compact('cats'));
    }


    public function dltsub($id){
        $subcat = Subcat::find($id);
        if(File::exists("backend/slider/".$subcat->image)){
            File::delete("backend/slider/".$subcat->image);
        }
        $subcat->delete();
        return back();
    }


    public function edtsub($id){
        $cats = CategoryModel::all();
        $subcat = Subcat::find($id);
        return view('backend.subcat.edit',compact('subcat','cats'));
    }


    public function udtsub(Request $rqst,$id){
        $subcat = Subcat::find($id);
        if($rqst->image){
            if(File::exists("backend/slider/".$subcat->image)){
                File::delete("backend/slider/".$subcat->image);
    
                $picture = $rqst->file('image');
                $customName = rand().".".$picture->getClientOriginalExtension();
                $location = public_path('backend/slider/'.$customName);
                Image::make($picture)->save($location);
                $subcat->image = $customName;
            }
        }
        $subcat->cat_id = $rqst->cat_id;
        $subcat->name = $rqst->name;
        $subcat->status = $rqst->status;
        $subcat->update();
        return redirect()->route('scshow');
    }


    public function msc($id){
        $subli = Subcat::find($id);
        if($subli->status == 1){
            $subli->status = 0;
            $subli->update();
            return back();
        }
        else{
            $subli->status = 1;
            $subli->update();
            return back();
        }
    }



}
