<?php
if (file_exists('./text.txt')) {
    $food_cate_arr = ['meat', 'dairy', 'oil', 'nut', 'fruit', 'vegetable', 'other'];
    $food_file = fopen('./text.txt', 'r');
    $food_arr = [];
    if ($food_file) {
        $count = 0;
        //Rice, 7, 2.7 CO2e to produce 1 kilogram or 2.2 pounds of rice
        while ($count < 100) {
            $food_item = fgets($food_file);
            $food_item_info = explode(',', $food_item);
            $food_item_info_name = $food_item_info[0];
            $food_item_info_cate = $food_item_info[1];
            // echo $food_item_info_name . "</br>";
            // echo $food_item_info_cate . "</br>";

            for ($i = 0; $i < count($food_item_info); $i++) {
                if (str_contains($food_item_info[$i], "kilogram") || str_contains($food_item_info[$i], "kg")) {
                    $food_item_info_kg = (float)substr($food_item_info[$i], 0, 5);
                }
            }

            switch ($food_item_info_cate) {
                case '1':
                    $food_item_info_cate = 'meat';
                    break;
                case '2':
                    $food_item_info_cate = 'dairy';
                    break;
                case '3':
                    $food_item_info_cate = 'oil';
                    break;
                case '4':
                    $food_item_info_cate = 'nut';
                    break;
                case '5':
                    $food_item_info_cate = 'fruit';
                    break;
                case '6':
                    $food_item_info_cate = 'vegetable';
                    break;
                case '7':
                    $food_item_info_cate = 'other';
                    break;
            }
            $food_arr[] = ['name' => $food_item_info_name, 'weight' => $food_item_info_kg, 'category' => $food_item_info_cate];
            $count++;
        }

        fclose($food_file);
    }

    if (isset($_POST["desired_cate"])) {
        $desired_cate_container = $_POST["desired_cate"];

        $is_true = false;

        for ($i = 0; $i < count($desired_cate_container); $i++) {
            $desired_cate_item = $desired_cate_container[$i];
            for ($j = 0; $j < count($food_arr); $j++) {
                $category = $food_arr[$j]['category'];
                $name = $food_arr[$j]['name'];
                $weight = $food_arr[$j]['weight'];

                if ($category == $desired_cate_item) {
                    $possible_options[$desired_cate_item][] = [$name, $weight];  // beef, lamb
                    $is_true = true;
                }
            }
        }


        function sortByWeight($a, $b)
        {
            return $a[1] > $b[1];
        }

        $count = 0;
        // $k = 0;
        // $l=0;
        // $i=0;
        if ($is_true) 
        // while($count<10 && $k<count($possible_options)){
        //     while($count<10 && $l<count($desired_cate_container) && $i < 3){
        //         while($count < 10){
        //             echo '<li class="">'.$possible_options[$desired_cate_container[$l]][$i][0].' </li>';
        //             $count++;
        //             $i++;
        //         }
        //         $l++;
        //     }
        //     $k++;
        // }
        $flag = 1;
            for ($k = 0; $k < count($possible_options); $k++) {
                for ($l = 0; $l < count($desired_cate_container); $l++) {
                    for($i=0; $i < 3; $i++) {
                        if($flag == 1) echo '<li class="">'.$possible_options[$desired_cate_container[$l]][$i][0].' </li>';
                        $count ++;
                        if ($count > 8) {
                            $flag = 0;
                            break;
                        }
                    }
                    if ($count > 8) {
                        break;
                    }
                    // print_r($possible_options[$desired_cate_container[$l]]);
                    // usort($possible_options[$desired_cate_container[$l]], 'sortByWeight'); //$people is now sorted by age (ascending)
                }
                echo "</br>";
            }
        
    }
}