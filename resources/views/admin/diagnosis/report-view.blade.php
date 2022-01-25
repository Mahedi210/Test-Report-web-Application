@extends('admin.amaster')

@section('content')
    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        @foreach($finalResults as $key => $finalResult)

            {{--@dd(json_encode($finalResult['results']));--}}
            {{--@php
                $demoData=json_encode($finalResult['results'])
            @endphp--}}
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable({!! json_encode($finalResult['results']) !!});
                    var options ={
                        title: 'Test Result  Performance',
                        hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
                        vAxis: {minValue: 0}
                    };
                    var chart = new google.visualization.AreaChart(document.querySelector('.chart_div_{{ $key }}'));
                    chart.draw(data,options);
                }
            </script>
        @endforeach
    </head>
    <body>
    <div>
        @foreach($finalResults as $key => $finalResult)
            <div class="chart_div_{{ $key }}" style="width: 100%; height: 500px;"></div>
        @endforeach
    </div>
    </body>
    </html>

@endsection


