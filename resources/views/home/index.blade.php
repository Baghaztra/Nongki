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
    <main>
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
            @for($i = 0; $i <= 15; $i++)
                <div class="corner">
                <h2 class="name">Pondok Aciak Jaya</h2>
                <p class="categories">
                    <span class="category">Cafe</span>, 
                    <span class="category"> Workspace</span>,
                    <span class="category"> Khodams</span>,
                    <span class="category"> Restaurant</span>
                </p>
                <div class="image">
                    <div class="left">
                        <div class="facilities">
                            <span class="facility">Wifi</span>, 
                            <span class="facility"> Electricity</span>,
                            <span class="facility"> AC</span>,
                            <span class="facility"> Toilet</span>
                        </div>
                        <div class="location">
                            <i class="fa-solid fa-earth"></i>
                            Pauh, Padang
                        </div>
                    </div>
                    <div class="right">
                        <button type="button">View</button>
                    </div>
                </div>
                <div class="description">
                    <div class="detail flex flex-row">
                        <div class="icons">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <div class="paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum dolorum neque repellat nam ab quas. <span class="read">Selengkapnya...</span></div>
                    </div>
                    <p class="status"><span class="icons"><i class="fa-solid fa-clock"></i></span> Tutup pukul 23.00</p>
                    <ul class="others">
                        <li class="other">Menu</li>
                        <li class="other">Service</li>
                        <li class="other">Contact</li>
                    </ul>
                </div>
            @endfor
            </div>
        </div>
    </main>

    @foreach ($corners as $item)
      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#details-modal"
        data-name="{{ $item->name }}" 
        data-location="{{ $item->location }}" 
        data-detail="{{ $item->detail }}"
        data-images="{{ $item->images }}"
        data-categories="{{ $item->categories }}"
        data-facilities="{{ $item->facilities }}">
        Detail
      </button>
    @endforeach

    <!-- Modal -->
    <div class="modal fade card" id="details-modal" tabindex="-1" aria-hidden="true">
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

  <script>
      document.addEventListener('DOMContentLoaded', (event) => {
          const detailModal = document.getElementById('details-modal');
          detailModal.addEventListener('show.bs.modal', (event) => {
              const button = event.relatedTarget;

              const cornerName = detailModal.querySelector('#corner-name');
              const detail = detailModal.querySelector('#detail');
              const categories = detailModal.querySelector('#categories');
              const facilities = detailModal.querySelector('#facilities');
              const images = detailModal.querySelector('#images');
              const images_indicator = detailModal.querySelector('#images-indicator');
              const location = detailModal.querySelector('#location');

              cornerName.innerHTML = button.getAttribute('data-name');
              detail.innerHTML = button.getAttribute('data-detail');
              location.setAttribute('href', button.getAttribute('data-location'));
              

              // Bikin gambar
              const objectGambar = JSON.parse(button.getAttribute('data-images'));
              
              images.innerHTML = '';
              images_indicator.innerHTML = '';

              objectGambar.forEach((item, index) => {
                  // console.log(item);
                  
                  const carouselItem = document.createElement('div');
                  carouselItem.classList.add('carousel-item');
                  if (index === 0) {
                      carouselItem.classList.add('active');
                  }

                  const img = document.createElement('img');
                  img.classList.add('d-block', 'w-100');
                  img.setAttribute('src', item.path);
                  img.setAttribute('alt', item.path);

                  carouselItem.appendChild(img);
                  images.appendChild(carouselItem);

                  const indicator = document.createElement('button');
                  indicator.type = 'button';
                  indicator.setAttribute('data-bs-target', '#slider');
                  indicator.setAttribute('data-bs-slide-to', index);
                  if (index === 0) {
                      indicator.classList.add('active');
                      indicator.setAttribute('aria-current', 'true');
                  }
                  indicator.setAttribute('aria-label', 'Slide ' + (index + 1));

                  images_indicator.appendChild(indicator);
              });

              // bikin kategori
              const objectKategori = JSON.parse(button.getAttribute('data-categories'));
              categories.innerHTML='';
              objectKategori.forEach(item => {
                // console.log(item);
                const list = document.createElement('li');
                list.innerHTML=item.name;
                categories.appendChild(list);
              });

              // bikin kategori
              const objectFasilitas = JSON.parse(button.getAttribute('data-facilities'));
              facilities.innerHTML='';
              objectFasilitas.forEach(item => {
                // console.log(item);
                const list = document.createElement('li');
                list.innerHTML=item.name;
                facilities.appendChild(list);
              });

              
              // harga.innerHTML= parseFloat(button.getAttribute('data-f')).toLocaleString('id-ID', {
              //     style: 'currency',
              //     currency: 'IDR',
              //     minimumFractionDigits: 2
              // });

          });
      });
  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>