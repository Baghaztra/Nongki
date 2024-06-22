@extends('admin.layouts.main')

@section('scriptpages')
    <script src="/js/categori.js"></script>
@endsection
@section('title', 'Kategori')
@section('content')
    <div class="card shadow mt-3">
        <div class="card-header d-flex justify-content-between">Kategori <button class="btn btn-sm btn-primary"
                id="addBtn"><i class="fas fa-plus"></i> add</button>
        </div>
        <div class="card-body">
            <div class="table table-responsive">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="tablekategori" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Penerima</th>
                                <th>Tanggal Keluar</th>
                                <th>Quantity</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>dasd</td>
                                <td>asd</td>
                                <td>asdas</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal disini --}}
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalAdd" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Body</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-sm btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
