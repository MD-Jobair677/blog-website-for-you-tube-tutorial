@extends('dashbord.dashbordLayout.layout')

@section('contant')

    <div class="container">
        <div class="row">
            <div class="col-8">

               <form action="{{route('store-post')}}" class="form-control my-3" method="POST" enctype='multipart/form-data'  >
               @csrf

               
                <div>
                    <label for="title">Title</label>
                    <input name="title" class="form-control " type="text" placeholder="Enter your title" id="title">
                   
                </div>

                @error('title')
                <div class="text-danger"> {{$message}}</div>
                    
                @enderror



                <div>
                    <input  name="post_image" class="form-control my-3" type="file">
                    
                </div>


                @error('post_image')
                <div class="text-danger"> {{$message}}</div>
                    
                @enderror



                <div class="row">
                    <div class="col-lg-6">
                        <label name="category" for="subcategory">Select Category</label>
                        <select class="form-control select" name="category" id="" >

                            @forelse ($categoris as $category )
                                <option value="{{$category->id}}">{{$category->category }}</option>
                            @empty
                                <option disable>No Category Found</option>
                            @endforelse


                          
                            
                        </select>
                         @error('category')
                     <div class="text-danger"> {{$message}}</div>
                    
                @enderror
                      
                    </div>
                   



                    <div class="col-lg-6">
                        <label for="subcategory"> Select Sub_category</label>
                        <select  class="form-control subcategoryselect " name="subcategory" id="subcategory">

                           

                        </select>
                          @error('subcategory')
                        <div class="text-danger"> {{$message}}</div>
                    
                @enderror
                </div>
                        
                    </div>

                  
                
                <div class="my-3">
                <textarea  class="form-control"  name="contant" id="editor" >
    
                </textarea></div>

                @error('contant')
                <div class="text-danger"> {{$message}}</div>
                    
                @enderror
    
    
    
                <button class="btn btn-primary my-3">submit</button>
               </form>
                
    
            </div>
           
        </div>
    </div>
@endsection

@push('sweetalert')

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
 
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );






</script>



{{-- subcategory ajax --}}
<script>

    $(document).ready(function(){

        $('.select').change(function(){
            $.ajax ({

                url:"{{route('getsubcategory')}}",

                type: "GET",

                 data:{
                    id:$(this).val(),

                 },

                 success:function(response){

                    let array =[];
                   if(response.length == 0){

                    let option = " <option disable class='form-control'> Subcategory Not found </option>"

                    $('.subcategoryselect').html(option)
                   return false;

                   }

                    response.forEach(element =>{

                        let option =  `<option value="${element.id}" class='form-control'> ${element.subcategory}</option>`
                        array.push(option);


                    })

                
                        $('.subcategoryselect').html(array);




                 }


            })




        })



    })


  </script>

@endpush

