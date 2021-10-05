@extends('admin.layout.app', ['title' => 'Tambah Member', 'active' => 'member', 'subtitle' => 'Lengkapi data member'])
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Form tambah member
                </div>
                <form action="{{ route('admin.member.store') }}" method="POST" enctype="multipart/form-data" id="uploadPhoto">
                    @csrf
                    <div class="card-body">
                        <div class="row mt-form">
                            <div class="col-md-6">
                                <label id="name">Nama<sup class="text-danger">*</sup></label>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('title') ??  '' }}">
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
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('title') ?? '' }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>                                
                            <div class="col-md-6">
                                <label id="password">Password<sup class="text-danger">*</sup></label>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('title') ?? '' }}" >
                                        @error('password')
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
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('title') ?? '' }}" >
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
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('title') ?? '' }}">
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
                                    <input type="text" class="form-control @error('job') is-invalid @enderror" name="job" id="job" value="{{ old('title') ?? '' }}">
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
                            <div class="col-md-6">
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
                                                @change="uploadId">
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
                                                @change="upload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="status">Status<sup class="text-danger">*</sup></label>
                                <div class="form-group">
                                    <select class="form-select" id="status" name="status">
                                        <option value="AKTIF">Aktif</option>
                                        <option value="MENUNGGU">Menunggu</option>
                                        <option value="DIBLOKIR">Blokir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')            
    <script src="{{asset('dist/assets/vendors/vue/vue.js')}}"></script>
    <script>
        const photo = new Vue({
            el: '#uploadPhoto',
            data() {
                return {
                    previewimage: null,
                    previewPhotoId: null,
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