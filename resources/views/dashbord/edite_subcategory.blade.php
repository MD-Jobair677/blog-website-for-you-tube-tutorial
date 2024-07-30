@extends('dashbord.dashbordLayout.layout')


@section('contant')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="container mt-5">
        <div class="card">
          <div class="card-header">
            <h3>Edite Sub_Category</h3>
          </div>
          <div class="card-body">

         
        @if(session('success'))

          <div class="alert alert-success">{{session('success')}}</div>

        @endif


            <form action="{{route('update-subcategory',$edite_single_subcategory->id)}}" method="post">
              @csrf
             @method('put')
              <div class="form-group">
                <label for="categoryName">Sub_Category Name</label>
                <input type="text" name="subcategory" class="form-control" id="categoryName" value="{{$edite_single_subcategory->subcategory}}" placeholder="Enter category name">
                @error('subcategory')
                <div class="alert alert-danger">{{ $message }} </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection