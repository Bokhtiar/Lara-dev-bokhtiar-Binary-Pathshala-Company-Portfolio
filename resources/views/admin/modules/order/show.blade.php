@extends('layouts.admin.app')
@section('title', 'Show Order')
@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Order Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item">Order Show</li>
                <li class="breadcrumb-item active">Order Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="row my-3">
                <div class="col-sm-12 col-md-5 col-lg-5 text-center">
                    <h2>Order User Info.</h2> <hr>
                    <strong>Name: </strong>{{ $show->f_name .' '. $show->l_name }} <br>
                    <strong>Email: </strong>{{ $show->email }} <br>
                    <strong>phone: </strong>{{ $show->phone }} <br>
                    <strong>Address 1: </strong>{{ $show->address_1 }} <br>
                    @isset($show->address_2)
                    <strong>Address 2: </strong>{{ $show->address_2 }}
                    @endisset

                </div>
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <h2>Payment Info.</h2> <hr>
                    <strong>Send Mony Name: </strong> {!! $show->paymentMethod !!} <br>
                    <strong>Swnd Number: </strong> {{ $show->send_number }} <br>
                    <strong>Secret Code: </strong>{{ $show->secretKey }}
                </div>
            </div>
        </div>
    </div>

@section('js')
@endsection

@endsection
