<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nongki | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home1.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>

<body>
    <div class="sticky-top">
        <header class="py-3 mb-4 border-bottom">
            <div class="container d-flex flex-wrap justify-content-center">
                <a href="/"
                    class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                    <img class="bi me-2" src="/assets/img/logo_nongki.png" style="object-fit: cover" width="40"
                        height="40"></img>
                    <span class="fs-4">Nongki</span>
                </a>

                {{-- <div class="d-flex justify-content-between" style="width: 560px; height: 40px"> --}}
                <form method="GET" action="/home" class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" name="q" value="{{ request('q') }}"
                            placeholder="Cari tempat nongkrong">
                        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">
                            Categories
                        </button>
                        {{-- @dd(old('categories')) --}}
                        <ul class="dropdown-menu">
                            @foreach ($categories as $item)
                                <li style="display: flex;">
                                    <?php
                                    $categories = [];
                                    if (request('categories')) {
                                        $categories = request('categories');
                                    }
                                    ?>
                                    <input type="checkbox" name="categories[]" value="{{ $item->id }}"
                                        id="c{{ $item->id }}" class="mx-2"
                                        {{ in_array($item->id, $categories) ? 'checked' : '' }}>
                                    <label class="dropdown-item" for="c{{ $item->id }}">{{ $item->name }}</label>
                                </li>
                            @endforeach
                        </ul>
                        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">
                            Facilities
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($facilities as $item)
                                <?php
                                $facility = [];
                                if (request('facilities')) {
                                    $facility = request('facilities');
                                }
                                ?>
                                <li style="display: flex;"><input type="checkbox" id="f{{ $item->id }}"
                                        name="facilities[]" value="{{ $item->id }}" class="mx-2"
                                        {{ in_array($item->id, $facility) ? 'checked' : '' }}>
                                    <label class="dropdown-item"
                                        for="f{{ $item->id }}">{{ $item->name }}</label>
                                </li>
                            @endforeach
                        </ul>
                        <button class="btn btn-warning" type="submit">Search</button>
                    </div>
                </form>
                {{-- </div> --}}
            </div>
        </header>

    </div>
    <div class="container d-flex justify-content-center">
        <main class="shadow p-3">
            <button type="button" class="btn btn-sm btn-warning floating" id="btnRekomendasi"><i
                    class="fa-solid fa-lightbulb"></i></button>
            <div class="">
                @foreach ($corners as $item)
                {{-- @dd($item) --}}
                    <div class="corner shadow mb-2 mt-1" data-bs-toggle="modal" data-bs-target="#details-modal"
                        data-name="{{ $item->name }}" data-location="{{ $item->location }}"
                        data-detail="{{ $item->detail }}" data-images="{{ $item->images }}"
                        data-categories="{{ $item->categories }}" data-facilities="{{ $item->facilities }}"
                        data-harga-min="{{ $item->harga_min }}" data-harga-max="{{ $item->harga_max }}"
                        data-jam-buka="{{ $item->jam_buka }}" data-jam-tutup="{{ $item->jam_tutup }}"
                        data-buka="{{ json_encode($item->hari_buka) }}">
                        <h2 class="name">{{ $item->name }}</h2>
                        <p class="categories">
                            <i class="category">{{ $item->categories->pluck('name')->implode(', ') }}</i>
                        </p>
                        <div class="image" data-image="{{ $item->images[0]->path }}">
                            <div class="left">
                                <div class="facilities">
                                    <span
                                        class="facility">{{ $item->facilities->pluck('name')->implode(' | ') }}</span>
                                </div>
                                <div class="location" target="_balnk">
                                    <i class="fa-solid fa-earth"></i>
                                    @php
                                        $cities = ['Padang'];
                                        echo $cities[array_rand($cities)];
                                    @endphp
                                </div>
                            </div>
                        </div>
                        <div class="description">
                            <div class="detail flex flex-row">
                                <div class="icons">
                                    <i class="fa-solid fa-circle-info"></i>
                                </div>
                                <div class="paragraph">{{ substr($item->detail, 0, 100) }}{!! strlen($item->detail) > 100 ? '<span>...</span>' : '' !!}
                                </div>
                            </div>
                            <p class="status"><span class="icons"><i class="fa-solid fa-clock"></i></span> Tutup
                                pukul
                                {{ $item->jam_tutup }}</p>
                            <p class="harga"><span class="icons"><i
                                        class="fa-solid fa-hand-holding-dollar"></i></span> Rentang harga
                                Rp{{ number_format($item->harga_min, 0, ',', '.') }} -
                                Rp{{ number_format($item->harga_max, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $corners->links() }}
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="details-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title fs-2" id="corner-name"></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="slider" class="carousel slide mb-3">
                        <div class="carousel-indicators" id="images-indicator"></div>
                        <div class="carousel-inner" id="images"></div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#slider"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#slider"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div id="detail" class="mb-3"></div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Categories</strong>
                            <ul id="categories" class="list-unstyled text-small"></ul>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Facilities</strong>
                            <ul id="facilities" class="list-unstyled text-small"></ul>
                        </div>
                    </div>
                    <strong>Jadwal</strong>
                    <div id="hari" class="mb-3"></div>
                    <div id="jam-buka-tutup" class="mb-3"></div>

                    <strong>Rentang harga</strong>
                    <div id="harga" class="mb-3"></div>
                    <a id="location" href="" target="_blank">Lihat lokasi</a>
                </div>
            </div>
        </div>

        <!-- Optional: Place to the bottom of scripts -->
        <script>
            const myModal = new bootstrap.Modal(
                document.getElementById("modalId"),
                options,
            );
        </script>
    </div>

    {{-- modal rekomendasi --}}
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalRekomendasi" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Beri rekomendasi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama kamu</label>
                        <input type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="masukkan nama kamu" />
                        <span id="error_name" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email kamu</label>
                        <input type="text" class="form-control" name="email" id="email"
                            aria-describedby="helpId" placeholder="masukkan email kamu" />
                        <span id="error_email" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Rekomendasi</label>
                        <input type="text" class="form-control" name="judul" id="judul"
                            aria-describedby="helpId" placeholder="masukkan nama tempat atau apa yang disarankan" />
                        <span id="error_judul" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">URL Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi"
                            aria-describedby="helpId" placeholder="masukkan url lokasi" />
                        <span id="error_lokasi" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Detail tempat</label>
                        <textarea class="form-control" name="details" id="details" placeholder="jelaskan tentang tempat" cols="10"></textarea>
                        <span id="error_detail" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" id="send">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnRekomendasi').click(function() {
                $('#modalRekomendasi').modal('show');
            });

            function clearErrorMsg() {
                $('#name').removeClass('is-invalid');
                $('#email').removeClass('is-invalid');
                $('#judul').removeClass('is-invalid');
                $('#details').removeClass('is-invalid');
                $('#lokasi').removeClass('is-invalid');
                $('#error_name').text('');
                $('#error_email').text('');
                $('#error_judul').text('');
                $('#error_detail').text('');
                $('#error_lokasi').text('');
            }

            $('#send').on('click', function() {
                var data = new FormData();
                data.append('name', $('#name').val());
                data.append('email', $('#email').val());
                data.append('judul', $('#judul').val());
                data.append('lokasi', $('#lokasi').val());
                data.append('detail', $('#details').val());

                $.ajax({
                    type: "POST",
                    url: "/send-rekomendasi",
                    data: data,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 200) {
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil memberikan rekomendasi.",
                                text: response.message
                            });
                            clearErrorMsg();
                            $('#modalRekomendasi input').val('');
                            $('#modalRekomendasi').modal('hide');
                        }
                    },
                    error: function(xhr) {
                        // console.log(xhr);
                        if (xhr.status === 422) {
                            clearErrorMsg();
                            const errors = xhr.responseJSON.errors;
                            if (errors.name) {
                                $('#name').addClass('is-invalid');
                                $('#error_name').text(errors.name);
                            }
                            if (errors.email) {
                                $('#email').addClass('is-invalid');
                                $('#error_email').text(errors.email);
                            }
                            if (errors.judul) {
                                $('#judul').addClass('is-invalid');
                                $('#error_judul').text(errors.judul);
                            }
                            if (errors.detail) {
                                $('#details').addClass('is-invalid');
                                $('#error_detail').text(errors.detail);
                            }
                            if (errors.lokasi) {
                                $('#lokasi').addClass('is-invalid');
                                $('#error_lokasi').text(errors.lokasi);
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
