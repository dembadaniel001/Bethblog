@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-info float-right">Add Post</a>
</div>
<div class="card card-default">
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
        @if ($posts->count() > 0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th></th>

            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                    <img src="{{ asset('storage/'.$post->image) }} " width="100px" height="50px" alt="beth's blog">
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        {{$post->category->name}}
                    </td>
                    <td>
                        @if ($post->trashed())
                    <form action="{{ route('restore-posts',$post->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-info btn-sm">Restore Post</button>                            
                    </form>

                        @else
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                        @endif
                    </td>
                    <td>
                    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            {{$post->trashed() ? 'Delete':'Trash Post'}}
                        </button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h3 class="text-center">
                No posts
            </h3>
        @endif
    </div>
</div>
@endsection