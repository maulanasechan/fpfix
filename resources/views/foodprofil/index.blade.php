<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100%;
                margin: 0;
            }

            .bg{
                background-image: url("/img/websitemppl10.jpg");
                height: 100%;
                margin: 0;
                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-left {
                position: absolute;
                left: 380px;
                top: 235px;
                font-family: blacksword; 
                text-decoration: none; 
                word-spacing: 40px; 
                font-size: 75px;
                color: #354857;
            }

            .top-left:hover {
                color: #AD9336;
            }

            .top-leftnew {
                position: absolute;
                left: 19%;
                top: 59%;
                text-decoration: none;  
                font-size: 17px;
                font-weight: bold;
                color: #354857;
            }

            .top-leftnew:hover {
                color: #EFC113;
            }

            .top-right {
                position: absolute;
                right: 450px;
                top: 290px;
                font-family: blacksword; 
                text-decoration: none; 
                word-spacing: 40px; 
                font-size: 75px;
                color: #354857;
            }

            .top-right:hover {
                color: #AD9336;
            }

            .top-center {
                font-family: blacksword; 
                text-decoration: none; 
                text-align: center;
                word-spacing: 20px; 
                font-size: 62px;
                color: #354857;
            }


            .logout {
                position: absolute;
                font-family: 'Nunito', sans-serif;
                font-weight: bold; 
                margin-top: 28.2%; 
                color: white; 
                right: 70px; 
                font-size: 18px;
                text-decoration: none;
            }

            .logout:hover {
                color: #EFC113;
            }

            .chat {
                position: absolute;
                font-family: 'Nunito', sans-serif;
                font-weight: Bold; 
                margin-top: 25%; 
                color: black; 
                right: 65px; 
                font-size: 18px;
                text-decoration: none;
            }

            .chat:hover {
                color: #EFC113;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #EFC113;
                padding: 0 25px;
                margin-top: 60px; margin-right: 50px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;               
            }
            .links > a:hover {
                color: #f5f5f5;  
                font-size: 23px;           
            }


            .m-b-md {
                margin-bottom: 30px;
            }

            .round-button {
                display:block;
                width:80px;
                height:80px;
                line-height:60px;
                border: 4px solid #C2AE65;
                border-radius: 50%;
                color:#f5f5f5;
                text-align:center;
                text-decoration:none;
                background: #AD9336;
                box-shadow: 0 0 3px gray;
                font-size:16px;
                font-weight:bold;
            }

            .round-button:hover {
                background: #C2AE65;
                font-size: 18px;
            }

            .box-biru {
                display:block;
                width:110px;
                height:150px;
                line-height:80px;
                border-radius: 8%;
                color:#f5f5f5;
                text-align:center;
                text-decoration:none;
                background-image: linear-gradient(to right, #354857 , #19354B);
                box-shadow: 0 0 3px gray;
                font-size:18px;
                font-weight:bold;
            }

            .box-biru:hover {
                background: #C2AE65;
                font-size: 20px;
            }

            .crop {
              position: absolute;
              top: 32%;
              left: 11.5%;
              height: 35%;
              width: auto;
              border-radius: 10%;
            }

            input[type=text], select {
              width: 37.5%;
              height: 45px;
              padding: 12px 20px;
              margin-top: 4px;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
              color: white;
              background-image: linear-gradient(to right, #354857 , #19354B);
            }
            input[type=password], select {
              width: 37.5%;
              height: 45px;
              padding: 12px 20px;
              margin-top: 4px;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
              color: white;
              background-image: linear-gradient(to right, #354857 , #19354B);
            }

            @font-face {
              font-family: blacksword;
              src: url(/font/Blacksword.otf);
            }
            .column {
              float: left;
              width: 33.33%;
              padding: 10px;
              height: 300px; /* Should be removed. Only for demonstration */
            }

            /* Clear floats after the columns */
            .row:after {
              content: "";
              display: table;
              clear: both;
            }
            input[type=email], select {
              width: 37.5%;
              height: 45px;
              padding: 12px 20px;
              margin-top: 4px;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
              color: white;
              background-image: linear-gradient(to right, #354857 , #19354B);
            }
            form.example input[type=text] {
              padding: 10px;
              font-size: 17px;
              border: 1px solid grey;
              float: left;
              width: 80%;
              background: #f1f1f1;
            }

            form.example button {
              float: left;
              width: 20%;
              padding: 10px;
              background: #2196F3;
              color: white;
              font-size: 17px;
              border: 1px solid grey;
              border-left: none;
              cursor: pointer;
            }

            form.example button:hover {
              background: #0b7dda;
            }

            form.example::after {
              content: "";
              clear: both;
              display: table;
            }   
        </style>
    </head>
    <body style="background-color: #354857">
        <div class="bg">
            <div style="text-align: center; padding-top: 8%;"><a href="" class="top-center">Pecel Bu Nanik</a></div>
            <a href="/" class="logout">Logout</a>
            
            <img class="crop" src="/img/prof.jpg">
            <div style=" position: absolute; top: 29.5%; left: 31.5%; width: 58%;">
            <center>
              <input id="name" type="text" class="" name="name" required autofocus style="margin-top: 18px" placeholder="Harga">
            </center>
            <center>  
              <input id="email" type="text" class="" name="email" required placeholder="Jam Buka">
              </center>
              <center>   
              <input id="password" type="text" class="" name="password" required placeholder="No.Telp">
                </center>
                <center> 
              <input id="new_password" type="text" class="" name="new_password" required placeholder="Alamat">
            </center> 
            <center>  
              <input id="medical" type="text" class="" name="medical" required autofocus placeholder="Preorder">
              </center>  
            </div>
            <form action="/home">
              <center>
                <button class="round-button" style="margin-top: 22.8%;">Back</button>
              </center>
            </form>
        </div>
</div>

