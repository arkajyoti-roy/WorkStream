

<!DOCTYPE html>
<html>

<head>
	<title>Forgot</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="loge.png">

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
	<img class="logo" src="img/loge.png" alt="">
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg3.png">
		</div>

		<div class="login-content">
			<form action="emp_email_verify.php" method="POST">
				<img src="img/for.png">
                <h4>Enter your email address</h4>
				<div class="input-div one" style="margin-top: 9px;">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="text" name="email" class="input" required>
					</div>
				</div>
				<input type="submit" class="btn" name="email_verify" value="Verify">
			</form>
		</div>
	</div>
	
	<style>
		
		#fowl {
			margin-top: -5px;
		}

		.captcha .captcha-form {
			display: flex;
		}

		.captcha-form:focus {
			box-shadow: none;
			border-color: #333;
			position: relative;
		}

		.captcha .preview {
			color: #555;
			width: 100%;
			text-align: left;
			height: 40px;
			letter-spacing: 8px;
			font-family: "monospace";
			border: none;
		}

		.captcha-refresh {
			width: 40px;
			border: none;
			outline: none;
			color: #000;
			cursor: pointer;
			margin-top: 0px;
			margin-left: 0px;
		}

		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Poppins', sans-serif;
			overflow: hidden;
		}

		.wave {
			position: fixed;
			bottom: 0;
			left: 0;
			height: 100%;
			z-index: -1;
		}

		.container {
			width: 100vw;
			height: 100vh;
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			grid-gap: 7rem;
			padding: 0 2rem;
		}

		.img {
			display: flex;
			justify-content: flex-end;
			align-items: center;
		}

		.login-content {
			display: flex;
			justify-content: flex-start;
			align-items: center;
			text-align: center;
		}

		.img img {
			margin-top: -140px;
			width: 500px;
		}

		form {
			margin-left: 25px;
			margin-top: -270px;
			width: 360px;
			border-radius: 9px;
			padding: 3%;
		}

		.login-content img {
			height: 100px;
		}

		.login-content h2 {
			margin: 15px 0;
			color: #333;
			text-transform: uppercase;
			font-size: 2.9rem;
		}

		.login-content .input-div {
			position: relative;
			display: grid;
			grid-template-columns: 7% 93%;
			margin: 25px 0;
			padding: 5px 0;
			border-bottom: 2px solid #d9d9d9;
		}

		.login-content .input-div.one {
			margin-top: 0;
		}

		.i {
			color: #d9d9d9;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.i i {
			transition: .3s;
		}

		.input-div>div {
			position: relative;
			height: 45px;
		}

		.input-div>div>h5 {
			position: absolute;
			left: 10px;
			top: 50%;
			transform: translateY(-50%);
			color: #999;
			font-size: 18px;
			transition: .3s;
		}

		.input-div:before,
		.input-div:after {
			content: '';
			position: absolute;
			bottom: -2px;
			width: 0%;
			height: 2px;
			background-color: #3888d3;
			transition: .4s;
		}

		.input-div:before {
			right: 50%;
		}

		.input-div:after {
			left: 50%;
		}

		.input-div.focus:before,
		.input-div.focus:after {
			width: 50%;
		}

		.input-div.focus>div>h5 {
			top: -5px;
			font-size: 15px;
		}

		.input-div.focus>.i>i {
			color: #3888d3;
		}

		.input-div>div>input {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			border: none;
			outline: none;
			background: none;
			padding: 0.5rem 0.7rem;
			font-size: 1.2rem;
			color: #555;
			font-family: 'poppins', sans-serif;
		}

		.input-div.pass {
			margin-bottom: 4px;
		}

		a {
			display: block;
			text-align: right;
			text-decoration: none;
			color: #999;
			font-size: 0.9rem;
			transition: .3s;
		}

		a:hover {
			color: #3861d3;
		}

		.btn {
			display: block;
			width: 100%;
			height: 50px;
			border-radius: 25px;
			outline: none;
			border: none;
			background-image: linear-gradient(to right, #3273be, #385cd3, #6332be);
			background-size: 200%;
			font-size: 1.2rem;
			color: #fff;
			font-family: 'Poppins', sans-serif;
			text-transform: uppercase;
			margin: 1rem 0;
			cursor: pointer;
			transition: .5s;
		}

		.btn:hover {
			background-position: right;
		}


		@media screen and (max-width: 1050px) {
			.container {
				grid-gap: 5rem;
			}
		}

		@media screen and (max-width: 1000px) {
			form {
				width: 290px;
			}

			.login-content h2 {
				font-size: 2.4rem;
				margin: 8px 0;
			}

			.img img {
				width: 400px;
			}
		}

		@media screen and (max-width: 900px) {
			.container {
				grid-template-columns: 1fr;
			}

			.img {
				display: none;
			}

			.wave {
				display: none;
			}

			.login-content {
				justify-content: center;
			}
		}

		.logo {
			width: 208px;
			margin-left: 1345px;
		}
	</style>



	<script>
		const inputs = document.querySelectorAll(".input");


		function addcl() {
			let parent = this.parentNode.parentNode;
			parent.classList.add("focus");
		}

		function remcl() {
			let parent = this.parentNode.parentNode;
			if (this.value == "") {
				parent.classList.remove("focus");
			}
		}


		inputs.forEach(input => {
			input.addEventListener("focus", addcl);
			input.addEventListener("blur", remcl);
		});
	</script>
</body>

</html>