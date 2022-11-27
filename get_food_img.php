<?php
    if (isset($_POST['ingredient_img'])) {
        echo $_POST['ingredient_img'][['name']];
    }
?>