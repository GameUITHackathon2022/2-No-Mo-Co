<?php
            if (file_exists('./text.txt')) {
                $food_file = fopen('./text.txt', 'r');
                $food_arr = [];
                if ($food_file) {
                    //Rice, 2.7 CO2e to produce 1 kilogram or 2.2 pounds of rice
                    while (($food_item = fgets($food_file)) !== false) {
                        $food_item_info = explode(',', $food_item);
                        $food_item_info_name = $food_item_info[0];

                        for ($i = 0; $i < count($food_item_info); $i++) {
                            if (str_contains($food_item_info[$i], "kilogram") || str_contains($food_item_info[$i], "kg")) {
                                $food_item_info_kg = (float)substr($food_item_info[$i], 0, 5);
                            }
                        }
                        $food_arr[] = $food_item_info_name;
                    }
                    // foreach($food_arr as $fud => $val) {
                    //     echo $fud . $val;
                    //     echo "</br>";
                    // }
                    // foreach($food_arr as $fud => $val) {
                    //     echo "\"" + $fud + "\"" + ",";
                    // };
                    // echo "\"\"";
                    echo json_encode($food_arr);

                    fclose($food_file);
                }
            }
            ?>