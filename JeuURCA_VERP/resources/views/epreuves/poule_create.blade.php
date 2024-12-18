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

@extends('template')
@section('title') Création d'une poule @endsection
@section('content')
@if($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<form enctype="multipart/form-data" action="{{route('poule_fin_create', $epreuve->id)}}" method="post">
@csrf
    <input type="hidden" name="epreuve_id" id="epreuve_id" value="{{ $epreuve->id }}">

  <div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Nom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Saisir le nom" value="{{ old('name') }}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="equipe1" class="col-sm-2 col-form-label">Equipe 1</label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('equipe1') is-invalid @enderror" name="equipe1" id="equipe1" placeholder="Saisir le nom de l'équipe 1" value="{{ old('equipe1') }}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="equipe2" class="col-sm-2 col-form-label">Equipe 2</label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('equipe2') is-invalid @enderror" name="equipe2" id="equipe2" placeholder="Saisir le nom de l'équipe 2" value="{{ old('equipe2') }}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="equipe3" class="col-sm-2 col-form-label">Equipe 3</label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('equipe3') is-invalid @enderror" name="equipe3" id="equipe3" placeholder="Saisir le nom de l'équipe 3" value="{{ old('equipe3') }}"/>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="equipe4" class="col-sm-2 col-form-label">Equipe 4</label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('equipe4') is-invalid @enderror" name="equipe4" id="equipe4" placeholder="Saisir le nom de l'équipe 4" value="{{ old('equipe4') }}"/>
    </div>
  </div>
  
  
  
  <div class="mb-3">
    <div class="offset-sm-2 col-sm-10">
    <button class="btn btn-primary mb-1 mr-1" type="submit">Ajouter</button>
    <a href="{{route('classement_epreuve', $epreuve->id)}}" class="btn btn-danger mb-1">Annuler</a>
  </div>
</form>
@endsection


  <script>
    // Script pour le défilement et le menu
  </script>
</body>

</html>
