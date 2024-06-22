<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nongki | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css">
  </head>
  <body>
    <header>
        <div class="container-flex brand">
            <div class="logo">
                <img src="/assets/img/logo.png" alt="">
            </div>
            <p class="title">Nongki</p>
        </div>
        <div class="dark-mode">

        </div>
        <nav class="container-flex navbar">
            <div class="nav-item flex">
                <button class="button">Sarankan tempat</button>
            </div>
        </nav>
    </header>
    <main class="shadow">
        <div class="top">
            <div class="search">
                <input type="search" id="search" placeholder="Temukan tempat nongki anda...">
                <i class="fa-solid fa-search"></i>
            </div>
            <div class="filters">
                <i class="fa-solid fa-filter"></i>
            </div>
        </div>
        <div class="corners">
            @foreach($corners as $item)
              <div class="corner shadow mb-2 mt-1" data-bs-toggle="modal" data-bs-target="#details-modal"
                  data-name="{{ $item->name }}" 
                  data-location="{{ $item->location }}" 
                  data-detail="{{ $item->detail }}"
                  data-images="{{ $item->images }}"
                  data-categories="{{ $item->categories }}"
                  data-facilities="{{ $item->facilities }}">
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
                              $cities = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Jeruk Manis'];
                              echo $cities[array_rand($cities)];
                            @endphp
                        </div>
                    </div>
                    {{-- <a href="{{ $item->location }}" class="right">
                        <button type="button">View</button>
                    </a> --}}
                </div>
                <div class="description">
                    <div class="detail flex flex-row">
                        <div class="icons">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <div class="paragraph">{{ substr($item->detail, 0, 100) }}{!! strlen($item->detail) > 100 ? '<span>...</span>' : '' !!} </div>
                    </div>
                    <p class="status"><span class="icons"><i class="fa-solid fa-clock"></i></span> Tutup pukul 23.00</p>
                    {{-- <ul class="others">
                        <li class="other">Menu</li>
                        <li class="other">Service</li>
                        <li class="other">Contact</li>
                    </ul> --}}
                </div>
              </div>
            @endforeach
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="details-modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg" >
          <div class="modal-content">
              <div class="modal-header">
                <strong class="modal-title fs-2"  id="corner-name"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div id="slider" class="carousel slide mb-3">
                  <div class="carousel-indicators" id="images-indicator"></div>
                  <div class="carousel-inner" id="images"></div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
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
                <a id="location" href="" target="_blank">Lihat lokasi</a>
              </div>
          </div>
      </div>
  </div>

  <script src="js/home.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>