@extends('layouts.admin.app')
@section('title', @$edit ? 'Service Update' : 'Service Create')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Service {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Service</li>
                <li class="breadcrumb-item active">Service {{ @$edit ? 'Update' : 'Create' }} Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Service {{ @$edit ? 'Update' : 'Create' }} Form</h5>
            <form class="row">
                <section class="form-group">
                    <div class="col-md-6 col-lg-6 my-2">
                        <label for="" class="form-label">Service Name <span class="text-danger">*</span></label>
                        <input required type="text" class="form-control" value="{{ @$edit->name }}"
                            placeholder="type here service name">
                    </div>

                    <div class="col-md-6 col-lg-6 my-2">
                        <label for="" class="form-label">Service Icon <span class="text-danger">*</span></label>
                        <input required type="file" class="form-control">
                        @if (@$edit->image)
                            image seleted
                        @endif
                    </div>
                    <div class="col-md-12 my-2">
                        <label for="">Service Body <span class="text-danger">*</span></label>
                        <textarea required name="body" class="form-control quill-editor-full" cols="30" rows="10"></textarea>
                    </div>
                </section>
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
