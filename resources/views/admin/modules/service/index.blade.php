@extends('layouts.admin.app')
@section('title', 'List Of Service')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Service Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Service Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Service Table</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($servies as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        @php
                                            $image = json_decode($item->image);

                                        @endphp
                                        @if (empty($image))
                                            <td>Image Not Selected</td>
                                        @else
                                            <td><img class="zoom" src="{{ asset($image[0]) }}" height="50px"
                                                    width="50px" alt=""> </td>
                                        @endif

                                        <td>success</td>
                                        <td>
                                            <a href=""> <i class="ri-delete-bin-6-fill"></i></a>
                                            <a href="">  <i class="ri-eye-fill"></i></a>
                                            <a href=""> <i class="ri-edit-box-fill"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <h2>emply</h2>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    @section('js')
    @endsection

@endsection
