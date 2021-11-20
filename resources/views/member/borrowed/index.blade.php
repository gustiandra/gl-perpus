@extends('admin.layout.app', ['title' => 'Peminjaman', 'active' => 'borrowed'])
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Buku yang saya pinjam
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive" id="table1">
                    <thead>
                        <tr>                            
                            <th class="text-center">Cover</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Peminjaman</th>
                            <th class="text-center">Pengembalian</th>
                            <th class="text-center">Rating</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        @foreach ($loan_data as $item)                            
                            <tr>                                
                                <td class="text-center"><img src="{{ Storage::url('/assets/book-cover/'.$item->book_code->book->cover) }}" height="80"
                                    alt=""></td>
                                <td class="text-center"> {{ $item->book_code->book->title }}</td>
                                <td class="text-center"> {{ $item->book_code->code }}</td>
                                <td class="text-center"> {{ date_format($item->created_at, 'Y-m-d') }}</td>
                                <td class="text-center"> {{ date_format(date_create($item->date_of_return), 'Y-m-d') }}</td>                                
                                <td class="">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-backdrop="false" data-bs-target="#rating{{ $item->id }}">
                                        Beri Ulasan
                                    </button>
                                    <!--Disabled Backdrop Modal -->
                                    <div class="modal fade text-left" id="rating{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel160" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title white" id="myModalLabel160">Beri Ulasan Buku: {{ $item->book_code->book->title }}
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>                                                
                                                <div class="modal-body">
                                                    <h6>Rating</h6>
                                                    <form action="{{ route('member.rating.store', $item->id) }}" method="POST" class="rating" id="rating{{ $item->id }}">
                                                        @csrf
                                                        <div class="rating">                                                            
                                                            <input type="radio" name="rating" id="star1" value="1">
                                                            <label for="star1"><i class="fa fa-star"></i></label>
                                                            <input type="radio" name="rating" id="star2" value="2">
                                                            <label for="star2"><i class="fa fa-star"></i></label>
                                                            <input type="radio" name="rating" id="star3" value="3">
                                                            <label for="star3"><i class="fa fa-star"></i></label>
                                                            <input type="radio" name="rating" id="star4" value="4">
                                                            <label for="star4"><i class="fa fa-star"></i></label>
                                                            <input type="radio" name="rating" id="star5" value="5">
                                                            <label for="star5"><i class="fa fa-star"></i></label>
                                                        </div>
                                                        <br>
                                                        <div class="form-group mt-4">
                                                            <h6 class="text-left">Ulasan <span class="text-muted">(Opsional)</span></h6>
                                                            <input type="text" class="form-control" name="comment">
                                                        </div>
                                                                                                                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>                                                        
                                                    <button type="submit" class="btn btn-primary ml-1" >                                                    
                                                        <span class="d-none d-sm-block">Kirim Ulasan</span>
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>                                    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/rating.css')}}">
@endpush
@push('addon-script')
    <script src="{{ asset('dist/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
       window.rating = function (formId, radioId) {
           document.getElementById(radioId).checked = true;
           document.getElementById(formId).submit();            
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#rating .rate").click(function() {
                $.ajax({
                    url: "./proses.php",
                    method: "POST",
                    data: {
                        rate: $(this).val()
                    },
                    success: function(obj) {
                        var obj = obj.split('|');

                        $('#star' + obj[0]).attr('checked');
                        $('#hasil').html('Rating ' + obj[1] + '.0');
                        $('#star').html(obj[2]);
                        alert("terima kasih atas penilaian anda");
                    }
                });
            });
        });
    </script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endpush