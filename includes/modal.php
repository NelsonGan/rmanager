<head>
<script>
    function showModal(){
        document.getElementById('id01').style.display='block';
    }

    function showModal(var command){
        <?php $GLOBALS['onclick'] ?>= command;
        document.getElementById('id01').style.display='block';
    }

    function hideModal(){
        document.getElementById('id01').style.display='none';
    }
</script>

<style>
    .modalBtn {
        padding: 14px 20px;
        margin: 8px 0px;
        border: none;
        cursor: pointer;
        opacity: 0.9;
        outline: none;
        color: white;
        background-color: black;
        border: black solid;
    }
    
    .modalBtn:hover {
        background-color: white;
        color: black;
    }

    /* Float cancel and delete buttons and add an equal width */
    #yesBtn, #noBtn {
        width: 20%;
    }
    
    .container {
        padding: 16px;
        text-align: center;
    }

    /* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(255, 255, 255, 0.5);
    padding-top: 50px;
    }

    /* Modal Content/Box */
    .modal-content {
    background-color: #fefefe;
    border: 2px solid #888;
    width: 30%; /* Could be more or less, depending on screen size */
    border-radius: 5px;
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -100%);
    }

    /* Style the horizontal ruler */


    /* The Modal Close Button (x) */
    .close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: black;
    }

    .close:hover,
    .close:focus {
    color: #f44336;
    cursor: pointer;
    }

    /* Clear floats */
    .clearfix::after {
    content: "";
    clear: both;
    display: table;
    }

    /* Change styles for cancel button and delete button on extra small screens */
    @media screen and (max-width: 300px) {
    .yesBtn, .noBtn {
        width: 100%;
    }
    }

    .container h1 {
        margin: 20px 0px;
    }
</style>
</head>

<body>
    <div id="id01" class="modal">
        <span onclick="hideModal()" class="close">&times;</span>
        <div class="modal-content">
            <div class="container">
                <h1>Confirmation</h1>
                <p>Are you sure you want to [action]?</p>
        
                <div class="clearfix">
                    <a href="<?php echo $GLOBALS['onclick'] ?>"><button class="modalBtn" id="yesBtn"">Yes</button></a>
                    <button class="modalBtn" id="noBtn" onclick="hideModal()">No</button>
                </div>
            </div>
        </div>
    </div>
</body>
