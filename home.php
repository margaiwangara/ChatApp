<?php

//include layout
include_once 'layout.php';

?>
<title>Home</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(isset($_SESSION['USERNAME'])) 
                {
                    echo "Welcome ".$_SESSION['USERNAME']; 
                    //display logout option
                    echo "<span class='pull-right'><a href='logout.php'>Log Out</a></span>";
                }
                else 
                    echo "Welcome Guest";
            ?>
        </div>
    </div>
</div>