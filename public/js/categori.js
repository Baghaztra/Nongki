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
            "url": "/get-data-categories",
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
            {
                "data": null,
                "render": function (_data, _type, row) {
                    return "<button type='button' data-id='" + row.id + "' class='btn btn-sm btn-danger btnDelete'><i class='fas a-solid fa-trash'></i></button> <button class='btn btn-sm btn-warning btnEdit' data-id='" + row.id + "'><i class='fas fa-regular fa-pen'></i></button>"
                }
                , "orderable": false
            } // Contoh tombol aksi
        ]
    });

    function clearForm() {
        $('.action').text('Save');
        $('.action').attr('id', 'save');
        $('#name').val('');
    }

    $('#addBtn').on('click', function () {
        $('#modalAdd').modal('show');
        if ($('.action').attr('id') == 'update') {
            clearForm();
        }
    });

    $(document).on('click', '.btnEdit', function () {
        $('.action').attr('id', 'update');
        $('.action').text('Update');
        $('#modalAdd').modal('show');
    });

    $(document).on('click', '#save', function () {
        // console.log('save');
        var data = new FormData();
        data.append('name', $('#name').val());
        $.ajax({
            type: "POST",
            url: "/admin/categories",
            data: data,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status === 200) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: response.message
                    });
                    reloadTable(tablekategori);
                    clearForm();
                    $('#modalAdd').modal('hide')
                }
            },
            error: function (errors) {
                console.log(errors)
            }
        });
    });

    $(document).on('click', '#update', function () {
        console.log('update');
    });
});