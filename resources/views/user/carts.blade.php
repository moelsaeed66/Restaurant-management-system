<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--

    TemplateMo 558 Klassy Cafe

    https://templatemo.com/tm-558-klassy-cafe

    -->
    <!-- Additional CSS Files -->
    @include('user.user_css')

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#about">About</a></li>

                        <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                        <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                        <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                        <li class="submenu">
                            <a href="javascript:;">Features</a>
                            <ul>
                                <li><a href="#">Features Page 1</a></li>
                                <li><a href="#">Features Page 2</a></li>
                                <li><a href="#">Features Page 3</a></li>
                                <li><a href="#">Features Page 4</a></li>
                            </ul>
                        </li>
                        <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                        <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                        <li class="scroll-to-section">
                            @auth
                                <a href="{{route('carts.index')}}">
                                    Cart[{{$count}}]
                                </a>
                            @endauth

                            @guest
                                Cart[0]
                            @endguest

                        </li>

                        <li class="scroll-to-section">

                        @auth
                            <li class="scroll-to-section">
                                <form method="post" action="{{route('logout')}}" >
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="scroll-to-section"><a href="{{ route('login') }}"> Log in</a></li>

                            <li class="scroll-to-section"><a href="{{ route('register') }}"> Register</a></li>
                        @endauth

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->

<div id="top">
        <table bgcolor="#708090" align="center">
            <thead>
            <tr>
                <th style="padding: 30px">Food Name</th>
                <th style="padding: 30px">Price</th>
                <th style="padding: 30px">Quantity</th>
                <th style="padding: 30px" colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            <form action="{{route('orders.store')}}" method="post">
                @csrf
            @foreach($cart->get() as $item)
{{--                @dd($cart->food)--}}
                <tr align="center">
                    <input type="hidden" name="food_name[]" value="{{$item->food->title}}">
                    <td style="padding: 30px">{{$item->food->title}}</td>
                    <input type="hidden" name="price[]" value="{{$item->food->price}}">
                    <td style="padding: 30px">{{$item->food->price}}</td>
                    <input type="hidden" name="quantity[]" value="{{$item->Quantity}}">
                    <td style="padding: 30px">{{$item->Quantity}}</td>
                    <td style="padding: 30px"><a href="{{route('carts.edit',$item->id)}}" class="btn btn-primary">Edit</a></td>

                    <td style="padding: 30px"><a href="{{route('carts.delete',$item->food->id)}}" class="btn btn-danger">Delete</a></td>


                </tr>
            @endforeach

            </tbody>
        </table>

</div>
<div align="center">

        <a href="{{route('carts.empty',['cart'=>$item->id])}}" class="btn btn-danger">Empty Cart</a>

</div>
<div align="center" style="padding: 30px">
    <button type="button" id="order">Order Now</button>
</div>

<div align="center" id="appear" style="padding: 10px; display: none">
    <div style="padding: 10px">
        <label>Name</label>
        <input type="text" name="name" placeholder="Name">
    </div>

    <div style="padding: 10px">
        <label>Phone</label>
        <input type="text" name="phone" placeholder="Phone">
    </div>
    <div style="padding: 10px">
        <label>Address</label>
        <input type="text" name="address" placeholder="Address">
    </div>

    <div
    style="padding: 10px">
        <input type="submit" class="btn btn-success" value="Order Confirm">
        <button id="close" type="button" class="btn btn-danger">Close</button>
    </div>
</div>
</form>
{{--<div align="center">--}}
{{--    <h3>total</h3>--}}
{{--    {{$cart->total()}}--}}
{{--</div>--}}


<!-- jQuery -->
<script type="text/javascript">
    $("#order").click(
        function () {
            $("#appear").show();
        }
    );
    $("#close").click(
        function () {
            $("#appear").hide();
        }
    );
</script>
@include('user.user_js')
</body>
</html>
