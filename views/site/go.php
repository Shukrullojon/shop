<?php

    echo "<h1>Hello world</h1>";
?>

<section class="page">
    <div class="container">
        <?php
            foreach($go as $item=>$value){
                echo $value['description'];
            }
        ?>
    </div>
</section>

