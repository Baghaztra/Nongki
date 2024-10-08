@extends('admin.layouts.main')
@section('title', 'Corner')
@section('content')
    <div class="card shadow mt-3">
        <div class="card-header d-flex justify-content-between">
            Kategori
            <button class="btn btn-sm btn-primary" id="addBtn">
                <i class="fas fa-plus"></i> add
            </button>
        </div>
        <div class="card-body">
            <div class="table table-responsive">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="tableCorner" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Fasilitas</th>
                                <th>Lokasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAdd" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitleId">Form Add Corner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <input type="hidden" id="id" style="display: none">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                            placeholder="Masukkan nama tempat" />
                            <span id="error_name" class="text-danger"></span>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" id="lokasi"
                                placeholder="Masukkan URL lokasi" />
                            <span id="error_lokasi" class="text-danger"></span>
                        </div>
                    </div>
                    {{-- Input gambar --}}
                    <div class="mb-3">
                        <label class="form-label" for="gambar">Media</label>
                        <input type="file" name="gambar[]" id="gambar" class="form-control" accept=".jpg, .jpeg, .png"
                            hidden multiple>
                        <div id="preview-container" class="row">
                            <!-- Pratinjau media yang ada -->
                        </div>
                        <label class="form-label" for="gambar" style="margin-top: 0.75rem; display: flex; justify-content: center; align-items: center;">
                            <div id="img-preview" class="img-thumbnail"
                                style="width: 350px; height: 150px; cursor: pointer; background-color: aliceblue; text-align:center; display: flex; justify-content: center; align-items: center;">
                                <i class="fas fa-plus"></i>
                            </div>
                        </label>
                    </div>
                    {{--  --}}
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail</label>
                        <textarea class="form-control" name="detail" id="detail" placeholder="Masukkan detail"></textarea>
                        <span id="error_detail" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Choise categories</label>
                        <div class="row">
                            @foreach ($categories as $item)
                                <div class="col-3">
                                    <input type="checkbox" id="c{{ $item->id }}" data-id="categories"
                                        value="{{ $item->id }}">
                                    <label for="c{{ $item->id }}">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <span id="error_categories" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Choise facilities</label>
                        <div class="row">
                            @foreach ($facilities as $item)
                                <div class="col-3">
                                    <input type="checkbox" id="f{{ $item->id }}" data-id="facilities"
                                        value="{{ $item->id }}">
                                    <label for="f{{ $item->id }}">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <span id="error_facilities" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-sm btn-primary action" id="save">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptpages')
    <script src="/js/corner.js"></script>
@endsection
