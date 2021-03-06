@extends('admin.layout.app', ['title' => 'Rak', 'active' => 'rack'])
@section('content')
    <div class="card">
        <div class="card-header">
            Data Rak Buku
        </div>
        <div class="card-body">
            <!-- Button trigger for tambah rak -->
            <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal"
                data-bs-backdrop="false" data-bs-target="#tambah">
                <i class="fas fa-plus"></i> Tambah Rak
            </button>

            <!--Disabled Backdrop Modal -->
            <div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel160" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title white" id="myModalLabel160">Tambah Rak
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('admin.rack.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Rak</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Contoh: A100-B100"
                                        class="form-control" name="name">
                                </div>
                                <label>Lokasi</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Contoh: Gedung A Lantai 2"
                                        class="form-control" name="location">
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
                        <th class="text-center">Rak</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Jumlah Buku</th>
                        <th class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($racks as $item)                                            
                    <tr>
                        <td class="text-center"><a href="rak-buku.html">{{ $item->name }}</a></td>
                        <td class="text-center">{{ $item->location }}</td>
                        <td class="text-center">10</td>
                        <td class="d-flex justify-content-center">
                            <!-- Button trigger for ubah rak -->
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
                                                Rak - {{ $item->name }}
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.rack.update', $item) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body text-left">
                                                <label class="text-left">Rak</label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="Contoh: A100-B100"
                                                        class="form-control" name="name"
                                                        value="{{ $item->name }}">
                                                </div>
                                                <label class="text-left">Lokasi</label>
                                                <div class="form-group">
                                                    <input type="text"
                                                        placeholder="Contoh: Gedung A - Lantai 2"
                                                        class="form-control" name="location"
                                                        value="{{ $item->location }}">
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
                            <form action="{{ route('admin.rack.destroy', $item) }}" method="POST" id="deleteForm{{ $item->slug }}">
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
                html: `<h5>Hapus Data Rak Buku ${name}?</h5>
                    <b>Peringatan</b>: Semua data buku yang ada pada rak juga akan terhapus!!!<br>                
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