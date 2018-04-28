@extends('layouts.app')
@section('style')
  <style>
   .thsort{
    cursor: pointer;
  }
  </style>
  <link href="{{asset('/css/pagination.css')}}" rel="stylesheet">
  @endsection
@section('content')
  <div class="container">
    <div class="row">
      <div /class="col-md-6 col-xs-12">
        <form action="{{asset('usermanage')}}">
       <div class="form-group searchbox">
       <div class="input-group input-group-sm" style="margin:10px">
       <div class="icon-addon addon-sm">
           <input type="text" name="q" placeholder=" ค้นหาผู้ใช้จาก ชื่อ หรือ อีเมล์" class="form-control search-form" id="Search" class="topbar-search"  style="height:44px">
       </div>
           <span class="input-group-btn">
           <button class="searchbtn btn-primary bgred" type="submit"><img src="{{asset('images/wsearcher.png')}}" class="searchicon" style="width:39; height:39px;"></button>
           </span>
       </div>
       </div>
     </form>
   </div>
    </div>

    <a href="{{asset('/adduser')}}"><button class="btn btn-success dropdown-button-topbar" >เพิ่มผู้ใช้</button></a>
    <br>
    <br>
    <div class="table-responsive table">
      <table id="myTable" class="table table-striped">
        <thead>
          <tr>
            <th onclick="window.location='{{asset('usermanage?sort_by=id&sorting=')}}@if($default_sort == 'id'){{$sorting}}@else{{'desc'}}@endif&q={{$q}}'" class="thsort">
              <div style="display:flex"><span>ID</span>
              @if($default_sort == 'id')<span class="glyphicon {{'glyphicon-sort-by-attributes'}}@if($sorting == 'asc'){{'-alt'}}@endif" style="float:right"></span>@endif
              </div></th>
            <th onclick="window.location='{{asset('usermanage?sort_by=name&sorting=')}}@if($default_sort == 'name'){{$sorting}}@else{{'desc'}}@endif&q={{$q}}'" class="thsort">
              <div style="display:flex"><span>Name</span>
              @if($default_sort == 'name')<span class="glyphicon {{'glyphicon-sort-by-attributes'}}@if($sorting == 'asc'){{'-alt'}}@endif" style="float:right"></span>@endif
            </div></th>
            <th onclick="window.location='{{asset('usermanage?sort_by=email&sorting=')}}@if($default_sort == 'email'){{$sorting}}@else{{'desc'}}@endif&q={{$q}}'" class="thsort">
              <div style="display:flex"><span>Email</span>
              @if($default_sort == 'email')<span class="glyphicon {{'glyphicon-sort-by-attributes'}}@if($sorting == 'asc'){{'-alt'}}@endif" style="float:right"></span>@endif
            </div></th>
            <th onclick="window.location='{{asset('usermanage?sort_by=user_type&sorting=')}}@if($default_sort == 'user_type'){{$sorting}}@else{{'desc'}}@endif&q={{$q}}'" class="thsort">
              <div style="display:flex"><span>ประเภท</span>
            @if($default_sort == 'user_type')<span class="glyphicon {{'glyphicon-sort-by-attributes'}}@if($sorting == 'asc'){{'-alt'}}@endif" style="float:right"></span>@endif
            </div></th>

            <th>ลบสมาชิก</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $users)
            <tr>
              <td>{{ $users->id }}</td>
              <td>{{ $users->name }}</td>
              <td>{{ $users->email }}</td>
              <td>{{ $users->user_type }}</td>

              <td><a href="{{asset('/')}}deleteuser/{{ $users->id }}"><button type="button" class="btn btn-danger">ลบสมาชิก</button></a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div id="pagebutton" align='center'>
      <ul id="pagination-demo" class="pagination"></ul>
    </div>
  </div>

@endsection
@section('script')
  <script type="text/javascript" src="{{ asset('js/jquery.twbsPagination.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>

<script>$(document).ready(function(){

    $('#pagination-demo').twbsPagination({
          totalPages: {{$maxpage}},
          visiblePages: 5,
          first:'<div class="first-page"><span>First</span></div>',
          last:'<div class="last-page"><span>Last</span></div>',
          prev:'<div class="prev-page"><span>Previous</span></div>',
          next:'<div class="next-page"><span>Next</span></div>',
          initiateStartPageClick:false,
          startPage:{{$page}},
          onPageClick: function (event, page) {
              // $('#page-content').text('Page ' + page);
              // alert(page);
              window.location = "{{asset('/usermanage?page=')}}"+String(page)+'&sort_by='+'{{$default_sort}}'+'&sorting='+'{{$current_sorting}}'+'&q={{$q}}';
          }
      });

});</script>
@endsection
