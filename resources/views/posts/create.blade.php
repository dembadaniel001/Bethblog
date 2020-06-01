@extends('layouts.app')

@section('content')
    <div class="card card-default mb-10">
        <div class="card-header">
            Create Post
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item text-danger">
                           {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action=" {{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
    
                @if (isset($post))
                    @method('PUT')
                @endif
    
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{isset($post) ? $post->title: ''}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{isset($post) ? $post->description: ''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    {{-- <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea> --}}
                    <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content: ''}}">
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                <input type="text" class="form-control" name="published_at" id="published_at" value="{{isset($post) ? $post->published_at: ''}}">
                </div>
                
               {{-- Image upload/Edit --}}
                <div class="form-group">
                    @if (isset($post))
                        <div class="form-group">
                        <img src="{{'http://127.0.0.1:8000/storage/'.$post->image}}" alt="" style="width:100%">
                        </div>
                    @endif
                    <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
                </div>

                {{-- Category select form --}}

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                            @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                       @if (isset($post))
                            @if ($category->id == $post->category_id)
                                selected
                            @endif
                       @endif
                        >{{$category->name}}</option>                                
                            @endforeach
                    </select>
                </div>
    
                {{-- Video upload/Edit --}}
                {{-- <div class="form-group">
                    @if (isset($post))
                        <div class="form-group">
                        <img src="{{'http://127.0.0.1:8000/storage/'.$post->video}}" alt="" style="width:100%">
                        </div>
                    @endif
                    <label for="video">Video</label>
                <input type="file" class="form-control" name="video" id="video">
                </div> --}}
               
               {{-- categories select control --}}
                {{-- <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @if (isset($post))
                            @if ($category->id == $post->category_id)
                                selected
                            @endif
                        @endif
                        >{{ $category->name }}</option>
    
                        @endforeach
                    </select>
                </div> --}}
    
                {{-- Tags select --}}
                {{-- @if ($tags->count() > 0)
    
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select multiple name="tags[]" id="tags" class="form-control tags-selector">
                        @foreach ($tags as $tag)
                    <option value="{{$tag->id}}"
                        @if (isset($post))
                            @if ($post->hasTag($tag->id))
                                selected
                            @endif
                        @endif
                        >{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif --}}
                {{-- submit button --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{isset($post)? 'Update Post':'Create Post'}}</button>
                </div>
                </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
          flatpickr('#published_at',{
         
         enableTime: true,   
         enableSeconds:true
     })

    

    </script>
@endsection
 @section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
 @endsection