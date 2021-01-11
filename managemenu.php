    <!DOCTYPE html>
    <head>
        <title>Manage Menu</title>
        <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="stylesheets/manageMenu.css">
        <script src="javascripts/manageMenu.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
                <button type="button" class="addButton" data-toggle="modal" data-target="#exampleModal">+</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Menu Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="Item Name">Item Name</label>
                            <input type="textbox" class="form-control" id="itemname" aria-describedby="emailHelp" placeholder="Enter Item Name">
                          </div>
                          <div class="form-group">
                            <label for="Item Price">Item Price</label>
                            <input type="number" class="form-control" id="itemprice" placeholder="Price">
                          </div>
                          <div class="form-group">
                            <label for="Item Type">Item Type</label>
                            <select class="form-control" id="itemtype">
                              <option value="null">Select-one</option>
                              <option value="Food">Food</option>
                              <option value="Drinks">Drinks</option>
                              <option value="Appetizers">Appetizers</option>
                              <option value="Desserts">Desserts</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="Description">Description</label>
                            <input type="textarea" class="form-control" id="description" placeholder="Add Item Description">
                          </div>
                          <div class="form-group">
                            <label for="Image">Item Image</label>
                            <input type="file" name="img" id="img" class="form-control" accept="img/*">
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
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
