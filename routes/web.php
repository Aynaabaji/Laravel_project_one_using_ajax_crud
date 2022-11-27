<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\Malamal;
use App\Http\Controllers\backend\Category;
use App\Http\Controllers\backend\SubcatController;
use App\Http\Controllers\backend\ItemGallary;


Route::get('/',function(){
    return view('welcome');
})->name('index');

Route::get('/home',[Malamal::class,'index'])->name('home');

Route::post('/add',[Malamal::class,'store'])->name('form');

Route::get('manage',[Malamal::class,'manage'])->name('manageProduct');

Route::get('delete/{id}',[Malamal::class,'destroy'])->name('delete');

Route::get('edit/{id}',[Malamal::class,'edit'])->name('edit');


Route::post('update/{id}',[Malamal::class,'update'])->name('update');

// stock toggle

Route::get('activinactive/{id}',[Malamal::class,'stockToggle'])->name('stockToggle');


// starting category


Route::get('catform',[Category::class,'catform'])->name('catform');


Route::post('addCategory',[Category::class,'addCategory'])->name('addCategory');


Route::get('showCategory',[Category::class,'show'])->name('showCategory');

Route::get('deleteCat/{id}',[Category::class,'deleteCat'])->name('deleteCat');


Route::get('editCat/{id}',[Category::class,'editCat'])->name('editCat');


Route::post('updateCat/{id}',[Category::class,'updateCat'])->name('updateCat');

Route::get('cative/{id}',[Category::class,'cative'])->name('cative');


Route::get('imform',[SubcatController::class,'imform'])->name('imform');

Route::post('addImg',[SubcatController::class,'addImg'])->name('addImg');



Route::get('scshow',[SubcatController::class,'show'])->name('scshow');


Route::get('dltsub/{id}',[SubcatController::class,'dltsub'])->name('dltsub');

Route::get('edtsub/{id}',[SubcatController::class,'edtsub'])->name('edtsub');

Route::post('udtsub/{id}',[SubcatController::class,'udtsub'])->name('udtsub');


Route::get('msc/{id}',[SubcatController::class,'msc'])->name('msc');

Route::get('item',[ItemGallary::class,'index'])->name('item');

Route::post('insertmul',[ItemGallary::class,'insert'])->name('insertmul');

Route::get('itemshow',[ItemGallary::class,'show'])->name('itemshow');

Route::get('itemStatusToggle/{id}',[ItemGallary::class,'itemStatusToggle'])->name('itemStatusToggle');

Route::get('editItem/{id}',[ItemGallary::class,'edit'])->name('editItem');

Route::get('dltgal/{id}',[ItemGallary::class,'dltgal'])->name('dltgal');

Route::get('addtogal/{id}',[ItemGallary::class,'addtogal'])->name('addtogal');

Route::post('insertgal/{id}',[ItemGallary::class,'insertgal'])->name('insertgal');

Route::post('updatesin/{id}',[ItemGallary::class,'updatesin'])->name('updatesin');

Route::get('dltitm/{id}',[ItemGallary::class,'dltitm'])->name('dltitm');