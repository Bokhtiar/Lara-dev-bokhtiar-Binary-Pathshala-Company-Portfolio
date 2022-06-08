@extends('layouts.admin.app')
@section('title', 'List Of Service')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Service Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Service Show</li>
                <li class="breadcrumb-item active">Service Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

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
                    <img class="zoom" src="{{ asset($image) }}" height="200px" width="100%" alt=""><br><br>
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
                  <li><strong>Service</strong>: {{ $show->service ? $show->service->name : "Data Not Found" }}</li>
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
                <h2>{{ $show->title }} portfolio detail</h2>
                <p>
                 {!! $show->body !!}
                </p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Details Section -->

@section('js')
@endsection

@endsection
