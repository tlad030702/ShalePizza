{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#"><strong>Shale Pizza</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
        {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
        {{-- </div>
    </nav>
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <div class="page-title">
                            <h5><strong style="margin-left: 50px;">Content manager</strong></h5>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <div class="main-container col-md-2" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @php
            $active = fn($name) => (Route::is($name) ? 'data-active="true"' : '');
        @endphp
        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <div class="shadow-bottom"></div>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="{{ route('manager') }}" {!! $active('manager')  !!} aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Home</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                      <a href="{{ route('manager.category') }}" {!! $active('manager.category*')  !!} aria-expanded="false" class="dropdown-toggle">
                          <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                            <span>Manage Category</span>
                          </div>
                      </a>
                    </li>

                    <li class="menu">
                        <a href="{{ route('manager.foods') }}" {!! $active('manager.foods*')  !!} aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                              <span>Manage Food</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                      <a href="{{ route('manager.customer') }}" {!! $active('manager.customer*')  !!} aria-expanded="false" class="dropdown-toggle">
                          <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span>Manage Customer</span>
                          </div>
                      </a>
                    </li>

                    <li class="menu">
                      <a href="{{ route('manager.admin') }}" {!! $active('manager.admin*')  !!} aria-expanded="false" class="dropdown-toggle">
                          <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span>Manage Admin</span>
                          </div>
                      </a>
                    </li>
                </ul>
                
            </nav>

        </div>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? config('app.name', 'Document') }}</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('dashboard/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('dashboard/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .layout-px-spacing {
            min-height: calc(100vh - 166px)!important;
        }

        .table-controls > li > a svg {
            color: black;
        }

        ::selection {
            color: black;
            background: white;
        }
    </style>

  @stack('styles')

</head>
<body>
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="#">
                        <img src="{{ asset('dashboard/assets/img/logo.png') }}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="#" class="nav-link">Shale Pizza</a>
                </li>
            </ul>

        </header>
    </div>
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <div class="page-title container">
                            <h3>Content manager</h3>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <div class="main-container" id="container">

        @php
            $active = fn($name) => (Route::is($name) ? 'data-active="true"' : '');
        @endphp
        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <div class="shadow-bottom"></div>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="{{ route('manager') }}" {!! $active('manager')  !!} aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Home</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                      <a href="{{ route('category') }}" {!! $active('manager.category*')  !!} aria-expanded="false" class="dropdown-toggle">
                          <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                            <span>Manage Category</span>
                          </div>
                      </a>
                    </li>

                    <li class="menu">
                        <a href="{{ route('foods') }}" {!! $active('foods*')  !!} aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                              <span>Manage Food</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="{{ route('customer') }}" {!! $active('customer*')  !!} aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                              <span>Manage Customer</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    @yield('content')
                  </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('dashboard/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('dashboard/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="dist/bs-custom-file-input.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });

        $(document).ready(function () {
            bsCustomFileInput.init()
        });
    </script>
    <script src="{{ asset('dashboard/assets/js/custom.js') }}"></script>
</body>
</html>
