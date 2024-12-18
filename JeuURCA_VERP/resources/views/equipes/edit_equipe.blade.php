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
    </div>
  </nav>
  <div class="relative -mt-12 lg:-mt-24">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <!-- Dessin du fond -->
    </svg>
  </div>

  <script>
    // Script pour le défilement et le menu
  </script>
</body>

</html>
