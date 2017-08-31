<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="#" class="logo">
				<img src="../img/logo3.png" alt="" class="img-responsive" />
			</a>
			
			<p class="description">Estimado usuario, inicie sesion para acceder al área administrativa!</p>
			
			
		
		</div>
		
	</div>	
	
	
	<div class="login-form">
		
		<div class="login-content">
			
			<form action="secure_login.php" method='post' id="bb">				
				<div class="form-group">					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
							<input type="text" placeholder="Usuario" class="form-control" name="user_id_auth" id="textfield" data-rule-minlength="6" data-rule-required="true" required>
					</div>
				</div>				
								
				<div class="form-group">					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						<input type="password" name="pass_key" id="pwfield" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="Contraseña" required>
					</div>				
				</div>
				
				<div class="form-group">
					<button type="submit" name="btnLogin" class="btn btn-primary">
						Iniciar Sesión
						<i class="entypo-login"></i>
					</button>
				</div>
			</form>
		
				<div class="login-bottom-links">
					<a href="ajax_f.php" class="link">¿Olvido su Contraseña?</a>
				</div>			
		</div>
		
	</div>
	
</div>

