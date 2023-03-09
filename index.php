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
        
        <p><h1 style="color:rgb(5, 5, 5);text-align:center"> Hello <?= htmlspecialchars($user["name"]) ?></h1></p>
        
        
    <?php else: ?>
        
        <p><a href="start.html">goto start page</a></p>
        
    <?php endif; ?>
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    