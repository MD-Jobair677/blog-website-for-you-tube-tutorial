<?php

namespace App\Http\Controllers\backend;

use App\Models\Categorie;
use App\Models\SubCategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
    function addSubCategory () {
        $AllCategoris = Categorie::get();
        return view("dashbord.add_sub_category",compact("AllCategoris"));

    }

    // STORE SUBCATEGORY
    function StoreSubcategory (Request $request) {

        $request->validate([
            'category_id'=>'required',
            'subcategory'=>'required|max:10'
        ]);

        $Subcategory =new SubCategori();
        $Subcategory->Categorie_id=$request->category_id;
        $Subcategory->subcategory=$request->subcategory;

        $count = SubCategori::where('slug','Like','%'.Str::slug($request->subcategory).'%')->count();

        if($count > 0){
            $count++ ;
            $Subcategory->slug = Str::slug($request->subcategory)."-".$count; 

            }else{
                $Subcategory->slug = Str::slug($request->subcategory);
            }
            $Subcategory->save();

            return back()->with("success"," SubCategory add successfully");

        
    }


    // ALL SUBCATEGORY

    function AllSubCategory () {

      $AllCategories = SubCategori::with('Categorie')->get();
        
    //    dd($AllCategories);


        return view('dashbord.all_sub_category',compact('AllCategories'));
    }



    function EditeCategory ($id) {

        $edite_single_subcategory = SubCategori::find( $id );
        // dd($edite_single_subcategory);

        return view('dashbord.edite_subcategory',compact('edite_single_subcategory'));
    }

    
    function UpdateSubcategory (Request $request, $id) {
        $request->validate([
            'subcategory'=>'required|max:20'
        ]);

     $Update_single_Subcategory = SubCategori::find( $id );

     $Update_single_Subcategory->subcategory= $request->subcategory;
        
     $count = SubCategori::where('slug','Like','%'.Str::slug($request->subcategory).'%')->count();

     if($count > 0){
        $count++ ;
        $Update_single_Subcategory->slug = Str::slug($request->subcategory)."-".$count; 

        }else{
            $Update_single_Subcategory->slug = Str::slug($request->subcategory);
        }


        $Update_single_Subcategory->save();

        return back()->with("success","update successfull");

    }

    function delete ($id) {
    //    SubCategori::find($id)->delete();

       $subcategory = SubCategori::find( $id );
    $subcategory->delete();
    return back()->with("success","Delete succssfull");
    
    }

}
