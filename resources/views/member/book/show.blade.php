@extends('member.layouts.app', ['title' => $book->title])

@section('content')
   <!-- ======= Blog Section ======= -->
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
                            <h1 data-aos="fade-up" data-aos-delay="">{{ $book->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="site-section mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success'); }}
                        </div>                    
                    @endif
                </div>
                <div class="col-md-8 blog-content">
                    <div class="row">
                        <div class="col-md-6">
                            <figure><img src="{{ Storage::url('/assets/book-cover/'. $book->cover) }}" alt="" class="img-fluid">
                                <figcaption>{{ $book->title }}</figcaption>
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <h4>{{ $book->title }}</h4>
                            <p>Penulis : {{ $book->author }}</p>
                            <p>Penerbit : {{ $book->publisher }}</p>
                            <p>Terbit : {{ $book->publish_at }}</p>
                            <p>Kategori : @foreach ($book->bookCategory as $item)
                                               <a href="#"> 
                                                   {{ $item->category->name}}
                                                    @if (!$loop->last)
                                                        {{'|' }}                                                
                                                    @endif
                                                </a>
                                            @endforeach</p>
                            <p>Tersedia : {{ $qty_books }} Buku</p>
                            <p>Rak : {{ $book->rack->name }} </p>
                            <p>
                                4.9 <span class="icofont-star star-on-book"></span> | 20 Terpinjam
                            </p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" @if ($is_borrowed)
                                {{ 'disabled' }}
                            @endif data-toggle="modal" data-target="#borrow">
                            PINJAM BUKU
                            </button>
                            <!-- Modal -->                            
                        </div>
                    </div>
                    <p>Deskripsi :</p>
                    <p>
                        {{ $book->description }}
                    </p>
                </div>
                <div class="col-md-4 sidebar">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control"
                                    placeholder="Masukan : Judul/Penulis/Penerbit">
                            </div>
                        </form>
                    </div>                    
                    <div class="sidebar-box">
                        <div class="categories">
                            <h3>Rekomendasi</h3>
                            @foreach ($books as $item)
                                <li><a href="{{ route('book.show', $item->book->slug) }}">{{ $item->book->title }}</a></li>                            
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-box">
                        <div class="categories">
                            <h3>Kategori</h3>
                            @foreach ($categories as $category)
                                <li><a href="#">{{ $category->name }} <span>({{ count($category->book) }})</span></a></li>                            
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-8 blog-content">
                    <div class="pt-5">
                        <h3 class="mb-5">6 Ulasan</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ Storage::url('assets/person_1.jpg') }}"
                                        alt="Free Website Template by Free-Template.co">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                        laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                        enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                    </p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ Storage::url('assets/person_1.jpg') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                        laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                        enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                    </p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="{{ Storage::url('assets/person_1.jpg') }}" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>Jean Doe</h3>
                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                impedit necessitatibus, nihil?</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>

                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="{{ Storage::url('assets/person_1.jpg') }}" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>Jean Doe</h3>
                                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                        autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                        Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard bio">
                                                            <img src="{{ Storage::url('assets/person_1.jpg') }}"
                                                                alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>Jean Doe</h3>
                                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit. Pariatur quidem laborum necessitatibus, ipsam
                                                                impedit vitae autem, eum officia, fugiat saepe enim
                                                                sapiente iste iure! Quam voluptas earum impedit
                                                                necessitatibus, nihil?</p>
                                                            <p><a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- END comment-list -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                        <!-- <h5>Buku Terbaru</h5> -->
                        <h5 class="">Buku Serupa</h5>
                    </div>
                </div>
                <div class="row book">
                    @foreach ($books as $row)
                    <div class="col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ Storage::url('/assets/book-cover/'. $row->book->cover) }}" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $row->book->title }}</h6>
                                            <p class="card-subtitle">{{ $row->book->author }} | {{ $row->book->publisher }} | {{ date_format($row->book->publish_at, 'Y') }}</p>
                                            <p class="card-text ">{{ substr($row->book->description, 0, 98) }}....</p>
                                            <p class="card-text category">Kategori : 
                                            @foreach ($row->book->bookCategory as $item)
                                                {{ $item->category->name}}
                                                @if (!$loop->last)
                                                    {{'|' }}                                                
                                                @endif
                                            @endforeach
                                            </p>
                                            </p>
                                            <p class="card-text">Tersedia : <span class="text-danger">0 (Dalam
                                                    Peminjaman)</span></p>
                                            <div class="review">
                                                <p class="stars font-stars">
                                                    4.9 <span class="icofont-star"></span> | 20 Terpinjam
                                                </p>
                                            </div>
                                            <a href="{{ route('book.show', $row->book->slug) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                    <div class="col-12 text-center mt-4" data-aos="fade-up" data-aos-delay="100">
                        <a href="#" class="btn btn-warning btn-sm">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal" id="borrow" tabindex="-1" aria-labelledby="borrowLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pinjam Buku - {{ $book->title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('member.book.borrow', $book) }}" method="POST">
                            @csrf      
                            <select class="custom-select" name="book_code_id">
                                @foreach ($book_codes as $book_code)
                                    @if (!$book_code->borrowed)
                                        <option value="{{ $book_code->id }}">{{ $book_code->code }}</option>
                                    @endif
                                @endforeach
                            </select>                                                                                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>                                    
                            <button type="submit" class="btn btn-primary btn-sm">Oke</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>                            
@endsection