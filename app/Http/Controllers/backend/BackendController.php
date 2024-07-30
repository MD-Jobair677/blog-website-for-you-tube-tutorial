<?php

namespace App\Http\Controllers\backend;

use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function addcategory(){
        return view("dashbord.add_category");
    }

    public function storeCategory(Request $request){

        $validation = $request->validate([
            'category'=>'required',

        ]);

        $category = new Categorie();
        $category->category = $request->category;

        $count = Categorie::where('slug','Like','%'.Str::slug($request->category).'%')->count();


        if($count > 0){
            $count++ ;
            $category->slug = Str::slug($request->category)."-".$count; 

            }else{
                $category->slug = Str::slug($request->category);
            }
            $category->save();

            return back()->with("success"," Category add successfully");



        }

        // category show
        public function categoryshow(){

            $allcategoris = Categorie::latest()->get();
            // dd($allcategory);
            return view("dashbord.show-all-category",compact("allcategoris"));

        }

        // edite category
        public function aditecategory($id){
           
            
            $editecategory = Categorie::find($id);
            // dd( $editecategory);
            return view("dashbord.editecategory",compact('editecategory'));
        }


        public function updateCategory(Request $request){
            $allcategoris = Categorie::latest()->get();
            $validation = $request->validate([
                'category'=>'required',
    
            ]);

            $UpdateCategory = new Categorie();
                $UpdateCategory->category = $request->category;

                $count = Categorie::where('slug','Like','%'.Str::slug($request->category).'%')->count();

                if($count > 0){
                    $count++ ;
                    $UpdateCategory->slug = Str::slug($request->category)."-".$count; 
        
                    }else{
                        $UpdateCategory->slug = Str::slug($request->category);
                    }
                    $UpdateCategory->save();

                    return back()->with("success","Category update successfully");


        }



        //  DELETE CATEGORY
        public function CategoryDelete($id){
            // dd($id);

            $deleteCategory = Categorie::find($id);
            $deleteCategory->delete();

            return back()->with("success","Category Delete successfully");
        }




    
}
