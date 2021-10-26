@extends('member.layouts.app', ['title' => 'Buku', 'active' => 'book'])

@section('content')   
 <section class="hero-section inner-page">
    <div class="wave">

        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#f8f9fa">
                    <path
                        d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z"
                        id="Path"></path>
                </g>
            </g>
        </svg>

    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center hero-text">
                        <h1 data-aos="fade-up" data-aos-delay="">Buku</h1>
                        <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Mau Baca Apa Hari Ini?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="section">
    <div class="container">
        <form action="{{ route('book.index') }}" method="GET">
            <div class="row mb-4 search">
                <div class="col-12 text-center mb-3">
                    <h6 class="section-heading">Cari Buku</h6>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="form-group">
                        <input type="text" class="form-control" name="q" value=" {{ $request['q'] ?? '' }}">
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="form-group">
                        <select name="category" id="" class="form-control">
                            <option value="">Semua</option>
                            @foreach ($categories as $item)                                
                                <option value="{{ $item->id }}" @if(isset($request['category'])) @if($request['category'] == $item->id) {{ 'selected' }} @endif @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="form-group">
                        <select name="" id="" class="form-control">
                            <option value="">Rating Tertinggi</option>
                            <option value="">Rating Terendah</option>
                            <option value="">Koleksi Terbaru</option>
                            <option value="">Koleksi Terlama</option>
                            <option value="">Tahun Terbit Terbaru</option>
                            <option value="">Tahun Terbit Terlama</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <button class="btn btn-warning w-100" type="submit">Cari</button>
                </div>
                <div class="col-12">
                    @if (!empty($request['q']))
                    <p>Hasil untuk pencarian: <span class="font-italic">{{ $request['q'] }}</span></p>
                        
                    @endif                    
                </div>
            </div>
        </form>
        <div class="row book">
            @foreach ($books as $row)                
                <div class="col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ Storage::url('/assets/book-cover/'. $row->cover) }}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $row->title }}</h6>
                                    <p class="card-subtitle">{{ $row->author }} | {{ $row->publisher }} | {{ date_format($row->publish_at, 'Y') }}</p>
                                    <p class="card-text ">{{ substr($row->description, 0, 98) }}....</p>
                                    <p class="card-text category">Kategori : 
                                    @foreach ($row->bookCategory as $item)
                                        {{ $item->category->name}}
                                        @if (!$loop->last)
                                            {{'|' }}                                                
                                        @endif
                                    @endforeach
                                    </p>
                                    </p>
                                    <p class="card-text">Tersedia :  </p>
                                    <div class="review">
                                        <p class="stars font-stars">
                                            4.9 <span class="icofont-star"></span> | 
                                            Terpinjam
                                        </p>
                                    </div>
                                    <a href="{{ route('book.show', $row->slug) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endsection