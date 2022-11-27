<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Item;
use App\Models\backend\Gallary;
use Image;
use File;

class ItemGallary extends Controller
{
    public function index(){
        return view('backend.item.add');
    }


    public function insert(Request $rqst){
        if($rqst->images){
            $picture = $rqst->file('images');
            $scustomName = rand().".".$picture->getClientOriginalExtension();
            $location = public_path("backend/items/".$scustomName);
            Image::make($picture)->save($location);
            $itemDBsave = new Item;
            $itemDBsave->name = $rqst->name;
            $itemDBsave->image = $scustomName;
            $itemDBsave->status = $rqst->status;
            $itemDBsave->save();

            $find = Item::all()->last();

            $multiImages = $rqst->file('gallaries');
            foreach($multiImages as $picture1){
                $scustomName1 = rand().".".$picture1->getClientOriginalExtension();
                $location1 = public_path("backend/gallary/".$scustomName1);
                Image::make($picture1)->save($location1);
                $gallaryDBsave = new Gallary;
                $gallaryDBsave->item_id = $find->id;
                $gallaryDBsave->images = $scustomName1;
                $gallaryDBsave->save();
            }
        }
        return redirect()->route('itemshow');
    }

    public function show(){
        $items = Item::all();
        return view('backend.item.manage',compact('items'));
    }

    public function itemStatusToggle($id){
        $itemStatus = Item::find($id);
        if($itemStatus->status == 1){
            $itemStatus->status = 0;
            $itemStatus->update();
        }
        else{
            $itemStatus->status = 1;
            $itemStatus->update();
        }
        return back();
    }


    public function edit($id){
        $item = Item::find($id);
        $gallaries = Gallary::where('item_id',$id)->get();
        return view('backend.item.edit',compact('item','gallaries'));
    }

    public function dltgal($id){
        $dlt = Gallary::find($id);
        if(File::exists("backend/gallary/".$dlt->images)){
            File::delete("backend/gallary/".$dlt->images);
        }
        $dlt->delete();
        return back();
    }

    public function addtogal($id){
        return view("backend.item.gallad",compact('id'));
    }

    public function insertgal(Request $rqst,$id){
        if($rqst->pics){
            $multiImages = $rqst->file('pics');
            foreach($multiImages as $picture1){
                $scustomName1 = rand().".".$picture1->getClientOriginalExtension();
                $location1 = public_path("backend/gallary/".$scustomName1);
                Image::make($picture1)->save($location1);
                $gallaryDBsave = new Gallary;
                $gallaryDBsave->item_id = $id;
                $gallaryDBsave->images = $scustomName1;
                $gallaryDBsave->save();
            }
        }
        return redirect()->route('editItem',$id);
    }


    public function updatesin(Request $rqst,$id){
        $itm = Item::find($id);
        if($rqst->images){
            if(File::exists("backend/items/".$itm->image)){
                File::delete("backend/items/".$itm->image);
    
                $picture = $rqst->file('images');
                $customName = rand().".".$picture->getClientOriginalExtension();
                $location = public_path('backend/items/'.$customName);
                Image::make($picture)->save($location);
                $itm->image = $customName;
            }
        }
        $itm->name = $rqst->name;
        $itm->image = $customName;
        $itm->status = $rqst->status;
        $itm->update();
        return redirect()->route('itemshow');
    }


    public function dltitm($id){
        $itemsearch = Item::find($id);
        $gal = Gallary::where('item_id',$id)->get();
        if(File::exists("backend/items/".$itemsearch->image)){
            File::delete("backend/items/".$itemsearch->image);
        }
        foreach($gal as $galary){
            if(File::exists("backend/gallary/".$galary->images)){
                File::delete("backend/gallary/".$galary->images);
            }
            $galary->delete();
        }
        $itemsearch->delete();

        return redirect()->route('itemshow');
    }



}
