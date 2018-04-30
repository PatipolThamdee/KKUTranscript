@extends('layouts.app')
@section('style')
  <link href="{{asset('css/managedoc.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/stdManage.css')}}" rel="stylesheet" type="text/css">
  <meta name="csrf-token" content="{{ csrf_token() }}">


@endsection

@section('content')

<br>
    <div class='container'>
      <label class="switch" >
      @if($tr_return == 1)<input type="checkbox" id='switch'> @else <input type="checkbox" id='switch' checked> @endif
      <span class="slider round"></span></label>@if($tr_return == 1)<div id="yes" class='tab'>กดเพื่ออนุญาตให้ทำการสแกนเอกสาร Transcript</div> @else<div class='tab' id="no">กดเพื่อยกเลิกการอนุญาตให้ทำการสแกนเอกสาร Transcript</div> @endif

        <label class="switch2" >
        @if($gr_return == 1)<input type="checkbox" id='switch2'> @else <input type="checkbox" id='switch2' checked> @endif
        <span class="slider round"></span></label>@if($gr_return == 1)<div id="yes2" class='tab2'>กดเพื่ออนุญาตให้ทำการสแกนหนังสือรับรองการจบการศึกษา</div> @else<div class='tab2' id="no2">กดเพื่อยกเลิกการอนุญาตให้ทำการสแกนหนังสือรับรองการจบการศึกษา</div> @endif
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

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.switch').on('click',function(){
        // $('.tab').hide();
        var checkBox = document.getElementById("switch");
        var text = document.getElementById("text");
        if (checkBox.checked == true){
          var url = '{{asset('/transcript-toggle')}}';
          var form = $('<form action="' + url + '" method="post">' +'@csrf'+
            '<input type="text" name="code" value="' + '{{$document[0]->STUDENTCODE}}' + '" />' +
            '<input type="text" name="status" value="' + 'yes' + '" />' +
            '</form>');
          $('body').append(form);
          form.submit();
        } else {
          var url = '{{asset('/transcript-toggle')}}';
          var form = $('<form action="' + url + '" method="post">' +'@csrf'+
            '<input type="text" name="code" value="' + '{{$document[0]->STUDENTCODE}}' + '" />' +
            '<input type="text" name="status" value="' + 'no' + '" />' +
            '</form>');
          $('body').append(form);
          form.submit();
        }
          })

          $('.switch2').on('click',function(){
            // $('.tab2').hide();
            var checkBox = document.getElementById("switch2");
            var text = document.getElementById("text");
            if (checkBox.checked == true){
              var url = '{{asset('/graduate-toggle')}}';
              var form = $('<form action="' + url + '" method="post">' +'@csrf'+
                '<input type="text" name="code" value="' + '{{$document[0]->STUDENTCODE}}' + '" />' +
                '<input type="text" name="status" value="' + 'yes' + '" />' +
                '</form>');
              $('body').append(form);
              form.submit();

            } else {
              var url = '{{asset('/graduate-toggle')}}';
              var form = $('<form action="' + url + '" method="post">' +'@csrf'+
                '<input type="text" name="code" value="' + '{{$document[0]->STUDENTCODE}}' + '" />' +
                '<input type="text" name="status" value="' + 'no' + '" />' +
                '</form>');
              $('body').append(form);
              form.submit();

            }
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
