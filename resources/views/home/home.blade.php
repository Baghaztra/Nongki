<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>
</head>
<body>
    <header>
        <div>
            <div class="logo">
                <img src="\assets\img\logo.png" alt="">
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="search">
                <input type="search">
                <svg xmlns="http://www.w3.org/2000/svg" class="search-icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>

            <div class="container">
                @foreach ($corners as $corner)
                    <div class="corner">
                        <h1 class="text-lg">{{ $corner->name }}</h1>
                        <p class="category">{{ $corner->categories}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>
