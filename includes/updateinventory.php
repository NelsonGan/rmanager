<?php

if (isset($_POST['update'])){
    require "conn.php";
    $inventoryID = $_POST['invID'];
    $inventorylogID = $_POST['logID'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE log_details SET amount = '$quantity' WHERE Log_ID = '$inventorylogID' AND Inventory_ID = '$inventoryID'";
    mysqli_query($con, $sql);
    ?>
    <form action="../editinventoryrecord.php" method="POST">
        <input type="hidden" name="month" value="<?php echo $_POST['month'] ?>">
        <input type="hidden" name="year" value="<?php echo $_POST['year'] ?>">
        <button id="back"></button>
    </form>
    <script>document.getElementById("back").click();</script>
    <?php 
} else {
    header("Location: ../editinventoryrecord.php");
}

?>


