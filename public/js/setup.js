$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function formatRupiah(number) {
    // Use Intl.NumberFormat to format the number as currency
    let formattedNumber = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(number);

    // Replace the default currency formatting with custom formatting
    return formattedNumber.replace(/,00/, ',-');
}

function calculateDenda(tglBatasPengembalian, tglDikembalikan, dendaPerHari) {
    // Convert date strings to Date objects
    const batasPengembalian = new Date(tglBatasPengembalian);
    const dikembalikan = new Date(tglDikembalikan);

    // Calculate the difference in time
    const timeDifference = dikembalikan - batasPengembalian;

    // Calculate the difference in days
    const daysLate = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

    // Calculate the fine
    const denda = daysLate > 0 ? daysLate * dendaPerHari : 0;

    return denda;
}

function getCurrentDate() {
    const today = new Date();
    const year = today.getFullYear();
    let month = today.getMonth() + 1; // Months are zero-based in JavaScript
    let day = today.getDate();
    if (month < 10) {
        month = '0' + month;
    }
    if (day < 10) {
        day = '0' + day;
    }
    const formattedDate = `${year}-${month}-${day}`;
    return formattedDate;
}

// memformat tanggal '2024-12-12' jadi 'sabtu, 12 Desember 2024'
function dateCutomFormat(date) {
    let days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    let months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    let dateFormat = new Date(date);
    return `${days[dateFormat.getDay()]}, ${dateFormat.getDate()} ${months[dateFormat.getMonth()]} ${dateFormat.getFullYear()}`;
}

function AjaxGetData(url, callback) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (response) {
            callback(response ?? null)
        },
        errors: function (xhr) {
            callback(xhr ?? null)
        }
    });
}

function reloadTable(id_table) {
    $(id_table).DataTable().ajax.reload();
}

function AjaxGetIncludeData(url, data, callback) {
    $.ajax({
        type: "GET",
        url: url,
        data: data,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) { callback(response) },
        error: function (xhr) { callback(xhr) }
    });
}

function AjaxPostIncludeData(url, data, callback) {
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) { callback(response) },
        error: function (xhr) { callback(xhr) }
    });
}

function AjaxGetIncludeSerialize(url, data, callback) {
    $.ajax({
        type: "GET",
        url: url,
        data: data,
        dataType: "json",
        success: function (response) { callback(response) },
        error: function (xhr) { callback(xhr) }
    });
}

function AjaxPostIncludeSerialize(url, data, callback) {
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        success: function (response) { callback(response) },
        error: function (xhr) { callback(xhr) }
    });
}

const timeElement = document.getElementById('time');
function getTime() {
    const time = new Date();
    const hours = time.getHours() < 10 ? ('0' + time.getHours()) : time.getHours()
    const minutes = time.getMinutes() < 10 ? ('0' + time.getMinutes()) : time.getMinutes()
    const second = time.getSeconds() < 10 ? ('0' + time.getSeconds()) : time.getSeconds()

    timeElement.innerHTML = `${hours} : ${minutes} : ${second}`;
}