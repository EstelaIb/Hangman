<?php 
    session_start();
    $_SESSION['session'] = true;

    $words_global = array("CELULA", "HIPOPOTAMO", "MANTEQUILLA", "CANSANCIO", "FELICIDAD", 
                            "IDIOSINCRASIA", "CELEBRACION", "HARDWARE","MITOCONDRIA", "METODOLOGIA", 
                            "LARAVEL", "FRAMEWORK", "MATPLOTLIB", "SISTEMA", "CARNAVAL", "PETRICOR", "ENDOCRINOLOGO");
    $word = $words_global[mt_rand(0, count($words_global) - 1)];
    $lenght = mb_strlen($word);
    $_SESSION['len']=$lenght;
    $_SESSION['word']=$word;
    $_SESSION['first']=-1;
    $_SESSION['lettersCorrects'] = array();

    for ($x = 0; $x < $_SESSION['len']; $x++) {
        $_SESSION['lettersCorrects'][$x] = "";
    }

    if (isset( $_SESSION['counter'])){
        $_SESSION['counter'] += 1;
        if ($_SESSION['counter'] == 3){
            echo "<div class='flex justify-center'><span class='alert alert-success shadow-lg w-auto mt-5'>❕ GANASTE ❕</span></div>";
            header("refresh:2;url=Thanks.php");
        }
    }else {
        $_SESSION['counter'] = 0;
    }
?> 