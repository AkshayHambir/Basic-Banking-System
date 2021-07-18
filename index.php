<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMoneyBank</title>
    <?php include './links.php'; ?>
    <link rel="stylesheet" href="./homestyle.css">
</head>

<body>
    <?php include './internal/navbar.php'; ?>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <img src="./images/main_img_2.svg" alt="image" height="600px" width="600px">
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-5" id="desc">
            <h2 class="text-center">Building a Better life with banking.</h2>
            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore ex odit dicta in
                ullam praesentium commodi cupiditate eaque quo hic unde iusto corporis numquam, possimus ipsam cum ab
                itaque rem reiciendis dolores modi delectus? Consequuntur optio sed at laboriosam ipsam veritatis
                distinctio, minima, quia dolores voluptatum, incidunt numquam libero sunt.</p>
            <div class="container text-center">
                <button class="btn btn-outline-primary">View Customers</button>
                <button class="btn btn-outline-danger">View Transactions</button>
            </div>

        </div>
    </div>
</body>

</html>