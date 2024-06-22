$(document).ready(function () {
    // const datatablesSimple = document.getElementById('tablekategori');
    // new simpleDatatables.DataTable(datatablesSimple);
    $("#tableCorner").dataTable({
        processing: true,
        paging: true,
        searching: true,
        responsive: true,
        language: {
            search: "cari",
        },
        ajax: {
            url: "/get-data-corner",
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
                render: function (_row, _type, data) {
                    return data.categories.length == 0 ? '~' : data.categories.map(item => item.name).join(', ');
                },
                orderable: true
            },
            {
                data: null,
                render: function (_row, _type, data) {
                    return data.facilities.length == 0 ? '~' : data.facilities.map(item => item.name).join(', ');
                },
                orderable: true
            },
            {
                data: null,
                render: function (_row, _type, data) {
                    return `<a href="${data.location}" target="_blank">${data.location}</a>`;
                },
                orderable: false
            },
            {
                data: null,
                render: function (_data, _type, row) {
                    return (
                        "<button type='button' data-id='" +
                        row.id +
                        "' class='btn btn-sm btn-danger btnDelete'><i class='fas a-solid fa-trash'></i></button> <button class='btn btn-sm btn-warning btnEdit' data-id='" +
                        row.id +
                        "'><i class='fa-solid fa-pen-to-square'></i></i></button>"
                    );
                },
                orderable: false,
            }, // Contoh tombol aksi
        ],
    });

    function clearForm() {
        $("#detail").val("");
        $("#lokasi").val("");
        $("#name").val("");
        $("#modalAdd input[type='checkbox']").prop('checked', false);
        $(".action").text("Save");
        $(".action").attr("id", "save");
        $("#modalTitleId").text("Form Add facilities");
    }

    function clearErrorMsg() {
        $('#name').removeClass('is-invalid');
        $('#error_name').text('');
        $('#detail').removeClass('is-invalid');
        $('#error_detail').text('');
        $('#lokasi').removeClass('is-invalid');
        $('#error_lokasi').text('');
    }

    $("#addBtn").on("click", function () {
        $("#modalAdd").modal("show");
        if ($(".action").attr("id") == "update") {
            clearForm();
        }
    });

    $(document).on('click', '#save', function () {
        let checkboxCategories = document.querySelectorAll('input[data-id="categories"]:checked');
        let checkboxfacilities = document.querySelectorAll('input[data-id="facilities"]:checked');
        let categories = [];
        let facilities = [];

        if (checkboxfacilities.length > 0) {
            checkboxfacilities.forEach((checkbox) => {
                facilities.push(checkbox.value);
            });
        }
        if (checkboxCategories.length > 0) {
            checkboxCategories.forEach((checkbox) => {
                categories.push(checkbox.value);
            });
        }

        var data = new FormData();
        data.append('name', $('#name').val());
        data.append('categories', categories);
        data.append('facilities', facilities);
        data.append('location', $('#lokasi').val());
        data.append('detail', $('#detail').val());
        $.ajax({
            type: "POST",
            url: "/admin/corner",
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
                    reloadTable(tableCorner);
                    clearForm();
                    $('#modalAdd').modal('hide')
                }
            },
            error: function (errors) {
                if (errors.status === 422) {
                    console.log(errors.responseJSON.errors.name);
                    clearErrorMsg();
                    if (errors.responseJSON.errors.name) {
                        $('#name').addClass('is-invalid');
                        $('#error_name').text(errors.responseJSON.errors.name);
                    }
                    if (errors.responseJSON.errors.detail) {
                        $('#detail').addClass('is-invalid');
                        $('#error_detail').text(errors.responseJSON.errors.detail);
                    }
                    if (errors.responseJSON.errors.location) {
                        $('#lokasi').addClass('is-invalid');
                        $('#error_lokasi').text(errors.responseJSON.errors.location);
                    }
                }
            }
        });
    });

    // mengambil data sesuai id
    $(document).on("click", ".btnEdit", function () {
        clearErrorMsg();
        clearForm();
        $(".action").text("Update");
        $(".action").attr("id", "update");
        $("#modalAdd").modal("show");
        $("#modalTitleId").text("Form Update Corner");

        $.ajax({
            type: "GET",
            url: "/admin/corner/" + $(this).data('id'),
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status === 200) {
                    $('#name').val(response.data.name);
                    $('#lokasi').val(response.data.location);
                    $('#detail').val(response.data.detail);
                    $('#id').val(response.data.id);
                    $.each(response.data.facilities, function (indexInArray, valueOfElement) {
                        $("#modalAdd input[type='checkbox']input[id=f" + valueOfElement.id + "]").prop('checked', true);
                    });
                    $.each(response.data.categories, function (indexInArray, valueOfElement) {
                        $("#modalAdd input[type='checkbox']input[id=c" + valueOfElement.id + "]").prop('checked', true);
                    });
                }
            }
        });
    });

    // proses update data
    $(document).on('click', '#update', function () {
        let checkboxCategories = document.querySelectorAll('input[data-id="categories"]:checked');
        let checkboxfacilities = document.querySelectorAll('input[data-id="facilities"]:checked');
        let categories = [];
        let facilities = [];

        if (checkboxfacilities.length > 0) {
            checkboxfacilities.forEach((checkbox) => {
                facilities.push(checkbox.value);
            });
        }
        if (checkboxCategories.length > 0) {
            checkboxCategories.forEach((checkbox) => {
                categories.push(checkbox.value);
            });
        }
        console.log(categories)

        var data = new FormData();
        data.append('name', $('#name').val());
        data.append('_method', 'PUT')
        data.append('categories', categories);
        data.append('facilities', facilities);
        data.append('location', $('#lokasi').val());
        data.append('detail', $('#detail').val());
        $.ajax({
            type: "POST",
            url: "/admin/corner/" + $('#id').val(),
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status === 200) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: response.message
                    });
                    $('#modalAdd').modal('hide');
                    reloadTable(tableCorner);
                }
            },
            error: function (errors) {
                if (errors.status === 422) {
                    clearErrorMsg();
                    if (errors.responseJSON.errors.name) {
                        $('#name').addClass('is-invalid');
                        $('#error_name').text(errors.responseJSON.errors.name);
                    }
                    if (errors.responseJSON.errors.detail) {
                        $('#detail').addClass('is-invalid');
                        $('#error_detail').text(errors.responseJSON.errors.detail);
                    }
                    if (errors.responseJSON.errors.location) {
                        $('#lokasi').addClass('is-invalid');
                        $('#error_lokasi').text(errors.responseJSON.errors.location);
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
                    url: "/admin/corner/" + $(this).data('id'),
                    dataType: "json",
                    success: function (response) {
                        reloadTable(tableCorner);
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


    // input gambar
    // Fungsi untuk menampilkan pratinjau file yang dipilih
const previewFiles = (event) => {
    const newFiles = Array.from(event.target.files);
    currentFiles = currentFiles.concat(newFiles);
    updatePreview();
    updateFileInput(currentFiles);
};

// Fungsi untuk memperbarui pratinjau gambar atau video
const updatePreview = () => {
    const previewContainer = document.getElementById('preview-container');

    // Hapus pratinjau file yang baru ditambahkan saja (biarkan media yang ada tetap)
    previewContainer.querySelectorAll('[data-new]').forEach(el => el.remove());

    currentFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = () => {
            let mediaElement;
            const previewWrapper = document.createElement('div');
            previewWrapper.style.position = 'relative';
            previewWrapper.style.display = 'inline-block';
            previewWrapper.dataset.new = true; // Menandai sebagai media baru

            if (file.type.startsWith('image/')) {
                mediaElement = document.createElement('img');
                mediaElement.src = reader.result;
            } else if (file.type.startsWith('video/')) {
                mediaElement = document.createElement('video');
                mediaElement.src = reader.result;
                mediaElement.controls = true;
            }

            if (mediaElement) {
                mediaElement.classList.add('img-thumbnail');
                mediaElement.style.width = '300px';
                mediaElement.style.display = 'block';

                const removeButton = document.createElement('button');
                removeButton.innerHTML = '&#x2715;';
                removeButton.style.position = 'absolute';
                removeButton.style.top = '5px';
                removeButton.style.right = '5px';
                removeButton.style.backgroundColor = 'rgba(255, 255, 255, 0.8)';
                removeButton.style.border = 'none';
                removeButton.style.borderRadius = '50%';
                removeButton.style.cursor = 'pointer';
                removeButton.addEventListener('click', () => {
                    currentFiles = currentFiles.filter((_, i) => i !== index);
                    updatePreview();
                    updateFileInput(currentFiles);
                });

                previewWrapper.appendChild(mediaElement);
                previewWrapper.appendChild(removeButton);
                previewContainer.appendChild(previewWrapper);
            }
        }
        reader.readAsDataURL(file);
    });
};

// Fungsi untuk memperbarui input file dengan file yang sudah diupdate
const updateFileInput = (updatedFiles) => {
    const dataTransfer = new DataTransfer();
    updatedFiles.forEach(file => dataTransfer.items.add(file));
    document.getElementById('gambar').files = dataTransfer.files;
};

// Fungsi untuk menghapus media yang sudah ada
const removeExistingMedia = (id) => {
    const mediaElement = document.querySelector(`[data-media-id='${id}']`);
    if (mediaElement) {
        mediaElement.remove();
        // Lakukan penghapusan media di sisi server juga (implementasikan di backend)
        fetch(`/media/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  console.log('Media deleted successfully');
              } else {
                  console.error('Failed to delete media');
              }
          })
          .catch(error => console.error('Error:', error));
    }
};

});

