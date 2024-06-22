$(document).ready(function () {
    // const datatablesSimple = document.getElementById('tablekategori');
    // new simpleDatatables.DataTable(datatablesSimple);
    $("#tableusers").dataTable({
        processing: true,
        paging: true,
        searching: true,
        responsive: true,
        language: {
            search: "cari",
        },
        ajax: {
            url: "/get-data-users",
            type: "GET",
        },
        columns: [
            {
                data: null,
                render: function (_data, _type, _row, meta) {
                    return meta.row + 1; // Nomor urut otomatis berdasarkan posisi baris
                },
            },
            { data: "name", orderable: true },
            { data: "email", orderable: true },
            {
                data: null,
                render: function (_data, _type, row) {
                    return (
                        "<button type='button' data-id='" +
                        row.id +
                        "' class='btn btn-sm btn-danger btnDelete'><i class='fas a-solid fa-trash'></i></button> <button class='btn btn-sm btn-warning btnEdit' data-id='" +
                        row.id +
                        "'><i class='fa-solid fa-pen-to-square'></i></button>"
                    );
                },
                orderable: false,
            }, // Contoh tombol aksi
        ],
    });

    function clearForm() {
        $("#modalAdd input").val("");
        $(".action").text("Save");
        $(".action").attr("id", "save");
        $("#modalTitleId").text("Form Add users");
        $('#password').attr('placeholder', 'Type password');
    }


    function clearErrorMsg() {
        $('#name').removeClass('is-invalid');
        $('#email').removeClass('is-invalid');
        $('#password').removeClass('is-invalid');
        $('#error_name').text('');
        $('#error_email').text('');
        $('#error_password').text('');
    }

    $("#addBtn").on("click", function () {
        $("#modalAdd").modal("show");
        if ($(".action").attr("id") == "update") {
            clearForm();
            clearErrorMsg();
        }
    });

    $(document).on("click", "#save", function () {
        var data = new FormData();
        data.append("name", $("#name").val());
        data.append("email", $("#email").val());
        data.append("password", $("#password").val());
        $.ajax({
            type: "POST",
            url: "/admin/users",
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.status === 200) {
                    clearErrorMsg();
                    clearForm();
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: response.message
                    });
                    $('#modalAdd').modal('hide');
                    reloadTable(tableusers);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    clearErrorMsg();
                    if (errors.name) {
                        $('#name').addClass('is-invalid');
                        $('#error_name').text(errors.name);
                    }
                    if (errors.email) {
                        $('#email').addClass('is-invalid');
                        $('#error_email').text(errors.email);
                    }
                    if (errors.password) {
                        $('#password').addClass('is-invalid');
                        $('#error_password').text(errors.password);
                    }
                }
            },
        });
    });

    $(document).on("click", ".btnEdit", function () {
        $(".action").text("Update");
        $('#password').attr('placeholder', 'fill in just if you wanna change');
        $(".action").attr("id", "update");
        $("#modalAdd").modal("show");
        $("#modalTitleId").text("Form Update users");
        clearErrorMsg();
        $.ajax({
            type: "GET",
            url: "/admin/users/" + $(this).data('id'),
            dataType: "json",
            success: function (response) {
                if (response.status === 200) {
                    console.log(response);
                    $('#id').val(response.data.id);
                    $('#name').val(response.data.name);
                    $('#email').val(response.data.email);
                }
            }
        });
    });

    $(document).on('click', '#update', function () {
        var data = new FormData();
        data.append('_method', 'PUT');
        data.append('name', $('#name').val());
        data.append('email', $('#email').val());
        if ($('#password').val().trim !== '') {
            data.append('password', $('#password').val());
        }

        $.ajax({
            type: "POST",
            url: "/admin/users/" + $('#id').val(),
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.status === 200) {
                    clearErrorMsg();
                    clearForm();
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: response.message
                    });
                    $('#modalAdd').modal('hide');
                    reloadTable(tableusers);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    clearErrorMsg();
                    if (errors.name) {
                        $('#name').addClass('is-invalid');
                        $('#error_name').text(errors.name);
                    }
                    if (errors.email) {
                        $('#email').addClass('is-invalid');
                        $('#error_email').text(errors.email);
                    }
                    if (errors.password) {
                        $('#password').addClass('is-invalid');
                        $('#error_password').text(errors.password);
                    }
                }
            },
        });
    });

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
                    url: "/admin/users/" + $(this).data('id'),
                    dataType: "json",
                    success: function (response) {
                        if (response.status === 200) {
                            reloadTable(tableusers);
                            Swal.fire({
                                title: "Deleted!",
                                text: response.message,
                                icon: "success"
                            });
                        }
                    },
                    error: function (errors) { console.log(errors) }
                });
            }
        });
    });
});
