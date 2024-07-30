@extends('dashbord.dashbordLayout.layout')

@section('contant')
    <div class="container">
<div class="card">
        

 
  <div class="card">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">

    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
      
    @endif
    
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>


        @forelse($allcategoris as $key => $category)
        <tr>
            <td>{{++$key}}</td>
            <td>{{ $category->category}}</td>
            <td>
           
                        <a href="{{route('categoroy-edit',$category->id)}}" class="btn btn-primary">Edit</a>
                        <button type="submit" class="btn btn-danger dltbtn" >Delete</button>


                        <form action="{{route('category-delete',$category->id)}}" method="POST" style="display:inline;">
                          @method('DELETE')
                          @csrf
                            
                        </form>
                   
            </td>
          </tr>
            
        @empty

        <h1> No category found</h1>
            
        @endforelse
          
         
          


        </tbody>
      </table>
      <a href="#" class="btn btn-primary">Back</a>
    </div>
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