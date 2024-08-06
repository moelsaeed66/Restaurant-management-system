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

        <table class="tab-content">
            <thead>

            <tr>
                <th style="padding: 30px">Name</th>
                <th style="padding: 30px">Email</th>
                <th style="padding: 30px">Phone Number</th>
                <th style="padding: 30px">Guest Number</th>
                <th style="padding: 30px">Date</th>
                <th style="padding: 30px">Time</th>
                <th style="padding: 30px">Message</th>
                <th style="padding: 30px" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{$reservation->name}}</td>
                    <td>{{$reservation->email}}</td>
                    <td>{{$reservation->phone_number}}</td>
                    <td>{{$reservation->guest_number}}</td>
                    <td>{{$reservation->date}}</td>
                    <td>{{$reservation->time}}</td>
                    <td>{{$reservation->message}}</td>

                    <td><a href="{{route('reservations.edit',$reservation->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{route('reservations.destroy',$reservation->id)}}" method="post">
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
{{--        <footer class="footer">--}}
{{--            <div class="d-sm-flex justify-content-center justify-content-sm-between">--}}
{{--                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>--}}
{{--                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>--}}
{{--            </div>--}}
{{--        </footer>--}}
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

