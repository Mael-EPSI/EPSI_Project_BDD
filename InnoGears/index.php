<?php require('actions/singupaction.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>

    <!-- formulaire avec comme condition email, pseudo ,password and confirmpassword -->
    <?php if(isset($errorMSG)){ echo $errorMSG;} ?>
    
    <form methode="POST">
        <label for="email">Email:</label><br>
        <input type="email" name="email"><br>

        <label for="pseudo">Pseudo:</label><br>
        <input type="text" name="pseudo"><br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="password"><br>
        
        <label for="confirmPassword">Confirm Password:</label><br>
        <input type="password" name="confirmPassword"><br>
        
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
