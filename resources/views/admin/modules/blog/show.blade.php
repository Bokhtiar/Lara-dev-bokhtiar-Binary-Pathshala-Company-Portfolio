@extends('layouts.admin.app')
@section('title', 'List Of Blog')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Blog Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Blog Show</li>
                <li class="breadcrumb-item active">Blog Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-header h2">
            <span class="font-weight-bold ">Blog Title :</span> {{ $show->title }}
        </div>
        <div class="card-body">
            <div class=" my-5">
                    @php
                        $image = json_decode($show->image);
                    @endphp
                    @if (empty($image))
                        <td>Image Not Selected</td>
                    @else
                        <td><img class="zoom" src="{{ asset($image[0]) }}" height="240px" width="100%" alt="">
                        </td>
                    @endif

                <div class="my-3">
                    {!! $show->body !!}
                    <hr>
                    {{ $show->user ? $show->user->name : "" }}
                </div>
            </div>
        </div>
    </div>

@section('js')
@endsection

@endsection
