<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nongki | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home1.css">
</head>

<body>
    <div class="sticky-top">
        <header class="py-3 mb-4 border-bottom">
            <div class="container d-flex flex-wrap justify-content-center">
                <a href="/"
                    class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                    <img class="bi me-2" width="40" height="32"></img>
                    <span class="fs-4">Nongki</span>
                </a>

                <form method="GET" action="/home" class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
                    <input type="search" class="form-control" name="q"
                        placeholder="Temukan tempat nongki anda..." aria-label="Search">
                    <div class="row">
                        <div class="col-6 categories">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $item)
                                <li style="display: flex;"><input type="checkbox" name="categories[]" value="{{ $item->id }}" class="mx-2">
                                    <label class="dropdown-item">{{ $item->name }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-6 facilities">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Facilities
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($facilities as $item)
                                <li style="display: flex;"><input type="checkbox" name="facilities[]" value="{{ $item->id }}" class="mx-2">
                                    <label class="dropdown-item">{{ $item->name }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary mt-3">Cari</button> --}}
                </form>
                
            </div>
        </header>

    </div>
    <div class="container d-flex justify-content-center">

        <main class="shadow">
            <div class="">
                @foreach ($corners as $item)
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
                                    <span class="facility">{{ $item->facilities->pluck('name')->implode(' | ') }}</span>
                                </div>
                                <div class="location" target="_balnk">
                                    <i class="fa-solid fa-earth"></i>
                                    @php
                                        $cities = [
                                            'Padang',
                                        ];
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
                                <div class="paragraph">{{ substr($item->detail, 0, 100) }}{!! strlen($item->detail) > 100 ? '<span>...</span>' : '' !!} </div>
                            </div>
                            <p class="status"><span class="icons"><i class="fa-solid fa-clock"></i></span> Tutup pukul
                                {{ $item->jam_tutup }}</p>
                            <p class="harga"><span class="icons"><i class="fa-solid fa-hand-holding-dollar"></i></span> Rentang harga
                                Rp{{ number_format($item->harga_min, 0, ',', '.') }} -
                                Rp{{ number_format($item->harga_max, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="details-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
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
    </div>

    <script src="js/home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
