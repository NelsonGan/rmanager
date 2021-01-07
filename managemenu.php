    <!DOCTYPE html>
    <head>
        <title>Manage Menu</title>
        <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="stylesheets/manageMenu.css">
        <script src="javascripts/manageMenu.js"></script>
        
    </head>

    <body>
        <?php 
        include "sidebar.php";
        include ("includes/conn.php");
        ?>
        
        <div class="mainbody">
            <div class="topbar">
                <span>Manage Menu</span>
            </div>

            <div class="wrapper">
                <div onclick="test('food', 'drinks', 'appetizers', 'desserts')" class="tab" id="foodTab">Food</div>
                <div onclick="test('drinks', 'food', 'appetizers', 'desserts')" class="tab" id="drinksTab">Drinks</div>
                <div onclick="test('appetizers', 'food', 'drinks', 'desserts')" class="tab" id="appetizersTab">Appetizers</div>
                <div onclick="test('desserts', 'food', 'drinks', 'appetizers')" class="tab" id="dessertsTab">Desserts</div>
                <button class="addButton">+</button>
                
                <div id="food" class="tabcontent"> 
                    <div class="foodComponent">

                        <div class="imageContainer">
                            <img src="images/borger.jpg" alt="image placeholder" class="foodImage">
                        </div>

                        <div class="foodInfo">

                            <div class="infoContainer">
                                <p class="foodName">Name : </p>
                                <p class="foodPrice">Price : </p>
                                <p class="foodDesc">Description : </p>
                            </div>

                            <div class="buttonContainer">
                                <button class="btn" id="button">Delete</button>
                            </div>
                        </div>
                    </div> 
                    
                </div>

                <div id="drinks" class="tabcontent"> 
                    <div class="foodComponent">

                        <div class="imageContainer">
                            <img src="images/borger.jpg" alt="image placeholder" class="foodImage">
                        </div>

                        <div class="foodInfo">

                            <div class="infoContainer">
                                <p class="foodName">Name : </p>
                                <p class="foodPrice">Price : </p>
                                <p class="foodDesc">Description : </p>
                            </div>

                            <div class="buttonContainer">
                                <button class="btn" id="button">Delete</button>
                            </div>
                        </div>
                    </div>    
                </div>

                <div id="appetizers" class="tabcontent"> 
                    <div class="foodComponent">

                        <div class="imageContainer">
                            <img src="images/borger.jpg" alt="image placeholder" class="foodImage">
                        </div>

                        <div class="foodInfo">

                            <div class="infoContainer">
                                <p class="foodName">Name : </p>
                                <p class="foodPrice">Price : </p>
                                <p class="foodDesc">Description : </p>
                            </div>

                            <div class="buttonContainer">
                                <button class="btn" id="button">Delete</button>
                            </div>
                        </div>
                    </div>    
                </div>

                <div id="desserts" class="tabcontent"> 
                    <div class="foodComponent">

                        <div class="imageContainer">
                            <img src="images/borger.jpg" alt="image placeholder" class="foodImage">
                        </div>

                        <div class="foodInfo">

                            <div class="infoContainer">
                                <p class="foodName">Name : </p>
                                <p class="foodPrice">Price : </p>
                                <p class="foodDesc">Description : </p>
                            </div>

                            <div class="buttonContainer">
                                <button class="btn" id="button">Delete</button>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

    </body>
