@extends('dashbord.dashbordLayout.layout')

@section('contant')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="container mt-5">
        <div class="card">
          <div class="card-header">
            <h3>Edite Category</h3>
          </div>
          <div class="card-body">

         
        @if(session('success'))

          <div class="alert alert-success">{{session('success')}}</div>

        @endif


            <form action="{{route('update-category')}}" method="post">
              @csrf
              <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" name="category" class="form-control" id="categoryName" value="{{$editecategory->category}}" placeholder="Enter category name">
                @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
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