@extends('admin.layouts.main')
@section('title', 'Corner')
@section('content')
    <div class="card shadow mt-3">
        <div class="card-header d-flex justify-content-between">
            Kategori
            <div>
                <a class="btn btn-sm btn-primary" href="/admin/corner/create">
                    <i class="fas fa-plus"></i> add
                </a>
                <button class="btn btn-sm btn-success" id="btnImportCorner"><i class="fa-solid fa-file-import"></i>
                    Import</button>
            </div>
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

    {{-- modal import data corner --}}
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalImport" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Import Data Corner
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Choise file</label>
                        <input type="file" accept=".csv, .xlsx" class="form-control" name="fileCorner" id="fileCorner"
                            aria-describedby="helpId" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-sm btn-primary" id="saveImport">Import</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId"),
            options,
        );
    </script>

@endsection

@section('scriptpages')
    <script src="/js/corner.js"></script>
@endsection
