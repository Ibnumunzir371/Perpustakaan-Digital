<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    @include('landingpage.partial.link')
</head>

<body>
    
    <!-- Spinner Start -->
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner"></div>
</div>
<!-- Spinner End -->


<!-- Topbar Start -->
@include('landingpage.partial.header')

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
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Ebook {{$books->category->name}}</h1>
                <a href="#" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="#" class="h5 text-white">{{$books->category->name}}</a>
                {{-- <a href="" class="h5 text-white">{{$books->category->name}}</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->


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

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Blog list Start -->
            <div class="col-lg-8">
                <div class="row g-5">
                    @foreach ($bookall as $all)
                        <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{ asset('storage/'.$all->cover_book) }}" alt="">
                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">{{$books->category->name}}</a>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user text-primary me-2"></i>{{$all->author}}</small>
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i>{{$all->year}}</small>
                                    </div>
                                    <h4 class="mb-3">{{$all->name}}</h4>
                                    <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p>
                                    <div class="mb-2">
                                        <a href="{{ route('detail-loan', $all->id) }}" class="btn btn-primary mb-2">Detail Buku</a>
                                    </div>
                                    @auth <!-- Hanya tampilkan menu Settings ketika user sudah login -->
                                        @if (Auth::user()->role == 'user' || Auth::user()->role == 'admin')
                                            @if ($all->type_book == 'digital')
                                                <a class="text-uppercase" href="{{ asset('storage/'.$all->file_book) }}">Baca Buku <i class="bi bi-arrow-right"></i></a>
                                            @else
                                                <a class="text-uppercase" href="#">Tidak tersedia secara virtual</a>
                                            @endif
                                        @endif
                                    @endauth
                                    {{-- <a class="text-uppercase" href="{{ asset('storage/file/'.$all->file_book) }}">Baca Buku <i class="bi bi-arrow-right"></i></a> --}}
                        
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- ---Akhir tampilan buku--- --}}
                    
                    <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-lg m-0">
                            <li class="page-item disabled">
                                <a class="page-link rounded-0" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-0" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                </a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Blog list End -->

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Search Form Start -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="input-group">
                        <input type="text" class="form-control p-3" placeholder="Keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <!-- Search Form End -->

                <!-- Category Start -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Categories</h3>
                    </div>
                    <div class="link-animated d-flex flex-column justify-content-start">
                        @foreach ($category as $item)
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{route("landingpage-listbook",$item->id)}}"><i class="bi bi-arrow-right me-2"></i>{{$item->name}}</a>
                        @endforeach
                    </div>
                </div>
                <!-- Category End -->

                {{-- <!-- Recent Post Start -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Recent Post</h3>
                    </div>
                    @foreach ($books_terbaru as $post)
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{ asset('storage/'.$post->cover_book) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="{{ asset('storage/file/'.$post->file_book) }}" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">{{$post->name}}
                            </a>
                        </div>
                    @endforeach
                    
                </div> --}}
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Blog End -->


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


<!-- JavaScript Libraries -->
@include('landingpage.partial.js')
</body>

</html>