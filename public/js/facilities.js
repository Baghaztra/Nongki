$(document).ready(function () {
    // const datatablesSimple = document.getElementById('tablekategori');
    // new simpleDatatables.DataTable(datatablesSimple);
    $('#tablekategori').dataTable({
        "processing": true,
        "paging": true,
        "searching": true,
        "responsive": true,
        "language": {
            "search": "cari"
        },
        "ajax": {
            "url": "get-data-facilities",
            "type": "GET"
        },
        "columns": [
            {
                "data": null,
                "render": function (_data, _type, _row, meta) {
                    return meta.row + 1; // Nomor urut otomatis berdasarkan posisi baris
                }
            },
            { "data": "username", "orderable": true },
            { "data": "email", "orderable": true },
            {
                "data": null, "render": function (_data, _type, row) {
                    if (row.email_verified_at !== null) return `<span class="badge bg-success"  style="text-align: center;">verified</span>`;
                    else return `<span class="badge bg-danger"  style="text-align: center;">unverified</span>`;
                }
            },
            {
                "data": "role",
                "render": function (data) {
                    return role[data - 1];
                }, "orderable": true
            },
            {
                "data": null,
                "render": function (_data, _type, row) {
                    return "<button type='button' data-id='" + row.id_user + "' class='btn btn-sm btn-danger btnDelete'><i class='fas a-solid fa-trash'></i></button> <button class='btn btn-sm btn-warning btnEdit' id='" + row.id_user + "'><i class='fas fa-regular fa-pen'></i></button>"
                }
                , "orderable": false
            } // Contoh tombol aksi
        ]
    });
    // $('#addBtn').on('click', function () {
    //     $('#modalAdd').modal('show')
    //     Swal.fire({
    //         title: "Are you sure?",
    //         text: "You won't be able to revert this!",
    //         icon: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor: "#d33",
    //         confirmButtonText: "Yes, delete it!"
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             Swal.fire({
    //                 title: "Deleted!",
    //                 text: "Your file has been deleted.",
    //                 icon: "success"
    //             });
    //         }
    //     });
    // })
});