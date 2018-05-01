@extends('layouts.app')
@section('style')
  <link href="{{asset('css/home.css')}}" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
@endsection
@section('righttopbar')
  <div class="col-md-12 col-xs-12" >
    {{-- <div class=""> --}}
    <div class="dropdown dropdown-bottom" style="display:inline-block">
      <button class="btn btn-primary dropdown-toggle dropdown-button-topbar" type="button" data-toggle="dropdown">{{$faculty_txt}}
        <span class="caret"></span></button>
        <ul id="faculty-ul" class="dropdown-menu dropdown-list">
          <li><button type="button" class="close">&times;</button></li>
          <center><input type="text" placeholder="Search.." id="facultysearch" class="form-control searchfilter" onkeyup="filterFunction('facultysearch', 'faculty-ul')"></center>
          <li><a href="/usageChart?faculty=">รีเซ็ต</a></li>
          @if(!empty($faculty_obj))
            @foreach($faculty_obj as $faculty_ob)
              <li><a href="{{asset('/usageChart')}}?faculty={{$faculty_ob->FACULTYNAME}}&start={{$start_date}}&end={{$end_date}}"><h5>{{$faculty_ob->FACULTYNAME}} ({{$faculty_ob->FACULTYNAMEENG}})</h5></a></li>
            @endforeach
          @endif
          {{-- <li><a href="/?faculty=วิศวกรรมศาสตร์">คณะวิศวกรรมศาสตร์</a></li> --}}
          {{-- <li><a href="/?faculty=ศึกษาศาสตร์">คณะศึกษาศาสตร์</a></li> --}}
          {{-- <li><a href="/?faculty=วิทยาการจัดการ">คณะวิทยาการจัดการ</a></li> --}}
        </ul>
      </div>
      <a href="{{asset('/managedoc')}}"><button class="btn btn-primary dropdown-button-topbar" >จัดการการอนุญาตเอกสาร</button></a>
      <a href="{{asset('/')}}?faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}&q={{$q}}"><button class="btn btn-primary dropdown-button-topbar" >ดูรายละเอียด</button></a>
    {{-- </a> --}}
  {{-- </div> --}}
      {{-- <div class="col-md-6 col-xs-12"> --}}
      {{-- <div> --}}
      <div class="row col-md-6 col-xs-12" style="margin-top:10px;margin-bottom:10px;float:right">
        <div style="">
        <div class="col-md-1 col-sm-1 col-xs-1">
          จาก
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">

      <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
        <input id="startdate" name="startdate" class="form-control" type="text" readonly />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
    <div class="col-md-1 col-sm-1 col-xs-1">
      ถึง
    </div>
    <div class="col-md-5 col-sm-5 col-xs-12">

      <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
        <input id="enddate" name="startdate" class="form-control" type="text" readonly />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>
    </div>
  </div>
{{-- </div> --}}


  </div>
@endsection

@section('content')
  <br></br>
<div class="container">
  <div class="row">
  <div class="col-xs-12">
    <div class = "panel panel-default">
      <div class = "panel-heading">
        <h3 class = "panel-title">
         กราฟแสดจำนวนผู้ใช้งาน @if($q != null)(keyword: {{$q}})@endif
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
  {{-- <div class="col-sm-4">

    <div class = "panel panel-default">
      <div class = "panel-heading">
        <h3 class = "panel-title">
         Panel With title
        </h3>
      </div>

      <div class = "panel-body">



    </div>
 </div>

  </div> --}}
</div>
</div>

@endsection
@section('script')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
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
        title: "จำนวนผู้ใช้งานแบ่งตามวัน",
        bar: {groupWidth: '95%'},
        legend: { position: 'none' },
      };
      var chart = new google.visualization.LineChart(document.getElementById('columnchart_plain'));
      chart.draw(data, options);
  }

  </script>

  {{-- <script type="text/javascript">
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
    </script> --}}
    <script>
    $(document).ready(function(){
  //     $('#myTable').DataTable({
  //     "orderFixed": [ 6, 'asc' ]
  // });
  $(window).resize(function(){
  drawChart();
  // drawChart2();
});
  $("#datepicker").datepicker({
         autoclose: true,
         format: 'yyyy-mm-dd',
         todayHighlight: true
   }).datepicker('update', new Date('{{$start_date}}'));
   $('#datepicker').change(function(){
     window.location = '{{asset('/usageChart')}}?start='+$('#startdate').val()+'&end='+$('#enddate').val()+'&faculty='+'{{$faculty}}';
   })
   $("#datepicker2").datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          todayHighlight: true
    }).datepicker('update', new Date('{{$end_date}}'));
    $('#datepicker2').change(function(){
      window.location = '{{asset('/usageChart')}}?end='+$('#enddate').val()+'&start='+$('#startdate').val()+'&faculty='+'{{$faculty}}';
    })
    });
    </script>
@endsection
