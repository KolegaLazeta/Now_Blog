<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>{{$post->title}}</title>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="/https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="/https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/home')}}">Pocetna</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/categories')}}">Kategorije</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/about')}}">O nama</a></li>
                        @if(auth()->check())
                        @if(auth()->user()->role == ('admin'))
                        <ul class="nav-item dropdown no-arrow" style="padding-top:16px">
                            <a class="nav-link" style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.0625em; text-transform: uppercase; color:white" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <span class="fonts" style="color:white">{{Auth::user()->name}} </span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                          
                            <li>
                              <a href="{{url('/admin')}}" class="dropdown-item" style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.0625em; text-transform: uppercase; color:black">Admin panel</a>
                            </li>
                            <form action="{{route('logout')}}" method="post">
                              @csrf

                              <li>
                                <button class="dropdown-item" style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.0625em; text-transform: uppercase; color:black" data-toggle="modal" data-target="#logoutModal"  type="submit">
                                 Odajvite se
                                </button>
                              </li>
                              </form>
                        </div>
                        
                      
                </ul>
            </div>
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
            @endif

            </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style='background-image: url(/storage/app/public/upload/{{$post->image}})'>
        
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{{$post->title}}</h1>
                          
                            <span class="meta">
                                Postavio
                                <a href="#!">{{$post->author}}</a>
                                {{$post->created_at}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <h2 class="subheading" style="padding-bottom:50px">{{$post->description}}</h2>
                       {{$post->longtext}}
                    </div>
                </div>
            </div>
        <article class="mb-4 pt-5">
            
            <div class="container px-4 px-lg-5 pt-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                     
                            <div class="card-body">
                               
                                <h3 class="panel-title pb-2">
                                    <span class="glyphicon glyphicon-comment"></span> 
                                    Najnoviji komentari:
                                </h3>
                                
                            </div>

                            <div class="row d-flex justify-content-center">
                              
                                
                                      
                                        
                        @foreach($post->comment as $comment)
                      

                          
                          
                                <div class="card">
                                    <div class="card-body">
                                      <p><i>"{{$comment->comment}}"</i></p>
                          
                                      <div class="d-flex justify-content-between">
                                        
                                          
                                          <p class="small mb-0 ms-2 "><strong>{{$comment->user->name}}</strong></p>

                                        <div class="d-flex flex-row align-items-center pt-4">
                                          {{$comment->created_at}}
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                   
                               
                                  
                                  @endforeach
                                </div>
                            
                        
                          </div>

                        </div>

                   
                </div>
            </div>
            <div class="container px-4 px-lg-5 pt-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                 
                        <form class="form-contact comment_form" action="{{route('comment.store')}}" id="post_id" enctype="multipart/form-data" method="POST">
                            @csrf
                            
                           <input type="text" name="user-id" value="{{Auth::user()}}" hidden>
                            <input type="text" name="post_id" value="{{$post->id}}" hidden>

                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                     <label for="comment">Postavite komentar:</label>
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="4" placeholder="Unesite Komnetar"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group pt-3">
                              <button type="submit" class="btn btn-outline-secondary">Potvrdi</button>
                              
                           </div>
                        </form>
                    </div>
                </div>
            </div>
            

        </article>
        </article>
        
  
    </body>     
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
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Filip Obrenovic</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
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
