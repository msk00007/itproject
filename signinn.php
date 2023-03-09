
<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: welcome.html");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
	<title>Digital Library - Sign In</title>
	
</head>
<body>
	
	<h1>Digital Library</h1>
	<h2>Sign into your account</h2>

	<h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <center><em>Invalid login</em></center>
    <?php endif; ?>

	<form method="post">
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required><br><br>
		
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>

		<input type="submit" value="Sign In">
	</form>
</body>
</html>