@extends('admin.layout.app', ['title' => 'Lewat Batas Peminjaman', 'active' => 'past'])
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Lewat Batas Peminjaman
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Peminjaman</th>
                            <th class="text-center">Pengembalian</th>
                            <th class="text-center">Denda</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $it = 0;
                        @endphp
                        @foreach ($past_data as $item)                            
                            <tr>
                                <td class="text-center">{{ $item->user->name }}</td>
                                <td class="text-center">{{ $item->book_code->book->title }}</td>
                                <td class="text-center">{{ $item->book_code->code }}</td>
                                <td class="text-center">{{ $item->created_at }}</td>
                                <td class="text-center">{{ $item->date_of_return }}</td>
                                <td class="text-center">
                                    <!-- Button trigger for Detail Denda -->
                                    <a href="#denda{{ $item->id }}" data-bs-toggle="modal" data-bs-backdrop="false"
                                        data-bs-target="#denda{{ $item->id }}" class="badge bg-danger">Rp
                                        {{ number_format($denda[$it] * 1000,0, ',', '.')}}
                                    </a>
                                    <!--Disabled Backdrop Modal -->
                                    <div class="modal fade text-left" id="denda{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel160" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title white" id="myModalLabel160">Detail
                                                    Denda
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                                <div class="modal-body">
                                                    <p>Hari Terlambat : <b>{{ $denda[$it]}}
                                                            Hari</b></p>
                                                    <p>Denda/hari : <b>Rp 1.000</b>
                                                    </p>
                                                    <div class="divider divider-right">
                                                        <div class="divider-text">
                                                            <b>&times;</b>
                                                        </div>
                                                    </div>
                                                    <p>Total Denda : Rp {{ number_format($denda[$it] * 1000,0, ',', '.')}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="#"
                                    onclick="returnConfirm('return{{ $item->id }}', '{{ $item->book_code->book->title }}', '{{ $item->user->name }}', '{{ $item->book_code->code }}', '{{ number_format($denda[$it] * 1000,0, ',', '.')}}')"
                                        class="btn btn-sm btn-primary">
                                        Pengembalian Buku
                                    </a>
                                    <form action="{{ route('admin.borrow.return', $item->id) }}" method="POST" id="return{{ $item->id }}">
                                        @csrf
                                        @method('put')
                                    </form>
                                </td>
                            </tr>
                            @php
                                $it++;
                            @endphp
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
@endpush
@push('addon-script')
    <script src="{{ asset('dist/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
        window.returnConfirm = function (formId, title, name, kode, denda) {
            Swal.fire({
                icon: 'question',
                titleText: 'Pengembalian Buku ?',
                text: ``,
                html: `Pastikan semua data benar!<br>
                    Anggota: <b>${name}</b><br>
                    Judul: <b>${title}</b><br>
                    Kode: <b>${kode}</b><br>
                    Denda: <b>${denda}</b><br>
                    `,
                showCancelButton: true,
                confirmButtonText: 'Ya, data sudah benar',
                confirmButtonColor: '#435ebe',
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