@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                   <ul class="list-group">
                    @foreach ($notifications as $notification)
                    <li class="list-group-item">
                        <a href="{{route('blog.show',$notification->data['post']['id'])}}">
                            @if ($notification->type == 'App\Notifications\NewReplyAdded')
                           A new reply was added to your post
                           <strong>{{$notification->data['post']['title']}}</strong>
                        <a href="{{route('blog.show',$notification->data['post']['id'])}}" class="btn float-right btn-sm btn-info">View Post</a>
                       @endif
                        </a>
                       
                    </li>
                    @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
