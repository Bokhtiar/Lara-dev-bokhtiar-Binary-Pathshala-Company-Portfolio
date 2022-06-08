@extends('layouts.admin.app')
@section('title', @$edit ? 'About Update' : 'About Create')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>About {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">About</li>
                <li class="breadcrumb-item active">About {{ @$edit ? 'Update' : 'Create' }} Form</li>
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
            <h5 class="card-title">About {{ @$edit ? 'Update' : 'Create' }} Form</h5>
            @if (@$edit)
                <form action="@route('admin.about.update', @$edit->about_id)" method="POST">
                    @method('put')
                @else
                    <form action="@route('admin.about.store')" method="post" >
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">About Title <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                        placeholder="type here About title">
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">About Icon <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="short_des" placeholder="type here short description" value="{{ @$edit->short_des }}">
                </div>


                <div class="col-md-12 col-lg-12 my-2">
                    <label for="">Left About Body <span class="text-danger">*</span></label>
                    <textarea name="left_des" class="tinymce-editor">
                       {!! @$edit->left_des !!}
                      </textarea><!--left des End TinyMCE Editor -->
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <label for="">Right About Body <span class="text-danger">*</span></label>
                    <textarea name="right_des" class="tinymce-editor">
                       {!! @$edit->right_des !!}
                      </textarea><!-- right des End TinyMCE Editor -->
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
