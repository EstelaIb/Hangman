<!DOCTYPE html>
<html lang="en" data-theme="autumn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.43.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel='icon' href="./assets/icon.png">
    <title>Hangman</title>
</head>
<body class='py-8'>
    <p class='text-center mb-2 text-xs text-slate-500'>Escribe una letra</p>
    <form class='flex justify-center' action='' method="POST">
        <input name='letter' type='text' maxlength='1' class='flex input input-bordered input-primary w-12 text-center mx-1 mr-2' autofocus style='text-transform: uppercase'/>
        <button class="btn btn-primary">VERIFICAR 🔍</button>
    </form>
    <div class='mt-5 justify-center'>
    <?php
        session_start();
        if ($_SESSION['session'] && $_SESSION['first']!=-1){
            $_SESSION['letter']=$_POST['letter'];
            if(strlen($_SESSION['letter']) == 0){echo "<p class='block mt-2 text-red-700 text-center font-bold text-xs'>Ingrese una letra</p>";}
            checkLetter();
        } else {
            $_SESSION['first'] = 0;
        }

        

        function drawLetters(){
            echo "<div class='flex justify-center'>";
            foreach($_SESSION['lettersCorrects'] as $letterDraw){
                $letterDraw = strtoupper($letterDraw);
                echo "<div maxlength='1' class='justify-center input mx-1 w-11 font-bold' disabled/><p class='mt-3'>$letterDraw</p></div>";
            }
            echo "</div>";
        }
        drawLetters();
        
        function checkLetter(){
            $band = false;
            $wordArray = str_split($_SESSION['word']);
            for ($x = 0; $x < $_SESSION['len']; $x++) {
                if (strtoupper($_POST['letter']) == $_SESSION['word'][$x]){
                    $_SESSION['lettersCorrects'][$x] = $_POST['letter'];
                    $band=true;
                }
            }
        
            if (!$band && strlen($_SESSION['letter'])!=0){
                $_SESSION['first']++;
            }
            drawHangman();
        }

        function win(){
            $band = true;
            foreach($_SESSION['lettersCorrects'] as $l){
                if (strlen($l) == 0){
                    $band = false;
                    break;
                }
            }
            if ($band){
                echo "<div class='flex justify-center'><span class='alert alert-success shadow-lg w-auto mb-4'>❕ Ganaste ❕ Vamos al siguiente nivel 🐱‍👤</span></div>";
                header("refresh:2;url=index.php");
            }
        }
    ?>
    </div>
    <?php       
        function drawHangman(){
            $attempt = $_SESSION['first'];
            $band = false;

            if ($attempt <= 7){
                echo "<div class='flex justify-center'>";
                echo "<img src='./assets/Ahorcado-$attempt.png' class='my-10 w-48 mt-9'>";
                echo "</div>";
                if ($attempt == 6){$band=true;}
            }

            if ($band){
                echo "<div class='flex justify-center'><span class='alert alert-error shadow-lg w-auto mb-4'>Perdiste. Vuelve a Intentarlo 😭</span></div>";
                echo "<div class='flex justify-center'><span class='alert alert-info shadow-lg w-auto mb-4 text-center'> ❕ Palabra: " . $_SESSION['word'] . " ❕</span></div>";
                header("refresh:3;url=index.php");
                unset($_SESSION['counter']);
            }
            win();
        }
    ?>
</body>
</html>