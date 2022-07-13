<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<div class="header-2">
<div class="mainHeader">
            <img src="https://png.pngtree.com/template/20190316/ourmid/pngtree-banking-logo-image_80425.jpg" alt="logo">
            <h1>My Bank</h1>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="customers.html">View All Customers</a></li>
                <li><a href="moneyTransaction.php" class="active">Money Transanction</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="help.html">Help</a></li>
            </ul>

            <div class="right">
                <input type="text" name="search" id="search" placeholder="Search here..">    
            </div>
        </div>
	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Accounts | Basic Banking System</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="assets/css/customer.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="my-info text-center">
        <h2>Details</h2>
        <h4>Your Bank Balance :<span id="myAccountBalance">100000</span></h4>

        <button class="btn btn-info my-3" data-toggle="modal" data-target="#sendMoney">Send Money</button>
        <a class="btn btn-info my-3" href="/banking/moneytranc.php" data-toggle="modal" data-target="#transactionHistory">See All Transaction</a>
    </div>

    <!-- Modal send money -->
    <div class="modal fade" id="sendMoney" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Money</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="CODE.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" id="enterName" class="form-control" placeholder="Recipient's username"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" name ="firstname" >
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Happy Banking</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₹ </span>
                            </div>
                            <input type="text" id="enterAmount" class="form-control" placeholder=" Enter Amount"
                                aria-label="Amount (to the nearest dollar)" name ="amount">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Close</button>
                        <input type="submit" value="Send Money" class="btn btn-success"/>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>

    <!-- Modal transaction History-->
    
    <div class="modal fade" id="transactionHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaction History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol id="transaction-history-body">
                    <?php

                        $sql = "SELECT * FROM `bank`.`bank`";
                        $result = mysqli_query($conn, $sql);
                        $check=mysqli_query($conn,$sql);
                        if (mysqli_num_rows($check)>0)
                        {
                        while($row = $check->fetch_assoc()) {
                        ?>
                           <table class="table table-hover table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">User name</th>
                        <th scope="col">Bank Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light">
                        <td><?=$row['username'];?></td>
                        <td><?=$row['amount'];?></td>
                   </tr>
                      </tbody>
                       </table>
                       <?php
                       }
                       }
                       ?>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- table  -->
    
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
            <thead>
                <tr class="hd">
                  <th>Account Number</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Balance</th>
                </tr>
              </thead>
              <tbody>
                  <tr class="cl">
                      <td>1</td>
                      <td>Sweta</td>
                      <td>sweta@gmail.com</td>
                      <td>987000</td>
                    </tr>
                    <tr class="cl">
                      <td>2</td>
                      <td>Siya</td>
                      <td>siya@gmail.com</td>
                      <td>880000</td>
                    </tr>
                    <tr class="cl">
                      <td>3</td>
                      <td>Kavya</td>
                      <td>kavya@gmail.com</td>
                      <td>768000</td>
                    </tr>
                    <tr class="cl">
                      <td>4</td>
                      <td>Prayas</td>
                      <td>prayas@gmail.com</td>
                      <td>650000</td>
                    </tr>
                    <tr class="cl">
                      <td>5</td>
                      <td>Shipra</td>
                      <td>shipra@gmail.com</td>
                      <td>487000</td>
                    </tr>
                    <tr class="cl">
                      <td>6</td>
                      <td>Pragya</td>
                      <td>pragya@gmail.com</td>
                      <td>675900</td>
                    </tr>
                    <tr class="cl">
                      <td>7</td>
                      <td>Harshita</td>
                      <td>harshita@gmail.com</td>
                      <td>470000</td>
                    </tr>
                    <tr class="cl">
                      <td>8</td>
                      <td>Akash</td>
                      <td>akash@gmail.com</td>
                      <td>890000</td>
                    </tr>
                    
              </tbody>
            </table>    
        </div>
    </div>
    <footer id="footer">
        |Copyright © 2022 SparksFoundationBank.com |  All rights reserved
    </footer>

    <script src="jsbank.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"></script> 
     <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"></script>

</body>
</html>
</div>
</body>
</html>
Footer
© 2022 GitHub, Inc.
Footer navigation
Terms
Privacy
