@extends('layouts.user.app')
@section('title', 'Blogs')
@section('css')
@endsection

@section('user_content')

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="index.html">Home</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li>Blog Single</li>
      </ol>
      <h2>Blog Single</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Single Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry entry-single">

            <div class="entry-img">
                @php
                $image = json_decode($show->image);
                @endphp
                @if (empty($image))
                    <td>Image Not Selected</td>
                @else
                    <img class="img-fluid" src="{{ asset($image[0]) }}" alt="">
                @endif
            </div>

            <h2 class="entry-title">
              <a href="@route('blog.detail', $show->blog_id)">{{ $show->title }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="@route('blog.detail', $show->blog_id)">{{ $show->user  ? $show->user->name : "" }}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="@route('blog.detail', $show->blog_id)"><time datetime="2020-01-01">{{ $show->created_at->diffForHumans() }}</time></a></li>
              </ul>
            </div>

            <div class="entry-content">
            {!! $show->body !!}

            </div>

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
                <ul>
                    @forelse ($services as $service)
                    <li><a href="@route('blog.service', $service->service_id)">{{ $service->name }} <span>(25)</span></a></li>
                    @empty
                    <li><a href="#">No Available Service <span>(0)</span></a></li>
                    @endforelse

                </ul>
            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">

                @foreach ($blogs as $b)
                <div class="post-item clearfix">
                      @php
                      $image = json_decode($b->image);
                      @endphp
                      @if (empty($image))
                          <td>Image Not Selected</td>
                      @else
                          <img class="img-fluid" src="{{ asset($image[0]) }}" alt="">
                      @endif


                      <h4><a href="@route('blog.detail', $b->blog_id)">{{ $b->title }}</a></h4>
                      <time datetime="2020-01-01">{{ $b->created_at->diffForHumans() }}</time>
                </div>
                @endforeach


              </div><!-- End sidebar recent posts-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Single Section -->

@section('js')
@endsection
@endsection
