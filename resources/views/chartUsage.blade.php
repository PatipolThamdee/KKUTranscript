@extends('layouts.app')
@section('style')
@endsection


@section('script')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>

    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['วันที่', 'จำนวน', { role: 'style' }],
        @foreach ($count_by_week as $nigg)
        ['{{$nigg->show_date1}}', {{$nigg->count}},'#FCD92A'],
        @endforeach
      ]);
      var options = {
        title: "จำนวนผู้ใช้งานในรอบสัปดาห์ที่ผ่านมา",
        bar: {groupWidth: '95%'},
        legend: { position: 'none' },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_plain'));
      chart.draw(data, options);
  }

  </script>

  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ปี', 'จำนวนผู้ใช้งาน'],
          @foreach ($count_by_month as $cbm)
          ['{{$cbm->show_month}}-{{$cbm->show_year}}',{{$cbm->count}}],
          @endforeach
        ]);

        var options = {
          title: 'จำนวนผู้ใช้งานในแต่ละเดือน',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
@endsection


@section('content')
  <br></br>
<div class="container">
  <div class="row">
  <div class="col-sm-8">
    <div class = "panel panel-default">
      <div class = "panel-heading">
        <h3 class = "panel-title">
         Panel With title
        </h3>
      </div>

      <div class = "panel-body">
        <div class="row">
        <div class="col-xs-12">
        <div id="columnchart_plain" style="width:100%; height:auto"></div>
      </div>
      <div class="col-xs-12">
        <div id="curve_chart" style="width:100%; height:auto"></div>
        </div>
        </div>
    </div>
 </div>




  </div>
  <div class="col-sm-4">

    <div class = "panel panel-default">
      <div class = "panel-heading">
        <h3 class = "panel-title">
         Panel With title
        </h3>
      </div>

      <div class = "panel-body">



    </div>
 </div>

  </div>
</div>
</div>

@endsection
