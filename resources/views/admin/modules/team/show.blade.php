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
    <section id="team" class="team">
        <div class="container">

          <div class="section-title">
            <h2>Team {{ $show->name }} Profile</h2>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                    @php
                        $image = json_decode($show->image);
                    @endphp
                    @if (empty($image))
                        <td>Image Not Selected</td>
                    @else
                        <td><img class="zoom img-fluid" src="{{ asset($image[0]) }}" alt="">
                        </td>
                    @endif
                  <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                  <div class="social">
                    @isset($show->twitter)
                    <a target="blank" href="{{ $show->twitter }}"><i class="bi bi-twitter"></i></a>
                    @endisset

                      @isset($show->fb)
                      <a target="blank" href="{{ $show->fb }}"><i class="bi bi-facebook"></i></a>
                      @endisset

                      @isset($show->instagram)
                      <a target="blank" href="{{ $show->instagram }}"><i class="bi bi-instagram"></i></a>
                      @endisset

                      @isset($show->linkdin)
                      <a target="blank" href="{{ $show->linkdin }}"><i class="bi bi-linkedin"></i></a>
                      @endisset
                  </div>
                </div>
                <div class="member-info">
                  <h4>{{ $show->name }}</h4>
                  <span>{{ $show->designation }}</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Team Section -->

@section('js')
@endsection

@endsection
