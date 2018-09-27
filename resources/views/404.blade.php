<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not Found</title>
    <link rel="shortcut icon" href="{{ asset('Logo IT ICON.png') }}" > 
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    <style rel="stylesheet" >
        *{
            font-family: 'Chicle', cursive;
            font-size: 60px;
        }
        .error{
            justify-content: center;
            text-align: center;
            padding-top: 15%;
            color: #000;
            text-shadow: -1px 0 #fff, 0 5px #fff, 2px 0 #fff, 0 -1px #fff;
        }
        body{
            background-color: darkorange;
        }
        .bgc{
            margin: 0;
            background:
            /* top, transparent black, faked with gradient */ 
            linear-gradient(
            rgba(0, 0, 0, 0.7), 
            rgba(0, 0, 0, 0.7)
            ),
            /* bottom, image */
            url(https://images.unsplash.com/photo-1466065478348-0b967011f8e0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=277e0050a115848d2984fd58c34c3598&auto=format&fit=crop&w=1044&q=80);
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;
        }
    </style>
</head>
<body class="bgc">
    <h1 class="error" id="404"></h1>
</body>
<script>
var i = 0;
var txt = 'Maaf Halaman Tidak di temukan .....';
var speed = 50;
function typeWriter() {
        if (i < txt.length) {
            document.getElementById("404").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    
}

typeWriter()
</script>
</html>