@extends('admin.layouts.main')
@section('title', 'Corner')
@section('content')
    <div class="card shadow mt-3">
        <div class="card-header d-flex justify-content-between">
            Kategori
            <button class="btn btn-sm btn-primary">
                <i class="fas fa-plus-circle"></i> add
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
                                <th>action</th>
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
    <div class="modal fade" id="details-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="nama-homestay"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('pageScript')
    <script src="/js/corner.js"></script>
@endsection
