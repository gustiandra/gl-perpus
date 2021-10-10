@extends('admin.layout.app', ['title' => 'Verifikasi Peminjaman', 'active' => 'verif_borrow'])
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Peminjaman
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">Cover</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Anggota</th>
                            <th class="text-center">Peminjaman</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loan_data as $item)                            
                            <tr>
                                <td class="text-center"><img src="{{ Storage::url('/assets/book-cover/' . $item->book_code->book->cover) }}" height="70"
                                        alt=""></td>
                                <td class="text-center">{{ $item->book_code->book->title }}</td>
                                <td class="text-center">{{ $item->book_code->code }}</td>
                                <td class="text-center">{{ $item->user->name }}</td>
                                <td class="text-center">{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <a href="#"
                                        onclick="Confirm('verif{{ $item->id }}', '{{ $item->book_code->book->title }}', '{{ $item->book_code->code }}', '{{ $item->user->name }}')"
                                        class="btn btn-sm btn-primary">
                                        Verifikasi Peminjaman
                                    </a>
                                    <form action="{{ route('admin.borrow.verif.update', $item->id) }}" method="POST" id="verif{{ $item->id }}">
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
        window.Confirm = function (formId, title, kode, name) {
            Swal.fire({
                icon: 'question',
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