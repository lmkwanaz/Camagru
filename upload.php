
<!DOCTYPE HTML>
<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="style/upload.css">
            <title>camagru</title>
        </head>
        <style>
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
        <body>
        <body background="source/download.jpeg">
    <ul>
  <li><a href="gallery.php">Gallery</a></li>
  <li><a href="login.php">Reset password</a></li>
  <li><a href="index.php">Index</a></li>
  <li><a href="webcam.php">Camera</a></li>
</ul>  
        <div class="neo"><input type='file' accept='image/*' onchange='openFile(event)'><br>
            <script>
              var openFile = function(event) {
                var input = event.target;
            
                var reader = new FileReader();
                reader.onload = function(){
                    var dataURL = reader.result;
                    var output = document.getElementById("scream");
                    output.src = dataURL;
                    var photo = document.getElementById("pic");
                    photo.value = dataURL;

                    var canvas = document.getElementById("mycanvas");
                    var ctx = canvas.getContext("2d");
                     var img = document.getElementById("scream");
                    ctx.drawImage(img, 0 , 0, 235, 345);

                };
                reader.readAsDataURL(input.files[0]);

              };
            </script>
        </div>
        <div class="img">
        <p>upload image</p>
        <img id="scream" width="150" height="200" src="source/b.jpg">
    
    </div>
    <div class="upload">
        <form action="uploader.php" method="post">
            <input id="pic" type="hidden" name="img_src">
            <input id="output1" type="submit" name="screamer" value="Upload" >
        </form>
    </div>
    </body>
</html>

