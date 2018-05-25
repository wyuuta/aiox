@extends('layouts.app')
@section('navbarlink')
<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="{{route('instant')}}">Tukar Instan</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{url('/market/IDR/BTC')}}">Market</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('balance')}}">Balance</a></li>
    <li class="nav-item active" ><a class="nav-link" href="{{route('profil')}}">Profile</a></li>
</ul>
@endsection
@section('content')
<!-- Profile side bar -->
<div class="row" style="height: 1080px">
	<div class="col-md-2">
		<div class="sidenav">
			<div class="profilepict">
				<img src="/image/avatars/{{ $profile->avatar }}" style="width:150px; height:150px; margin-right:25px; border-radius:50%; " class="img-thumbnail">
				
					<form enctype="multipart/form-data" action="/profils" method="POST">
<!-- 					<label style="color:white ">Update Profile Image</label>
 -->					<input type="file" name="avatar">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" class="pull-right btn-sm btn-primary">	
				</form>
				
			</div>
			<hr/>
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link active" href="#detilakun" data-toggle="tab">
						Akun
					</a>
				</li>
				<hr/>
				<li class="nav-item">
					<a class="nav-link" href="#editakun" data-toggle="tab">
						Edit Akun
					</a>
				</li>
				<hr/>
				<li class="nav-item">
					<a class="nav-link" href="#keamanan" data-toggle="tab">
						Keamanan
					</a>
				</li>
				<hr/>
			</ul>
			
		</div>
	</div>

<!-- Profile content -->
	<div class="col-md-10">
	<div class="tab-content clearfix tab-content-dark" style="margin-top: 80px;">
		<div class="tab-pane active" id="detilakun"	>
			<div class="card-body">
			<div class="row m15">
				<div class="col-md-3">
					Nama Lengkap
				</div>
				<div class="col-md-8">
					{{$profile->name}}
				</div>
			</div>
			<div class="row m15">
				
				<div class="col-md-3">
					Email
				</div>
				<div class="col-md-8">
					{{$profile->email}}
				</div>
				
			</div>
			<div class="row m15">
				
				<div class="col-md-3">
					Nomor HP
				</div>
				<div class="col-md-8">
					{{$profile->phone}}
				</div>
				
			</div>
			<div class="row m15">
				
				<div class="col-md-3">
					Alamat
				</div>
				<div class="col-md-8">
					{{$profile->address}}
				</div>
				
			</div>
		</div>
		</div>
		<div class="tab-pane fade" id="editakun">
			<div class="card-body">
	        <form method="POST" action="{{url('/profil/submit')}}">
            {{ csrf_field() }}

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$profile->name}}" required autofocus>

                  @if ($errors->has('name'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$profile->email}}" required>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

              <div class="col-md-6">
                  <input id="phone" class="form-control" type="text" name="phone" value="{{$profile->phone}}">
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

              <div class="col-md-6">
                  <input id="address" class="form-control" type="text" name="address" value="{{$profile->address}}">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Update') }}
                  </button>
              </div>
            </div>
	        </form>
	    </div>
		</div>
		<div class="tab-pane fade" id="keamanan">
			<div class="card-body">
        <form method="POST" action="{{url('/profil/changepass')}}">
          {{ csrf_field() }}
          <div class="form-group row">
            <label for="oldpassword" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

            <div class="col-md-6">
              <input id="oldpassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="oldpassword" required>
            </div>
        	</div>

        	<div class="form-group row">
            <label for="newpassword" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

            <div class="col-md-6">
              <input id="newpassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="newpassword" required>
            </div>
        	</div>

        	<div class="form-group row">
            <label for="newpassword-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
              <input id="newpassword-confirm" type="password" class="form-control" name="newpassconfirm" required>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                  {{ __('Change Password') }}
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