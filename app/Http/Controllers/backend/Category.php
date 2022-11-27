<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\CategoryModel;
use App\Models\backend\Subcat;
use Image;
use File;

class Category extends Controller
{
    public function catform(){
        return view('backend.category.add');
    }

    public function addCategory(Request $rqst){
        $cat = new CategoryModel;
        $cat->name = $rqst->name;
        $cat->desc = $rqst->desc;
        $cat->status = $rqst->status;
        $cat->save();

        return response()->json([
            'stat'=>'success'
        ]);
    }


    public function show(){
        $data = CategoryModel::all();
        return response()->json([
            'data'=>$data
        ]);
    }


    public function deleteCat($id){
        $data = CategoryModel::find($id);
        $subdatas = Subcat::where('cat_id',$id)->get();
        foreach($subdatas as $subdata){
            if(File::exists('backend/slider/'.$subdata->image)){
                File::delete('backend/slider/'.$subdata->image);
            }
            $subdata->delete();
        }
        // dd($subdatas);
        $data->delete();
        if($data){
            return response()->json([
                'status'=>"200"
            ]);
        }
        else{
            return response()->json([
                'status'=>"400"
            ]);
        }
        

    }


    public function editCat($id){
        $cat = CategoryModel::find($id);
        if($cat){
            return response()->json([
                'status'=>'200',
                'data'=>$cat
            ]);
        }
        else{
            return response()->json([
                'status'=>'404'
            ]);
        }
    }


    public function updateCat(Request $rqst,$id){
        $cat = CategoryModel::find($id);
        $cat->name = $rqst->name;
        $cat->desc = $rqst->desc;
        $cat->status = $rqst->status;
        $cat->update();

        if($cat){
            return response()->json([
                'status'=>'200'
            ]);
        }
        
        else{
            return response()->json([
                'status'=>'404'
            ]);
        }
    }



    public function cative($id){
        $castatus = CategoryModel::find($id);
        if($castatus->status == 1){
            $castatus->status = 0;
            $castatus->update();
            return response()->json([
                'status'=>'inactive',
            ]);
        }
        else{
            $castatus->status = 1;
            $castatus->update();
            return response()->json([
                'status'=>'active',
            ]);
        }
    }
}
