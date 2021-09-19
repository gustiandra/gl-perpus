@extends('admin.layout.app', ['title' => 'Ubah Buku - '.$book->title, 'active' => 'book'])
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Form Ubah Buku
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.book.update', $book) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="title">Judul<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"  name="title" value="{{ old('title') ?? $book->title ?? '' }}" required autofocus> 
                                @error('title')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="category_id">Kategori<sup class="text-danger">*</sup><sub><i class="text-muted">(bisa memilih lebih dari satu)</i></sub></label>
                                <div class="form-group">
                                    <select class="choices form-select multiple-remove"
                                        multiple="multiple" name="category_id[]" id="category_id" required>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" 
                                                @foreach ($book->bookCategory as $row)
                                                    @if ($row->category_id == $item->id)
                                                        {{ 'selected' }}
                                                    @endif
                                                @endforeach
                                            >{{ $item->name }}</option>                                            
                                        @endforeach                                         
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label for="publisher">Penerbit<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher"  name="publisher" value=" {{ old('publisher') ?? $book->publisher ?? '' }}" required>
                                @error('publisher')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label for="author">Penulis<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"  name="author" value="{{ old('author') ?? $book->author ?? '' }}" required>
                                @error('author')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label for="rack">Rak<sup class="text-danger">*</sup></label>
                                <div class="form-group">
                                    <select class="form-select @error('rack_id') is-invalid @enderror" name="rack_id" id="rack" required>
                                        <option value="">-- Pilih Rak --</option>                                            
                                        @foreach ($racks as $item)
                                        <option value="{{ $item->id }}" @if ($item->slug == old('rack_id') || ($item->id == $book->rack_id)) {{ 'selected' }} @endif >{{ $item->name }}</option>                                            
                                        @endforeach                                        
                                    </select>
                                    @error('rack_id')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{$message}}
                                    </div>
                                @enderror
                                </div>                                
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label for="publish_at">Waktu Rilis<sup class="text-danger">*</sup></label>
                                <input type="date" class="form-control @error('publish_at') is-invalid @enderror" id="publish_at"  name="publish_at" value="{{ old('publish_at')  ?? date_format($book->publish_at, 'Y-m-d') ?? '' }}" required>
                                @error('publish_at')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="description">Deskripsi<sup class="text-danger">*</sup></label>
                                <textarea name="description" id="description" rows="3"
                                    class="form-control @error('description') is-invalid @enderror" required>{{ old('description') ?? $book->description ??'' }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row" id="photo">
                            <div class="col-sm-6 mb-2 mt-1">
                                <img :src="previewimage" alt="" width="200" class="mb-1"><br>
                                <label for="formFile">Sampul Buku</label>
                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="formFile"><i
                                                class="bi bi-upload"></i></label>
                                        <input type="file" class="form-control @error('cover') is-invalid @enderror" id="formFile"
                                            @change="upload" name="cover" value="{{ old('cover') ?? '' }}">
                                    </div>
                                    @error('cover')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>                            
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-style')
<!-- Include Choices CSS -->    
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/choices.js/choices.min.css')}}">
@endpush
@push('addon-script')
    <!-- Include Choices JavaScript -->
    <script src="{{asset('dist/assets/vendors/choices.js/choices.min.js')}}"></script>
    <script src="{{asset('dist/assets/js/pages/form-element-select.js')}}"></script>

    <script src="{{asset('dist/assets/js/main.js')}}"></script>    
    <script src="{{asset('dist/assets/vendors/vue/vue.js')}}"></script>   

    <script>
        const photo = new Vue({
            el: '#photo',
            data() {
                return {
                    previewimage: "{{ Storage::url('/assets/book-cover/'.$book->cover) }}",
                }
            },
            methods: {
                upload(e) {
                    let files = e.target.files[0]
                    this.previewimage = URL.createObjectURL(files)
                },
            }
        })
    </script>    
@endpush