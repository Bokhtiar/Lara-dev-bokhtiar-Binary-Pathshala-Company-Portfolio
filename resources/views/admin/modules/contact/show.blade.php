@extends('layouts.admin.app')
@section('title', 'Show Contact')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Contact Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Contact Show</li>
                <li class="breadcrumb-item active">Contact Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="row my-3">
                <div class="col-sm-12 col-md-5 col-lg-5 text-center">
                    <h2>Contact User Info.</h2> <hr>
                    <strong>Name: </strong>{{ $show->name }} <br>
                    <strong>Email: </strong>{{ $show->email }} <br>
                    <strong>Subject: </strong>{{ $show->subject }}
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <h2>Contact User Message</h2> <hr>
                    {!! $show->body !!}
                </div>
            </div>
        </div>
    </div>

@section('js')
@endsection

@endsection
