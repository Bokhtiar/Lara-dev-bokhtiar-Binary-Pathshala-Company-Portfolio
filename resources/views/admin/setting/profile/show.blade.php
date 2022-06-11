@extends('layouts.admin.app')
@section('title', 'List Of User')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>User Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">User Show</li>
                <li class="breadcrumb-item active">User Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section id="pricing" class="pricing">
        <div class="container">

          <div class="section-title">
            <h2>User Profile</h2>
          </div>

          <div class="row justify-content-center">

            <div class="col-lg-6 col-md-6">
              <div class="box">
                <strong>Name: </strong>{{ $show->name }} <br>
                <strong>Email: </strong>{{ $show->email }} <br>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Pricing Section -->


@section('js')
@endsection

@endsection
