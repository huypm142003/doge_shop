<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>@yield('title', 'Admin - DogeShop')</title>
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <!-- Sidebar -->
        <div id="sidebar">
            <div class="sidebar-header">
                <h3><img src="{{ asset('/img/doge.png') }}" class="img-fluid" /><span>DogeShop</span></h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li class="">
                    <a href="{{ route('admin.home.index') }}" class="dashboard"><i
                            class="material-icons">home</i>Home</a>
                </li>
                <li class="">
                    <a href="{{ route('admin.product.index') }}" class=""><i
                            class="material-icons">pets</i>Prodcuts</a>
                </li>
                <li class="">
                    <a href="{{ route('admin.brand.index') }}" class=""><i class="material-icons">build_circle</i>Brands</a>
                </li>
                <li class="">
                    <a href="{{ route('admin.productType.index') }}" class=""><i class="material-icons">anchor</i>Prodcut Types</a>
                </li>
                <li class="">
                    <a href="{{ route('admin.productImage.index') }}" class=""><i class="material-icons">tab</i>Prodcut Images</a>
                </li>
                <li class="">
                    <a href="{{ route('admin.user.index') }}" class=""><i class="material-icons">account_circle</i>Users</a>
                </li>
                <li class="">
                    <a href="{{ route('admin.blog.index') }}" class=""><i class="material-icons">event_note</i>Blogs</a>
                </li>
                <li class="">
                    <a href="{{ route('admin.cart.index') }}" class=""><i class="material-icons">interests</i>Carts</a>
                </li>
                <li class="">
                    <a href="{{ route('admin.cartDetail.index') }}" class=""><i class="material-icons">pending</i>Cart Details</a>
                </li>
            </ul>
        </div>

        <div id="content">
            <!-- Header -->
            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt</span>
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-3 order-3 order-md-2">
                            <div class="xp-searchbar">
                                <form>
                                    <div class="input-group">
                                        {{-- <input type="search" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit" id="button-addon2">Go
                                            </button>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">
                                        <li class="dropdown nav-item active">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <span class="material-icons">notifications</span>
                                                <span class="notification">1</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Welcome to Admin</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <span class="material-icons">question_answer</span>
                                            </a>
                                        </li>

                                        <li class="dropdown nav-item">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <img src="{{ asset('/img/doge.png') }}"
                                                    style="width:40px; border-radius:50%;" />
                                            </a>
                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="#">
                                                        <span class="material-icons">person_outline</span>
                                                        Profile
                                                    </a></li>
                                                <li><a href="#">
                                                        <span class="material-icons">settings</span>
                                                        Settings
                                                    </a></li>
                                                <li><a href="#">
                                                        <span class="material-icons">logout</span>
                                                        Logout
                                                    </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.slim.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".xp-menubar").on('click', function() {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function() {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });

        });
    </script>
</body>

</html>
