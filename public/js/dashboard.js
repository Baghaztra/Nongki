$(document).ready(function () {
    // const datatablesSimple = document.getElementById('tablekategori');
    // new simpleDatatables.DataTable(datatablesSimple);
    $('#tableRecomendation').dataTable({
        "processing": true,
        "paging": true,
        "searching": true,
        "responsive": true,
        "language": {
            "search": "cari"
        },
        "ajax": {
            "url": "/get-data-recomendation",
            "type": "GET"
        },
        "columns": [
            {
                "data": null,
                "render": function (_data, _type, _row, meta) {
                    return meta.row + 1; // Nomor urut otomatis berdasarkan posisi baris
                }
            },
            { "data": "name", "orderable": true },
            { "data": "email", "orderable": true },
            { "data": "title", "orderable": true },
            { "data": "detail", "orderable": true },
            {
                "data": null,
                render: function (_row, _type, item) {
                    return `<a href="${item.location}" target="_blank">${item.location}</a>`;
                }
                , "orderable": true
            },
            {
                "data": null,
                "render": function (_data, _type, row) {
                    return "<button type='button' data-id='" + row.id + "' class='btn btn-sm btn-success btnSetujui'><i class='fa-regular fa-circle-check'></i></i></button>"
                }
                , "orderable": false
            } // Contoh tombol aksi
        ]
    });

    // click edit btn
    $(document).on('click', '.btnSetujui', function () {
        $.ajax({
            type: "PUT",
            url: "/admin/dashboard/" + $(this).data('id'),
            dataType: "json",
            success: function (response) {
                if (response.status === 200) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: response.message
                    });
                    reloadTable(tableRecomendation);
                }
            }
        });
    });
});