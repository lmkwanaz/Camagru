<?php
    include_once '../config/database.php';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM `gallery` ORDER BY time_stamp DESC", PDO::FETCH_ASSOC)->fetchAll();
    } catch (PDOException $e) {
        echo "ERROR EXECUTING: \n" . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="config/style/style.css">
        <title>camagru</title>
    </head>
    <body>
    <div class="back-image"></div>
         <div class="styles">
        <a href="config/register.php">Camagru</a>
        </div>
         <?php
            if ($result){
                foreach ($result as $row) {
                    ?><img id="e1" src=<?= $row['img_name']; ?> width="98%" height="auto"><?php
                }
            }
        ?> 
            <div class="footer">
                <footer>@lmkwanaz</footer>
            </div>
    </body>
</html>