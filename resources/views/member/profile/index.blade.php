@extends('admin.layout.app', ['title' => 'Profil', 'active' => 'profile', 'subtitle' => 'Perbaharui Profil Anda'])
@section('content')
    <div class="row">
        <div class="col-12">
            @if($user->member->status == "MENUNGGU") 
                <div class="alert alert-dark" role="alert">
                    Akun Anda dalam proses verifikasi. Proses ini membutuhkan waktu maks 3X24 Jam
                </div>
            @endif
            @if($user->email_verified_at == null) 
                <div class="alert alert-dark" role="alert">
                    Email Anda belum diverifikasi.
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-white">{{ __('Klik untuk mengirim e-mail verifikasi') }}</button>.
                </form>
                </div>
            @endif
            <div class="card">                
                <div class="card-body">
                    <form action="{{ route('member.profile.update') }}" id="uploadPhoto" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row mt-form">
                                <div class="col-md-6">
                                    <label id="name">Nama<sup class="text-danger">*</sup></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('title') ?? $user->name ?? '' }}" @if($user->member->status == "MENUNGGU") {{ 'readonly' }} @endif>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label id="email">Email<sup class="text-danger">*</sup></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('title') ?? $user->email ?? '' }}" readonly>
                                         @error('email')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <label id="no_hp">No. Hp</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('title') ?? $user->member->no_hp ?? '' }}"  @if($user->member->status == "MENUNGGU") {{ 'readonly' }} @endif>
                                         @error('no_hp')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label id="address">Alamat</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('title') ?? $user->member->address ?? '' }}" @if($user->member->status == "MENUNGGU") {{ 'readonly' }} @endif>
                                         @error('address')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label id="job">Pekerjaan</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('job') is-invalid @enderror" name="job" id="job" value="{{ old('title') ?? $user->member->job ?? '' }}" @if($user->member->status == "MENUNGGU") {{ 'readonly' }} @endif>
                                         @error('job')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: -10px;">
                                <div class="col-md-6"  style="@if($user->member->status == 'AKTIF') {{ 'display:none' }} @endif">
                                    <img :src="previewPhotoId" alt="" width="200"><br>
                                    <label id="photoId">Foto Kartu Identitasi<sub><i
                                                class="text-muted">*KTP/Kartu
                                                Pelajar atau
                                                mahasiswa/SIM</i></sub></label>
                                    <div class="form-group">
                                        <div class="input-group ">
                                            <div class="input-group ">
                                                <label class="input-group-text" for="photoId"><i
                                                        class="bi bi-upload"></i></label>
                                                <input type="file" class="form-control" id="photoId" name="photoIdCard"
                                                    @change="uploadId" @if($user->member->status == "MENUNGGU") {{ 'disabled' }} @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img :src="previewimage" alt="" width="200"><br>
                                    <label id="photo">Foto Profil</label>
                                    <div class="form-group">
                                        <div class="input-group ">
                                            <div class="input-group ">
                                                <label class="input-group-text" for="photo"><i
                                                        class="bi bi-upload"></i></label>
                                                <input type="file" class="form-control" id="photo" name="photo"
                                                    @change="upload" @if($user->member->status == "MENUNGGU") {{ 'disabled' }} @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary" @if($user->member->status == "MENUNGGU" || $user->email_verified_at == null) {{ 'disabled' }} @endif>Simpan</button>
                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-style')    
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
@endpush
@push('addon-script')
    <script src="{{ asset('dist/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>    
    <script src="{{asset('dist/assets/vendors/vue/vue.js')}}"></script>
    <script>
        const photo = new Vue({
            el: '#uploadPhoto',
            data() {
                return {
                    previewimage: "{{ Storage::url('/assets/profil/'.$user->member->photo) }}",
                    previewPhotoId: "{{ Storage::url('/assets/ID Card/'.$user->member->photo_IdCard) }}",
                }
            },
            methods: {
                upload(e) {
                    let files = e.target.files[0]
                    this.previewimage = URL.createObjectURL(files)
                },
                uploadId(e) {
                    let files = e.target.files[0]
                    this.previewPhotoId = URL.createObjectURL(files)
                },
            }
        })
    </script>    
@endpush