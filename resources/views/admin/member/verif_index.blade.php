@extends('admin.layout.app', ['title' => 'Verifikasi Member', 'active' => 'verif', 'subtitle' => 'Verifikasi akun member yang mendaftar'])
@section('content')
    <div class="card">
        <div class="card-header">
            Verifikasi Member
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive " id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">No. Hp</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $row)                                
                        <tr>
                            <td class="text-center"><img src="{{ Storage::url('/assets/profil/'.$row->photo) }}"
                                alt="" height="60"></td>
                            <td class="text-center">{{ $row->user->name }}</td>
                            <td class="text-center">{{ $row->user->email }}</td>
                            <td class="text-center">{{ $row->no_hp }}</td>
                            <td class="text-center"> <span class="@if($row->status == 'DITOLAK') {{ 'badge bg-danger' }} @else {{ 'badge bg-success' }} @endif">{{ ucfirst(strtolower($row->status)) }}</span></td>
                            <td class="text-center">
                                <a href="{{ route('admin.member.verif.show', $row->user->slug) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-check"></i>
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