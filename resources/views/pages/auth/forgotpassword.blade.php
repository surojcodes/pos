@extends('layout.auth_layout')
@section('title')
Reset Password
@endsection
@section('content')
<div class="d-flex flex-column flex-root">
			<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/media/bg/bg-2.jpg);">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden col-lg-5 col-md-6 col-sm-8">
          <div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="/media/logos/logo-letter-13.png" class="max-h-75px" alt="" />
							</a>
						</div>
						<div class="login-forgot">
							<div class="mb-20">
								<h3 class="opacity-40 font-weight-normal">Forgotten Password ?</h3>
								<p class="opacity-40">Enter your email to reset your password</p>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<button id="kt_login_forgot_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection