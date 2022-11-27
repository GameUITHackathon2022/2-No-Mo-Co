<?php
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $avatar = basename($_FILES['ingredient_img']['name']);
};
if (isset($_POST['submit_btn']) && $_POST['submit_btn']) {

    // Upload avatar to directory "avartars"
    $target_dir = "./assets/img/";
    $target_file = $target_dir . $avatar;
    $is_file_uploaded = move_uploaded_file($_FILES["ingredient_img"]["tmp_name"], $target_file);
    $avatar_path = $target_dir . $avatar;
};
error_reporting(0);


?>

            <input type="file" id="ingredient-img" name="ingredient_img" accept="image/*" id="avatar">
            <input type="submit" class="form_field__label btn-hover color-9" id="check-ingredient-btn" name="submit_btn" value="Register">



        <script src="./assets/js/foodRegcog.js">
        </script>
        <script>
            // var link = "."
            // var array = getFood(link)
            // abc(array)

            document.getElementById('ingredient-img').onchange = function() {
                var imgURL = "./assets/img/" + this.value.replace(/.*[\/\\]/, '');

                getFood(imgURL)
                // alert('Selected file: ' + imgURL);
            };


            document.querySelector('#check-ingredient-btn').onclick = function() {

                var checkIngredientForm = document.querySelector('#add-food-form');
            }
        </script>
        <script>
            var avatar = document.getElementById('avatar');
        </script>

        <script>
            function visible() {
                var temp = document.querySelector('.ingre-container')
                temp.classList.remove("no-display");
            }
        </script>


