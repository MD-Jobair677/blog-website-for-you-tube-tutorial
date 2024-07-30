@extends('dashbord.dashbordLayout.layout')


@section('contant')

        <div class="container">
<div class="card mt-3">
        
    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
      
    @endif
 
  
    <div class="card-header">
      All SubCategory
    </div>
    <div class="card-body">
    
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>SubCategory</th>
            <th>Category(parent)</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        @forelse ($AllCategories as $key=> $AllCategorie )
        <tr>
            <td>{{++$key}}</td>
            <td>{{$AllCategorie->subcategory}}</td>
            <td>{{$AllCategorie->Categorie->category}}</td>
            <td>
           
                        <a href="{{route('edite-category',$AllCategorie ->id)}}" class="btn btn-primary">Edite</a>

                          <button type="submit" class="btn btn-danger dltbtn" >Delete</button>
                        <form action="{{route('delete',$AllCategorie ->id)}}" method="POST">
                        @csrf
                        @method('delete')
                          
                          
                        </form>
                   
            </td>
          </tr>
          
        @empty
          <h1> No SubCategory Found</h1>
        @endforelse
          
         
          


        </tbody>
      </table>
      <a href="{{route('add-sub-category')}} " class="btn btn-primary">Back</a>
    </div>

</div>





@endsection


@push('sweetalert')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script> 
$(document).ready(function(){

$('.dltbtn').click(function(event){
  event.preventDefault()


  Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    
    $(this).next('form').submit().prev

  }
});


})

 
})

</script>
 
  
@endpush