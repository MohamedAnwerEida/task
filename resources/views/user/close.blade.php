@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">
              Close Account
            </h3>
          </div>
          <div class="panel-body">
            @if (@$success == true )
                <div  class="row">
                  <div class="col-md-12">
                    <div class="alert alert-danger">
                      The close was successful
                    </div>
                  </div>
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                    <label for="hobbies" class="col-md-4 control-label">reason why you will close your account</label>

                    <div class="col-md-6">
                        <textarea id="reason" class="form-control" name="reason" required>{{ old('reason') ? old('reason') : $user->reason  }}</textarea>

                        @if ($errors->has('reason'))
                            <span class="help-block">
                                <strong>{{ $errors->first('reason') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-danger">
                            Close
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
