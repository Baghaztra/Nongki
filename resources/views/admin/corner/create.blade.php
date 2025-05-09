@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Corner to Database</h1>
    </div>
    <div class="col-6">
        <a href="/admin/corner" class="btn btn-sm btn-warning mb-3">Back</a>
        <form action="/admin/corner" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Corner's name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" placeholder=" ">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="gambar">Media</label>
                <input type="file" name="gambar[]" id="gambar" class="form-control @error('gambar') is-invalid @enderror" onchange="previewFiles(event)" accept=".jpg, .jpeg, .png" hidden multiple>
                <div id="preview-container"></div>
                <label class="form-label" for="gambar">
                    <div id="img-preview" class="img-thumbnail" style="width: 300px; height: 150px; display: flex; justify-content: center; align-items: center; cursor: pointer; background-color: aliceblue">
                        <i class="fa-solid fa-plus" style="width: 100px; height: 100px;"></i>
                    </div>
                </label>
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <script>
                    let currentFiles = [];
                    const previewFiles = (event) => {
                        const newFiles = Array.from(event.target.files);
                        currentFiles = currentFiles.concat(newFiles);
                        updatePreview();
                        updateFileInput(currentFiles);
                    };
                
                    const updatePreview = () => {
                        const previewContainer = document.getElementById('preview-container');
                        previewContainer.innerHTML = '';
                        
                        currentFiles.forEach((file, index) => {
                            const reader = new FileReader();
                            reader.onload = () => {
                                let mediaElement;
                                const previewWrapper = document.createElement('div');
                                previewWrapper.style.position = 'relative';
                                previewWrapper.style.display = 'inline-block';
                
                                mediaElement = document.createElement('img');
                                mediaElement.src = reader.result;
                
                                if (mediaElement) {
                                    mediaElement.classList.add('img-thumbnail');
                                    mediaElement.style.width = '300px';
                                    mediaElement.style.display = 'block';
                
                                    const removeButton = document.createElement('button');
                                    removeButton.innerHTML = '&#x2715;';
                                    removeButton.style.position = 'absolute';
                                    removeButton.style.top = '5px';
                                    removeButton.style.right = '5px';
                                    removeButton.style.backgroundColor = 'rgba(255, 255, 255, 0.8)';
                                    removeButton.style.border = 'none';
                                    removeButton.style.borderRadius = '50%';
                                    removeButton.style.cursor = 'pointer';
                                    removeButton.addEventListener('click', () => {
                                        currentFiles = currentFiles.filter((_, i) => i !== index);
                                        updatePreview();
                                        updateFileInput(currentFiles);
                                    });
                
                                    previewWrapper.appendChild(mediaElement);
                                    previewWrapper.appendChild(removeButton);
                                    previewContainer.appendChild(previewWrapper);
                                }
                            }
                            reader.readAsDataURL(file);
                        });
                    };
                
                    const updateFileInput = (updatedFiles) => {
                        const dataTransfer = new DataTransfer();
                        updatedFiles.forEach(file => dataTransfer.items.add(file));
                        document.getElementById('gambar').files = dataTransfer.files;
                    };
                </script>
            </div>

            <div class="mb-3">
                <label class="form-label" for="detail">Detail</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" id="detail"\>
                    {{ old('detail') }}
                </textarea>
                @error('detail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">G-Map's URL</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                    value="{{ old('location') }}">
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Working hours</label>
                <div class="input-group">
                    <input type="time" class="form-control @error('jam_buka') is-invalid @enderror" name="jam_buka" value="{{ old('jam_buka') }}">
                    <span class="input-group-text"> until </span>
                    <input type="time" class="form-control @error('jam_tutup') is-invalid @enderror" name="jam_tutup" value="{{ old('jam_tutup') }}">
                    @error('jam_buka')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('jam_tutup')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Choose Days</label>
                <div class="row">
                    @php
                        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    @endphp
                    @foreach ($days as $day)
                        <div class="col-3">
                            <input type="checkbox" id="day{{ $loop->index }}" name="days[]" value="{{ $day }}">
                            <label for="day{{ $loop->index }}">{{ $day }}</label>
                        </div>
                    @endforeach
                </div>
                <span id="error_days" class="text-danger"></span>
            </div>            

            <div class="mb-3">
                <label for="name" class="form-label">Choose categories</label>
                <div class="row">
                    @foreach ($categories as $item)
                        <div class="col-3">
                            <input type="checkbox" id="c{{ $item->id }}" name="categories[]"
                                value="{{ $item->id }}">
                            <label for="c{{ $item->id }}">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>
                <span id="error_categories" class="text-danger"></span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Choose facilities</label>
                <div class="row">
                    @foreach ($facilities as $item)
                        <div class="col-3">
                            <input type="checkbox" id="f{{ $item->id }}" name="facilities[]"
                                value="{{ $item->id }}">
                            <label for="f{{ $item->id }}">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>
                <span id="error_facilities" class="text-danger"></span>
            </div>

            <div class="mb-3">
                <label class="form-label">Budget</label>
                <div class="input-group">
                    <input type="number" class="form-control @error('harga_min') is-invalid @enderror" name="harga_min" placeholder="Minimum budget" value="{{ old('harga_min') }}">
                    <span class="input-group-text"> - </span>
                    <input type="number" class="form-control @error('harga_max') is-invalid @enderror" name="harga_max" placeholder="Maximum budget" value="{{ old('harga_max') }}">
                    @error('harga_min')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('harga_max')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div style="height: 10vh"></div>
            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
