<!DOCTYPE html>
<html lang="en" data-theme="autumn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.43.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel='icon' href="./assets/icon.png">
    <title>Comienzo</title>
</head>
<body>
    <?php include("Handler.php") ?>
    <form action="Hangman.php" method="post" name="formulario" id="formulario" class='grid grid-rows-2 gap-4 place-items-center'>
        <h1 class='text-center text-orange-300 font-bold text-8xl mt-12'>Hangman</h1>
        <h2 class='text-center font-bold text-2xl mt-2 text-rose-500'>Level <?php echo $_SESSION['counter']?></h2>
        <button class="btn text-white btn-active btn-primary">COMENZAR 🤪</button>
    </form>
</body>
</html>