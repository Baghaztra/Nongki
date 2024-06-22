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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>