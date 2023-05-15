<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Perpustakaan</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        {{-- <link href="assets/img/apple-touch-icon.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.jpg" rel="apple-touch-icon"> --}}

     <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
</head>
<style>
    table{
        border-collapse: collapse;
    }
    #header {
  background: rgba(40, 58, 90, 0.9);
}
</style>
<body style="background-color: #37517e" color="white">
    <header id="header" class="mb-3">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{route('dashboard.index')}}" style="text-decoration:none">SMK PGRI SINGOSARI</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      
            <nav id="navbar" class="navbar">
              <ul>
                <li><a class="nav-link scrollto " href="{{route('dashboard.index')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{route('siswa.index')}}">Siswa</a></li>
                <li><a class="nav-link scrollto" href="{{route('guru.index')}}">Guru</a></li>
                <li><a class="nav-link   scrollto" href="{{route('eskul.index')}}">Eskul</a></li>
                <li><a class="nav-link scrollto" href="{{route('perpus.index')}}">Perpus</a></li>
                <li><a class="nav-link scrollto" href="{{route('mapel.index')}}">Mapel</a></li>
                <li><a class="nav-link scrollto" href="{{route('signout')}}">Logout</a></li>
{{--                   
                <li><a class="getstarted scrollto" href="#about">Get Started</a></li> --}}
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
      
          </div>
        </header>
    <div class="container"><br>

<h1 style="color: white" ><center> PERPUSTAKAAN</center></h1> 

&nbsp;&nbsp;<a href="http://127.0.0.1:8000/perpus/create" class="btn btn-primary"><i class="fa fa-user-plus"></i> Add Data</a>
<form action="/perpus" method="GET">
    <label for="search" style="margin-left: 800px " class="text-white">Search :</label>
    <input type="search" name="search" id="search" value="{{ request ('search') }}">
    </form> 
<hr>
<br>   <table class="table table-striped"style="background-color: lightgray;">
    <thead class="bg-success text-white" style="font-weight: bold">
       <tr>
           <td>
               Nama Penjaga
           </td>
           <td>
               Nama Pinjaman 
           </td>
           <td>
               Buku
           </td>
           <td>
               Tanggal Pinjaman
           </td>
           <td>
               Tanggal Kembali
           </td>
           <td >
              <center> Aksi </center>
           </td>
       </tr>
    </thead>
        @forelse ($perpu as $perpus)
            <tr>
                <td>{{ $perpus->nama }}</td>
                <td>{{ $perpus->nama_peminjam }}</td>
                <td>{{ $perpus->buku }}</td>
                <td>{{ $perpus->tgl_pinjam }}</td>
                <td>{{ $perpus->tgl_kembali }}</td>
                
                <td>
                    <center>
                        <form id="delete-form-{{ $perpus->id }}" action="{{ route('perpus.destroy', $perpus->id) }}" method="POST">
                            <a href="{{ route('perpus.edit', $perpus->id) }}" class="btn btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="showAlert(event, {{ $perpus->id }})">Delete</button>
                        </form>
                    </center>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>
                        function showAlert(event, id) {
                            event.preventDefault(); // menghentikan proses submit form
                    
                            swal({
                                title: "Apakah anda yakin?",
                                text: "Data perpus akan dihapus secara permanen!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    document.getElementById("delete-form-"+id).submit(); // submit form jika user mengklik tombol "Ya"
                                } else {
                                    swal("Data perpus tidak dihapus.");
                                }
                            });
                        }
                    </script>      
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                       </table>
                       {{ $perpu->links() }}
    </div>
                    </body>
                    </html>