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
                                <td class="text-center"> {{ $item->created_at }}</td>
                                <td class="text-center"> {{ $item->date_of_return }}</td>                                
                                <td class="text-center"> {{ $item->date_of_return }}</td>                                
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
       window.deleteConfirm = function (formId, name) {
            Swal.fire({
                icon: 'question',
                html: `Hapus Data Buku <b>${name}</b>?`,
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