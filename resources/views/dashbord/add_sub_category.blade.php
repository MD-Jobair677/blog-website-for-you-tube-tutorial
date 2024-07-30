@extends('dashbord.dashbordLayout.layout')

@section('contant')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
               Add SubCategory
            </div>
            <div class="card-body">

            @if(session('success'))

            <div class="alert alert-success"> {{session('success')}}</div>
                
            @endif


                <form action="{{route('store-subcategory')}}" method="post">
                @method('post')
                @csrf
                    <div class="form-group">
                        <label for="category">Category select</label>
                        <select name='category_id' class="form-control" id="category">
                           @forelse ($AllCategoris as $AllCategori )
                          <option value="{{$AllCategori->id}}"  >{{$AllCategori->category}} </option>
                               
                           @empty
                               <h1> No category found</h1>
                           @endforelse
                        </select>

                         @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                            </div>
                    <div class="form-group">
                        <label for="subcategory">Subcategory</label>
                        <input name="subcategory" type="text" class="form-control" id="subcategory" placeholder="Enter subcategory">
                    </div>
                     @error('subcategory')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
             <a href="{{route('all-sub-category')}} " class="btn btn-primary">Back</a>
        </div>
    </div>

  @endsection