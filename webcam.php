<!DOCTYPE html>
<html>
<head>
<title>photo</title>
    <link rel="stylesheet" type="text/css" href="config/style/upload.css">
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
    width: 400px;
    background-color: #ccc;
    border: 10px solid #ddd;
    margin: 0 auto;
    position: absolute;
    background-position: center;
    left: 800px;
}
    </style>
</head>
    <body>
        <!-- <div class="uppage">
    <a href="upload.php"><button>upload</button></a>
    </div> -->
    <div class="booth">
    <video id="video" width="400" height="300"></video>
    <a href="#" id="capture" class="booth-capture">take photo</a>
    <canvas id="canvas" width="400" height="300"></canvas>
    <!-- <img  id="photo" src="./config/source/images.jpeg" alt="">  -->
    </div>
    <div class="upload">
        <form action="uploader.php" method="post">
            <input id="pic" type="hidden" name="img_src">
            <input id="output1" type="submit" name="screamer" value="Upload" >
        </form>
    </div>
    <script src="webcam.js"></script>
    </body>
</html>