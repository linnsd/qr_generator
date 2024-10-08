<!DOCTYPE html>
<html>

<head>
    <title>QR Generator</title>
    <link rel="stylesheet" href="{{asset('./css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('./css/fs.min.css') }}">
    @stack('css')
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
        }

        .navbar-brand,
        .nav-link,
        .my-form,
        .login-form {
            font-family: Raleway, sans-serif;
        }

        .my-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .active {
            color: #3498DB !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @guest
            @else
                <div class="d-flex">

                    <a class="nav-link mynav-link text-dark{{ Request::path() == '/' ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>

                    <a class="nav-link mynav-link text-dark{{ str_starts_with(Request::path(), 'users') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">User List</a>

                    <a class="nav-link mynav-link text-dark {{ str_starts_with(Request::path(), 'roles') ? 'active' : '' }}"
                        href="{{ route('roles.index') }}">Role List</a>

                    <a class="nav-link mynav-link text-dark {{ str_starts_with(Request::path(), 'qr') ? 'active' : '' }}"
                        href="{{ route('qr.index') }}">QR Generator</a>

                    <a class="nav-link mynav-link text-dark  {{ str_starts_with(Request::path(), 'pc_sale') ? 'active' : '' }}"
                        href="{{ route('pc_sale.index') }}">PC Sale QR</a>

                    <a class="nav-link mynav-link text-dark  {{ str_starts_with(Request::path(), 'categories') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">Category</a>

                    <a class="nav-link mynav-link text-dark  {{ str_starts_with(Request::path(), 'logo') ? 'active' : '' }}"
                        href="{{ route('logo.index') }}">Qr Logo</a>
                </div>

            </div>
            </div>
            @endif

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Login</a>
                        </li>
                        <!-- <li class="nav-item">
                                                                                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                                                                                    </li> -->
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endguest
                </ul>

            </div>
            </div>
        </nav>

        @yield('content')
        @stack('scripts')
    </body>

    </html>
