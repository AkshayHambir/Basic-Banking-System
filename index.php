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
    <style>
    body {
        overflow-y: hidden;
    }

    #footer {
        margin-top: 0.5%;
    }

    a{
        text-decoration: none;
        color: rgba(255, 255, 255, 0.3);
    }

    a:hover{
        color: inherit;
    }

    .fab{
        font-size: 25px;
    }
    </style>
</head>

<body>
    <?php include './internal/navbar.php'; ?>
    <div id="outer-div">
        <div class="row" id="home-div">
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <img src="./images/main_img_2.svg" alt="image" height="600px" width="600px">
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5" id="desc">
                <h2 class="text-center">Building a Better life with banking.</h2>
                <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore ex odit dicta
                    in
                    ullam praesentium commodi cupiditate eaque quo hic unde iusto corporis numquam, possimus ipsam cum
                    ab
                    itaque rem reiciendis dolores modi delectus? Consequuntur optio sed at laboriosam ipsam veritatis
                    distinctio, minima, quia dolores voluptatum, incidunt numquam libero sunt.</p>
                <div class="container text-center">
                    <a href="./viewCustomer.php"><button class="btn btn-outline-primary">View Customers</button></a>
                    <a href="./viewTransactions.php"><button class="btn btn-outline-success">View Transactions</button></a>
                </div>

            </div>
        </div>
    </div>
    <div id="footer">
        <?php include './internal/footer.php'; ?>
    </div>
</body>



</html>