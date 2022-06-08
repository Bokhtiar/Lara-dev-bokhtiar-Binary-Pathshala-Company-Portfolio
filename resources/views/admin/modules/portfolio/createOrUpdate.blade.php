@extends('layouts.admin.app')
@section('title', @$edit ? 'Portfolio Update' : 'Portfolio Create')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Portfolio {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Portfolio</li>
                <li class="breadcrumb-item active">Portfolio {{ @$edit ? 'Update' : 'Create' }} Form</li>
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
            <h5 class="card-title">Portfolio {{ @$edit ? 'Update' : 'Create' }} Form</h5>
            @if (@$edit)
                <form action="@route('admin.portfolio.update', @$edit->portfolio_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.portfolio.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Portfolio Title <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                        placeholder="type here Portfolio Title">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Client Name</label>
                    <input required type="text" class="form-control" name="client_name" value="{{ @$edit->client_name }}"
                        placeholder="type here Client Name">
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label"> Select Service <span class="text-danger">*</span></label>
                    <select class="form-control" name="service_id" id="">
                        <option value="">--Select Service--</option>
                        @foreach ($servies as $item)
                        <option value="{{ $item->service_id }}" {{ $item->service_id == @$edit->service_id ? 'Selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Project Date </label>
                    <input type="text" class="form-control" name="project_date" value="{{ @$edit->project_date }}"
                        placeholder="type here Project Date">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Project Url</label>
                    <input type="text" class="form-control" name="project_url" value="{{ @$edit->project_url }}"
                        placeholder="type here Portfolio Project Url">
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Portfolio Images <span class="text-danger">*</span></label>
                    <input  type="file" name="images[]" multiple class="form-control">
                    @if (@$edit->images)
                        @php
                            $images = json_decode($edit->images);
                        @endphp
                        @if (empty($images))
                            <td>Image Not Selected</td>
                        @else
                            <td>
                                <div class=" my-2">
                                    <span>Already Selected Image: </span>
                                    @forelse ($images as $image)
                                    <img class="zoom" src="{{ asset($image) }}" height="50px" width="50px"
                                    alt=""> &nbsp;&nbsp;&nbsp;
                                    @empty
                                    <h2>Not Found Image</h2>
                                    @endforelse

                                </div>
                            </td>
                        @endif
                    @endif
                </div>
                <div class="col-md-12 col-lg-12">
                    <label for="">Portfolio Body <span class="text-danger">*</span></label>
                    <textarea name="body" class="tinymce-editor">
                       {!! @$edit->body !!}
                      </textarea><!-- End TinyMCE Editor -->
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
