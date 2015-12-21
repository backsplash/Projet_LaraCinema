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
<script src="{{ asset('vendor/plugins/c3charts/d3.min.js')}}"></script>
<script src="{{ asset('vendor/plugins/c3charts/c3.min.js')}}"></script>
<script src="{{ asset('vendor/plugins/jQuery-slimScroll-1.3.7/jquery.slimscroll.min.js')}}"></script>
<script type="text/javascript">
    $(function(){
        $('.scroller').slimScroll({
            height: '250px',
            alwaysVisible: false,
            railVisible: true
        });

        // getJSON permet d'aller récupérer les données en JSON
        // en passant par de l'ajax
        // $.getJSON(url, fonction de retour)
        // les données sont récupérées dans la variable data
        $.getJSON($('#high-pie').data('url'), function(data){


            //pie chart1
            $('#high-pie').highcharts({
                credits: false,
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    height: '300'
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

                    floating: true,
                    align:'right',
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



      // c3 chart = donut chart
        $.getJSON($('#chart').data('url'), function(data){
            var chart = c3.generate({
                data: {
                    columns: data,
                    type : 'donut',
                    onclick: function (d, i) { console.log("onclick", d, i); },
                    onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                },
                donut: {
                    title: data.tranche
                },
                size: {
                    height: 300
                }
            });
        });

       // highcharts histogramme

        $.getJSON($('#high-line').data('url'), function(data){

            // High Line 3
            console.log(data.name);

            $('#high-line').highcharts({
                credits: false,
                chart: {
                    backgroundColor: '#f9f9f9',
                    className: 'br-r',
                    type: 'column',
                    zoomType: 'x',
                    panning: true,
                    panKey: 'shift',
                    marginTop: 25,
                    marginRight: 1
                },
                title: {
                    text: null
                },
                xAxis: {
                    gridLineColor: '#EEE',
                    lineColor: '#EEE',
                    tickColor: '#EEE',
                    type: 'category',
                    labels: {
                        distance: 5,
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    },
                   categories: data.name
                },
                yAxis: {
                    min: 0,
                    tickInterval: 5,
                    gridLineColor: '#EEE',
                    title: {
                        text: 'Nb d\'acteurs'
                    }
                },

                legend: {
                    enabled: true
                },
                plotOptions: {
                    spline: {
                        lineWidth: 3
                    },
                    area: {
                        fillOpacity: 0.2
                    }
                },

                series: data.actors


            });

       });

        $.getJSON($('#cercles').data('url'), function(data){

            var infoCircle = $('.info-circle');
            if (infoCircle.length) {

                // Color Library we used to grab a random color
                var colors = {
                    "primary": [bgPrimary, bgPrimaryLr,
                        bgPrimaryDr
                    ],
                    "info": [bgInfo, bgInfoLr, bgInfoDr],
                    "warning": [bgWarning, bgWarningLr,
                        bgWarningDr
                    ],
                    "success": [bgSuccess, bgSuccessLr,
                        bgSuccessDr
                    ],
                    "system": [bgSystem, bgSystemLr,
                        bgSystemDr
                    ],
                    "alert": [bgAlert, bgAlertLr, bgAlertDr]
                };
                // Store all circles
                var circles = [];
                infoCircle.each(function(i, e) {
                    // Define default color
                    var color = ['#DDD', bgPrimary];
                    // Modify color if user has defined one
                    var targetColor = $(e).data(
                        'circle-color');
                    if (targetColor) {
                        var color = ['#DDD', colors[
                            targetColor][0]]
                    }
                    // Create all circles
                    console.log(data[0][i]);
                    var circle = Circles.create({
                        id: $(e).attr('id'),
                        value: data[i],
                        radius: $(e).width() / 2,
                        width: 14,
                        colors: color,
                        text: function(value) {
                            var title = $(e).attr('title');
                            if (title) {
                                return '<h2 class="circle-text-value">' + value + '</h2><p>' + title + '</p>'
                            }
                            else {
                                return '<h2 class="circle-text-value mb5">' + value + '</h2>'
                            }
                        }
                    });
                    circles.push(circle);
                });


            }

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
    <div class="col-md-7">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <span class="panel-title">Répartition des films par catégorie</span>
            </div>

            <div class="panel-body ">
                <div data-url="{{ route('api_categories') }}" data-highcharts-chart="6" id="high-pie">

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <span class="panel-title">Répartition des acteurs par âge</span>
            </div>

            <div class="panel-body ">

                <div id="chart" class="c3" style="height: 370px; width: 100%; max-height: 370px; position: relative;" data-url="{{ route('api_actors') }}">

                </div>

            </div>


        </div>

    </div>
</div>



<div class="row">
    <div class="col-md-7">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-bar-chart-o"></i>
                </span>
                <span class="panel-title">Nombres</span>
            </div>

            <div class="panel-body pn">
                <table class="table">

                    <tbody>
                        <tr>
                            <td>
                                Films <span class="badge bg-system pull-right">{{ $nbfilms}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Catégories <span class="badge bg-dark pull-right">{{ $nbcategories}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Acteurs <span class="badge bg-danger pull-right">{{ $nbacteurs}}</span>
                        </td>
                        </tr>
                        <tr>
                            <td>
                            Réalisateurs <span class="badge bg-alert pull-right">{{ $nbdirectors}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Séances <span class="badge bg-warning pull-right">{{ $nbseances}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Médias <span class="badge bg-primary pull-right">{{ $nbmedias}}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-rss"></i>
                </span>
                <span class="panel-title">Distributeur</span>
            </div>

            <div class="panel-body pn">
                <table class="table">

                    <tbody>
                    @foreach($movies_distributeur as $distributeur)
                    <tr>
                        <td>
                            {{ $distributeur->distributeur }} <span class="pull-right">{{ round($distributeur->nbfilms/$nbfilms*100)}}%</span>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>


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

                        <?php  $time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $session->date_session) ?>
                        <div class="timeline-date">{{ $time->format('H:i') }}</div>
                    </li>
                    @endforeach

                </ol>
            </div>
        </div>


    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="panel panel-danger ">
            <div class="panel-heading">
                <span class="panel-icon">
                  <i class="fa fa-home"></i>
                </span>
                <span class="panel-title">Répartition des acteurs par ville</span>
            </div>
            <div class="panel-body pn">
                <div data-highcharts-chart="3" id="high-line" data-url="{{ route('api_actorsCity') }}">
                </div>
            </div>
        </div>


    </div>

    <div class="col-md-6">

        <div class="panel panel-danger ">
            <div class="panel-heading">
            <span class="panel-icon">
              <i class="fa fa-home"></i>
            </span>
                <span class="panel-title">Répartition des commentaires</span>
            </div>
            <div class="panel-body pn">
                <div class="mb20 text-right">

                    <span class="fs11 text-muted">
                        <i class="fa fa-circle text-warning fs12 pr5"></i>

                         Twitter

                    </span>
                    <span class="fs11 text-muted ml10">
                        <i class="fa fa-circle text-alert fs12 pr5"></i>

                         Facebook

                    </span>
                    <span class="fs11 text-muted ml10">
                        <i class="fa fa-circle text-system fs12 pr5"></i>

                         Google+

                    </span>

                </div>
                <div id="cercles" data-url="{{ route('api_comments') }}">
                    <div class="col-md-4 text-center">
                        <div class="info-circle" id="c1" title="Twitter" value="80" data-circle-color="warning"></div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="info-circle" id="c2" title="Twitter" value="80" data-circle-color="alert"></div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="info-circle" id="c3" title="Twitter" value="80" data-circle-color="system"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection