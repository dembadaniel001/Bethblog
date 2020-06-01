@extends('layouts.app')
 
@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{route('categories.create')}}" class="btn btn-info float-right">Add Category</a>
</div>
<div class="card card-default">
         <div class="card-header">
             Categories
         </div>
         <div class="card-body">
            @if ($categories->count() > 0)
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Number of posts</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                       <tr>
                           <td>
                               {{$category->name}}
                           </td>
                           <td>
                               {{$category->posts->count()}}
                           </td>
                           <td>
                           <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm">Edit Category</a>

                           <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete Category</button>
                           </td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h3 class="text-center">
                    No categories yet
                </h3>
            @endif
             <form action="" method="POST" id="deleteCategoryForm">
                @csrf
                @method('DELETE')
               
                              <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <strong>
                        Are you sure you would like to delete this category
                    </strong>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">No, go back</button>
                <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </div>
            </div>
        </div>
             </form>
         </div>
     </div>
@endsection
 @section('scripts')
     <script>
         function handleDelete(id) {
             var form = document.getElementById('deleteCategoryForm')
             form.action = '/categories/' + id
             $('#deleteModal').modal('show')
         }
     </script>
 @endsection