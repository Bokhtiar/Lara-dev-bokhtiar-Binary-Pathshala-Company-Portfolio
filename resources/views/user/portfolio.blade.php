@extends('layouts.user.app')
@section('title', 'Login')
@section('css')
@endsection

@section('user_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Portfolio</li>
      </ol>
      <h2>Portfolio Detail</h2>
    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

                @php
                $images = json_decode($show->images);
                @endphp

                @forelse ($images as $image)
                <div class="swiper-slide">
                    <img src="{{ asset($image) }}" alt="">
                </div>
                @empty
                <h2 class="btn btn-danger form-control">No Select Image</h2>
                @endforelse


            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Service</strong>: {{ $show->service ? $show->service->name : 'data not found' }}</li>
            @isset($show->client_name)
            <li><strong>Client</strong>: {{ $show->client_name }}</li>
            @endisset
            @isset($show->project_date)
            <li><strong>Project date</strong>: {{ $show->project_date }}</li>
            @endisset
            @isset($show->project_url)
            <li><strong>Project URL</strong>: <a href="#">{{ $show->project_url }}</a></li>
            @endisset


            </ul>
          </div>
          <div class="portfolio-description">
            <h2>This is an {{ $show->title }} of portfolio detail</h2>
            <p>
             {!! $show->body !!}.
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section --

@section('js')
@endsection
@endsection
