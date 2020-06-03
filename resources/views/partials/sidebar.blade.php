<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">

      <h6 class="sidebar-title">Search Posts</h6>
    <form class="input-group" action="" method="GET">
    <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request()->query('search') }}">
        <div class="input-group-addon">
          <span class="input-group-text"><i class="ti-search"></i></span>
        </div>
      </form>

      <hr>

      <h6 class="sidebar-title">Categories</h6>
      <div class="row link-color-default fs-14 lh-24">
       @foreach ($categories as $category)
       <div class="col-6"><a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></div>
       @endforeach
      </div>

      <hr>

      {{-- <h6 class="sidebar-title">Top posts</h6>
      <a class="media text-default align-items-center mb-5" href="blog-single.html">
        <img class="rounded w-65px mr-4" src="../assets/img/thumb/4.jpg">
        <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>
      </a>

      <a class="media text-default align-items-center mb-5" href="blog-single.html">
        <img class="rounded w-65px mr-4" src="../assets/img/thumb/3.jpg">
        <p class="media-body small-2 lh-4 mb-0">Best practices for minimalist design</p>
      </a>

      <a class="media text-default align-items-center mb-5" href="blog-single.html">
        <img class="rounded w-65px mr-4" src="../assets/img/thumb/5.jpg">
        <p class="media-body small-2 lh-4 mb-0">New published books for product designers</p>
      </a>

      <a class="media text-default align-items-center mb-5" href="blog-single.html">
        <img class="rounded w-65px mr-4" src="../assets/img/thumb/2.jpg">
        <p class="media-body small-2 lh-4 mb-0">Top 5 brilliant content marketing strategies</p>
      </a> --}}

      <hr>

      <div class="col-6 col-lg-3 text-right order-lg-last">
        <h6 class="sidebar-title">Contacts</h6>
        <div class="social">
        <a class="social-facebook" target="_blank" href=""><i class="fa fa-facebook"></i></a>
        <a class="social-twitter" target="_blank" href=""><i class="fa fa-twitter"></i></a>
        <a class="social-instagram" target="_blank" href=""><i class="fa fa-instagram"></i></a>
          <a class="social-dribbble" target="_blank" href="#"><i class="fa fa-dribbble"></i></a>
        </div>
      </div>

      <hr>

      <h6 class="sidebar-title">About The Blog</h6>
      <p class="small-3"></p>

      <hr>

      <h6 class="sidebar-title">About Me</h6>
      <p class="small-3"></p>

      <hr>

    </div>
  </div>