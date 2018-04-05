<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>KKU Transcript</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.css"/>
  <link href="http://103.58.148.13/~checkove/kada/css/layout_app.css" rel="stylesheet" type="text/css">
    <link href="http://103.58.148.13/~checkove/kada/css/managedoc.css" rel="stylesheet" type="text/css">
  <!-- JavaScript -->

</head>
<body>
  <div class="topbar">
    <div class="row row-topbar">
      <div class="col-md-4 col-xs-12 lefttopbar">
        <div class="row">
        <div class="col-xs-4">
          <br>
          <center><img src="http://103.58.148.13/~checkove/kada/images/logokku.png" class="logokku"/></center>
          <br>
        </div>
        <div class="col-xs-8" class="kadatext">
          <h1>KADA</h1>
          <h3>KKU Academic Document App</h3>
        </div>
      </div>
      </div>

    </div>
  </div>
    <div style="background:white;padding:15px;">
    <h5 style="max-width:20%;display:inline">ค้นหาเอกสาร</h5>
    <input style="max-width:80%;display:inline" type="text" placeholder="ค้นหาจากชื่อ, รหัสนักศึกษา, ..." id="searchdoc" class="form-control searchfilter" onkeyup="loadDoc()">
  </div>
    <div id="demo"></div>







</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
  <script>
  function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var obj = JSON.parse(this.responseText);
        console.log(obj);
        var myNode = document.getElementById("demo");
        while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);
        }
        // alert(obj.length);
        for(i = 0;i < obj.length; i++){
          var container = document.createElement('div');
          container.setAttribute("class", "container panel");
          container.setAttribute('style', 'margin:10px')
          var table = document.createElement('TABLE');
          container.appendChild(table);
          table.setAttribute("class", "table")
          var tr = document.createElement('TR');
          var td1 = document.createElement('TD');
          var td2 = document.createElement('TD');
          var td3 = document.createElement('TD');
          td1.innerHTML = 'Refcode';
          tr.appendChild(td1);
          td2.innerHTML = obj[i].REFCODE;
          tr.appendChild(td2);
          table.appendChild(tr);
          var rejectButton = document.createElement('button');
          rejectButton.setAttribute("onclick", "http://103.58.148.13/~checkove/kada/reject/" + obj[i].REFCODE);
          rejectButton.setAttribute("class", "btn btn-danger");
          rejectButton.setAttribute("style", "float:right");
          rejectButton.innerHTML = "reject";
          td3.appendChild(rejectButton);
          tr.appendChild(td3);
          myNode.appendChild(container);
        }

        // document.getElementById("demo").innerHTML =   '<br><div class="container panel">'+
                                                      // '<br><h1>' +obj.status + '</h1><br>'+
                                                      // '</div>';
      }
    };
    var keyword = document.getElementById("searchdoc").value;
    var url =  "http://103.58.148.13/~checkove/kada/getdocresults?search=" + keyword;
    // alert(url);
    xhttp.open("GET", url, true);
    xhttp.send();
  }
  </script>
</html>
