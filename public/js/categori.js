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

    function clearErrorMsg() {
        $('#name').removeClass('is-invalid');
        $('#error_name').text('');
    }

    $('#addBtn').on('click', function () {
        $('#modalAdd').modal('show');
        if ($('.action').attr('id') == 'update') {
            clearForm();
            clearErrorMsg();
        }
    });

    // click edit btn
    $(document).on('click', '.btnEdit', function () {
        $('.action').attr('id', 'update');
        $('.action').text('Update');
        $('#modalAdd').modal('show');
        clearErrorMsg();

        $.ajax({
            type: "GET",
            url: "/admin/categories/" + $(this).data('id'),
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    $('#name').val(response.data.name);
                    $('#id').val(response.data.id);
                }
            }
        });
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
                if (errors.status === 422) {
                    // console.log(errors);
                    clearErrorMsg();
                    if (errors.responseJSON.errors.name) {
                        $('#name').addClass('is-invalid');
                        $('#error_name').text(errors.responseJSON.errors.name);
                    }
                }
            }
        });
    });

    // menangani proses update data
    $(document).on('click', '#update', function () {
        var data = new FormData();
        data.append('_method', 'PUT');
        data.append('name', $('#name').val());
        $.ajax({
            type: "POST",
            url: "/admin/categories/" + $('#id').val(),
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.message
                });
                $('#modalAdd').modal('hide');
                reloadTable(tablekategori);
            },
            error: function (errors) {
                if (errors.status === 422) {
                    clearErrorMsg();
                    if (errors.responseJSON.errors.name) {
                        $('#name').addClass('is-invalid');
                        $('#error_name').text(errors.responseJSON.errors.name);
                    }
                }
            }
        });
    });

    // menangani proses delete data
    $(document).on('click', '.btnDelete', function () {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "/admin/categories/" + $(this).data('id'),
                    dataType: "json",
                    success: function (response) {
                        reloadTable(tablekategori);
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message,
                            icon: "success"
                        });
                    },
                    error: function (errors) { console.log(errors) }
                });
            }
        });
    })

});