<?php

    // hier require we de class file die we nodig hebben in dit geval is dat order.php in de map classes
    require_once 'classes/orders.php';
    require_once 'classes/conn.php';

    // dit is èèn manier op je class de defineren in één php file, de class link je dus aan de var naam zodat je die verder kan gebruiken binnen dit php bestand
    $classOrders = new orders();
    $conn = new conn();


    if (isset($_POST['submitform'])){


        $order_name =  $conn->GetConn()->real_escape_string(htmlspecialchars($_POST['ordername']));
        $table_number = $conn->GetConn()->real_escape_string(htmlspecialchars($_POST['ordertable']));


        if($classOrders->SaveOrder($order_name,$table_number)){
            //echo 'opgeslagen';
        }else{
           // echo'niet opgeslagen';
        }

    }






?>


<!DOCTYPE html>
<html>
<head>
    <title>hoofdpagina</title>


    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <style>
        .footer_down{
            margin-top: 28.35%;
        }
    </style>

</head>

<body>

<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Home</a></li>
            <li><a href="bestellingen.php">bestellingen</a></li>
            <li><a href="reserveringen.php">reserveringen</a></li>
        </ul>
    </div>
</nav>

<h3 style="text-align: center">Bestellingen</h3>

<h5 style="text-align: center">bestaande bestellingen</h5>

<table>
    <tr>
        <th>Bestelling naam</th>
        <th>Bestelling tafel</th>
    </tr>

    <?php // hier wordt de function binnen de class die we boven hebben gedefeneerd aangeroepen
             // deze function return een table met data wat we willen laten zien op de pagina
            $classOrders->GetOrders();
    ?>

</table>




<h5 style="text-align: center; margin-top: 5%">Bestelling toevoegen</h5>


<form action="bestellingen.php" method="post" style="width: 500px; margin-left: 40%; margin-top: 5%">
    <label>bestelling naam</label>
    <input type="text" name="ordername">
    <label>bestelling tafel</label>
    <input type="number" name="ordertable">
    <input type="submit" name="submitform" value="submit">
</form>


<footer class="page-footer footer_down">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>

</body>

</html>
