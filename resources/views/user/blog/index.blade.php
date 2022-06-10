@extends('layouts.user.app')
@section('title', 'Blogs')
@section('css')
@endsection

@section('user_content')

       <!-- ======= Breadcrumbs ======= -->
       <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Blog</li>
          </ol>
          <h2>Blog</h2>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

          <div class="row">

            <div class="col-lg-8 entries">

            @forelse ($blogs as $blog)
            <article class="entry">

                <div class="entry-img">
                    @php
                    $image = json_decode($blog->image);
                    @endphp
                    @if (empty($image))
                        <td>Image Not Selected</td>
                    @else
                        <img class="img-fluid" src="{{ asset($image[0]) }}" alt="">
                    @endif
                </div>

                <h2 class="entry-title">
                  <a href="@route('blog.detail', $blog->blog_id)">{{ $blog->title }}</a>
                </h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="@route('blog.detail', $blog->blog_id)">{{ $blog->user ? $blog->user->name : '' }}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="@route('blog.detail', $blog->blog_id)"><time datetime="2020-01-01">{{ $blog->created_at }}</time></a></li>
                  </ul>
                </div>

                <div class="entry-content">
                  <p>
                   {{ $blog->body }}.
                  </p>
                  <div class="read-more">
                    <a href="blog-single.html">Read More</a>
                  </div>
                </div>

              </article><!-- End blog entry -->
            @empty

            @endforelse



              <div class="blog-pagination">
                <ul class="justify-content-center">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                </ul>
              </div>

            </div><!-- End blog entries list -->

            <div class="col-lg-4">

              <div class="sidebar">

                <h3 class="sidebar-title">Search</h3>
                <div class="sidebar-item search-form">
                  <form action="@route('blog.search')" method="POST" >
                      @csrf
                    <input name="searchKey" required type="text">
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
      </section><!-- End Blog Section -->

@section('js')
@endsection
@endsection
