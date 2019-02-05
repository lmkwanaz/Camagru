
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>photo</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <style>
        .booth-capture{
    display: block;
    margin: 10px 0;
    padding: 10px 20px;
    background-color: cornflowerblue;
    color: #fff;
    text-align: center;
    text-decoration: none;   
}

.booth{
    width: 420px;
    background-color: #ccc;
    border: 10px solid #ddd;
    margin: 40 auto;
    position: absolute;
    background-position: center;
    left: 800px;
}

.upload{
    background-image: url("source/photo.jpeg");
    height: 1000px;
}

      ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
    </style>
</head>
    <body>
    <body background="source/photo.jpeg">
    <ul>
  <li><a class="active" href="#home">Camera</a></li>
  <li><a href="gallery.php">Gallery</a></li>
  <li><a href="index.php">Index</a></li>
  <li><a href="login.php">log out</a></li>
  <li><a href="upload.php">upload</a></li>
</ul>
<div id="filter-options">
    <!-- <img src="images/love.jpeg" width="45%" height="130px"/> -->
    <img id="e2" src="images/love.jpeg" width="20%" height="90px" onclick="insertEmo('e2')" style="margin: 10px 2%;"/>
    <img id="e3" src="images/Love-Frame-PNG-Transparent-Picture.png" width="20%" height="90px" onclick="insertEmo('e3')" style="margin: 10px 2%;"/>
    <img id="e4" src="images/golden-frame-png-1.png" width="20%" height="90px" onclick="insertEmo('e4')" style="margin: 10px 2%;"/>
    <img id="e5" src="images/Orange_Transparent_Frame_with_Leafs.png" width="20%" height="90px" onclick="insertEmo('e5')" style="margin: 10px 2%;"/>
</div>
    <div class="bg-photo">
    <div class="booth">
        <video id="video" width="400" height="300"></video>
        <!-- <a href="#" id="capture" class="booth-capture">take photo</a>  -->
        <input type="submit" id="capture" class="booth-capture" value="Take Photo">
        <canvas id="canvas" width="400" height="300"></canvas>
    </div>
    <div class="upload">
        <form action="uploader.php" method="post">
            <input id="pic" type="hidden" name="img_src">
            <input id="output1" type="submit" name="screamer" value="Upload" onclick="savePhoto()">
        </form>
</div>
    </div>
                <script src="webcam.js"></script>
                    </body>
                            </html>
