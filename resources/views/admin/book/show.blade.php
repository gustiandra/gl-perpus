@extends('admin.layout.app', ['title' => $book->title, 'active' => 'book', 'subtitle' => 'Buku'])
@section('content')
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Detail Buku : Malin Kundang</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="detail-tab" data-bs-toggle="tab"
                                href="#detail" role="tab" aria-controls="detail"
                                aria-selected="true">Detail</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="kode-buku-tab" data-bs-toggle="tab"
                                href="#kode-buku" role="tab" aria-controls="kode-buku"
                                aria-selected="false">Kode Buku</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="detail" role="tabpanel"
                            aria-labelledby="detail-tab">
                            <div class="row mt-4">
                                <div class="col-md-2 col-12 mb-4">
                                    <img src="{{ Storage::url('/assets/book-cover/'.$book->cover) }}" alt=""
                                        class="img-thumbnail">
                                </div>
                                <div class="col-md-10 col-12">
                                    <div class="row">
                                        <div class="col-lg-3 col-5">
                                            Judul
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $book->title }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Penulis
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $book->author }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Penerbit
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            :{{ $book->publisher }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Kategori
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : | @foreach ($book->bookCategory as $item)
                                                {{ $item->category->name }} |
                                            @endforeach                                                                                        
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Deskripsi
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $book->description }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Rak
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $book->rack->name }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Jumlah
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ count($book->bookcode) }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Saat ini Dipinjam
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : <a href="buku-dipinjam.html"><u>5</u></a>
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Total Peminjaman
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : <a href="laporan-buku.html"><u>100</u></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kode-buku" role="tabpanel"
                            aria-labelledby="kode-buku-tab">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <!-- Button trigger for tambah kategori -->
                                    <button type="button" class="btn btn-primary btn-sm mb-3"
                                        data-bs-toggle="modal" data-bs-backdrop="false"
                                        data-bs-target="#tambah">
                                        <i class="fas fa-plus"></i> Tambah Stok
                                    </button>
                                    <!--Disabled Backdrop Modal -->
                                    <div class="modal fade text-left" id="tambah" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel160"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title white" id="myModalLabel160">
                                                        Tambah Stok Buku : {{ $book->title }}
                                                    </h5>
                                                    <button type="button" class="close"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.book-code.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $book->id }}" name="book_id">
                                                    <input type="hidden" value="{{ $book->slug }}" name="book_slug">
                                                    <div class="modal-body">
                                                        <label>Kode Buku</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="code">
                                                        </div>
                                                        <label>Kondisi</label>
                                                        <div class="form-group">
                                                            <select class="form-select" name="condition"
                                                                required>
                                                                <option value="BAIK">
                                                                    Baik</option>
                                                                <option value="RUSAK RINGAN">
                                                                    Rusak Ringan
                                                                </option>
                                                                <option value="RUSAK BERAT">
                                                                    Rusak Berat</option>
                                                            </select>
                                                        </div>
                                                        <label>Keterangan</label>
                                                        <div class="form-group">
                                                            <textarea name="description" rows="3"
                                                                class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary ml-1">
                                                            <span
                                                                class="d-none d-sm-block">Simpan</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-responsive" id="table1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Kode Buku</th>
                                                <th class="text-center">Kondisi</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($book->bookCode as $row)
                                                <tr>
                                                    <td class="text-center">{{ $row->code }}</td>
                                                    <td class="text-center">{{ $row->condition }}</td>
                                                    <td class="text-center">{{ $row->description ?? "-" }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <!-- Button trigger for ubah kategori -->
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-bs-toggle="modal" data-bs-backdrop="false"
                                                            data-bs-target="#ubah{{ $row->code }}">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                        <!--Disabled Backdrop Modal -->
                                                        <div class="modal fade text-left" id="ubah{{ $row->code }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="myModalLabel160"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary">
                                                                        <h5 class="modal-title white"
                                                                            id="myModalLabel160">Ubah
                                                                            Kode Buku: {{ $row->code }}
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <i data-feather="x"></i>
                                                                        </button>
                                                                    </div>
                                                                    <form action="#">
                                                                        <div class="modal-body">
                                                                            <label>Kode Buku</label>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="code"
                                                                                    value="{{ $row->code }}">
                                                                            </div>
                                                                            <label>Kondisi</label>
                                                                            <div class="form-group">
                                                                                <select class="form-select" name="condition" required>
                                                                                    <option value="BAIK" @if($book->condition == "BAIK") {{ 'selected' }} @endif>Baik</option>
                                                                                    <option value="RUSAK RINGAN" @if($book->condition == "RUSAK RINGAN") {{ 'selected' }} @endif> Rusak Ringan</option>
                                                                                    <option value="RUSAK BERAT" @if($book->condition == "RUSAK BERAT") {{ 'selected' }} @endif>Rusak Berat</option>
                                                                                </select>
                                                                            </div>
                                                                            <label>Keterangan</label>
                                                                            <div class="form-group">
                                                                                <textarea name="description" rows="3" class="form-control">{{ $row->description }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-light-secondary"
                                                                                data-bs-dismiss="modal">
                                                                                <i
                                                                                    class="bx bx-x d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Close</span>
                                                                            </button>
                                                                            <button type="submit" class="btn btn-primary ml-1">
                                                                                <span class="d-none d-sm-block">Simpan</span>
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" onclick="deleteConfirm('deleteConfirm{{ $row->code }}', '{{ $row->code }}')" class="btn btn-sm btn-danger" title="Hapus Buku">
                                                            <i class=" fas fa-trash-alt"></i>
                                                        </a>
                                                        <form action="{{ route('admin.book-code.destroy', $row) }}" method="POST" id="deleteConfirm{{ $row->code }}">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
@endpush
@push('addon-script')
    <script src="{{ asset('dist/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
       window.deleteConfirm = function (formId, code) {
            Swal.fire({
                icon: 'question',
                html: `Hapus Buku dengan kode <b>${code}</b>?`,
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endpush