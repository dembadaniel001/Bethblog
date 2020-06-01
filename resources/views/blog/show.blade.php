@extends('layouts.blog')


@section('title')
{{ config('app.name', 'Laravel') }}</title>

<!-- Favicons -->
<link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png')}}">
<link rel="icon" href="{{ asset('img/favicon.png') }}">
@endsection

@section('header')
     <!-- Header -->
     <header class="header text-white h-fullscreen pb-80" style="background-image: url({{asset('storage/'.$post->image)}});" data-overlay="9">
        <div class="container text-center">
  
          <div class="row h-100">
            <div class="col-lg-8 mx-auto align-self-center">
  
              <p class="opacity-70 text-uppercase small ls-1">{{$post->category->name}}</p>
              <h1 class="display-4 mt-7 mb-8">{{$post->title}}</h1>
              <p><span class="opacity-70 mr-1">By</span> <a class="text-white" href="#">{{$post->user->name}}</a></p>
              <p><img class="avatar avatar-sm" src="{{Gravatar::src($post->user->email)}}" alt="..."></p>

  
            </div>
  
            <div class="col-12 align-self-end text-center">
              <a class="scroll-down-1 scroll-down-white" href="#"><span></span></a>
            </div>
  
          </div>
  
        </div>
      </header><!-- /.header -->
@endsection

@section('content')
        <!-- Main Content -->
        <main class="main-content">

            <div class="section" id="section-content">
              <div class="container">
                {!! $post->content !!}
               <br><br>
                <div class="addthis_inline_share_toolbox_rrj4">
                <p> <strong>Share post on</strong></p>  
                </div>

                {{-- <div class="row">
                  <div class="col-lg-8 mx-auto">

                    <div class="gap-xy-2 mt-6">
                      @foreach ($post->tags as $tag)
                      <a class="badge badge-pill badge-secondary" href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a>
                      @endforeach
                    </div>
      
                  </div>
                </div> --}}
      
      
              </div>
            </div>
      
      
      
         
            <div class="section bg-gray">
              <div class="container">
      
                <div class="row">
                  <div class="col-lg-8 mx-auto">
      

      
                    <hr>
      

                    <div class="card my-5">
                      <div class="card-header">
                        <strong>Comments</strong>
                      </div>
                      <div class="card-body">
                        @foreach ($post->replies()->paginate(3) as $reply)
                            <div class="card my-5">
                              <div class="card-header">
                                <div class="d-flex justify-content-between">
                                  <div>
                                  <img width="30px" height="30px" style="border-radius: 50%" src="{{Gravatar::src($reply->owner->email)}}" alt="">
                                
                                  <strong>{{$reply->owner->name}}</strong>
                                </div>
                                </div>
                                <div class="card-body">
                                  {!! $reply->content !!}
                                </div>
                              </div>
                            </div>
                        @endforeach
                        {{$post->replies()->paginate(3)->links() }}
                      @auth

                         <form action="{{route('replies.store',$post->id)}}" method="POST">
                          @csrf
                        
                        {{-- <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea> --}}
                          <input type="hidden" name="content" id="content" placeholder="Add your comment">
                          <trix-editor input="content" placeholder="Add your comment"></trix-editor>
                        <button type="submit" class="btn btn-success my-2">Add a comment</button>
                        </form>
                      @else
                      <a href="{{ route('login')}}" class="btn btn-info">Sign in to add a comment</a> 
                      @endauth
                      </div>
                    </div>


                    {{-- <div id="disqus_thread"></div> --}}


                  
  <script>



      /**
      *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
      *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
     
    //   var disqus_config = function () {
    //     this.page.url = "{{config('app.url')}}/blog/posts/{{$post->id}}";  // Replace PAGE_URL with your page's canonical URL variable
    //     this.page.identifier = "{{$post->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    //   };
     
    //   (function() { // DON'T EDIT BELOW THIS LINE
    //   var d = document, s = d.createElement('script');
    //   s.src = 'https://saas-blog-8r4vxe3sso.disqus.com/embed.js';
    //   s.setAttribute('data-timestamp', +new Date());
    //   (d.head || d.body).appendChild(s);
    //   })();
    // </script>
    {{-- // <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> --}}
                                
      
                  </div>
                </div>
      
              </div>
            </div>
      

      
          </main>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css"></script>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection