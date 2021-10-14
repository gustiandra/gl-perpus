@extends('admin.layout.app', ['title' => 'Buku Dipinjam', 'active' => 'borrow', 'subtitle' => 'Peminjaman yang melewati batas waktu dipindahkan ke menu "Lewat Batas Peminjaman"'])
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Buku Dipinjam
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
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loan_data as $item)                                                    
                            <tr>
                                <td class="text-center">{{ $item->user->name }}</td>
                                <td class="text-center">{{ $item->book_code->book->title }}</td>
                                <td class="text-center">{{ $item->book_code->code }}</td>
                                <td class="text-center">{{ $item->created_at }}</td>
                                <td class="text-center">{{ $item->date_of_return }}</td>                                
                                <td class="text-center">
                                    <a href="#"
                                        onclick="returnConfirm('form{{ $item->id }}', '{{ $item->book_code->book->title }}', '{{ $item->user->name }}', '{{ $item->book_code->code }}')"
                                        class="btn btn-sm btn-primary">
                                        Pengembalian Buku
                                    </a>
                                    <form action="{{  route('admin.borrow.return', $item->id)  }}}}" method="POST" id="form{{ $item->id }}">
                                        @csrf
                                        @method('put')
                                    </form>
                                </td>
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