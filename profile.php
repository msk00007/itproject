<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <style>body{background-image: url("abstract-ocean-beach-watercolor-background-textures-backgrounds-161675563.jpg");
       background-repeat: no-repeat;
       background-position:center;
       background-size: cover;
       font-family: Georgia, 'Times New Roman', Times, serif;}</style>
       
</head>
<body>

    <?php if (isset($user)): ?>
        <table>
        <tr>
			<th>Your Details</th>
			<th>MySQL Server Details</th>
		</tr>
        <tr>
        <td>name : </td>
        <td><h4><?= htmlspecialchars($user["name"]) ?></h4>
    </tr>
    <td>phone no : </td>
        <td><h4><?= htmlspecialchars($user["phone"]) ?></h4>
    </tr>
    <td>DOB : </td>
        <td><h4><?= htmlspecialchars($user["dob"]) ?></h4>
    </tr>
    <td>email : </td>
        <td><h4><?= htmlspecialchars($user["email"]) ?></h4>
    </tr>
        </table>
        
    <?php else: ?>
        
        <p>please log in </p>
        
    <?php endif; ?>
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    