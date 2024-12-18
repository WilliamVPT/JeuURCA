<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Jeux de l'URCA</title>
  <meta name="description" content="Simple landind page" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iK7tWnelF/CNOOhKg1LQ6tTAgHhAmp0eg5f5q13tWWgouGcdLEF4MViF" crossorigin="anonymous">

  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <!--Replace with your tailwind.css once created-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
  <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
  @vite(['resources/js/app.css', 'resources/js/app.js'])

  <style>
    .gradient {
      background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
    }

    body {
      font-family: 'Source Sans Pro', sans-serif;
    }


  </style>
      <link rel="icon" type="image/png" href="{{ asset('image/jeuxdelurcaclr-sbg.png') }}" />

</head>

<body class="leading-normal tracking-normal text-white gradient">
  <!--Nav-->
  <nav id="header" class="fixed w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
      <div class="pl-4 flex items-center">
        <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="{{ route('welcome') }}">
          <!--Icon from: http://www.potlabicons.com/ -->
          <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
            <image href="{{ asset('image/jeuxdelurcaclr-sbg.png') }}" height="100%" width="100%" />
          </svg>
          Jeux de l'URCA
        </a>
      </div>
      <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('menu_epreuves') }}">Épreuves</a>
            </li>
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="{{ route('menu_equipes') }}">Équipes</a>
            </li>
            @auth
            <li class="mr-3">
            

         <form method="POST" action="{{ route('logout') }}">
           @csrf
          <button type="submit" class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4">Déconnexion</button>
          </form>
            </li>
            @endauth
          </ul>
          @if (Auth::check())
            <button 
              id="navAction"
              class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                >
                <p>Connecté</p>
            </button>
          @else
            <button 
                id="navAction"
                class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
            >
                <a href="{{ route('login') }}">Se connecter</a>
            </button>
          @endif
        </div>
    </div>
  </nav>
  <div class="relative -mt-12 lg:-mt-24">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <!-- Dessin du fond -->
    </svg>
  </div>

  <section class="background">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $equipe->name }}</h2>
          <p class="font-light text-white-500 lg:mb-16 sm:text-xl dark:text-white-400">Voici les membres de {{ $equipe->name }}</p>
          @can('create')
          <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
          <a href="{{ route('membre_create' , ['id_equipe' => $equipe->id]) }}" class="btn btn-sm btn-primary mb-2 mr-2">
      Création d'un nouveau membre
    </a>  
  </button>  
  @endcan
        </div> 

        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-3">

    @foreach($member as $membre)
        <li class="list-group-item d-flex align-items-center list-none	">
        

<div class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12  bg-white dark:bg-gray-800">
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
        <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$membre->name }}</h3>
            <p class="my-4">{{$membre->prenom }}</p>
        </blockquote>
        <figcaption class="flex items-center justify-center ">
        @if($membre->handicap == 1)
         <i class="bi bi-person-wheelchair"></i>
        @endif
              <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                <div>{{$membre->composante }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 ">{{$membre->genre }}</div>
            </div>
        </figcaption>    
    </figure>
</div>

          <div class="col text-end">
            @can('edit')
            <a href="" class="btn btn-sm btn-primary mb-1">
              
            </a>
            @endcan
            @can('delete')
            <button type="submit" formaction="" form="deleteForm" class="btn btn-sm btn-danger mb-1">
              <i class="bi bi-trash"></i>
            </button>
            @endcan
          </div>
        </li>
        @endforeach
      </div> 
  </div>
  </section>

  <script>

document.addEventListener("scroll", function () {
    /*Apply classes for slide in bar*/
    scrollpos = window.scrollY;

    if (scrollpos > 10) {
        header.classList.add("bg-white");
        navaction.classList.remove("bg-white");
        navaction.classList.add("gradient");
        navaction.classList.remove("text-gray-800");
        navaction.classList.add("text-white");
        //Use to switch toggleColour colours
        for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-gray-800");
            toToggle[i].classList.remove("text-white");
        }
        header.classList.add("shadow");
        navcontent.classList.remove("bg-gray-100");
        navcontent.classList.add("bg-white");
    } else {
        header.classList.remove("bg-white");
        navaction.classList.remove("gradient");
        navaction.classList.add("bg-white");
        navaction.classList.remove("text-white");
        navaction.classList.add("text-gray-800");
        //Use to switch toggleColour colours
        for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-white");
            toToggle[i].classList.remove("text-gray-800");
        }

        header.classList.remove("shadow");
        navcontent.classList.remove("bg-white");
        navcontent.classList.add("bg-gray-100");
    }
});  </script>
</body>

</html>
