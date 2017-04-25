<div id="login-register-password">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">ورود</a></li>
    <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">ثبت نام</a></li>
  </ul>
	  <div class="tab-content" role="tablist">
		<div role="tabpanel" class="tab-pane fade in active" id="login">
		<h3>Log In!</h3>
		<p>Log in Now Simple...</p>
			<form method="post" action="ol-admin/login.php" class="wp-user-form">
				<div class="username">
					<label for="user_login"> UserName : </label>
					<input class="form-control" type="text" name="email" id="formGroupInputSmall" placeholder="write your username right here">
				</div>
				<div class="password">
					<label for="user_pass"> Password : </label>
					<input class="form-control" type="password" name="password" id="formGroupInputSmall" placeholder="write your password right here">
				</div></br>
				<div class="login_fields">
					<div class="rememberme pull-left">
						<label for="rememberme">
							<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> Remember me
						</label>
					</div></br>
					<input type="submit" name="user-submit" class="btn btn-info btn-lg" value="Login" tabindex="14" class="user-submit" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="register" >
			<h3>Register Now!</h3>
			<p>Register For Free Right Now Easy And Sinple.</p>
		</div>
</div>
</div>
