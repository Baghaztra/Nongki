@extends('admin.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Corner</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <a href="/admin/corner/create" class="btn btn-primary mb-3">New Place to Nongki</a>
    </div>
    <div class="col-md-6">
        <form action="/admin/corner" method="GET" class="input-group mb-3">
            <input type="text" class="form-control" name="search" value="{{ $search }}"
                placeholder="cari sesuatu" aria-label="cari sesuatu">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</div>


@if (session('success') || session('warning') || session('danger'))
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @else
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
@endif

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Fasilitas</th>
        <th>Lokasi</th>
        <th>action</th>
    </tr>
    @if ($corner->isEmpty())
        <tr>
            <td style="text-align: center; background: rgb(187, 187, 187); color: rgb(41, 41, 41); font-weight: 600"
                colspan="7">Data
                not found.
            </td>
        </tr>
    @endif
    @foreach ($corner as $item)
        <tr>
            <td>{{ $corner->firstItem() + $loop->index }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->categories }}</td>
            <td>{{ $item->facilities }}</td>
            <td>{{ $item->location }}</td>
            <td>
                <a href="/admin/corner/{{$item->id}}/approve" onclick="return confirm('{{$item->status=='approved'?'Cancel':'Approve'}} {{ $item->name }}?')">
                    <span class="badge {{ $item->status=='approved'?'text-bg-success':($item->status=='canceled'?'text-bg-danger':'text-bg-light') }} rounded-3" id="status">
                        {{ $item->status}}
                    </span>
                </a>
            </td>
            <td>
                <form class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                    action="{{ route('corner.destroy', $item->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
                <a href="/admin/corner/{{ $item->id }}/edit" class="btn btn-sm btn-warning d-inline">Edit</a>
                <button class="btn btn-sm btn-primary d-inline" id="buttonDetail">Detail</button>
            </td>
        </tr>
    @endforeach
</table>

<!-- Modal -->
<div class="modal fade" id="details-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"  id="nama-homestay"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

{{ $corner->links() }}
@endsection

@section('pageScript')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const detailModal = document.getElementById('details-modal');
        detailModal.addEventListener('show.bs.modal', (event) => {
            const button = event.relatedTarget;
        });
    });
</script>
@endsection