<html>
    <head>
        <title>My First Project</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
            Voer een tekst in
        <form method="post" action="./controllers/Presenter.php">
            <input type="text" name="naam">
            <input type="submit" name="submit" value="Submit">
        </form>
         <?php
         echo $viewData["palindroom"] . "<br>";
         echo $viewData["message"] . "<br>";
         echo $viewData['action'] . "<br>";
         
         ?>
         </body>
</html>
