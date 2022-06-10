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
                <li>Cart</li>
            </ol>
            <h2>Cart List</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <div class="container rounded mt-5 p-md-5" style="background-color: #EBEDEF">
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
                                <a href="" class="btn btn-sm btn-danger">Remove</a>
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
                <h4>Total : Tk{{ $total }}</h4>
                <a href="#checkout"  class="btn btn-lg btn-primary">Checkout</a>
              </div>
        </div>


        {{-- checkout form --}}
        <div class="container" id="checkout">
            <div class="py-5 text-center">
                <h1>{{ $webSetting->title }}</h1>
                <h2>Checkout form</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each
                    required form group has a validation state that can be triggered by attempting to submit the form
                    without completing it.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Product name</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Second product</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Third item</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">-$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>$20</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" name="f_name" class="form-control" id="firstName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" name="l_name" class="form-control" id="lastName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username">E-mail</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="email" name="email" class="form-control" id="username" placeholder="Username" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your username is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address_1" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input name="address_2" type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my
                                billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div> --}}
                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod[]" value="Bkash" type="radio" class="custom-control-input" checked
                                    required>
                                <label class="custom-control-label" for="credit">Bkash</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod[]" value="Rocket" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Rocket</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod[]" value="nagud" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="paypal">Nagud</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Sending Number</label>
                                <input type="text" name="send_number" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Send Mony Number</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Secret Number</label>
                                <input type="text" name="secretKey" class="form-control" id="cc-number" placeholder="" required>
                                <small class="text-muted">When we call you, tell us the secrect number, then we will confirm your Pyament..!</small>
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


    @section('js')
    @endsection

@endsection
