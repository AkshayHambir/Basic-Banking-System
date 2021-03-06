<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './links.php'; ?>
    <title>iMoneyBank-customers</title>
    <link rel="stylesheet" href="./innerstyle.css">
</head>

<body>
    <?php include './internal/navbar.php'; ?>
    <div id="heading">
        <h2>Our Customers</h2>
    </div>


    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <table class="table table-stripped table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Sr. no.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Account No.</th>
                        <th scope="col">Account Type</th>
                        <th scope="col">Current Balance</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        include './dbconnect.php';
        $select_query = "select * from accounts";
        $s_query = mysqli_query($con,$select_query);
        $i = 0;
        while($res=mysqli_fetch_array($s_query)){
            $i = $i+1;
            ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $res['acc_holder_name']; ?></td>
                        <td><?php echo $res['acc_number']; ?></td>
                        <td><?php echo $res['acc_type']; ?></td>
                        <td><?php echo $res['acc_balance']; ?></td>
                        <td><a href="./customer_details.php?id=<?php echo $res['acc_id'] ?>"><button class="btn btn-outline-primary">View
                                    Details</button></a></td>
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