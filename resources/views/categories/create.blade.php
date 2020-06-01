@extends('layouts.app')
 
@section('content')
<div class="card card-default">
         <div class="card-header">
         {{isset($category) ? 'Edit Category' : 'Create Category'}}
                    
        </div>
         <div class="card-body">
           @include('partials.errors')
         <form action="{{isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="POST">
                 {{ csrf_field() }}
                @if (isset($category))
                    @method('PUT')
                @endif
                 <div class="form-group">
                     <label for="name">Name</label>
                 <input value="{{isset($category) ? $category->name : ''}}" type="text" id="name" class="form-control" name="name">
                 </div>
                 <div class="form-group">
                     <button class="btn btn-success">
                         {{isset($category)? 'Update Category' : 'Add Category'}}
                     </button>
                 </div>
             </form>
         </div>
     </div>
@endsection
