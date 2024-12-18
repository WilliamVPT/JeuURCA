<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      Jeux de l'URCA
    </title>
    <meta name="description" content="Simple landind page" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
      .gradient {

    
        background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
      }


    </style>
        <link rel="icon" type="image/png" href="{{ asset('image/jeuxdelurcaclr-sbg.png') }}" />

  </head>
  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <!--Icon from: http://www.potlabicons.com/ -->
            <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
             <!-- <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />-->
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
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    <!--Hero-->
    <div class="pt-24">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full  justify-center items-start text-center md:text-left">
          <p class="uppercase tracking-loose w-full">L’année 2024 étant une année charnière pour le sport en France avec les Jeux Olympiques de Paris 2024, l’URCA souhaitait lier cet événement d’ampleur mondiale avec son travail et sa politique sportive des dernières années.</br></br>

            L’URCA vous présente ses Jeux Universitaire (JU). Pendant deux semaines du 12 au 22 février 2024, les étudiants s’affronteront par équipe et par composante dans plusieurs sports olympiques : Handball, Rugby, Foot (Futsal), Badminton, Volley et Basketball. La cérémonie d’ouverture aura lieu le jeudi 8 février.</p>
          <h1 class="my-4 text-5xl font-bold leading-tight">
          Les objectifs
          </h1>
          <p class="leading-normal text-2xl mb-8">
          L’objectif des Jeux de l’URCA est de faire vivre à la communauté universitaire de Reims un moment phare de la culture et des valeurs que représentent les Jeux Olympiques. Des valeurs sportives de dépassement de soi, de respect de l’adversaire, de combativité etc., ainsi que d’autres valeurs très nobles de convivialité, de fraternité, de résilience ou encore de fair-play.</br></br>

          C’est l’occasion pour les athlètes de participer activement à la vie sportive de l’établissement, de participer à une compétition, de comprendre et résoudre les problématiques de mixités et de gérer les notions d’échecs et de réussites.</br></br>

          C’est aussi une importante opportunité pour l’ensemble des différents acteurs de l’établissement de travailler sur un projet commun pour offrir aux étudiants un événement de cette ampleur.          </p>
          <h1 class="my-4 text-5xl font-bold leading-tight">
          Événements principaux
          </h1>
          <p class="leading-normal text-2xl mb-8">
          <b>Cérémonie d’ouverture.</b></br>
          Elle a lieu le jeudi 8 février de 18h à 22h à la Halle des sports de Croix Rouge. Défilé des équipes, la présentation de la flamme, spectacles, set DJ et cocktail sont au programme.</br>
          <a href="https://www.univ-reims.fr/minisite_224/programme/ceremonie-d-ouverture/ceremonie-d-ouverture,27198,44456.html"><u>Plus d'infos.</u></a></br></br>

          <b>Jeux et épreuves sportives.</b></br>
          Du lundi au jeudi les semaines 7 et 8 (12 au 15 et du 19 au 22) au travers de plusieurs sports olympiques et « fun ». Parmi les sports, on retrouvera notamment du basket, du volley ou encore du badminton. Plus d’informations sur la première <a href="https://www.univ-reims.fr/minisite_224/programme/semaine-1/semaine-1-des-jeux,27237,44484.html"><u>semaine ici</u></a> et la <a href="https://www.univ-reims.fr/minisite_224/programme/semaine-2/semaine-2-des-jeux,27199,44457.html"><u>seconde ici.</u></a></br></br>

          <b>Cérémonie de clôture.</b></br>
          Lors de la cérémonie de clôture aura lieu la remise des récompenses de promotion, ainsi que l’événement organisé par la DREDI « Culture en fête », qui terminera ces deux semaines de sport. Un set DJ sera aussi prévu ainsi que d’autres surprises pour cette clôture.</br>
          <a href="https://www.univ-reims.fr/minisite_224/programme/ceremonie-de-cloture-culture-en-fete/ceremonie-de-cloture-culture-en-fete,27238,44485.html"><u>Plus d'infos.</u></a></br></br>
          </p>

          <p>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>


          </p>
        </div>
        <!--Right Col-->
        
      </div>
    </div>
    <div class="relative -mt-12 lg:-mt-24">
      <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
          </g>
          <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            ></path>
          </g>
        </g>
      </svg>
    </div>
    
        
    <script>
      var scrollpos = window.scrollY;
      var header = document.getElementById("header");
      var navcontent = document.getElementById("nav-content");
      var navaction = document.getElementById("navAction");
      var brandname = document.getElementById("brandname");
      var toToggle = document.querySelectorAll(".toggleColour");

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
      });
    </script>
    <script>
      /*Toggle dropdown list*/
      /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

      var navMenuDiv = document.getElementById("nav-content");
      var navMenu = document.getElementById("nav-toggle");

      document.onclick = check;
      function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
          // click NOT on the menu
          if (checkParent(target, navMenu)) {
            // click on the link
            if (navMenuDiv.classList.contains("hidden")) {
              navMenuDiv.classList.remove("hidden");
            } else {
              navMenuDiv.classList.add("hidden");
            }
          } else {
            // click both outside link and outside menu, hide menu
            navMenuDiv.classList.add("hidden");
          }
        }
      }
      function checkParent(t, elm) {
        while (t.parentNode) {
          if (t == elm) {
            return true;
          }
          t = t.parentNode;
        }
        return false;
      }
    </script>
  </body>
</html>
