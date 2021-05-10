<?php 
    require_once('./config.php'); 
    // require_once('./includes.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="charge.php" method="post">
            <input id="tongtien" type="text" name="tongtien">
            <script id="scriptStripe" src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="<?php echo $stripe['publishable_key']; ?>"
                    data-description="Thanh toan"
                    data-locale="auto"></script>
        </form>
    </body>
</html>