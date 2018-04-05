@extends('layouts.app')
@section('style')
  <link href="{{asset('css/managedoc.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('righttopbar')
  <div style="background:white;padding:15px;">
    <h5 style="max-width:20%;display:inline">ค้นหาเอกสาร</h5>
    <input style="max-width:80%;display:inline" type="text" placeholder="ค้นหาจากชื่อ, รหัสนักศึกษา, ..." id="searchdoc" class="form-control searchfilter" onkeyup="loadDoc()">
  </div>
@endsection
@section('content')
  <div id="demo"></div>
@endsection
@section('script')
  <script>
  function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var obj = JSON.parse(this.responseText);
        // console.log(obj);
        var myNode = document.getElementById("demo");
        while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);
        }
        // alert(obj.length);
        for(i = 0;i < obj.length; i++){
          var container = document.createElement('div');
          container.setAttribute("class", "container panel");
          container.setAttribute('style', 'margin:10px;text-align: center; padding-top:10px')

          var inside_container = document.createElement('div');


          var inside_table = document.createElement('TABLE');
          inside_table.setAttribute('style', 'text-align: center ;')

          inside_container.appendChild(inside_table);
          container.appendChild(inside_container);

          inside_table.setAttribute("class", "table inside_table")
          var tr1 = document.createElement('TR');
          var tr2 = document.createElement('TR');
          var tr3 = document.createElement('TR');
          tr3.setAttribute("class", "button_tr");
          var tr4 = document.createElement('TR');
          var tr5 = document.createElement('TR');
          var tr6 = document.createElement('TR');
          var tr7 = document.createElement('TR');
          var tr8 = document.createElement('TR');
          var tr9 = document.createElement('TR');
          var tr10 = document.createElement('TR');
          var tr11 = document.createElement('TR');




          var td1_1 = document.createElement('TD');
          var td1_2 = document.createElement('TD');
          var td2_1 = document.createElement('TD');
          var td2_2 = document.createElement('TD');
          var td3_1 = document.createElement('TD');
          var td3_2 = document.createElement('TD');
          td3_2.setAttribute("class", "button_td");

          td3_1.setAttribute("class", "button_td");

          var td4_1 = document.createElement('TD');
          var td4_2 = document.createElement('TD');

          var td5_1 = document.createElement('TD');
          var td5_2 = document.createElement('TD');

          var td6_1 = document.createElement('TD');
          var td6_2 = document.createElement('TD');

          var td7_1 = document.createElement('TD');
          var td7_2 = document.createElement('TD');

          var td8_1 = document.createElement('TD');
          var td8_2 = document.createElement('TD');

          var td9_1 = document.createElement('TD');
          var td9_2 = document.createElement('TD');

          var td10_1 = document.createElement('TD');
          var td10_2 = document.createElement('TD');

          var td11_1 = document.createElement('TD');
          var td11_2 = document.createElement('TD');


          td1_1.innerHTML = 'Refcode';
          tr1.appendChild(td1_1);
          td1_2.innerHTML = obj[i].REFCODE;
          tr1.appendChild(td1_2);
          td2_1.innerHTML = 'Document Type';
          tr2.appendChild(td2_1);
          td2_2.innerHTML = obj[i].CERTIFICATE;
          tr2.appendChild(td2_2);
          td4_1.innerHTML = "Student Name";
          tr4.appendChild(td4_1);
          td4_2.innerHTML = obj[i].PREFIXNAME + obj[i].STUDENTNAME + ', ' + obj[i].PREFIXNAMEENG + obj[i].STUDENTNAMEENG ;
          tr4.appendChild(td4_2);

          td5_1.innerHTML = 'Student ID';
          tr5.appendChild(td5_1);
          td5_2.innerHTML = obj[i].STUDENTCODE;
          tr5.appendChild(td5_2);

          td6_1.innerHTML = 'Faculty';
          tr6.appendChild(td6_1);
          td6_2.innerHTML = obj[i].FACULTYNAME + ', ' + obj[i].FACULTYNAMEENG;
          tr6.appendChild(td6_2);

          td7_1.innerHTML = 'Major';
          tr7.appendChild(td7_1);
          td7_2.innerHTML = obj[i].PROGRAMNAME + ', ' + obj[i].PROGRAMNAMEENG;
          tr7.appendChild(td7_2);

          td8_1.innerHTML = 'Status';
          tr8.appendChild(td8_1);
          td8_2.innerHTML = obj[i].STUDENTSTATUS;
          tr8.appendChild(td8_2);

          td9_1.innerHTML = 'Date of Graduation';
          tr9.appendChild(td9_1);
          td9_2.innerHTML = obj[i].DATEOFGRADUATED;
          tr9.appendChild(td9_2);

          td10_1.innerHTML = 'Signed By';
          tr10.appendChild(td10_1);
          td10_2.innerHTML = obj[i].SIGNBY;
          tr10.appendChild(td10_2);

          td11_1.innerHTML = 'Permission';
          tr11.appendChild(td11_1);
          if(obj[i].reject== 1){
            td11_2.innerHTML = "ไม่อนุญาตให้ตรวจสอบ";
          }
          else{
            td11_2.innerHTML = "อนุญาตให้ตรวจสอบได้";
          }
          td11_2.setAttribute('id', obj[i].REFCODE);
          tr11.appendChild(td11_2);



          var rejectButton = document.createElement('button');
          var allowButton = document.createElement('button');

          var funct = "reject(" + obj[i].REFCODE +")";
          rejectButton.setAttribute("onclick", funct);
          rejectButton.setAttribute("class", "btn btn-danger");
          rejectButton.setAttribute("style", "float:left");

          var allowFunc = "allow(" + obj[i].REFCODE +')';
          allowButton.setAttribute('onclick', allowFunc);
          allowButton.setAttribute("class", "btn btn-primary");
          allowButton.setAttribute("style", "float:right");


          rejectButton.innerHTML = "reject";
          allowButton.innerHTML = "allow";

          td3_1.appendChild(rejectButton);
          td3_2.appendChild(allowButton);

          tr3.appendChild(td3_2);
          tr3.appendChild(td3_1);


          inside_table.appendChild(tr1);
          inside_table.appendChild(tr2);
          inside_table.appendChild(tr4);
          inside_table.appendChild(tr5);
          inside_table.appendChild(tr6);
          inside_table.appendChild(tr7);
          inside_table.appendChild(tr8);
          inside_table.appendChild(tr9);
          inside_table.appendChild(tr10);
          inside_table.appendChild(tr11);


          inside_table.appendChild(tr3);
          myNode.appendChild(container);
        }

        // document.getElementById("demo").innerHTML =   '<br><div class="container panel">'+
                                                      // '<br><h1>' +obj.status + '</h1><br>'+
                                                      // '</div>';
      }
    };
    var keyword = document.getElementById("searchdoc").value;
    var url =  "{{asset('/getdocresults?search=')}}" + keyword;
    // alert(url);
    xhttp.open("GET", url, true);
    xhttp.send();
  }
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
