@extends('layouts.admin.app')
@section('title', 'Show Order')
@section('css')
<style>
    .h2 {
        color: #444;
        font-family: 'PT Sans', sans-serif;
    }

    thead {
        font-family: 'Poppins', sans-serif;
        font-weight: bolder;
        font-size: 20px;
        color: #666;
    }

    img {
        width: 40px;
        height: 40px;
    }

    .name {
        display: inline-block;
    }

    .bg-blue {
        background-color: #34495E;
        color: white;
        border-radius: 8px;
    }

    .fa-check,
    .fa-minus {
        color: blue;
    }

    .bg-blue:hover {
        background-color: #3e64ff;
        color: #eee;
        cursor: pointer;
    }

    .bg-blue:hover .fa-check,
    .bg-blue:hover .fa-minus {
        background-color: #3e64ff;
        color: #eee;
    }

    .table thead th,
    .table td {
        border: none;
    }

    .table tbody td:first-child {
        border-bottom-left-radius: 10px;
        border-top-left-radius: 10px;
    }

    .table tbody td:last-child {
        border-bottom-right-radius: 10px;
        border-top-right-radius: 10px;
    }

    #spacing-row {
        height: 10px;
    }

    @media(max-width:575px) {
        .container {
            width: 125%;
            padding: 20px 10px;
        }
    }
</style>
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
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h2>Order User Info.</h2> <hr>
                    <strong>Name: </strong>{{ $show->f_name .' '. $show->l_name }} <br>
                    <strong>Email: </strong>{{ $show->email }} <br>
                    <strong>phone: </strong>{{ $show->phone }} <br>
                    <strong>Address 1: </strong>{{ $show->address_1 }} <br>
                    @isset($show->address_2)
                    <strong>Address 2: </strong>{{ $show->address_2 }}
                    @endisset

                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h2>Payment Info.</h2> <hr>
                    <strong>Send Mony Name: </strong> {!! $show->paymentMethod !!} <br>
                    <strong>Swnd Number: </strong> {{ $show->send_number }} <br>
                    <strong>Secret Code: </strong>{{ $show->secretKey }}
                </div>
            </div>

            <hr>


        <div class="h2 font-weight-bold">Cart List</div>
        <div class="table-responsive ">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($carts as $item)
                        <tr class="bg-blue">
                            <td class="pt-3 mt-1">{{ $item->price ? $item->price->title : 'data not found' }}</td>
                            <td class="pt-3">TK {{ $item->price ? $item->price->price : 'data not found' }}</td>
                            @php
                                $total += $item->price ? $item->price->price : '0' * $item->qty;
                            @endphp
                            <td class="pt-3">{{ $item->qty }}<span class="fa fa-check pl-3"></span></td>
                            <td class="pt-3"><span class="fa fa-ellipsis-v btn"></span>
                                <a href="{{ url('admin/cart/delete', $item->cart_id) }}" class="btn btn-sm btn-danger">Remove</a>
                            </td>
                        </tr>
                        <tr id="spacing-row">
                            <td></td>
                        </tr>

                    @empty
                        <h2 class="btn btn-danger text-light">No Items Available Here</h2>
                    @endforelse

                </tbody>
            </table>
            <div class="float-right">
                <h4>Total : Tk {{ $total }}</h4>
              </div>
        </div>
        </div>
    </div>

@section('js')
@endsection

@endsection
