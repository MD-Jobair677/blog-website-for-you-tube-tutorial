<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\SubCategori;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function AddPost(){

        $categoris = Categorie::latest()->get();
      
        return view("dashbord.add_post",compact("categoris"));

    }

    // STORE POST IN DATABSE

    function StorePost(Request $request){
        $request->validate([
            'title'=>'required|string|max:30|min:10',
            'post_image'=>'required|mimes:jpg,png,jpeg',
            'category'=>'required',
            'subcategory'=>'required',
            'contant'=>'required|string|min:10|max:200',

        ]);
    }

   // SUBCATEGORY AJAX
    public function GetSubcategory(Request $request){

        $subcategory = SubCategori::where('categorie_id',$request->id)->latest()->get();

        return  $subcategory ;

        
    }
    
   
}
