<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './links.php'; ?>
    <title>iMoneyBank-transactions</title>
    <style>
    body {
        overflow-x: hidden;
    }

    #heading {
        text-align: center;
        padding-top: 3px;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        width: 83%;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    a {
        text-decoration: none;
        color: rgba(255, 255, 255, 0.3);
    }

    a:hover {
        color: inherit;
    }

    .fab {
        font-size: 25px;
    }
    </style>
</head>

<body>
    <?php include './internal/navbar.php'; ?>
    <div id="heading">
    <h2>Transaction History</h2>
    </div>
    

    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <table class="table table-stripped table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Sr. no.</th>
                        <th scope="col">Sender's Name</th>
                        <th scope="col">Sender Account No.</th>
                        <th scope="col">Receiver's Name</th>
                        <th scope="col">Receiver Account No.</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        include './dbconnect.php';
        $select_query = "select * from transaction";
        $s_query = mysqli_query($con,$select_query);
        $i = 0;
        while($res=mysqli_fetch_array($s_query)){
            $i = $i+1;
            ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $res['sender_name']; ?></td>
                        <td><?php echo $res['sender_acc_no']; ?></td>
                        <td><?php echo $res['rec_name']; ?></td>
                        <td><?php echo $res['rec_acc_no']; ?></td>
                        <td><?php echo $res['amount_transfer']; ?></td>
                        <td><?php echo $res['date_time']; ?></td>
                    </tr>
                    <?php

        }
        ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <div id="footer">
        <?php include './internal/footer.php'; ?>
    </div>
</body>

</html>