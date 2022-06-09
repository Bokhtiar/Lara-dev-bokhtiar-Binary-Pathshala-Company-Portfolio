@extends('layouts.admin.app')
@section('title', @$edit ? 'Blog Update' : 'Blog Create')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Blog {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Blog</li>
                <li class="breadcrumb-item active">Blog {{ @$edit ? 'Update' : 'Create' }} Form</li>
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
            <h5 class="card-title">Blog {{ @$edit ? 'Update' : 'Create' }} Form</h5>
            @if (@$edit)
                <form action="@route('admin.blog.update', @$edit->blog_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.blog.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Blog Title <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                        placeholder="type here Blog Title">
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label"> Select Service <span class="text-danger">*</span></label>
                    <select class="form-control" name="service_id" id="">
                        <option value="">--Select Service--</option>
                        @foreach ($services as $item)
                        <option value="{{ $item->service_id }}" {{ $item->service_id == @$edit->service_id ? 'Selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Blog Thumbnail Image <span class="text-danger">*</span></label>
                    <input  type="file" name="image[]" multiple class="form-control">
                    @if (@$edit->image)
                        @php
                            $image = json_decode($edit->image);
                        @endphp
                        @if (empty($image))
                            <td>Image Not Selected</td>
                        @else
                            <td>
                                <div class="">
                                    <span>Already Selected Image: </span>
                                    <img class="zoom" src="{{ asset($image[0]) }}" height="50px" width="50px"
                                        alt="">
                                </div>
                            </td>
                        @endif
                    @endif
                </div>
                <div class="col-md-12 col-lg-12">
                    <label for="">Blog Body <span class="text-danger">*</span></label>
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
