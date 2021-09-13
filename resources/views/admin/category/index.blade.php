@extends('admin.layout.app', ['title' => 'Kategori', 'active' => 'category'])
@section('content')
    <div class="card">
        <div class="card-header">
            Data Kategori Buku
        </div>
        <div class="card-body">
            <!-- Button trigger for tambah buku -->
            <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal"
                data-bs-backdrop="false" data-bs-target="#tambah">
                <i class="fas fa-plus"></i> Tambah Kategori
            </button>

            <!--Disabled Backdrop Modal -->
            <div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel160" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title white" id="myModalLabel160">Tambah Kategori
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('admin.category.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Kategori</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Contoh: Seni Budaya"
                                        class="form-control" name="name">
                                </div>                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1">                                    
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Jumlah Buku</th>
                        <th class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)                                            
                    <tr>
                        <td class="text-center"><a href="rak-buku.html">{{ $item->name }}</a></td>
                        <td class="text-center">10</td>
                        <td class="d-flex justify-content-center">
                            <!-- Button trigger for ubah kategori -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-backdrop="false" data-bs-target="#ubah{{ $item->slug }}">
                                <i class="fas fa-pen"></i>
                            </button>

                            <!--Disabled Backdrop Modal -->
                            <div class="modal fade text-left" id="ubah{{ $item->slug }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel160" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title white" id="myModalLabel160">Ubah
                                                Kategori - {{ $item->name }}
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.category.update', $item) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body text-left">
                                                <label class="text-left">Kategori</label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="Contoh: Seni Budaya"
                                                        class="form-control" name="name"
                                                        value="{{ $item->name }}">
                                                </div>                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" >                                                    
                                                    <span class="d-none d-sm-block">Simpan</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            &nbsp;<a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                onclick="deleteConfirm('deleteForm{{ $item->slug }}', '{{ $item->name }}')"
                                class="btn btn-sm btn-danger" title="Hapus Rak Buku">
                                <i class=" fas fa-trash-alt"></i>                                
                            </a>
                            <form action="{{ route('admin.category.destroy', $item) }}" method="POST" id="deleteForm{{ $item->slug }}">
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
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
@endpush
@push('addon-script')
    <script src="{{ asset('dist/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
        window.deleteConfirm = function (formId, name) {
            Swal.fire({
                icon: 'question',
                // text: `Hapus Data Rak Buku ${name}?`,
                html: `<h5>Hapus Data Kategori Buku ${name}?</h5>
                    <b>Peringatan</b>: Semua data buku yang memiliki kategori ${name} juga akan terhapus!!!<br>                
                `,
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