@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <div class="panel-body">
                  @if (@$success == true )
                      <div  class="row">
                        <div class="col-md-12">
                          <div class="alert alert-success">
                            The edit was successful
                          </div>
                        </div>
                      </div>
                  @endif
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name')? old('name') : $user->name }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}  " required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select name="gender" class="form-control" required>
                                    <option value="male" >male</option>
                                    <option value="female" >female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('hobbies') ? ' has-error' : '' }}">
                            <label for="hobbies" class="col-md-4 control-label">Hobbies</label>

                            <div class="col-md-6">
                                <textarea id="hobbies" class="form-control" name="hobbies" required>{{ old('hobbies') ? old('hobbies') : $user->hobbies  }}</textarea>

                                @if ($errors->has('hobbies'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hobbies') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}" >
                        		<label for="image" class="col-md-4 control-label">Profile Image</label>
                        		<div class="col-md-6">
                        			<input name="image" id="image" type="file" class="form-control">
                        			@if ($errors->has('image'))
                        				<span class="help-block">
                        					<strong>{{ $errors->first('image') }}</strong>
                        				</span>
                        			@endif
                              @if (!empty($user->image))
                                
                        				<div class="col-sm-offset-2 col-sm-8">
                          				<div class="thumbnail">
                          					<img src="{{ url('/upload/'.$user->image) }}">
                          				</div>
                        				</div>
                        			@endif
                        		</div>
                      	</div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
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
