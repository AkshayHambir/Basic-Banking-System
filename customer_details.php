<?php
include './dbconnect.php';
$id = $_GET['id'];
$select_query = "select * from accounts where acc_id='$id'";
$s_query = mysqli_query($con,$select_query);
$res = mysqli_fetch_array($s_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMoneyBank - Customer details</title>
    <?php include "./links.php"; ?>
    <link rel="stylesheet" href="./innerstyle.css">
</head>

<body>
    <?php include "./internal/navbar.php"; ?>

    <div id="heading">
        <h4>Customers Details</h4>
    </div>

    <div class="container">
        <div class="profile">
            <img src="./images/profile.svg" alt="profile pic" height="50" width="50">
        </div>
        <table class="table table-stripped  table-bordered text-center">
            <tbody>
                <tr>
                    <th>Customer Name </th>
                    <td><?php echo $res['acc_holder_name']; ?></td>
                </tr>
                <tr>
                    <th>Account Number </th>
                    <td><?php echo $res['acc_number']; ?></td>
                </tr>
                <tr>
                    <th>Customer Email </th>
                    <td><?php echo $res['email']; ?></td>
                </tr>
                <tr>
                    <th>Customer Contact  </th>
                    <td><?php echo $res['mobile']; ?></td>
                </tr>
                <tr>
                    <th>Account Type </th>
                    <td><?php echo $res['acc_type']; ?></td>
                </tr>
                <tr>
                    <th>Available Balance </th>
                    <td><?php echo $res['acc_balance']; ?> Rs</td>
                </tr>
                <tr>
                    <th>Customer Location </th>
                    <td><?php echo $res['city']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="heading">
        <h4>Transfer Money</h4>
    </div>

    <div id="footer">
        <?php include './internal/footer.php'; ?>
    </div>

</body>

</html>