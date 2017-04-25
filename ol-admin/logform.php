<div id="login-register-password">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">ورود</a></li>
    <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">ثبت نام</a></li>
  </ul>
	  <div class="tab-content" role="tablist">
		<div role="tabpanel" class="tab-pane fade in active" id="login">
		<h3>وارد شوید!</h3>
		<p>به سادگی وارد حساب کاربری خود شوید!</p>
			<form method="post" action="ol-admin/login.php" class="wp-user-form">
				<div class="username">
					<label for="user_login"> نام کاربری : </label>
					<input class="form-control" type="text" name="email" id="formGroupInputSmall" placeholder="نام کاربری خود را وارد نمایید.">
				</div>
				<div class="password">
					<label for="user_pass"> گذرواژه : </label>
					<input class="form-control" type="password" name="password" id="formGroupInputSmall" placeholder="گذرواژه خود را وارد نمایید.">
				</div></br>
				<div class="login_fields">
					<div class="rememberme pull-left">
						<label for="rememberme">
							<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> مرا به خاطر بسپار
						</label>
					</div></br>
					<input type="submit" name="user-submit" class="btn btn-info btn-lg" value="ورود" tabindex="14" class="user-submit" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="register" >
			<h3>نام نویسی برای این سایت!</h3>
			<p>همین حالا ثبت نام کنید و از امکانات ویژه برخوردار شوید</p>
		</div>
</div>
</div>