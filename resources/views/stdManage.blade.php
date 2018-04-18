@extends('layouts.app')
@section('style')
  <link href="{{asset('css/managedoc.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

  <div class="container">
  @foreach ($document as $doc)

  <div class="container panel" style="margin:10px;text-align: center; padding-top:10px">
    <div>
      <table style="text-align: center ;" class="table inside_table">
        <tr>
          <td>Refcode</td>
          <td>{{$doc->REFCODE}}</td>
        </tr>
        <tr>
          <td>Document Type</td>
          <td>{{$doc->CERTIFICATE}}</td>
        </tr>
        <tr>
          <td>Student Name</td>
          <td>{{($doc->PREFIXNAME)}} {{$doc->STUDENTNAME}}, {{($doc->PREFIXNAMEENG)}} {{($doc->STUDENTNAMEENG)}}</td>
        </tr>
        <tr>
          <td>Student ID</td>
          <td>{{$doc->STUDENTCODE}}</td>
        </tr>
        <tr>
          <td>Faculty</td>
          <td>{{$doc->FACULTYNAME}}, {{$doc->FACULTYNAMEENG}}</td>
        </tr>
        <tr>
          <td>Major</td>
          <td>{{$doc->PROGRAMNAME}}, {{$doc->PROGRAMNAMEENG}}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>{{$doc->STUDENTSTATUS}}</td>
        </tr>
        <tr>
          <td>Date of Graduation</td>
          <td>{{$doc->DATEOFGRADUATED}}</td>
        </tr>
        <tr>
          <td>Signed By</td>
          <td>{{$doc->SIGNBY}}</td>
        </tr>
        <tr>
          <td>Permission</td>
          <td id="{{$doc->REFCODE}}">@if($doc->reject == 1)ไม่อนุญาตให้ตรวจสอบ@else อนุญาตให้ตรวจสอบได้ @endif</td>
        </tr>
        <tr class="button_tr">
          <td class="button_td">
            <button onclick="allow({{$doc->REFCODE}})" class="btn btn-primary" style="float:right">allow</button>
          </td>
          <td class="button_td">
            <button onclick="reject({{$doc->REFCODE}})" class="btn btn-danger" style="float:left">reject</button>
          </td>
        </tr>
      </table>
    </div>
  </div>
@endforeach
</div>

@endsection


@section('script')
  <script>

    $(document).ready(function(){
      $('.transcript-btn').on('click',function(){
        location.reload();
      })


    })
  </script>
    <script>
    function reject(refcode){
      var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var obj = JSON.parse(this.responseText);
        document.getElementById(refcode).innerHTML = 'ไม่อนุญาตให้ตรวจสอบ';
        swal(obj.status);
      }
    };
    var url = "{{asset('/reject')}}/" + refcode;
    xhttp.open("GET", url, true);
    xhttp.send();
    }
    </script>
    <script>
    function allow(refcode){
      var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var obj = JSON.parse(this.responseText);
        document.getElementById(refcode).innerHTML = 'อนุญาตให้ตรวจสอบได้';
        swal(obj.status);
      }
    };
    var url = "{{asset('/allow')}}/" + refcode;
    xhttp.open("GET", url, true);
    xhttp.send();
    }
    </script>
@endsection
