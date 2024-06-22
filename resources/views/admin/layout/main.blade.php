<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Simarasok</title>

    <link rel="shortcut icon" type="image/png" href="/media/frontend/icons/favicon.png" />
    <link rel="stylesheet" href="/assets/css/styles.min.css" />

    <style>
        /* Pindahkan aturan CSS yang telah ada ke sini */
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        /* Tambahkan aturan CSS untuk layout */
        .body-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container-fluid {
            display: flex;
            flex: 1;
        }

        .row {
            flex: 1;
        }

        .sidebar {
            width: 200px;
            /* Atur lebar sidebar */
            background-color: #f8f9fa;
            /* Sesuaikan sesuai kebutuhan */
        }

        main {
            flex: 1;
            padding: 20px;
            /* Sesuaikan sesuai kebutuhan */
        }
    </style>
    {{-- Bootstrap CSS --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Text editor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('admin.layout.sidebar')
        <div class="body-wrapper">
            @include('admin.layout.header')
            <div class="container-fluid">
                <div class="row">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script>
        feather.replace({
            'aria-hidden': 'true'
        })
    </script>

    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/sidebarmenu.js"></script>
    <script src="/assets/js/app.min.js"></script>
    <script src="/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="/assets/js/dashboard.js"></script>
</body>
</html>
