<?php
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>NoMoCo</title>
</head>

<body>
    <header>
        <?php
        include_once('./header.php');
        ?>
    </header>

    <main>
        <div class="option">
            <div class="option-item  selected">
                Meal Planner
            </div>

            <div class="option-item">
                Blog
            </div>
        </div>



        <div class="meal">

            <div class="meal-header">
                <form action="" method="POST" id="add-desired-cate">
                    <div class="form-name"> <strong>Preferences:</strong> </div>
                    <label for="meat">Meat</label>
                    <input type="checkbox" id="meat" name="desired_cate[]" value="meat">

                    <label for="oil">Dairy</label>
                    <input type="checkbox" id="dairy" name="desired_cate[]" value="oil">

                    <label for="oil">Oil</label>
                    <input type="checkbox" id="oil" name="desired_cate[]" value="oil">

                    <label for="">Nuts</label>
                    <input type="checkbox" id="nut" name="desired_cate[]" value="nut">

                    <label for="fruit">Fruits</label>
                    <input type="checkbox" id="fruit" name="desired_cate[]" value="fruit">

                    <label for="vegetable">Vegetable</label>
                    <input type="checkbox" id="vegetable" name="desired_cate[]" value="vegetable">

                    <label for="other">Others</label>
                    <input type="checkbox" id="other" name="desired_cate_submit" value="other">

                    <!-- <input type="submit" id="add-desired-cate-btn" value="Accept"> -->
                </form>
             
                <script>
                    function renderSuggestions(fd) {
                        $.ajax({
                            url: "./suggest.php",
                            method: "POST",
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                document.querySelector('.suggestion-container').innerHTML = response;
                            },
                            failure: function() {
                                alert("Something went wrong! Please try again.")
                            },
                            error: function() {
                                alert("Something went wrong! Please try again.")
                            }
                        })
                    }
                    document.querySelector('#add-desired-cate').onchange = function() {
                        var desiredCateContainer = Array.from(document.querySelectorAll('#add-desired-cate input:checked'));
                        var fd = new FormData();
                        desiredCateContainer.forEach(desiredCateItem => {
                            fd.append('desired_cate[]', desiredCateItem.value);
                            // formData.append('arr[]', arr[i]);
                            console.log(fd.get(desiredCateItem.id))
                            renderSuggestions(fd);
                        })
                    }
                </script>

                <div class="meal-cf-total">
                    <strong> CO2 Emission:</strong> <span></span> kg
                </div>

                <div class="meal-cf-level">
                    <strong>Level: </strong> <span> </span>
                </div>

                <div class="meal-add">
                    <div class="close-btnnn">Reset</div>
                </div>

            </div>


            <div class="meal-content">
                <table class="meal-table" border="0.5px #eee solid">
                    <thead class="meal-table--thead">
                        <tr>
                            <td></td>
                            <td>Monday</td>
                            <td>Tuesday</td>
                            <td>Wednesday</td>
                            <td>Thursday</td>
                            <td>Friday</td>
                            <td>Saturday</td>
                            <td>Sunday</td>
                        </tr>
                    </thead>

                    <tbody class="meal-table--tbody">
                        <tr>
                            <td><strong>Breakfast</strong></td>
                            <td>
                                <div id="00" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="10" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="20" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="30" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="40" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="50" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="60" onclick="openModal(this.id)">+</div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Lunch</strong></td>
                            <td>
                                <div id="01" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="11" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="21" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="31" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="41" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="51" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="61" onclick="openModal(this.id)">+</div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Dinner</strong></td>
                            <td>
                                <div id="02" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="12" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="22" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="32" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="42" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="52" onclick="openModal(this.id)">+</div>
                            </td>
                            <td>
                                <div id="62" onclick="openModal(this.id)">+</div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td id="t01"></td>
                            <td id="t02"></td>
                            <td id="t03"></td>
                            <td id="t04"></td>
                            <td id="t05"></td>
                            <td id="t06"></td>
                            <td id="t07"></td>
                        </tr>
                    </tbody>
                </table>
            </div>





            <script>
                document.querySelector(".close-btnnn").addEventListener("click", function() {
                    localStorage.removeItem('schedule')
                    location.reload()
                })
            </script>


            <div class="table-description-container">
                <div class="table-description">
                    <div onclick="runFood()" class="table-description-demo low">

                    </div>
                    Low level of Carbon Footprint
                </div>

                <div class="table-description">
                    <div class="table-description-demo med">

                    </div>
                    Medium level of Carbon Footprint
                </div>

                <div class="table-description">
                    <div class="table-description-demo high">

                    </div>
                    High level of Carbon Footprint
                </div>

            </div>

            <div class="ingre-container">
                <h2>The ingredients of your dish include:</h2>
                <ul>

                </ul>

            </div>


        </div>

        <div class="sugesstion">
            <h2><strong>Suggestion:</strong> </h2>
            <ul class="suggestion-container">
        
            </ul>
        </div>


        <div class="modal-form no-display">
            <div class="modal-container">
                <div class="modal-close">
                    <i class="fa fa-close"></i>
                </div>
                <div class="modal-header">
                    Add Food
                </div>

                <div class="modal-main">
                    <form autocomplete="off" method="POST" action="" id="add-food-form" enctype="multipart/form-data">
                        <input type="hidden" id="">
                        <div class="autocomplete">
                            <input id="food-name" type="text" name="food_name" placeholder="Pick the food">
                        </div>
                        <input style="margin-top: 10px" type="number" id="food-weight" name="food_weight" placeholder="Enter the weight">
                        <input type="text" id="imageUrl" name="Image" placeholder="Enter the ImageURL">
                        <input type="submit" class="form_field__label btn-hover color-9" id="check-ingredient-btn" name="submit_btn" value="Add">

                        <!-- include_once('./ingredient.php')  -->
                    </form>
                </div>
            </div>
        </div>



    </main>



    <!-- <footer>
        <?php
        // include_once('./footer.php')
        ?>
    </footer> -->

    <script src="./assets/js/autocomplele.js"></script>

    <script>
        function formatNumber(num) {
            return (Math.round(num * 100) / 100).toFixed(2);
        }
    </script>

    <script>
        var foodInput = document.getElementById("food-name");
        var foodList =
            <?php
            include_once('./mock.php')
            ?>;
        autocomplete(foodInput, foodList);
    </script>

    <script>
        var modal = document.querySelector(".modal-form");

        var closeBtn = document.querySelector(".modal-close");

        function closeModal() {
            modal.classList.add("no-display")
        }

        function openModal(id) {
            modal.classList.remove("no-display");
            document.querySelector('#add-food-form input[type="hidden"]').setAttribute("id", id);
        }

        closeBtn.onclick = function() {
            closeModal();
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
    <script src="./assets/js/foodRegcog.js"></script>

    <script>
        document.querySelector('#check-ingredient-btn').onclick = function() {
            var mealId = document.querySelector('#add-food-form input[type="hidden"]').id;
            var foodName = document.querySelector('#food-name').value;
            var foodWeight = document.querySelector('#food-weight').value;
            if (foodName) {
                storeFoodToLocal(mealId, foodName, foodWeight);
            }
            var foodImageUrl = document.querySelector('#imageUrl').value;

if (foodImageUrl) {
    getFood(foodImageUrl)
}
            
        }

        var schedule = []

        function storeFoodToLocal(mealId, foodName, foodWeight) {
            // console.log(mealId)
            // console.log(foodName)

            var product = {
                id: mealId,
                food: [{
                    name: foodName,
                    weight: foodWeight
                }]
            }
            let storage = localStorage.getItem('schedule')
            if (storage) {
                schedule = JSON.parse(storage)
            }
            let meal = schedule.find(c => c.id == mealId)

            if (meal) {
                meal.food.push({
                    name: foodName,
                    weight: foodWeight
                })
            } else {
                schedule.push(product)
            }
            //    console.log(meal)
            // console.log(meal.name)

            localStorage.setItem('schedule', JSON.stringify(schedule));
            //     console.log(meal)
            //     console.log(product)
        }
        // localStorage.setItem("mon", "Smith");
        // localStorage.getItem("lastname");
        // schedule.push
    </script>

    <script>
        // console.log(document.getElementById('01').parentElement)

        showSchedule();

        function showSchedule() {
            // scheduleBody.innerHTML = ""

            let storage = localStorage.getItem('schedule')
            if (storage) {
                schedule = JSON.parse(storage)
            }

            schedule.forEach(product => {
                // let tempID = "\"" + product.id + "\"" `
                let cell = document.getElementById(String(product.id)).parentElement
                document.getElementById(String(product.id)).innerHTML = ""
                for (i = 0; i < product.food.length; i++) {
                    cell.innerHTML += `<span>${product.food[i].name} - ${product.food[i].weight}kg </span>`;
                }
                cell.innerHTML += `<div id="${product.id}" onclick="openModal(this.id)">+</div>`

            })


        }
    </script>

    <script>
        var foodList = <?php include_once('./mock2.php') ?>;
        // console.log(foodList)
        calculateTotalCF();

        function calculateTotalCF() {
            let storage = localStorage.getItem('schedule')
            if (storage) {
                schedule = JSON.parse(storage)
            };
            let totalCF = []
            // console.log(schedule);
            schedule.forEach((product) => {

                for (i = 0; i < product.food.length; i++) {
                    foodList.forEach(value => {
                        // console.log(value)
                        if (product.food[i].name == value.name) {
                            // console.log(value.name)
                            // console.log(value.cf)
                            let temp = {
                                id: product.id,
                                weight: product.food[i].weight,
                                value: value.cf
                            }
                            totalCF.push(temp)
                            // console.log(totalCF)

                        }
                    })
                }
                // console.log(product.food[0].name)


            })
            let valueCF = []

            for (i = 0; i < totalCF.length; i++) {
                let j;
                switch (totalCF[i].id) {
                    case "00":
                    case "01":
                    case "02":
                        j = 't01'
                        break;
                    case "10":
                    case "11":
                    case "12":
                        j = 't02'
                        break;
                    case "20":
                    case "21":
                    case "22":
                        j = 't03'
                        break;
                    case "30":
                    case "31":
                    case "32":
                        j = 't04'
                        break;
                    case "40":
                    case "41":
                    case "42":
                        j = 't05'
                        break;
                    case "50":
                    case "51":
                    case "52":
                        j = 't06'
                        break;
                    case "60":
                    case "61":
                    case "62":
                        j = 't07'
                        break;

                }
                let item = valueCF.find(c => c.id == j)
                if (item) {
                    item.value += totalCF[i].weight * totalCF[i].value
                } else {
                    valueCF.push({
                        id: j,
                        value: totalCF[i].weight * totalCF[i].value
                    })
                }


            }
            // console.log(valueCF)

            for (i = 0; i < valueCF.length; i++) {
                valueCF[i].id;
                let temp;
                if (valueCF[i].value > 300) {
                    temp = 'high'
                } else if (valueCF[i].value < 150) {
                    temp = 'low'
                } else {
                    temp = 'med'
                }
                document.getElementById(String(valueCF[i].id)).innerHTML = `${formatNumber(valueCF[i].value)} kg<div class="cf-level ${temp}"></div>`
            }


        }
        // Function new

        function abc(array) {
            var aiCheck = []
            var dir = document.querySelector('.ingre-container ul')
            dir.innerHTML = ""
            let temp = JSON.parse(array)
            // console.log(temp)
            let temp2 = temp.outputs[0].data.concepts


            for (i = 0; i < temp2.length; i++) {
                let element = {
                    name: temp2[i].name,
                    weight: temp2[i].value
                }
                aiCheck.push(element)
                dir.innerHTML += `<li> ${temp2[i].name} </li>`
            }
            // console.log(aiCheck)
            // dir.innerHTML += `<div> <strong>Total Carbon Footprint: </strong> 385.18 kg </div>`
            // let totalCF = []
            var ingreTotal = 0

            aiCheck.forEach(product => {
                // console.log(product)
                foodList.forEach(value => {

                    // console.log(value)
                    if (value.name.toLowerCase().startsWith(product.name.toLowerCase())) {
                        ingreTotal += product.weight * value.cf
                    }
                })
            })
            dir.innerHTML += `<div> <strong>Total Carbon Footprint: </strong> ${formatNumber(ingreTotal)} g </div>`
        }
    </script>

    <script>
        function removeItem(id, name) {
            let storage = localStorage.getItem('schedule')
            if (storage) {
                schedule = JSON.parse(schedule)
            }
            // console.log(schedule)
            // console.log(id)
            // console.log(name)

            // cart.splice(id, 1)
            // // Write the new cart into LOCAL STORAGE
            // localStorage.setItem('cart', JSON.stringify(cart))
            // Run the show cart data to update
            // showSchedule()
        }
    </script>

    <script>
        function visible() {
            var temp = document.querySelector('.ingre-container')
            temp.classList.remove("no-display")
        }
    </script>


    <script>
        // meal-cf-total
        calTotal();

        function calTotal() {
            var totalCondition = document.querySelector('.meal-cf-level span')
            var totalDailyContainer = Array.from(document.querySelectorAll('.meal-table tbody tr:last-child td')).slice(1, 8);
            var totalWeekly = 0;
            totalDailyContainer.forEach(totalDailyItem => {
                if (!totalDailyItem.innerHTML) {
                    totalDailyItem.innerHTML = 0;
                }
                totalWeekly += parseFloat(totalDailyItem.innerHTML.split(" ")[0]);
            })
            document.querySelector('.meal-cf-total span').innerHTML = totalWeekly;
            if (totalWeekly == 0) {
                totalCondition.innerHTML = ``
            } else if((totalWeekly / 7) > 300) {
                totalCondition.innerHTML = `High`
            } else if ((totalWeekly / 7) < 150) {
                totalCondition.innerHTML = `Low`
            } else {
                totalCondition.innerHTML = `Med`
            }
        }

        calTotal();
    </script>

</body>

</html>