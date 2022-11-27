
function getFood(linkFood) {
    
    const raw = JSON.stringify({
        "user_app_id": {
        "user_id": "clarifai",
        "app_id": "main"
        },
        "inputs": [
            {
                "data": {
                    "image": {
                        "url": linkFood
                    }
                }
            }
        ]
    });

    const requestOptions = {

        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Authorization': 'Key ' + '72e7d6d04d7b4f3980c96d59f5af1d75'
        },
        body: raw
    };
    
  // NOTE: MODEL_VERSION_ID is optional, you can also call prediction with the MODEL_ID only
  // https://api.clarifai.com/v2/models/{YOUR_MODEL_ID}/outputs
  // this will default to the latest version_id
  
  fetch(`https://api.clarifai.com/v2/models/food-item-recognition/versions/1d5fd481e0cf4826aa72ec3ff049e044/outputs`, requestOptions)
      .then(response => response.text())    
      .then(result => abc(result))
      .catch(error => console.log('error', error));
    
}

var randImg = ['https://thecookiechrunicles.com/wp-content/uploads/2018/05/english-muffin.jpg', 'https://content.jdmagicbox.com/comp/darjeeling/h1/9999px354.x354.181016125224.y3h1/catalogue/random-fast-food-pedong-darjeeling-fast-food-b66reu0l8c.jpg', 'http://3.bp.blogspot.com/-SwCJQrPE4HY/T2qH0Cd5WUI/AAAAAAAADm8/Jfo1ZxtSx3o/w1200-h630-p-k-no-nu/random+salad.jpg']

function runFood() {
    var array = getFood(randImg[Math.floor(Math.random() * 3)])
}



