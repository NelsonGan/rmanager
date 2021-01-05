<!DOCTYPE html>
<head>
    <title>Manage Menu</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="stylesheets/manageMenu.css">
    <script src="javascripts/manageMenu.js"></script>
</head>

<body>
    <?php include "sidebar.php";?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Manage Menu</span>
        </div>

        <div class="wrapper">
            <div onclick="test('food', 'drinks', 'appetizers', 'desserts')" class="tab" id="foodTab">Food</div>
            <div onclick="test('drinks', 'food', 'appetizers', 'desserts')" class="tab" id="drinksTab">Drinks</div>
            <div onclick="test('appetizers', 'food', 'drinks', 'desserts')" class="tab" id="appetizersTab">Appetizers</div>
            <div onclick="test('desserts', 'food', 'drinks', 'appetizers')" class="tab" id="dessertsTab">Desserts</div>

            <div id="food" class="tabcontent">
                <div class="foodComponent">
                    <img src="images/borger.jpg" alt="imagePlaceholder" class="foodImg">
                    <div class="foodInfo">
                    <p class="foodName">Name : </p>
                    <p class="foodPriceAlacarte">à la carte : </p>
                    <p class="foodPriceSet">set : </p>
                    </div>
                    <button class="btn">Delete</button>
                </div>
            </div>

            <div id="drinks" class="tabcontent">
            <div class="foodComponent">
                    <img src="images/borger.jpg" alt="imagePlaceholder" class="foodImg">
                    <div class="foodInfo">
                    <p class="foodName">Name : </p>
                    <p class="foodPriceAlacarte">à la carte : </p>
                    <p class="foodPriceSet">set : </p>
                    </div>
                    <button class="btn">Delete</button>
                </div>
            </div>

            <div id="appetizers" class="tabcontent">
            <div class="foodComponent">
                    <img src="images/borger.jpg" alt="imagePlaceholder" class="foodImg">
                    <div class="foodInfo">
                    <p class="foodName">Name : </p>
                    <p class="foodPriceAlacarte">à la carte : </p>
                    <p class="foodPriceSet">set : </p>
                    </div>
                    <button class="btn">Delete</button>
                </div>
            </div>

            <div id="desserts" class="tabcontent">
            <div class="foodComponent">
                    <img src="images/borger.jpg" alt="imagePlaceholder" class="foodImg">
                    <div class="foodInfo">
                    <p class="foodName">Name : </p>
                    <p class="foodPriceAlacarte">à la carte : </p>
                    <p class="foodPriceSet">set : </p>
                    </div>
                    <button class="btn">Delete</button>
                </div>
            </div>
        </div>
    </div>
</body>