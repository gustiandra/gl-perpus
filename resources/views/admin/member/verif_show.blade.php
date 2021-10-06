@extends('admin.layout.app', ['title' => "Verifikasi Member - $user->name", 'active' => 'verif', 'subtitle' => 'Verifikasi member'])
@section('content')
    <div class="card">
        <div class="card-header">
            <h6>Data {{ $user->name }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 col-3">
                    Nama
                </div>
                <div class="col-md-10 col-9">
                    : {{ $user->name }}
                </div>
                <div class="col-md-2 col-3">
                    Email
                </div>
                <div class="col-md-10 col-9">
                    : {{ $user->email }}
                </div>
                <div class="col-md-2 col-3">
                    No. Hp
                </div>
                <div class="col-md-10 col-9">
                    : {{ $user->member->no_hp }}
                </div>
                <div class="col-md-2 col-3">
                    Alamat
                </div>
                <div class="col-md-10 col-9">
                    : {{ $user->member->address }}
                </div>
                <div class="col-md-2 col-3">
                    Pekerjaan
                </div>
                <div class="col-md-10 col-9">
                    : {{ $user->member->job }}
                </div>
                <div class="col-md-2 col-3">
                    Foto Kartu Identitas
                </div>
                <div class="col-md-10 col-9">
                    <img src="{{ Storage::url('/assets/ID Card/'.$user->member->photo_IdCard) }}" height="100"
                        class="img-fluid" alt="">
                </div>
                <div class="col-md-2 col-3 mt-2">
                    Foto Profil
                </div>
                <div class="col-md-10 col-9 mt-2">
                    <img src="{{ Storage::url('/assets/profil/'.$user->member->photo) }}" height="100"
                        class="img-fluid" alt="">
                </div>
                <div class="col-12  mt-4">
                    <h6>Konfirmasi Status</h6>
                </div>
            </div>
            <form action="{{ route('admin.member.verif.update', $user) }}" id="app" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <label for="status">Status<sup class="text-danger">*</sup></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="status" id="aktif"
                                v-model="status" :value="true">
                            <label class="form-check-label" for="aktif">
                                Aktif
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="ditolak"
                                v-model="status" :value="false">
                            <label class="form-check-label" for="ditolak">
                                Tolak
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2" v-if="status == false">
                        <label id="description">Keterangan<sup class="text-danger">*</sup></label>
                        <div class="form-group">
                            <input type="text" placeholder="Contoh: Foto KTP tidak jelas"
                                class="form-control" name="description" id="description">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-3 py-4">
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
@endpush
@push('addon-script')
    <script src="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>    
    <script src="{{asset('dist/assets/vendors/vue/vue.js')}}"></script>
   <script>
        const app = new Vue({
            el: '#app',
            data: {
                status: true,
            }
        })
    </script>
@endpush