@extends('admin.layout.app', ['title' => 'Member Diblokir', 'active' => 'blok'])
@section('content')
    <div class="card">
        <div class="card-header">
            Data Member Diblokir
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Diblokir Sejak</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $row)                                            
                        <tr>
                            <td class="text-center"><a href="{{ route('admin.member.show', $row->user->slug) }}">{{ $row->user->name }}</a></td>
                            <td class="text-center">{{ $row->user->email }}</td>
                            <td class="text-center">{{ $row->updated_at->diffForHumans() }}</td>
                            <td class="text-center">{{ $row->description }}</td>
                            <td class="text-center">
                                <a href="#" onclick="unBlock('form{{ $row->user->slug }}', '{{ $row->user->name }}')" class="btn btn-primary btn-sm">Aktifkan Kembali</a>
                                <form action="{{ route('admin.member.unblock', $row->id) }}" method="POST" id="form{{ $row->user->slug }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="AKTIF">
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
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script>
        window.unBlock = function (formId, name) {
            Swal.fire({
                icon: 'question',
                html: `Buka Blokir Member<br> <b>${name}</b>`,                
                showCancelButton: true,
                confirmButtonText: 'Aktifkan',
                confirmButtonColor: '#435ebe',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endpush