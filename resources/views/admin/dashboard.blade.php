@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')

@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-11">
        <p class="text-center font-weight-bold">Bienvenido {{$user->name}}</p class="text-center">
        <p class="text-center">Te damos la bienvenida a la aplicación personalizada de uso exclusivo de nuestra UEN Telco & Utilities, esperamos sea de tu agrado poder realizar el registro de tus actividades y los reportes de tiempos correspondientes a estas, de igual manera si tienes anotaciones, puntos a mejorar o cambios que te gustaría realizar dentro de la aplicación, por favor escríbenos con todos los detalles a <strong>juan.marulanda@optima.net.co</strong>, estamos para mejorar juntos.</p>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-5">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('img/1.png')}}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/2.png')}}" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/3.jpg')}}" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
</div>
@stop
