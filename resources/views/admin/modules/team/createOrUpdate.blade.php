@extends('layouts.admin.app')
@section('title', @$edit ? 'Team Update' : 'Team Create')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Team {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Team</li>
                <li class="breadcrumb-item active">Team {{ @$edit ? 'Update' : 'Create' }} Form</li>
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
            <h5 class="card-title">Team {{ @$edit ? 'Update' : 'Create' }} Form</h5>
            @if (@$edit)
                <form action="@route('admin.team.update', @$edit->team_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.team.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="name" value="{{ @$edit->name }}"
                        placeholder="type here Team Name">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Designation <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="designation" value="{{ @$edit->designation }}"
                        placeholder="type here Team Designation">
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Team Image <span class="text-danger">*</span></label>
                    <input  type="file" name="image[]" multiple class="form-control">
                    @if (@$edit->image)
                        @php
                            $image = json_decode($edit->image);
                        @endphp
                        @if (empty($image))
                            <td>Image Not Selected</td>
                        @else
                            <td>
                                <div class=" my-2">
                                    <span>Already Selected Image: </span>
                                    @forelse ($image as $image)
                                    <img class="zoom" src="{{ asset($image) }}" height="50px" width="50px"
                                    alt="">
                                    @empty
                                    <h2>Not Found Image</h2>
                                    @endforelse

                                </div>
                            </td>
                        @endif
                    @endif
                </div>

                <h2 class="my-3">Social Links</h2>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Facebook </label>
                    <input required type="text" class="form-control" name="fb" value="{{ @$edit->fb }}"
                        placeholder="type here Team Facebook">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Instagram </label>
                    <input required type="text" class="form-control" name="instagram" value="{{ @$edit->instagram }}"
                        placeholder="type here Team Instagram">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Twitter </label>
                    <input required type="text" class="form-control" name="twitter" value="{{ @$edit->twitter }}"
                        placeholder="type here Team Twitter">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Linkdin </label>
                    <input required type="text" class="form-control" name="linkdin" value="{{ @$edit->linkdin }}"
                        placeholder="type here Team Linkdin">
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
