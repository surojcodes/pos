@extends('layout.auth_layout')
@section('title')
Log In
@endsection
@section('content')
    <div class="d-flex flex-column flex-root">
			<div class="login d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url('/media/bg/bg-2.jpg');">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden col-lg-5 col-md-6 col-sm-8 ">
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="/media/tjb/juice-logo.png" class="max-h-150px" alt="" />
							</a>
						</div>
						<div class="login-signin">
							<div class="mb-20">
								<h3 class="opacity-90 font-weight-normal">Sign In To {{env('APP_NAME')}}</h3>
								<p class="opacity-40">Enter your details to login to your account:</p>
							</div>
							<form class="form" id="kt_login_signin_form" method="POST" action="{{ route('login') }}">
							@csrf
								<div class="form-group">
									<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('username') is-invalid @enderror" type="text" placeholder="User ID" name="username" value="{{ old('username') }}" autocomplete="off" id='username' autofocus required/>
									@error('username')
										<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
										</span>
								@enderror
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" id='password'/>
									@error('password')
										<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
										</span>
								@enderror
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
									<div class="checkbox-inline">
										<label class="checkbox checkbox-outline checkbox-white text-white m-0">
										<input type="checkbox" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }} />
										<span></span>Remember me</label>
									</div>
								</div>
								<div class="form-group text-center mt-10">
									<button id="kt_login_signin_submit" type='submit' class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
