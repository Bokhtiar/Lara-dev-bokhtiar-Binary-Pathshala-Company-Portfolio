@extends('layouts.admin.app')
@section('title', @$edit ? 'Price Update' : 'Price Create')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Price {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Price</li>
                <li class="breadcrumb-item active">Price {{ @$edit ? 'Update' : 'Create' }} Form</li>
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
            <h5 class="card-title">Price {{ @$edit ? 'Update' : 'Create' }} Form</h5>
            @if (@$edit)
                <form action="@route('admin.price.update', @$edit->price_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.price.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Title <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                        placeholder="type here Title">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Price <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="price" value="{{ @$edit->price }}"
                        placeholder="type here Price ">
                </div>
                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Designation [month/year/ect]<span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="designation" value="{{ @$edit->designation }}"
                        placeholder="type here Designation">
                </div>

                


                <h2 class="my-3">Item Add</h2>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Item 1 </label>
                    <input type="text" class="form-control" name="item1" value="{{ @$edit->item1 }}"
                        placeholder="type here Price Item 1">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Item 2 </label>
                    <input type="text" class="form-control" name="item2" value="{{ @$edit->item2 }}"
                        placeholder="type here Price Item 2">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Item 3 </label>
                    <input type="text" class="form-control" name="item3" value="{{ @$edit->item3 }}"
                        placeholder="type here Price Item 3">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Item 4 </label>
                    <input type="text" class="form-control" name="item4" value="{{ @$edit->item4 }}"
                        placeholder="type here Price Item 4">
                </div>

                
                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Item 5 </label>
                    <input type="text" class="form-control" name="item5" value="{{ @$edit->item5 }}"
                        placeholder="type here Price Item 5">
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
