@extends('layouts.app')

@section('content')
  <br>
<div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">เพิ่มผู้ใช้งาน</div>

                  <div class="panel-body">
                    @if ( Session::has('success') )
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>{{ Session::get('success') }}</strong>
                </div>
                @endif

                @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>{{ Session::get('error') }}</strong>
                </div>
                @endif
                      <form class="form-horizontal" method="POST" action="{{ asset('/addNewUser') }}">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Name</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Password</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      ตกลง
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
