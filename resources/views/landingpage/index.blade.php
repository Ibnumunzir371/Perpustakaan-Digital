<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description ">

    <!-- Favicon -->
    @include('landingpage.partial.link')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    @include('landingpage.partial.header')
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="#" class="navbar-brand p-0">
                <h1 class="m-0"><img src="{{asset("admin/img/logo6.png")}}"> E-LIBRARY</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route("landingpage-index")}}" class="nav-item nav-link active">Home</a>
                    <a href="#" class="nav-item nav-link">About</a>
                    <a href="#" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
                        <div class="dropdown-menu m-0">
                            @foreach ($category as $item)
                                {{-- <a href="{{route("book-category",$item->id)}}" class="nav-item nav-link">{{$item->name}}</a> --}}
                                <a href="{{route("landingpage-listbook",$item->id)}}" class="dropdown-item">{{$item->name}}</a>
                            @endforeach  
                        </div>
                    </div>
                    {{-- <a href="#" class="nav-item nav-link">
                        <i class="bi bi-gear"></i>
                    </a> --}}
                    
                </div>
                @guest
                <div class="ms-3">
                    <a href="{{route("login")}}"><button class="btn btn-success">Login</button></a>
                </div>
                @endguest
                {{-- <div>
                    <form action="{{('login')}}" method="POST">
                        @csrf
                        <button class="btn btn-succes">Login</button>
                    </form>
                </div> --}}
                
            </div>

            {{-- @if (Auth::user()->role == "admin") --}}
            @auth <!-- Hanya tampilkan menu Settings ketika user sudah login -->
                @if (Auth::user()->role == 'user' || Auth::user()->role == 'admin')
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{asset("admin/img/profile-img.jpg")}}" alt="Profile" class="rounded-circle " width="45" height="45">
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                        <h6>{{Auth::user()->name }}</h6>
                        
                        </li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>            
                        <li>
                            <a href="{{route("home")}}" class="dropdown-item"><i class="bi bi-box-arrow-right"></i></i> dashboard</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" >
                                <form action="{{('logout')}}" method="POST">
                                @csrf
                                <button class="btn btn-light"><i class="bi bi-power"></i> Sign Out</button>
                                </form>
                            </a>
                        </li>
                    </ul>
                @endif
            @endauth
            {{-- @endif --}}
        </nav>
        

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset("landingpage/img/bg_perpus8.jpg")}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
                            <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset("landingpage/img/bg_perpus8.jpg")}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
                            <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Members</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{$membercount}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="bi bi-book" style="color:white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Total Book</h5>
                            <h1 class="mb-0" data-toggle="counter-up">{{$bookcount}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="bi bi-journal-text text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Total Category</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{$categorycount}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->

    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Categories</h5>
                <h1 class="mb-0">Lihat buku berdasarkan kategori</h1>
            </div>
            <div class="row g-5">
                @foreach ($category as $item)
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                                <i class="fa fa-shield-alt text-white"></i>
                            </div>
                            <h4 class="mb-3">{{$item->name}}</h4>
                            <p class="m-0">Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed</p>
                            <a class="btn btn-lg btn-primary rounded" href="{{route("landingpage-listbook",$item->id)}}">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Latest Book</h5>
                <h1 class="mb-0">Lihat buku terbaru disini</h1>
            </div>
            <div class="row g-5">
                @foreach ($books as $post)
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('storage/'.$post->cover_book) }}" alt="">
                                <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">{{$post->category->name}}</a>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3"><i class="far fa-user text-primary me-2"></i>{{$post->author}}</small>
                                    <small><i class="far fa-calendar-alt text-primary me-2"></i>{{$post->year}}</small>
                                </div>
                                <h4 class="mb-3">{{$post->name}}</h4>
                                <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p>
                                <div class="mb-2">
                                    <a href="{{ route('detail-loan', $post->id) }}" class="btn btn-primary mb-2">Detail Buku</a>
                                </div>
                                @auth <!-- Hanya tampilkan menu Settings ketika user sudah login -->
                                    @if (Auth::user()->role == 'user' || Auth::user()->role == 'admin')
                                        @if ($post->type_book == 'digital')
                                            <a class="text-uppercase" href="{{ asset('storage/file/'.$post->file_book) }}">Baca Buku <i class="bi bi-arrow-right"></i></a>
                                        @else
                                            <a class="text-uppercase" href="#">Tidak tersedia secara virtual</a>
                                        @endif
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- Blog Start -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/vendor-1.jpg" alt="">
                    <img src="img/vendor-2.jpg" alt="">
                    <img src="img/vendor-3.jpg" alt="">
                    <img src="img/vendor-4.jpg" alt="">
                    <img src="img/vendor-5.jpg" alt="">
                    <img src="img/vendor-6.jpg" alt="">
                    <img src="img/vendor-7.jpg" alt="">
                    <img src="img/vendor-8.jpg" alt="">
                    <img src="img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    

    <!-- Footer Start -->
    @include('landingpage.partial.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a> --}}


    <!-- JavaScript Libraries -->
    @include('landingpage.partial.js')
    
</body>

</html>