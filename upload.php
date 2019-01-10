
<!DOCTYPE HTML>
<html>
    <body>
        <head>
            <link rel="stylesheet" type="text/css" href="config/style/upload.css">
            <title>camagru</title>
        </head>
        
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
        <img id="scream" width="220" height="277" src="./config/source/b.jpg">
    <!-- <p>canvas:</p>
    <canvas id="mycanvas" width="240" height="350" > -->
    </canvas>
    <!-- <script>
        window.onload = function(){
            var canvas = document.getElementById("mycanvas");
            var ctx = canvas.getContext("2d");
            var img = document.getElementById("scream");
            ctx.drawImage(img, 2 , 2, 235, 345);
        };
    </script> -->
    </div>
    <div class="upload">
        <form action="uploader.php" method="post">
            <input id="pic" type="hidden" name="img_src">
            <input id="output1" type="submit" name="screamer" value="Upload" >
        </form>
    </div>
    </body>
</html>

