<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

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
                <th>Food Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart->get() as $item)
{{--                @dd($cart->food)--}}
                <tr align="center">
                    <td style="padding: 30px">{{$item->food->title}}</td>
                    <td style="padding: 30px">{{$item->food->price}}</td>
                    <td style="padding: 30px">{{$item->Quantity}}</td>
                    <td style="padding: 30px"><a href="{{route('carts.edit',$item->id)}}" class="btn btn-primary">Edit</a></td>
                    <td style="padding: 30px">
                        <form action="{{route('carts.destroy',$item->food->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form></td>

                </tr>
            @endforeach

            </tbody>
        </table>

</div>
<div align="center">
    <form action="{{route('carts.empty',['cart'=>$item->id])}}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Empty Cart</button>
    </form>
</div>

<div align="center">
    <h3>total</h3>
    {{$cart->total()}}
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** About Area Starts ***** -->

<!-- ***** About Area Ends ***** -->

<!-- ***** Menu Area Starts ***** -->

<!-- ***** Menu Area Ends ***** -->


<!-- ***** Reservation Us Area Starts ***** -->
<
<!-- ***** Chefs Area Ends ***** -->

<!-- ***** Footer Start ***** -->

<!-- jQuery -->
@include('user.user_js')
</body>
</html>
