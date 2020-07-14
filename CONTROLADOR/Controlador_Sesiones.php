<?php

    if (!isset($_SESSION['ID_Cliente']))
    { 
        session_start();
        session_destroy();
        unset($_SESSION);
        
        echo '<script> document.location.href="../index.php";</script>';    
        
    }

?>

