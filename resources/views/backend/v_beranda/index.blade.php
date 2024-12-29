@extends('backend.v_layouts.app')
@section('content')
<!-- contentAwal -->

<div class="row">
    <div class="col-12">
        <div style="background-color: #fff;" class="card-body border-top">
            <h5 class="card-title">{{$judul}}</h5>
            <div style="background-color: #f3f0ed; display: flex; align-items: center; padding: 10px;"
                class="alert alert-success" role="alert">
                <!-- Gambar -->
                <img style="width: 100px; margin-right: 15px;"
                    src="https://png.pngtree.com/png-clipart/20211201/ourlarge/pngtree-coffee-shop-flat-brown-building-illustration-png-image_4043631.png"
                    alt="Gambar Toko">

                <!-- Teks -->
                <div>
                    <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->nama }}</h4>
                    Aplikasi Toko Kopi dengan hak akses yang anda miliki sebagai
                    <b>
                        @if (Auth::user()->role == 1)
                            Super Admin
                        @elseif(Auth::user()->role == 0)
                            Admin
                        @endif
                    </b>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="background-color: #fff; padding: 20px; margin-top: 20px;">
    <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="4000">
      
        <div class="carousel-indicators">
            @foreach ($produkCarousel as $index => $produk)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

   
        <div class="carousel-inner">
            @foreach ($produkCarousel as $produk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                  
                    <img src="{{ asset('storage/img-produk/' . $produk->foto) }}" class="d-block w-100" alt="Gambar {{ $produk->nama }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $produk->nama }}</h5>
                        <p>{{ $produk->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .carousel-inner img {
        height: 400px;
      
        object-fit: contain;
      
    }
</style>


@endsection