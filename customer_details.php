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

    <!-- Navbar  -->
    <?php include "./internal/navbar.php"; ?>

    <!-- customer Details  -->
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
                    <th>Customer Contact </th>
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

    <!-- Transfer Money  -->
    <div id="heading">
        <h4>Transfer Money</h4>
    </div>

    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <select class="form-select form-control" name="rec_cust" aria-label="Default select example" required>
                    
                <?php
                $cust_query = "select * from accounts where acc_id!='$id'";
                $c_query = mysqli_query($con,$cust_query); 
                while($c_res = mysqli_fetch_array($c_query)){
                    ?>
                    <option value="<?php echo $c_res['acc_id'] ?>"><?php echo $c_res['acc_holder_name']; ?></option>

                    <?php
                }
                ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Transfer Amount</label>
                <input type="number" class="form-control" name="amount" id="amount" required>
            </div>

            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
            </div>

        </form>
    </div>


    <!-- Footer  -->
    <div id="footer">
        <?php include './internal/footer.php'; ?>
    </div>

</body>

</html>

<?php
if(isset($_POST['submit'])){
$receiver = $_POST['rec_cust'];
$transfer_amt = $_POST['amount'];
if($transfer_amt>=$res['acc_balance']){
    ?>
        <script>
            alert("Insufficient Balance");
        </script>
    <?php
}
else{
    // fetching receiver ifo 
    $rec_quer = "select * from accounts where acc_id = '$receiver'";
    $rec_que = mysqli_query($con,$rec_quer);
    $rec_r = mysqli_fetch_array($rec_que);
    // calculatig new balances 
    $sender_balance = $res['acc_balance']-$transfer_amt;
    $receiver_balance = $rec_r['acc_balance']+$transfer_amt;

    // updating database
    $rec_id = $rec_r['acc_id'];
    $sender_op = "update accounts set acc_balance = '$sender_balance' where acc_id = '$id'";
    $sender_update = mysqli_query($con,$sender_op);
    $receiver_op = "update accounts set acc_balance = '$receiver_balance' where acc_id = '$rec_id'";
    $receiver_update = mysqli_query($con,$receiver_op);
    ?>
    <script>
        alert("Amount transfered Successfully");
    </script>

    <?php
    // updating transaction history
    $sender_name = $res['acc_holder_name'];
    $sender_acc = $res['acc_number'];
    $receiver_name = $rec_r['acc_holder_name'];
    $receiver_acc = $rec_r['acc_number'];

    $tran_query = "insert into transaction(sender_name,sender_acc_no,rec_name,rec_acc_no,amount_transfer) values('$sender_name','$sender_acc','$receiver_name','$receiver_acc','$transfer_amt')";
    $t_query = mysqli_query($con,$tran_query);
}
header('location:customer_details.php');
} 
?>