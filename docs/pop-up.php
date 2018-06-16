<div id="pop-up" style="background-image: url(uploads/<?php echo $_SESSION['userAvatar'] ?>)">
	<i class="fas fa-times hide-popup"></i>
	<div class="content">
	<?php if (!isset($_SESSION["id"])): ?>
		<!-- Login -->
		<form action="" class="form-up login" autocomplete="on">
			<p class="info">E-mail</p>
			<input type="email" name="email">
			<p class="info">Senha</p>
			<input type="password" name="password">
			<div class="tool">
				<span><input type="checkbox" name="showPass"><p>Mostrar senha</p></span>
				<span><input type="checkbox" name="remember"><p>Manter logado</p></span>
			</div>
			<input type="submit" value="Logar" name="login">
			<input type="button" value="Não tenho uma conta">
		</form>
		<!-- Register -->
		<form action="" class="form-up register">
			<p class="info">Login</p>
			<input type="text" name="username">
			<p class="info">Primeiro nome</p>
			<input type="text" name="first_name">
			<p class="info">Segundo nome</p>
			<input type="text" name="last_name">
			<p class="info">E-mail</p>
			<input type="email" name="email">
			<p class="info">Senha</p>
			<input type="password" name="password">
			<p class="info">Confirmação de senha</p>
			<input type="password">
			<input type="submit" value="Registrar" name="register">
			<input type="button" value="Já tenho uma conta">
		</form>
	<?php else: ?>
		<!-- Painel -->
		<div id="painel-container">
			<div class="change-picture-container">
				<i class="fas fa-times hide-popup"></i>
				<div class="content">
					<div class="images">
						<div class="image">
							<img src="uploads/<?php echo $_SESSION["userAvatar"] ?>" alt="">
						</div>
						<div class="preview">
							<img src="uploads/<?php echo $_SESSION["userAvatar"] ?>" alt="">
						</div>
					</div>
					<form>
						<input type="file" id="upload-photo">
						<label for="upload-photo">Escolher arquivo...</label>
						<input type="submit" value="salvar">
					</form>
				</div>
			</div> <!-- change-picture-container -->

			<div class="profile-picture">
				<img src="uploads/<?php echo $_SESSION["userAvatar"] ?>" alt="">
			</div> <!-- profile-picture -->
			<ul>
				<li>
					<h2>Informações do usuário</h2>
					<ul>
						<li>
							<h3>Usuário</h3>
							<p><?php echo $_SESSION["username"] ?></p>
						</li>
						<li>
							<h3>Nome</h3>
							<p><?php echo $_SESSION["firstName"] ?></p>
						</li>
						<li>
							<h3>Sobrenome</h3>
							<p><?php echo $_SESSION["lastName"] ?></p>
						</li>
						<li>
							<h3>Cargo</h3>
							<p>Default</p>
						</li>
						<li>
							<h3>UserID</h3>
							<p><?php echo $_SESSION["id"] ?></p>
						</li>
					</ul>
				</li>

				<li>
					<h2>Biografia</h2>
					<ul>
						<li>
							<p class="biography">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur officiis dolor soluta cupiditate corporis praesentium, adipisci molestiae blanditiis laudantium voluptatum quibusdam, sit magni eius sapiente ratione doloremque ad repudiandae.</p>
						</li>
					</ul>
				</li>

				<li>
					<h2>Plano de Fundo</h2>
				</li>
			</ul>
		</div>
	<?php endif; ?>
	</div>
</div>
