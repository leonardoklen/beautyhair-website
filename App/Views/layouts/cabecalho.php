<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo TITLE; ?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Karla&family=Noto+Sans&family=Open+Sans+Condensed:wght@300&family=Slabo+27px&display=swap" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>

    

    <style>
        * {
            font-family: 'Karla', sans-serif;
        }

        .font {
            font-size: 130%;
        }

        .background {
            background-image: url("<?= PATH_IMG ?>layouts/bgHome.png");
            background-repeat: no-repeat;
            background-color: #000;
            background-size: cover;
            width: 100%;
            height: auto;
        }

        .background2 {
            background-image: url("<?= PATH_IMG ?>layouts/bgServicos.jpg");
            background-repeat: no-repeat;
            background-color: #000;
            background-size: cover;
            width: 100%;
            height: auto;
        }

        .footerFixo {
            margin: auto;
            width: 100%;
            bottom: 0;
        }
    </style>

</head>

<body>