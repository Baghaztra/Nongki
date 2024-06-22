@extends('admin.layouts.main')

@section('title', 'Users')

@section('scriptpages')
    <script src="/js/dashboard.js"></script>
@endsection

@section('content')
    <div class="card shadow mt-3">
        <div class="card-header d-flex justify-content-between">
            <h1 class="h2">
                Selamat
                {{ date('H') >= 4 && date('H') < 12 ? 'pagi' : (date('H') >= 12 && date('H') < 18 ? 'siang' : 'malam') }},
                {{ Auth::user()->name }} !
            </h1>
        </div>
        <div class="card-body">
            <p>Saran dari pengunjung web:</p>
            <div class="table table-responsive">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="tableRecomendation" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <td>NO</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Title</td>
                                <td>Detail</td>
                                <td>Location</td>
                                <td>NO</td>
                            </tr>
                        </thead>
                    </table>
                    <tbody></tbody>
                </div>
            </div>
        </div>
    </div>
@endsection
