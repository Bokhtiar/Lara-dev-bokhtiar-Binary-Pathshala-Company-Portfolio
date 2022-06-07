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

    <div class="card">
        <div class="card-header">
            <span class="font-weight-bold">Service Name :</span> {{ $show->name }}
        </div>
        <div class="card-body">
            <div class="row my-3">
                <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                    @php
                        $image = json_decode($show->image);
                    @endphp
                    @if (empty($image))
                        <td>Image Not Selected</td>
                    @else
                        <td><img class="zoom" src="{{ asset($image[0]) }}" height="50px" width="50px" alt="">
                        </td>
                    @endif
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    {!! $show->body !!}
                </div>
            </div>
        </div>
    </div>

@section('js')
@endsection

@endsection
