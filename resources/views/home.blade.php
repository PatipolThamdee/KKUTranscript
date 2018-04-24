@extends('layouts.app')
@section('style')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
  <style>
  #custom-search-input{
    margin-bottom: 5px;
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}
  /* #mytable thead{
    position: absolute;
    bottom: 8px;
    right: 8px;
    display: block;
    font-family: 'Glyphicons Halflings';
    opacity: 0.5;
  } */
  .sorting::after{
    opacity: 0.2;
    content: "\e150";
    position: absolute;
    display: inline-table;
    font-family: 'Glyphicons Halflings';
    /* opacity: 0.5; */
  }
  .sorting_asc::after{
    content: "\e155";
    position: absolute;
    display: inline-table;
    font-family: 'Glyphicons Halflings';
    opacity: 0.5;
  }
  .sorting_desc::after{
    content: "\e156";
    position: absolute;
    display: inline-table;
    font-family: 'Glyphicons Halflings';
    opacity: 0.5;
  }
            @media
            only screen and (max-width: 760px)/*,
            (min-device-width: 768px) and (max-device-width: 1024px)*/  {

                /* Force table to not be like tables anymore */
                #myTable table, #myTable thead, #myTable tbody, #myTable th, #myTable td, #myTable tr {
                    display: block;
                    text-align: right;
                    border: 0;
                }
                #myTable {
                    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                    border-collapse:collapse;
                    width: 100%;
                }
                /* #myTable td:nth-child(even) {background: white;} */
                /* #myTable td:nth-child(odd) {background: #f2f2f2;} */
                /* #myTable td:hover {background-color: #ddd;} */



                /* Hide table headers (but not display: none;, for accessibility) */
                #myTable thead tr {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                #myTable tr { border: 1px solid #ccc;
                margin-bottom: 10px}

                 #myTable td {
                    /* Behave  like a "row" */
                    border: none;
                    padding: 10px;
                    /* margin-bottom: 3px; */
                    border: 1px;
                    min-height: 40px;
                    /* border-bottom: 1px solid #eee; */
                    position: relative;
                    /* box-shadow:0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); */
                    /*padding: 1000px;*/

                }

                #myTable td:before {
                      position: absolute;
                      font-size: 16px;
                      top: 0px;
                      left: 0px;
                      width: 40%;
                      height: 100%;
                      text-align: center;
                      padding: 10px;
                      margin:0px;
                      white-space: nowrap;
                      max-width: 40%;
                      text-overflow: ellipsis;
                      overflow: hidden;
                  }
                #myTable td .td-inner{
                  float:right;
                  max-width: 60%;
                  white-space: nowrap;
                  text-overflow: ellipsis;
                  overflow: hidden;
                }


                /*
                Label the data
                */
                #myTable td:nth-of-type(1):before { content: "Firstname"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(2):before { content: "Lastname"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(3):before { content: "Phone Number"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(4):before { content: "Email"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(5):before { content: "Company Name"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(6):before { content: "Motive"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(7):before { content: "Created Date"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(8):before { content: "Ref.Code"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(9):before { content: "IP Address"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(10):before { content: "ISP"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(11):before { content: "IP Region"; background:rgba(237, 205, 31, 1); color: black;}
                #myTable td:nth-of-type(12):before { content: "IP Country"; background:rgba(237, 205, 31, 1); color: black;}

            }

            /* Smartphones (portrait and landscape) ----------- */
            @media only screen
            and (min-device-width : 320px)
            and (max-device-width : 480px) {
                body {
                    padding: 0;
                    margin: 0;
                    width: 100%; }
                table{
                    width: 100%;
                }
            }

            /* iPads (portrait and landscape) ----------- */
            @media only screen and (min-width: 480px) and (max-width: 1024px) {

                #myTable{
                    width: 80%;
                }
            }

        </style>

  <link href="{{asset('css/home.css')}}" rel="stylesheet" type="text/css">
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
          <li><a href="/?faculty=">รีเซ็ต</a></li>
          @if(!empty($faculty_obj))
            @foreach($faculty_obj as $faculty_ob)
              <li><a href="{{asset('/')}}?faculty={{$faculty_ob->FACULTYNAME}}&start={{$start_date}}&end={{$end_date}}"><h5>{{$faculty_ob->FACULTYNAME}} ({{$faculty_ob->FACULTYNAMEENG}})</h5></a></li>
            @endforeach
          @endif
          {{-- <li><a href="/?faculty=วิศวกรรมศาสตร์">คณะวิศวกรรมศาสตร์</a></li> --}}
          {{-- <li><a href="/?faculty=ศึกษาศาสตร์">คณะศึกษาศาสตร์</a></li> --}}
          {{-- <li><a href="/?faculty=วิทยาการจัดการ">คณะวิทยาการจัดการ</a></li> --}}
        </ul>
      </div>
      <a href="{{asset('/managedoc')}}"><button class="btn btn-primary dropdown-button-topbar" >จัดการการอนุญาตเอกสาร</button></a>
      <a href="{{asset('/usageChart')}}?faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}"><button class="btn btn-primary dropdown-button-topbar" >Chart การใช้งาน</button></a>

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

  <div class="row">
      <div class="col-sm-4 col-xs-12">
        <form method="GET" action="{{asset('/')}}">
        <div id="custom-search-input">
              <div class="input-group">
                  <input name="q" type="text" class="form-control input-lg" placeholder="Search" />
                  <span class="input-group-btn">
                      <button class="btn btn-info btn-lg" type="submit">
                          <i class="glyphicon glyphicon-search"></i>
                      </button>
                  </span>
              </div>
          </div>
        </form>
      </div>
  </div>

@endsection
@section('content')
  <div style="background:white" >
    {{-- <h2>KKU Transcript</h2> --}}
    <div class="table-responsive" style="padding:10px;">
      <table class="table" id="myTable" >
        <thead>
          <tr>
            <th onclick="window.location='{{asset('/')}}?sort_by=user_information.firstname&sorting=@if($default_sort == 'user_information.firstname'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.firstname')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>Firstname</th>
            <th onclick="window.location='{{asset('/')}}?sort_by=user_information.lastname&sorting=@if($default_sort == 'user_information.lastname'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.lastname')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>Lastname</th>
            <th onclick="window.location='{{asset('/')}}?sort_by=user_information.phone_no&sorting=@if($default_sort == 'user_information.phone_no'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.phone_no')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>Phone Number</th>
            <th onclick="window.location='{{asset('/')}}?sort_by=user_information.email&sorting=@if($default_sort == 'user_information.email'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.email')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>Email</th>
            <th onclick="window.location='{{asset('/')}}?sort_by=user_information.company_name&sorting=@if($default_sort == 'user_information.company_name'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.company_name')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>Company Name</th>
            <th onclick="window.location='{{asset('/')}}?sort_by=user_information.motive&sorting=@if($default_sort == 'user_information.motive'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.motive')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>Motive</th>
            <th onclick="window.location='{{asset('/')}}?sort_by=user_information.created_at&sorting=@if($default_sort == 'user_information.created_at'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.created_at')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>Created Date</th>
            <th onclick="window.location='{{asset('/')}}?sort_by=user_information.REFCODE&sorting=@if($default_sort == 'user_information.REFCODE'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.REFCODE')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>Ref.Code</th>
            <th onclick="window.location='{{asset('/')}}?sort_by=user_information.ip&sorting=@if($default_sort == 'user_information.ip'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.ip')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>IP Address</th>
              <th onclick="window.location='{{asset('/')}}?sort_by=user_information.created_at&sorting=@if($default_sort == 'user_information.ISP'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.ISP')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>ISP</th>
              <th onclick="window.location='{{asset('/')}}?sort_by=user_information.REFCODE&sorting=@if($default_sort == 'user_information.region_name'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.region_name')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>IP Region</th>
              <th onclick="window.location='{{asset('/')}}?sort_by=user_information.ip&sorting=@if($default_sort == 'user_information.country'){{$sorting}}@else{{'desc'}}@endif&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}'" @if($default_sort == 'user_information.country')@if($current_sorting == 'asc')class="sorting_asc"@else class="sorting_desc"@endif @else class="sorting"@endif>IP Country</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($data))
            @foreach ($data as $dat)
              <tr>
              <td><span class="td-inner">{{$dat->firstname}}</span></td>
              <td><span class="td-inner">{{$dat->lastname}}</span></td>
              <td><span class="td-inner">{{$dat->phone_no}}</span></td>
              <td><span class="td-inner">{{$dat->email}}</span></td>
              <td><span class="td-inner">{{$dat->company_name}}</span></td>
              <td><span class="td-inner">{{$dat->motive}}</span></td>
              <td><span class="td-inner">{{$dat->created_at}}</span></td>
              <td><span class="td-inner">{{$dat->REFCODE}}</span></td>
              <td><span class="td-inner">{{$dat->ip}}</span></td>
              <td><span class="td-inner">{{$dat->ISP}}</span></td>
              <td><span class="td-inner">{{$dat->region_name}}</span></td>
              <td><span class="td-inner">{{$dat->country}}</span></td>
            </tr>
            @endforeach


          @endif
        </tbody>
      </table>
    </div>

    <div id="pagebutton" align='center'>
    {{-- <div id="demo_pag1">
      @for($i=1;$i<=$maxpage;$i++)

    @endfor
  </div> --}}

  <ul id="pagination-demo" class="pagination"></ul>


  </div>
  </div>

@endsection
@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.twbsPagination.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(){
//     $('#myTable').DataTable({
//     "orderFixed": [ 6, 'asc' ]
// });
$("#datepicker").datepicker({
       autoclose: true,
       format: 'yyyy-mm-dd',
       todayHighlight: true
 }).datepicker('update', new Date('{{$start_date}}'));
 $('#datepicker').change(function(){
   window.location = '{{asset('/')}}?start='+$('#startdate').val()+'&end='+$('#enddate').val()+'&faculty='+'{{$faculty}}';
 })
 $("#datepicker2").datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true
  }).datepicker('update', new Date('{{$end_date}}'));
  $('#datepicker2').change(function(){
    window.location = '{{asset('/')}}?end='+$('#enddate').val()+'&start='+$('#startdate').val()+'&faculty='+'{{$faculty}}';
  })
// $('#myTable').DataTable({ aaSorting: [[6, 'asc']]});
$('#pagination-demo').twbsPagination({
        totalPages: {{$maxpage}},
        visiblePages: 3,
        first:'<div class="first-page"><span>First</span></div>',
        last:'<div class="last-page"><span>Last</span></div>',
        prev:'<div class="prev-page"><span>Previous</span></div>',
        next:'<div class="next-page"><span>Next</span></div>',
        initiateStartPageClick:false,
        startPage:{{$page}},
        onPageClick: function (event, page) {
            // $('#page-content').text('Page ' + page);
            // alert(page);
            window.location = "{{asset('/?page=')}}"+String(page)+'&sort_by='+'{{$default_sort}}'+'&sorting='+'{{$current_sorting}}'+
                              '&faculty={{$faculty}}&start={{$start_date}}&end={{$end_date}}';
        }
    });
  });
  </script>
  <script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */

    function filterFunction(inp, divv) {
      var input, filter, ul, li, a, i;
      input = document.getElementById(inp);
      filter = input.value.toUpperCase();
      div = document.getElementById(divv);
      a = div.getElementsByTagName("a");
      for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
          a[i].style.display = "";
        } else {
          a[i].style.display = "none";
        }
      }
    }
    </script>
@endsection
