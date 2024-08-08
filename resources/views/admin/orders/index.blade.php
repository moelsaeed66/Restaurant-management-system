<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
@include('admin.admin_css')
    @include('user.user_css')
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                <div class="ps-lg-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                        <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                    <button id="bannerClose" class="btn border-0 p-0">
                        <i class="mdi mdi-close text-white me-0"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- partial:partials/_sidebar.html -->
    @include('admin.admin_side_nav')
    <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.admin_nav')
        <!-- partial -->
        <div class="main-panel">
            <ul class="navbar-nav w-100">
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{route('search')}}" method="get">
                        @csrf
                        <input type="text" name="search" class="form-control" placeholder="Search products" style="padding: 10px">
                        <input type="submit" value="search" class="btn btn-primary">
                    </form>
                </li>
            </ul>
{{--@dd($orders->get())--}}
            <table class="tab-content">
                <thead>
                <tr>
                    <th style="padding: 30px">Food Name</th>
                    <th style="padding: 30px">Price</th>
                    <th style="padding: 30px">Quantity</th>
                    <th style="padding: 30px">Name</th>
                    <th style="padding: 30px">Phone</th>
                    <th style="padding: 30px">Address</th>
                    <th style="padding: 30px">total</th>


                </tr>
                </thead>
                <tbody>
                <?php
                    $result=0;
                    ?>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->food_name}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->price *$order->quantity}}</td>
                    <?php
                        $result=$result+($order->price *$order->quantity);?>
                @endforeach

                </tbody>
            </table>
<div align="right" style="padding-right: 50px">
    <h1>total:{{$result}}</h1>
</div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->

<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.admin_js')
    @include('user.user_js')
<!-- End custom js for this page -->
</body>
</html>
