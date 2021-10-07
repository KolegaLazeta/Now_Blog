<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')NowBlog</title>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{url('/home')}}">NowBlog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/home')}}">Pocetna</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/categories')}}">Kategorije</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/about')}}">O Nama</a></li>

                    @if(auth()->check())
                        @if(auth()->user()->role == ('admin'))

                    <div class="nav-item">
                        <ul class="nav-item dropdown no-arrow" style="padding-top:16px">
                          
                                    <a class="nav-link" style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.0625em; text-transform: uppercase; color:white" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <span class="fonts" style="color:white">{{Auth::user()->name}} </span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <ul class="dropdown-menu " aria-labelledby="userDropdown">
                                  
                                    <li>
                                       
                                            <a href="{{url('/admin')}}" class="dropdown-item" style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.0625em; text-transform: uppercase; color:black">Admin panel</a>
                                      
                                    </li>
                                    <li>
                                        <form action="{{route('logout')}}" method="post">
                                        @csrf

                                        
                                            <button class="dropdown-item" style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.0625em; text-transform: uppercase; color:black" data-toggle="modal" data-target="#logoutModal"  type="submit">
                                            Odajvite se
                                            </button>
                                        </form>
                                    </li>

                                </ul>
                                
                              
                        </ul>
                 
                        @else
                            @if(auth()->user())
                                <li class="nav-item"> <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('logout')}}" 
                                onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit()">{{ __('Odjavite se') }}</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form></li>
                                @endif

                             
                               
                        @endif
                        @else

                                <li class="nav-item" style="padding-top: 15px; padding-left:10px" >
                                    <a href="/" style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.0625em; text-transform: uppercase; color:white">
                             
                                        Prijavite se
                                        
                                    </a>
                                </li>
                    @endif
                </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead"  style= "background-image: url('/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>NowBlog</h1>
                            <span class="subheading">Sve na jednom mestu</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        @yield('main')
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2021</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>
        <script src="/js/scripts.js"></script>
    </body>
</html>
