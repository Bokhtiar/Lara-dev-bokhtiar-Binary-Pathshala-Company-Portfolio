@extends('layouts.admin.app')
@section('title', @$edit ? 'Web Setiing Update' : 'Web Setiing Create')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Web Setiing {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Web Setiing</li>
                <li class="breadcrumb-item active">Web Setiing {{ @$edit ? 'Update' : 'Create' }} Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-header">
            {{-- form validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- form validation errors end --}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Web Setiing {{ @$edit ? 'Update' : 'Create' }} Form</h5>
            @if (@$edit)
                <form action="@route('admin.web-setting.update', @$edit->web_setting_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.web_setiing.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Web Setiing Title <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                        placeholder="type here Web Setiing title">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Web Setiing Email <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="email" value="{{ @$edit->email }}"
                        placeholder="type here Web Setiing email">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Web Setiing Phone <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="phone" value="{{ @$edit->phone }}"
                        placeholder="type here Web Setiing Phone">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Web Setiing Location <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="location" value="{{ @$edit->location }}"
                        placeholder="type here Web Setiing name">
                </div>


                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Web Setiing Heading 1 <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="heading_1" value="{{ @$edit->heading_1 }}"
                        placeholder="type here Web Setiing Heading1">
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Web Setiing Heading 2 <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="heading_2" value="{{ @$edit->heading_2 }}"
                        placeholder="type here Web Setiing heading 2">
                </div>
            </section>
            <br><br><br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>



@section('js')
@endsection
@endsection
