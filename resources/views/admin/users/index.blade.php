<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users</title>
    <!-- plugins:css -->
@include('admin.admin_css')
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

@include('admin.admin_nav')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card corona-gradient-card">
                            <div class="card-body py-0 px-0 px-sm-3">
                                <div class="row align-items-center">

                                    <div>
                                        <table class="table table-dark table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <th scope="row">{{$user->id}}</th>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>

                                                    @if($user->user_type ==1)
                                                        <td> <form action="{{route('users.delete',$user->id)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit">Delete</button>
                                                        </form></td>
                                                    @else
                                                        <td><button>Not Allow</button></td>

                                                    @endif

                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{----}}
            </div>
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
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.admin_js')
<!-- End custom js for this page -->
</body>
</html>
