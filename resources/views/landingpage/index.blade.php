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
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Startup</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                @foreach ($category as $item)
                    <a href="{{route("book-category",$item->id)}}" class="nav-item nav-link">{{$item->name}}</a>
                @endforeach   
            </div>
            <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
            <a href="https://htmlcodex.com/startup-company-website-template" class="btn btn-primary py-2 px-4 ms-3">Download Pro Version</a>
        </div>
    </nav>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Lihat Book</h1>
                <a href="" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                
                    <a href="" class="h5 text-white">{{$books->category->name}}</a>
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

<div class="mx-5 my-5">
    <div class="row">
        @foreach ($bookall as $all)
            <div class="col-3 mb-5">
                <div class="card" style="width: 18rem;">
                    <img id="output" src="{{ asset('storage/'.$all->cover_book) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-tittle">{{$all->name}}</h5>
                        <br>
                        <p class="card-text">Penulis : {{$all->author}}</p>
                        <p class="card-text">Publikasi : {{$all->year}}</p>
                        <p class="card-text">Stock : {{$all->status}}</p>
                        <br>
                            <div class="row">
                                <div class="col-3 mx-4">
                                    <button type ="button" class="btn btn-primary px-4">Baca</button>
                                </div>
                                <div class="col-3 mx-4">
                                    <button type ="button" class="btn btn-success px-4">pinjam</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<!-- Footer Start -->
@include('landingpage.partial.footer')


<!-- JavaScript Libraries -->
@include('landingpage.partial.js')
</body>

</html>