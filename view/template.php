<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="ressources/css/style.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
        
    <body>
    	<?php
            print_r($_POST);
    		if(isset($_SESSION["id"])){
    			require('memberMenu.php');
    		}
    		else
    		{
    			require('view/visitorMenu.php');
    		}
    	?>
        <?php if(isset($_SESSION['info'])){ echo '<div id = "info">'.$_SESSION['info'].'</div>'; unset($_SESSION['info']);} ?>
        <?php if(isset($_SESSION['error'])){ echo '<div id = "error">'.$_SESSION['error'].'</div>'; unset($_SESSION['error']);} ?>
        <?= $content ?>
          
    </body>
    <script>
    </script>
</html>