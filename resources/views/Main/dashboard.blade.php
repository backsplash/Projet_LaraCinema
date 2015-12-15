<!--heritage de la vue mère-->
@extends('layout')

@section('title')
Ajout d'un film
@endsection

@section('famille')
Movies
@endsection

<!--ecriture dans le content-->
@section('content')

<h3>dashboard</h3>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-tile text-center br-a br-light">
            <div class="panel-body bg-white dark">
                <h1 class="fs35 mbn">{{$moyenne_acteurs[0]->age}} ans</h1>
                <h6 class="text-system">Moyenne d'age des acteurs</h6>
            </div>
            <div class="panel-footer bg-danger br-t br-light p12">
    <span class="fs11">
      <i class="fa fa-arrow-up pr5 text-warning"></i> {{$nbacteurs}} acteurs

    </span>
            </div>
        </div>

    </div>

    <div class="col-md-6">


        <div class="panel panel-tile text-center br-a br-light">
            <div class="panel-body bg-white dark">
<!--                <h1 class="fs35 mbn">18 ans</h1>-->
<!--                <h6 class="text-system">Moyenne d'age des acteurs</h6>-->
            </div>
            <div class="panel-footer bg-danger br-t br-light p12">
    <span class="fs11">
      <i class="fa fa-arrow-up pr5 text-warning"></i> {{$nbcommentaires}} commentaires

    </span>
            </div>
        </div>


    </div>




</div>



@endsection