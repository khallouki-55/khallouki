<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome WilayaNeet</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
    
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .full-height {
            height: 100%;
        }
        .bg-image {
            background-image: url('{{ asset("image/bg123.jpg") }}');
            background-size: cover;
            background-position: center;
            position: relative;

        }
        .container {
            width: 350px;
            height: 400px;
            text-align: center;
            overflow: 20;
            border-radius: 10px; 
            opacity: 1;
            background: rgba(14, 14, 14, 0.56);
            border: 2px solid #c3c2c2;
            padding: 20px; 
        }

        button {
            width: 200px;
            padding: 10px 20px;
            background-color: #096771e5; 
            color: #fff; 
            border: none;
            border-radius: 5px; 
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #743028; 
        }
        .login-btn:hover {
            background-color: #461e19;
            color: #ffffff;
        }


        .login-btn:active {
            transform: translateY(1px); 
        }
        .red-text {
            color: red;
        }

        .green-text {
            color: green;
        }

        .bronze-text {
            color: #cd7f32; 
        }

</style>
    </style>
</head>
<body class="bg-image">
    <div class="container">
        <img src="{{ asset('image/143.png') }}" alt="Description de l'image" width="150px" height="150px" ><br><br>
        <h3 class="display-4">
            <span class="red-text">ROYAUME DU MAROC</span><br>
            <span class="green-text">MINISTERE DE L'INTERIEUR</span><br>
            <span class="bronze-text">WILAYA DE LA REGION MARRAKECH-SAFI PREFECTURE DE MARRAKECH</span>
        </h3>    <br>  
        <button type="button" class="btn btn-lg btn-outline-primary" onclick="window.location='{{ route('login') }}'">Connexion</button>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

