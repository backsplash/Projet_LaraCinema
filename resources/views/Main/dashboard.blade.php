<!--heritage de la vue mère-->
@extends('layout')

@section('title')
Dashboard
@endsection

@section('famille')
Dashboard
@endsection

@section('js')
    @parent
<script src="{{ asset('vendor/plugins/highcharts/highcharts.js')}}"></script>
<script src="{{ asset('vendor/plugins/circles/circles.js')}}"></script>
<script src="{{ asset('vendor/plugins/jQuery-slimScroll-1.3.7/jquery.slimscroll.min.js')}}"></script>
<script type="text/javascript">
    $(function(){
        $('.scroller').slimScroll({
            height: '250px',
            alwaysVisible: true,
            railVisible: true
        });

        // getJSON permet d'aller récupérer les données en JSON
        // en passant par de l'ajax
        // $.getJSON(url, fonction de retour)
        // les données sont récupérées dans la variable data
        $.getJSON("api/categories", function(data){


            //pie chart1
            $('#high-pie').highcharts({
                credits: false,
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: null
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        center: ['30%', '50%'],
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                legend: {
                    x: 90,
                    floating: true,
                    verticalAlign: "middle",
                    layout: "vertical",
                    itemMarginTop: 10
                },
                series: [{
                    type: 'pie',
                    name: 'Nb de films par catégorie',
                    data: data
                }]
            });
        });


    });
</script>
@endsection




<!--ecriture dans le content-->
@section('content')

<h3>Statistiques</h3>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-tile text-center br-a br-light">
            <div class="panel-body bg-white dark">
                <h1 class="fs35 mbn">{{$moyenne_acteurs}} ans</h1>
                <h6 class="text-system">Moyenne d'age des acteurs</h6>
            </div>
            <div class="panel-footer bg-danger br-t br-light p12">
                <span class="fs11">
                    <i class="fa fa-arrow-up pr5 text-warning"></i> {{$nbacteurs}} acteurs

                </span>
            </div>
        </div>

    </div>

    <div class="col-md-3">
        <div class="panel panel-tile text-center br-a br-light">
            <div class="panel-body bg-white dark">
                    <h1 class="fs35 mbn">{{$moyenne_commentaires}} / 10</h1>
                    <h6 class="text-system">Moyenne des notes</h6>
            </div>
            <div class="panel-footer bg-danger br-t br-light p12">
                <span class="fs11">
                    <i class="fa fa-arrow-up pr5 text-warning"></i> {{$nbcommentaires}} commentaires

                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-tile text-center br-a br-light">
            <div class="panel-body bg-white dark">
                                <h1 class="fs35 mbn">{{$moyenne_presse}} / 5</h1>
                                <h6 class="text-system">Moyenne de presse</h6>
            </div>
            <div class="panel-footer bg-danger br-t br-light p12">
                <span class="fs11">
                    <i class="fa fa-arrow-up pr5 text-warning"></i> {{$nbfilms}} films

                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-tile text-center br-a br-light">
            <div class="panel-body bg-white dark">
                                <h1 class="fs35 mbn">{{$moyenne_seance}}h.</h1>
                                <h6 class="text-system">Moyenne des heures de diffusion</h6>
            </div>
            <div class="panel-footer bg-danger br-t br-light p12">
                <span class="fs11">
                    <i class="fa fa-arrow-up pr5 text-warning"></i> {{$nbseances}} séances

                </span>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <span class="panel-title">Films par catégorie</span>
            </div>

            <div class="panel-body ">



            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <span class="panel-title">...</span>
            </div>

            <div class="panel-body ">



            </div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-5">
        <div class="panel user-group-widget panel-danger">

            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-users"></i>
                </span>
                <span class="panel-title">

                    {{ count($liste_users)}} derniers utilisateurs (sur {{$nbusers}})

                </span>
            </div>
            <div class="panel-menu">
            <div class="input-group ">
                <span class="input-group-addon">
                    <i class="fa fa-search"></i>
                </span>
                    <input class="form-control" type="text" placeholder="Search user...">
            </div>
            </div>
            <div class="panel-body " style="max-height: 513px;">


                    <div class="scroller-content scroller">
                        <?php $i = 4; ?>
                        @foreach($liste_users as $user)


                            @if($i == 1 || $i%4 == 0)<div class="row">@endif
                            <div class="col-md-3">
                                <img class="user-avatar" src="@if(empty($user->avatar))
                                http://i40.servimg.com/u/f40/16/80/10/64/trollf10.png
                                @else  {{$user->avatar}}
                                @endif" alt="avatar">
                                <div class="caption text-center">
                                    <h6 class="text-center">
                                    {{$user->username}}
                                    </h6>

                                </div>
                            </div>
                            <?php $i++; ?>
                            @if($i > 4 && $i%4 == 0)</div>@endif
                        @endforeach

                    </div>

            </div>
        </div>
    </div>

    <div class="col-md-7">


        <div class="panel panel-danger">
            <div class="panel-heading">
                <span class="panel-icon">
                  <i class="fa fa-clock-o"></i>
                </span>
                <span class="panel-title"> {{count($liste_sessions)}} prochaines séances</span>
            </div>
            <div class="panel-body ptn pbn p10">
                <ol class="timeline-list">
                    @foreach($liste_sessions as $session)
                    <li class="timeline-item">
                        <div class="timeline-icon bg-system light">
                            <span class="fa fa-calendar"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>{{ $session->movies->title}}</b> au cinéma:
                            <a href="#">{{ $session->cinema->title}}</a>
                        </div>
                        <div class="timeline-date">{{ $session->date_session}}</div>
                    </li>
                    @endforeach

                </ol>
            </div>
        </div>


    </div>
</div>



<div class="row">
    <div class="col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <span class="panel-title">Répartition des films par catégorie</span>
            </div>

            <div class="panel-body ">
                <div data-highcharts-chart="6" id="high-pie">

                </div>
            </div>
        </div>
    </div>
</div>



@endsection