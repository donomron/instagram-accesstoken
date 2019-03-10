<?php 
	include 'config.php'; 
	session_start();

	if(!empty($_POST['clientId']) && !empty($_POST['clientSecret'])){
		$_SESSION["clientId"] = trim($_POST['clientId']);
		$_SESSION["clientSecret"] = trim($_POST['clientSecret']);
		$url = 'https://www.instagram.com/oauth/authorize/?client_id='.$_POST['clientId'].'&redirect_uri='.$redirectUri.'&response_type=code';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instagram AccessToken</title>	
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="page">
		<?php if(!empty($_GET['token'])): ?>
			<div class="form-field">
				<label>Your access token is:</label>
				<input class="code" id="code" type="text" value="<?=$_GET['token']?>" readonly> 
				<button id="copy" class="btn btn--sm" style="margin-left: 15px;">
					Copy to Clipboard
					<span class="tooltip" id="tooltip">Copied to clipboard</span>
				</button>
			</div>
		<?php elseif(!empty($_POST['clientId']) && !empty($_POST['clientSecret'])): ?>
			<a href="<?=$url?>" class="btn" id="btn">Click To Get AccessToken</a>
		<?php else: ?>		
			<div>
				<p>Set Valid redirect URI on instagram api to this: </p>
				<input class="input input--solid code" type="text" id="code" readonly value="<?=$redirectUri?>">				
				<button id="copy" class="btn btn--xs" style="margin-left: 15px;">
					Copy to Clipboard
					<span class="tooltip" id="tooltip">Copied to clipboard</span>
				</button>
			</div>
			<form class="form" action="" method="POST">
				<div class="form-field">
					<label for="clientId">client id:</label>
					<input type="text" id="clientId" name="clientId">
				</div>

				<div class="form-field">
					<label for="clientSecret">client secret:</label>
					<input type="text" id="clientSecret" name="clientSecret">
				</div>

				<?php if((isset($_POST['clientId']) && empty($_POST['clientId'])) || (isset($_POST['clientSecret']) && empty($_POST['clientSecret']))): ?>
					<div class="form-error" id="error">Please fill both fields</div>
				<?php endif; ?>
				
				<input class="btn" type="submit" value="Submit Form">
			</form>			
		<?php endif; ?>	
	</div>

	
	<script src="script.js"></script>
</body>
</html>