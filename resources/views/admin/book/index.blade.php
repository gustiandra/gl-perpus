@extends('admin.layout.app', ['title' => 'Buku', 'active' => 'book'])
@section('content')
    <div class="card">
        <div class="card-header">
            Data Buku
        </div>
        <div class="card-body">
            <!-- Button trigger for tambah buku -->
            <a href="{{ route('admin.book.create') }}" class="btn btn-primary btn-sm mb-3">
                <i class="fas fa-plus"></i> Tambah Buku
            </a>
            <table class="table table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Cover</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Rak</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td class="text-center">{{ $item->title }}</td>
                            <td class="text-center"><img src="{{ Storage::url($item->cover) }}" height="80"
                                    alt=""></td>
                            <td class="text-center">
                                @foreach ( $item->bookCategory  as $row)
                                    <span class="">{{ $row->category->name }}</span><br>
                                @endforeach
                            </td>
                            <td class="text-center">{{ $item->rack->name }}</td>
                            <td class="text-center">{{ count($item->bookcode) }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.book.show', $item->slug) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-eye" title="Detail Buku"></i>
                                </a>
                                <a href="{{ route('admin.book.edit', $item->slug) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                    onclick="deleteConfirm('deleteConfirm{{ $item->slug }}', '{{ $item->title }}')"
                                    class="btn btn-sm btn-danger" title="Hapus Buku">
                                    <i class=" fas fa-trash-alt"></i>
                                </a>
                                <form action="{{ route('admin.book.destroy', $item->slug) }}" method="POST" id="deleteConfirm{{ $item->slug }}">
                                    @csrf
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
                text: `Hapus Data Buku ${name}?`,
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