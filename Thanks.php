<!DOCTYPE html>
<html lang="en" data-theme="lemonade">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.43.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel='icon' href="./assets/icon.png">
    <title>Document</title>
</head>
<body class="py-12">
    <div class="grid grid-rows-2 gap-1 items-center conten-center">
        <span class="text-center text-6xl font-extrabold text-cyan-800 mt-15">
        ✌ GRACIAS POR JUGAR 
        </span>
        <div class="place-self-center">
            <img src="./assets/ghost.png" alt="my-icon" class="w-64 animate-bounce"/>
        </div>
        <?php 
            session_start();
            session_unset(); 
        ?>
    </div>
</body>
</html>