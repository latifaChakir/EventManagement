<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        /* Styles de la carte (ticket) */
        .card {
            border: 2px solid #333;
            border-radius: 10px;
            background-color: #fff;
            width: 80%;
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Styles du conteneur */
        .container {
            text-align: center;
        }

        /* Styles du logo */
        .logo {
            max-width: 150px;
            margin: 0 auto 20px; /* Centrer et ajouter un espace en bas */
            display: block; /* Assurez-vous que l'image est centrée */
        }

        /* Style du titre */
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Style du texte */
        p, h4 {
            color: #555;
            font-size: 18px;
            margin-bottom: 10px;
        }

        /* Style du nom */
        h4 b {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="container">
            {{-- <img src="{{ $base64ImageUrl }}" alt="Logo" class="logo"> --}}
            <h2>Ticket</h2>
            <p>For Event: <strong>{{ $eventName }}</strong></p>
            <p>Merci pour votre réservation à cet événement</p>
            <h4>Name: <b>{{ $userName }}</b></h4>
            <h4>Date: <b>{{ $date }}</b></h4>
        </div>
    </div>
</body>
</html>
