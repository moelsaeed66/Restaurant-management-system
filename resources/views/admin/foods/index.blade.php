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
{{--            <div class="content-wrapper">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 grid-margin stretch-card">--}}
{{--                        <div class="card corona-gradient-card">--}}
{{--                            <div class="card-body py-0 px-0 px-sm-3">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-4 col-sm-3 col-xl-2">--}}
{{--                                        <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-5 col-sm-7 col-xl-8 p-0">--}}
{{--                                        <h4 class="mb-1 mb-sm-0">Want even more features?</h4>--}}
{{--                                        <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">--}}
{{--                        <span>--}}
{{--                          <a href="{{route('foods.create')}}" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Create Food</a>--}}
{{--                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}

{{--                    <section class="section" id="menu">--}}
{{--                        <div class="container">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="section-heading">--}}
{{--                                        <h6>Our Menu</h6>--}}
{{--                                        <h2>Our selection of cakes with quality taste</h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="menu-item-carousel">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <div class="owl-menu-item owl-carousel">--}}
{{--                                    @foreach($foods as $food)--}}

{{--                                    <div class="item">--}}
{{--                                        <div style="background-image: url('/storage/{{$food->image}}');" class='card'>--}}
{{--                                            <div class="price"><h6>${{$food->price}}</h6></div>--}}
{{--                                            <div class='info'>--}}
{{--                                                <h1 class='title'><a href="{{route('foods.show',$food->id)}}">{{$food->title}}</a></h1>--}}
{{--                                                <p class='description'>{{$food->description}}.</p>--}}
{{--                                                <div class="main-text-button">--}}
{{--                                                    <img src="{{asset('storage/'.$food->image)}}" height="50">--}}
{{--                                                    <div class="scroll-to-section"><a href="{{$food->image}}">{{$food->title}} <i class="fa fa-angle-down"></i></a></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    @endforeach--}}
{{--      --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </section>--}}
            <table class="tab-content">
                <thead>
                <tr>
                    <th style="padding: 30px">Title</th>
                    <th style="padding: 30px">Price</th>
                    <th style="padding: 30px">Description</th>
                    <th style="padding: 30px">Image</th>
                    <th style="padding: 30px" colspan="2">Action</>
                </tr>
                </thead>
                <tbody>
                @foreach($foods as $food)
                    <tr>
                        <td>{{$food->title}}</td>
                        <td>{{$food->price}}</td>
                        <td>{{$food->description}}</td>
                        <td><img src="{{asset('storage/'.$food->image)}}" height="50"></td>
                        <td><a href="{{route('foods.edit',$food->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{route('foods.destroy',$food->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">DELETE</button>
                            </form></td>

                    </tr>
                @endforeach

                </tbody>
            </table>



{{--            </div>--}}
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
                </div>
            </footer>
            <!-- partial -->
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
