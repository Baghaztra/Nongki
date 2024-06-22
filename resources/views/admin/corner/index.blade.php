@extends('admin.layouts.main')

@section('content')
<div class="card shadow mt-3">
    <div class="card-header d-flex justify-content-between">
        Kategori 
        <button class="btn btn-sm btn-primary">
            <i class="fas fa-plus-circle"></i> add
        </button>
    </div>
    <div class="card-body">
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
                    <td>
                        @foreach ($item->facilities as $i)
                        {{ $i->name }},
                        @endforeach
                    </td>
                    <td>
                        @foreach ($item->facilities as $i)
                        {{ $i->name }}, 
                        @endforeach
                    </td>
                    <td><a href="{{ $item->location }}" target="blank">Lihat lokasi</a></td>
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
    </div>
</div>

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