@extends('admin.layout.app', ['title' => $user->name, 'active' => 'member', 'subtitle' => 'Anggota'])
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Detail Anggota : {{ $user->name }}</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profil-tab" data-bs-toggle="tab"
                                href="#profil" role="tab" aria-controls="profil"
                                aria-selected="true">Profil</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="peminjaman-tab" data-bs-toggle="tab"
                                href="#peminjaman" role="tab" aria-controls="peminjaman"
                                aria-selected="false">Peminjaman</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profil" role="tabpanel"
                            aria-labelledby="profil-tab">
                            <div class="row mt-4">
                                <div class="col-md-2 col-12 mb-4">
                                    <img src="{{ Storage::url('/assets/profil/'. $user->member->photo) }}" alt=""
                                        class="img-thumbnail">
                                </div>
                                <div class="col-md-10 col-12">
                                    <div class="row">
                                        <div class="col-lg-3 col-5">
                                            Nama
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $user->name }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            E-mail
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $user->email }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            No.Hp
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $user->member->no_hp }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Alamat
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $user->member->address }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Pekerjaan
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $user->member->job }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Bergabung Sejak
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : {{ $user->member->created_at->diffForHumans() }}
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Peminjaman Sekarang
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : 3
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Lewat Batas Peminjaman
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : 2
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Total Peminjaman
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            : 10
                                        </div>
                                        <div class="col-lg-3 col-5">
                                            Status
                                        </div>
                                        <div class="col-lg-9 col-7">
                                            :
                                            <!-- Button trigger for tambah kategori -->
                                            <button type="button" class="btn btn-primary btn-sm mb-3"
                                                data-bs-toggle="modal" data-bs-backdrop="false"
                                                data-bs-target="#updateStatus">
                                                Aktif
                                            </button>
                                            <!--Disabled Backdrop Modal -->
                                            <div class="modal fade text-left" id="updateStatus"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel160" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title white"
                                                                id="myModalLabel160">Ubah Status Anggota
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form action="#">
                                                            <div class="modal-body">
                                                                <label>Status </label>
                                                                <div class="form-group">
                                                                    <select name="status" id="status"
                                                                        class="form-control">
                                                                        <option value="AKTIF">Aktif
                                                                        </option>
                                                                        <option value="DIBLOKIR">Blokir
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <label
                                                                    for="description">Keterangan</label>
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                        class="form-control"
                                                                        id="description"
                                                                        name="description">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i
                                                                        class="bx bx-x d-block d-sm-none"></i>
                                                                    <span
                                                                        class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit"
                                                                    class="btn btn-primary ml-1"
                                                                    data-bs-dismiss="modal">
                                                                    <i
                                                                        class="bx bx-check d-block d-sm-none"></i>
                                                                    <span
                                                                        class="d-none d-sm-block">Simpan</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="peminjaman" role="tabpanel"
                            aria-labelledby="peminjaman-tab">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <table class="table table-striped table-responsive" id="table1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Buku</th>
                                                <th class="text-center">Kode</th>
                                                <th class="text-center">Peminjaman</th>
                                                <th class="text-center">Pengembalian</th>
                                                <th class="text-center">Terlewat</th>
                                                <th class="text-center">Denda</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">Susana Sundel Bolong</td>
                                                <td class="text-center">111-222-333</td>
                                                <td class="text-center">23-7-2021</td>
                                                <td class="text-center">7-8-2021</td>
                                                <td class="text-center">5 Hari</td>
                                                <td class="text-center">
                                                    <!-- Button trigger for Detail Denda -->
                                                    <a href="#denda" data-bs-toggle="modal"
                                                        data-bs-backdrop="false" data-bs-target="#denda"
                                                        class="badge bg-danger">Rp 5.000
                                                    </a>
                                                    <!--Disabled Backdrop Modal -->
                                                    <div class="modal fade text-left" id="denda"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="myModalLabel160"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                    <h5 class="modal-title white"
                                                                        id="myModalLabel160">Detail
                                                                        Denda
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Hari Terlambat : <b>5
                                                                            Hari</b></p>
                                                                    <p>Denda/hari : <b>Rp 1.000</b>
                                                                    </p>
                                                                    <div class="divider divider-right">
                                                                        <div class="divider-text">
                                                                            <b>&times;</b>
                                                                        </div>
                                                                    </div>
                                                                    <p>Total Denda : Rp 5.000</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i
                                                                            class="bx bx-x d-block d-sm-none"></i>
                                                                        <span
                                                                            class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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