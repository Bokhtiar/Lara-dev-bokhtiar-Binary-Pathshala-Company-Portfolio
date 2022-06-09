@extends('layouts.admin.app')
@section('title', 'List Of Price')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Price Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Price Show</li>
                <li class="breadcrumb-item active">Price Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section id="pricing" class="pricing">
        <div class="container">
  
          <div class="section-title">
            <h2>Pricing</h2>
          </div>
  
          <div class="row justify-content-center">
  
            <div class="col-lg-4 col-md-6">
              <div class="box">
                <h3>{{ $show->title }}</h3>
                <h4><sup>TK</sup>{{ $show->price }}<span> / {{ $show->designation }}</span></h4>
                <ul>
                  <li>{{ $show->item1 }}</li>
                  <li>{{ $show->item2 }}</li>
                  <li>{{ $show->item3 }}</li>
                  <li>{{ $show->item4 }}</li>
                  <li>{{ $show->item5 }}</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Pricing Section -->
       

@section('js')
@endsection

@endsection
