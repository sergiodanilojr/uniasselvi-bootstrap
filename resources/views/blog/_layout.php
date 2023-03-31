<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title) ?></title>
    <style>
        *{
            font-family: sans-serif;
        }

        .card{
            display: flex;
            flex-basis: 40%;
            flex-wrap: wrap;
            align-items: start;
            padding: 10px 16px;
            border-radius: 8px;
            box-shadow: 4px 0px 12px rgba(0,0,0,.08);
        }

        .card .title{
            display: block;
            width: 100%;
        }
    </style>
</head>

<body>
    Isso aqui é o header do site com o menu
    <?= $this->section('content') ?>

    Isso aqui é o o footer do site.
</body>

</html>