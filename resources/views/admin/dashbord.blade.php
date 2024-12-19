@extends('admin.partials.layout')

@section('title', 'AakashAP | Dashboard')

@section('content')

    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h6 class="mb-2">User</h6>
                        <h6 class="mb-0">{{count($users)}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">

                    <i class="fa fa-handshake  fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h6 class="mb-2">Contact Me</h6>
                        <h6 class="mb-0">{{count($contacts)}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-code fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h6 class="mb-2">Projects</h6>
                        <h6 class="mb-0">{{count($projects)}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-blog fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h6 class="mb-2">Total Blog</h6>
                        <h6 class="mb-0">{{count($blogs)}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

  <!-- AdminContactMeTable Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">
        <livewire:AdminContactMeTable/>
    </div>
</div>
<!-- AdminContactMeTable End -->
    <!-- Sales Chart Start -->
    {{-- <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Worldwide Sales</h6>
                        <a href="">Show All</a>
                    </div>
                    <canvas id="worldwide-sales"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Salse & Revenue</h6>
                        <a href="">Show All</a>
                    </div>
                    <canvas id="salse-revenue"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Sales Chart End -->



@endsection

