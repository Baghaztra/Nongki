$(document).ready(function () {
    // const datatablesSimple = document.getElementById('tablekategori');
    // new simpleDatatables.DataTable(datatablesSimple);
    $("#tablefasility").dataTable({
        processing: true,
        paging: true,
        searching: true,
        responsive: true,
        language: {
            search: "cari",
        },
        ajax: {
            url: "/get-data-facilities",
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
            {
                data: null,
                render: function (_data, _type, row) {
                    return (
                        "<button type='button' data-id='" +
                        row.id +
                        "' class='btn btn-sm btn-danger btnDelete'><i class='fas a-solid fa-trash'></i></button> <button class='btn btn-sm btn-warning btnEdit' data-id='" +
                        row.id +
                        "'><i class='fas fa-regular fa-pen'></i></button>"
                    );
                },
                orderable: false,
            }, // Contoh tombol aksi
        ],
    });

    function clearForm() {
        $("#name").val("");
        $(".action").text("Save");
        $(".action").attr("id", "save");
        $("#modalTitleId").text("Form Add facilities");
    }

    $("#addBtn").on("click", function () {
        $("#modalAdd").modal("show");
        if ($(".action").attr("id") == "update") {
            clearForm();
        }
    });

    $("#save").on("click", function () {
        var data = new FormData();
        data.append("name", $("#name").val());

        $.ajax({
            type: "POST",
            url: "/admin/facilities",
            data: data,
            processData: false,
            dataType: "json",
            success: function (response) {
                console.log(response);
            },
            error: function (errors) {
                console.log(errors);
            },
        });
    });

    $(document).on("click", ".btnEdit", function () {
        $(".action").text("Update");
        $(".action").attr("id", "update");
        $("#modalAdd").modal("show");
        $("#modalTitleId").text("Form Update facilities");

        $.ajax({
            type: "GET",
            url: "/admin/facilities/" + $(this).data('id'),
            dataType: "json",
            success: function (response) {
                if(response.status === 200){
                    $('#name').val(response.data.name);
                }
            }
        });
    });
});
