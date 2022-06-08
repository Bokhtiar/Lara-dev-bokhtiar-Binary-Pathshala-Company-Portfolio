@extends('layouts.admin.app')
@section('title', 'List Of About')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>About Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">About Show</li>
                <li class="breadcrumb-item active">About Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    @forelse ($abouts as $item)
        <section class="about">
            <div class="container">

                <div class="section-title">
                    <h2>About {{ $loop->index + 1 }}</h2>
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->short_des }}.</p>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        {!! $item->left_des !!}
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        {!! $item->right_des !!}
                    </div>
                </div>
            </div>

            @if ($item->status == 1)
            <a href="@route('admin.about.status', $item->about_id)" class="btn btn-sm btn-success">Active</a>
            @else
            <a href="@route('admin.about.status', $item->about_id)" class="btn btn-sm btn-danger">In-Active</a>
            @endif
        </section>
    @empty
        <h1 class="bg-danger text-light ">About is Empty</h1>
    @endforelse


    @section('js')
    @endsection

@endsection
