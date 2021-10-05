@extends('admin.layout.app', ['title' => 'Member', 'active' => 'member', 'subtitle' => 'Semua member aktif'])
@section('content')
    <div class="card">
        <div class="card-header">
            Data Member
        </div>
        <div class="card-body">
            <!-- Button trigger for tambah buku -->
            <a href="{{ route('admin.member.create') }}" class="btn btn-primary btn-sm mb-3">
                <i class="fas fa-plus"></i> Tambah Member
            </a>
            <table class="table table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Peminjaman Sekarang</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Lewat Batas</th>
                        <th class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $row)                        
                        <tr>
                            <td class="text-center">{{ $row->user->name }}</td>
                            <td class="text-center">{{ $row->user->email }}</td>
                            <td class="text-center">3</td>
                            <td class="text-center">5</td>
                            <td class="text-center">{{ $row->status }}</td>                            
                            <td class="text-center">
                                <a href="{{ route('admin.member.show', $row->user->slug) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-eye" title="Detail Member"></i>
                                </a>
                                <a href="{{ route('admin.member.destroy', $row->user->slug) }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                onclick="deleteConfirm('form', 'Gustiandra')"
                                class="btn btn-sm btn-danger" title="Hapus Member">
                                <i class=" fas fa-trash-alt"></i>
                            </a>
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
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endpush