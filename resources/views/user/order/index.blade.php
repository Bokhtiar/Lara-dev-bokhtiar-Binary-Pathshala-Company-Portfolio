@extends('layouts.user.app')
@section('title', 'Cart List')
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

@section('user_content')


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Order</li>
            </ol>
            <h2>Order List</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <div class="container rounded mt-5 p-md-5" style="background-color: #EBEDEF">
        <div class="h2 font-weight-bold">Order List</div>
        <div class="table-responsive ">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($orders as $item)
                        <tr class="bg-blue">
                            <td class="pt-3 mt-1">{{ $item->price ? $item->price->title : 'data not found' }}</td>
                            <td class="pt-3">TK {{ $item->price ? $item->price->price : 'data not found' }}</td>
                            @php
                                $total += $item->price ? $item->price->price : '0' * $item->qty;
                            @endphp
                            <td class="pt-3">{{ $item->qty }}<span class="fa fa-check pl-3"></span></td>
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


    @section('js')
    @endsection

@endsection
