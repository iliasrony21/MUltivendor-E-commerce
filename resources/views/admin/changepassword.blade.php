@extends('admin.includes.master')
@section('admin')
<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box">
				<div class="card-body">
					<div class="p-4 rounded  border">
						<div class="text-center">
							<img src="assets/images/icons/forgot-2.png" width="120" alt="" />
						</div>
						<h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
						<p class="text-muted">Enter your registered email ID to reset the password</p>
				<form action="{{ route('admin.updatepassword') }}" method="POST">
                    @csrf
                        <div class="my-4">
							<label class="form-label">Old password</label>
							<input name="old_password" type="password" class="form-control form-control-lg" placeholder="Type your old password" />
                            @error("old_password")
                            <span class="text-danger">{{message}}</span>
                            @enderror
                        </div>
                        <div class="my-4">
							<label class="form-label">New password</label>
							<input name="new_password" type="password" class="form-control form-control-lg" placeholder="Type your new password" />
                            @error("new_password")
                            <span class="text-danger">{{message}}</span>
                            @enderror
                        </div>
                        <div class="my-4">
							<label class="form-label">confirmation password</label>
							<input name="confirmation_password" type="password" class="form-control form-control-lg" placeholder="Type your new password" />
                            @error("confirmation_password")
                              <span class="text-danger">{{message}}</span>
                             @enderror
                        </div>
						<div class="d-grid gap-2">
							<button  class="btn btn-primary btn-lg">Send</button> <a href="authentication-signin.html" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
						</div>
                        </form>

					</div>
				</div>
			</div>
		</div>
        @endsection
