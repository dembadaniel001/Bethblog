@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header justify-contents-between">

        <strong>Subscribers</strong>

    <form class="input-group" action="{{route('users.index')}}" method="GET">
        <input type="text" class="form-control" name="search" placeholder="Search Users" value="{{ request()->query('search') }}">
            {{-- <div class="input-group-addon">
              <span class="input-group-text"><i class="ti-search"></i></span>
            </div> --}}
            <button type="submit" class="btn btn-info btn-sm">Search</button>
          </form>
    </div>
  
    <div class="card-body">
        @if ($users->count() > 0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>

            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                    <img height="40px" width="40px" style="border-radius:50%" src="{{Gravatar::src($user->email)}}" alt="">
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        @if (!$user->isAdmin())
                    <form action="{{route('users.make-admin',$user->id)}}" method="POST">
                        @csrf


                        <button type="submit" class="btn btn-success btn-sm">
                            Make Admin
                        </button>
                        </form>
                        @endif
                        @if ($user->isAdmin())
                        <form action="{{route('users.remove',$user->id)}}" method="POST">
                            @csrf
    
    
                            <button type="submit" class="btn btn-danger btn-sm">
                                Remove Admin
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h3 class="text-center">
                No Users yet
            </h3>
        @endif
        {{ $users->appends(['search' => request()->query('search') ])->links() }}

    </div>
</div>
@endsection