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
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <!--Replace with your tailwind.css once created-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
  <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


  <style>
    .gradient {
      background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
    }

    body {
      font-family: 'Source Sans Pro', sans-serif;
    }

    table, th, td {
            background-color: #ffffff; /* Fond blanc pour le corps de la page */
            border: 1px solid black; /* Bordure des cellules */
        }

        td {
            padding: 10px; /* Espacement intérieur des cellules */
            text-align: center; /* Centre le texte dans les cellules */
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
              <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="{{ route('menu_epreuves') }}">Épreuves</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('menu_equipes') }}">Équipes</a>
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

  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">

  <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16  ">
    @can('create')
  <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded my-6 mx-6">
          <a href="{{ route('poule_create' , ['id_epreuve' => $epreuve->id]) }}" class="btn btn-sm btn-primary mb-2 mr-2">
      Création d'une poule
    </a>  
  </button> 
  @endcan
  <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-3">

  @foreach($poule as $pl)


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ $pl->name}}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $pl->equipe1 }}
                </th>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $pl->equipe2 }}
                </th>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $pl->equipe3 }}
                </th>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $pl->equipe4 }}
                </th>
            </tr>
        </tbody>
    </table>
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

@endforeach
      </div>
      </div>

      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16  ">
        @can('create')
  <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded my-6 mx-6">
        <a href="{{ route('classement_create' , ['id_epreuve' => $epreuve->id]) }}" class="btn btn-sm btn-primary mb-2 mr-2">
      Ajout dans le classement
    </a>
  </button> 
  @endcan
 
  <div class="flex gap-8 mb-6 lg:mb-16">

<!-- Deuxième Tableau (Prend toute la largeur disponible) -->
<div class="flex-1 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="tablePodium" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mx-auto shadow-xl rounded-lg sortable-table">
        <!-- ... (contenu de votre deuxième tableau) ... -->
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="sortable" data-sort="points">Points</th>
                <th class="sortable" data-sort="medaille">Médailles</th>
                <th>Noms d'Équipes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classement as $clas)
            <!-- Première ligne -->
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="points-column">{{ $clas->points }}</td>
                <td class="medals-column">{{ $clas->medaille }}</td>
                <td class="team-column">
                    <p id="colonne1">{{ $clas->equipe }}</p>
                </td>
            </tr>
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
            @endforeach
        </tbody>
    </table>
</div>
</div>








  </div>

<script>
 
 $(document).ready(function () {
        $('.sortable-table').DataTable();
    });



$(document).ready(function () {
    $('.form-update').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var action = form.data('action');
        var formData = new FormData(form[0]);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        // Ajout de la colonne à la requête AJAX
        var colonne = form.find('input[name="colonne"]').val();
        formData.append('colonne', colonne);

        $.ajax({
            url: action,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Mettez à jour les données de la table ici
                console.log(response);
                
                // Supposons que vous recevez les nouvelles données depuis la réponse
                var nouvellesDonnees = response.nouvellesDonnees;

                // Mise à jour de la colonne respective
                form.closest('tr').find('.' + colonne + '-column').text(nouvellesDonnees);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});



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
