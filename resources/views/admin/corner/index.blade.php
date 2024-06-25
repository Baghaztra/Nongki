@extends('admin.layouts.main')
@section('title', 'Corner')
@section('content')
    <div class="card shadow mt-3">
        <div class="card-header d-flex justify-content-between">
            Kategori
            <a class="btn btn-sm btn-primary" href="/admin/corner/create">
                <i class="fas fa-plus"></i> add
            </a>
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
@endsection

@section('scriptpages')
    <script src="/js/corner.js"></script>
@endsection
