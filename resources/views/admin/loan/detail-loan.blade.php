<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('landingpage.partial.link')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="col-md-12 mt-5 mb-4">
            <h1>Detail Book</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img class="img-fluid" src="{{ asset('storage/'.$books->cover_book) }}" alt="" width="400" height="400">
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nama Buku</th>
                            <td>:</td>
                            <td>{{$books->name}}</td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>:</td>
                            <td>{{$books->author}}</td>
                        </tr>
                        <tr>
                            <th>Tahun Terbit</th>
                            <td>:</td>
                            <td>{{$books->year}}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>:</td>
                            <td>{{$books->add}}</td>
                        </tr>
                        <tr>
                            <th>Stock</th>
                            <td>:</td>
                            <td>{{$books->amount_id}}</td>
                        </tr>
                    </tbody>
                </table>
                
                    <a href="{{route("landingpage-listbook",$books->category_id)}}" class="btn btn-primary"><i class="bi bi-arrow-return-left"></i> Kembali</a>
                
            </div> 
        </div>
    </div>
    @include('landingpage.partial.js')
</body>
</html>
