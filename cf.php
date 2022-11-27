<script>
        var foodList = <?php include_once('mock2.php') ?>;
        // console.log(foodList)

        var totalCF = []
        function calculateTotalCF() {
            
            let storage = localStorage.getItem('totalCF')
            if (storage) {
                totalCF = JSON.parse(totalCF)
            }

            if (storage) {
                schedule = JSON.parse(storage)
            }
            let total = [{id: 't01', value: 0}, {id: 't01', value: 0} ];
            
            console.log(schedule)
            schedule.forEach(product => {
                let value = foodList.find(c => c[0] == product.name)
                console.log(value)
                 
            })


            let meal = schedule.find(c => c.id == mealId)
     
            if (meal) {
                meal.food.push({name: foodName, weight: foodWeight})
            } else {
                schedule.push(product)
            }
                   console.log(meal)
            // console.log(meal.name)

            localStorage.setItem('totalCF', JSON.stringify(totalCF));
        //     console.log(meal)
        //     console.log(product)
        }

        function addCF(total, value) {
        }

</script>

