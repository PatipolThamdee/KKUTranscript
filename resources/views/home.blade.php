@extends('layouts.app')
@section('style')
  <style>
            @media
            only screen and (max-width: 760px)/*,
            (min-device-width: 768px) and (max-device-width: 1024px)*/  {

                /* Force table to not be like tables anymore */
                table, thead, tbody, th, td, tr {
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
                thead tr {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                tr { border: 1px solid #ccc;
                margin-bottom: 10px}

                td {
                    /* Behave  like a "row" */
                    border: none;
                    padding: 0px;
                    /* margin-bottom: 3px; */
                    border: 1px;
                    min-height: 20px;
                    /* border-bottom: 1px solid #eee; */
                    position: relative;
                    /* box-shadow:0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); */
                    /*padding: 1000px;*/

                }

                td:before {
                    /* Now like a table header */
                    /*display: inline-block;*/
                    position: absolute;
                    font-size: 16px;
                    /* Top/left values mimic padding */
                    /*top: 6px;*/
                    top: 0px;
                    left: 0px;
                    width: 40%;
                    height: 100%;
                    /* height: calc(100% - 8px); */
                    text-align: center;
                    padding: 0px;
                    /* padding-top: 8px; */
                    margin:0px;
                    white-space: nowrap;
                }


                /*
                Label the data
                */
                td:nth-of-type(1):before { content: "Firstname"; background:rgba(237, 205, 31, 1); color: black; padding-top: 3px}
                td:nth-of-type(2):before { content: "Lastname"; background:rgba(237, 205, 31, 1); color: black;}
                td:nth-of-type(3):before { content: "Phone Number"; background:rgba(237, 205, 31, 1); color: black;}
                td:nth-of-type(4):before { content: "Email"; background:rgba(237, 205, 31, 1); color: black;}
                td:nth-of-type(5):before { content: "Company Name"; background:rgba(237, 205, 31, 1); color: black;}
                td:nth-of-type(6):before { content: "Motive"; background:rgba(237, 205, 31, 1); color: black;}
                td:nth-of-type(7):before { content: "Created Date"; background:rgba(237, 205, 31, 1); color: black;}
                td:nth-of-type(8):before { content: "Ref.Code"; background:rgba(237, 205, 31, 1); color: black;}
                td:nth-of-type(9):before { content: "IP Address"; background:rgba(237, 205, 31, 1); color: black;}

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
  <div class="col-md-12 col-xs-12" class="righttopbar">
    <div class="dropdown dropdown-bottom" style="display:inline-block">
      <button class="btn btn-primary dropdown-toggle dropdown-button-topbar" type="button" data-toggle="dropdown">{{$faculty}}
        <span class="caret"></span></button>
        <ul id="faculty-ul" class="dropdown-menu dropdown-list">
          <li><button type="button" class="close">&times;</button></li>
          <center><input type="text" placeholder="Search.." id="facultysearch" class="form-control searchfilter" onkeyup="filterFunction('facultysearch', 'faculty-ul')"></center>
          <li><a href="/?faculty=">รีเซ็ต</a></li>
          @if(!empty($faculty_obj))
            @foreach($faculty_obj as $faculty_ob)
              <li><a href="{{asset('/')}}?faculty={{$faculty_ob->FACULTYNAME}}"><h5>{{$faculty_ob->FACULTYNAME}} ({{$faculty_ob->FACULTYNAMEENG}})</h5></a></li>
            @endforeach
          @endif
          {{-- <li><a href="/?faculty=วิศวกรรมศาสตร์">คณะวิศวกรรมศาสตร์</a></li> --}}
          {{-- <li><a href="/?faculty=ศึกษาศาสตร์">คณะศึกษาศาสตร์</a></li> --}}
          {{-- <li><a href="/?faculty=วิทยาการจัดการ">คณะวิทยาการจัดการ</a></li> --}}
        </ul>
      </div>
      <a href="{{asset('/managedoc')}}"><button class="btn btn-primary" >จัดการการอนุญาตเอกสาร</button></a>
      <a href="{{asset('/usageChart')}}"><button class="btn btn-primary" >Chart การใช้งาน</button></a>

  </div>
@endsection
@section('content')
  <div style="background:white" >
    {{-- <h2>KKU Transcript</h2> --}}
    <div class="table-responsive" style="padding:10px;">
      <table class="table" id="myTable" >
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Company Name</th>
            <th>Motive</th>
            <th>Created Date</th>
            <th>Ref.Code</th>
            <th>IP Address</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($data))
            @foreach ($data as $dat)
              <tr>
              <td>{{$dat->firstname}}</td>
              <td>{{$dat->lastname}}</td>
              <td>{{$dat->phone_no}}</td>
              <td>{{$dat->email}}</td>
              <td>{{$dat->company_name}}</td>
              <td>{{$dat->motive}}</td>
              <td>{{$dat->created_at}}</td>
              <td>{{$dat->REFCODE}}</td>
              <td>{{$dat->ip}}</td>
            </tr>
            @endforeach


          @endif
        </tbody>
      </table>
    </div>


  </div>

@endsection
@section('script')
  <script>
  $(document).ready(function(){
//     $('#myTable').DataTable({
//     "orderFixed": [ 6, 'asc' ]
// });
$('#myTable').DataTable({ aaSorting: [[6, 'asc']]});
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
