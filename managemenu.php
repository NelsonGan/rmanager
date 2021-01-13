    <!DOCTYPE html>
    <head>
        <title>Manage Menu</title>
        <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="stylesheets/manageMenu.css">
        <script src="javascripts/manageMenu.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="stylesheets/sidebar.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="javascripts/sidebar.js"></script>
        <style>
        body > div.sidebar > ul > li{
              height: 49.600px;
          }

          body > div.sidebar > ul > li> a{
              height: 17.6px;
          }

          body > div.mainbody > div.topbar{
              height:52px;
          }
          a, a:hover,a:visited, a:focus {
             text-decoration:none;
          }
                  ol, ul {
            padding-left: 2px;
        }
        </style>
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
                        <form action="includes/insertmenu.php" method="POST">
                          <div class="form-group">
                            <label for="Item Name">Item Name</label>
                            <input type="textbox" class="form-control" name="itemname" aria-describedby="emailHelp" placeholder="Enter Item Name" required>
                          </div>
                          <div class="form-group">
                            <label for="Item Price">Item Price</label>
                            <input type="number" class="form-control" name="itemprice" step="0.01" placeholder="Price" required>
                          </div>
                          <div class="form-group">
                            <label for="Item Type">Item Type</label>
                            <select class="form-control" name="itemtype" required>
                              <option value="null">Select-one</option>
                              <option value="Food">Food</option>
                              <option value="Drinks">Drinks</option>
                              <option value="Appetizers">Appetizers</option>
                              <option value="Desserts">Desserts</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="Description">Description</label>
                            <input type="textarea" class="form-control" name="description" placeholder="Add Item Description" required>
                          </div>
                          <div class="form-group">
                            <label for="Image">Item Image</label>
                            <input type="file" name="img" class="form-control" accept="images/*" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="Submit" Name="menusubmit" class="btn btn-primary">Save changes</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="food" class="tabcontent">
                  <?php
                  $sql = "SELECT * FROM menu WHERE Type ='Food'";
                  $result = mysqli_query($con,$sql);
                  while($row = mysqli_fetch_array($result))
                  {
                    ?>
                    <div class="foodComponent">

                        <div class="imageContainer">
                            <img src="images/<?php echo $row['item_img']?>" alt="image placeholder" class="foodImage">
                        </div>

                        <div class="foodInfo">

                            <div class="infoContainer">
                                <p class="foodName">Name : <?php echo $row['Name'] ?> </p>
                                <p class="foodPrice">Price : RM <?php echo $row['Price'] ?> </p>
                                <p class="foodDesc">Description : <?php echo $row['Description'] ?></p>
                            </div>

                            <div class="buttonContainer">
                              <form action="includes/deletemenu.php" method="post">
                                <input type="hidden" name="ditemname" value="<?php echo $row['Name']?>">
                                <button class="btn" name="deleteitem" id="button">Delete</button>
                              </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div id="drinks" class="tabcontent">
                  <?php
                  $sql1 = "SELECT * FROM menu WHERE Type ='Drinks'";
                  $result1 = mysqli_query($con,$sql1);
                  while($row1 = mysqli_fetch_array($result1))
                  {
                    ?>
                    <div class="foodComponent">

                        <div class="imageContainer">
                            <img src="images/<?php echo $row1['item_img']?>" alt="image placeholder" class="foodImage">
                        </div>

                        <div class="foodInfo">

                            <div class="infoContainer">
                                <p class="foodName">Name : <?php echo $row1['Name'] ?> </p>
                                <p class="foodPrice">Price : RM <?php echo $row1['Price'] ?></p>
                                <p class="foodDesc">Description : <?php echo $row1['Description'] ?></p>
                            </div>

                            <div class="buttonContainer">
                              <form action="includes/deletemenu.php" method="post">
                                <input type="hidden" name="ditemname" value="<?php echo $row1['Name']?>">
                                <button class="btn" name="deleteitem" id="button">Delete</button>
                              </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div id="appetizers" class="tabcontent">
                  <?php
                  $sql2 = "SELECT * FROM menu WHERE Type ='Appertizers'";
                  $result2 = mysqli_query($con,$sql2);
                  while($row2 = mysqli_fetch_array($result2))
                  {
                    ?>
                    <div class="foodComponent">

                        <div class="imageContainer">
                            <img src="images/<?php echo $row2['item_img'] ?>" alt="image placeholder" class="foodImage">
                        </div>

                        <div class="foodInfo">

                            <div class="infoContainer">
                                <p class="foodName">Name : <?php echo $row2['Name'] ?></p>
                                <p class="foodPrice">Price : RM <?php echo $row2['Price'] ?></p>
                                <p class="foodDesc">Description : <?php echo $row2['Description'] ?></p>
                            </div>

                            <div class="buttonContainer">
                              <form action="includes/deletemenu.php" method="post">
                                <input type="hidden" name="ditemname" value="<?php echo $row2['Name']?>">
                                <button class="btn" name="deleteitem" id="button">Delete</button>
                              </form>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                </div>

                <div id="desserts" class="tabcontent">
                  <?php
                  $sql3 = "SELECT * FROM menu WHERE Type ='Desserts'";
                  $result3 = mysqli_query($con,$sql3);
                  while($row3 = mysqli_fetch_array($result3))
                  {
                    ?>
                    <div class="foodComponent">

                        <div class="imageContainer">
                            <img src="images/<?php echo $row3['item_img']?>" alt="image placeholder" class="foodImage">
                        </div>

                        <div class="foodInfo">

                            <div class="infoContainer">
                                <p class="foodName">Name : <?php echo $row3['Name'] ?></p>
                                <p class="foodPrice">Price : RM <?php echo $row3['Price'] ?></p>
                                <p class="foodDesc">Description : <?php echo $row3['Description'] ?></p>
                            </div>

                            <div class="buttonContainer">
                              <form action="includes/deletemenu.php" method="post">
                                <input type="hidden" name="ditemname" value="<?php echo $row3['Name']?>">
                                <button class="btn" name="deleteitem" id="button">Delete</button>
                              </form>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                </div>
            </div>
        </div>

    </body>
