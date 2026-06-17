<?php

session_start();

include "palavras.php";

if (!isset($_SESSION["palavra"])) {

    $_SESSION["palavra"] =
        $palavras[array_rand($palavras)];

    $_SESSION["letrasCorretas"] = [];
}

$palavra = $_SESSION["palavra"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $letra = strtoupper($_POST["letra"]);

    if (
        strlen($letra) === 1 &&
        ctype_alpha($letra)
    ) {

        if (
            !in_array(
                $letra,
                $_SESSION["letrasCorretas"]
            )
        ) {

            if (str_contains($palavra, $letra)) {

                $_SESSION["letrasCorretas"][] =
                    $letra;
            }
        }
    }
}

$exibicao = "";

foreach (str_split($palavra) as $char) {

    if (
        in_array(
            $char,
            $_SESSION["letrasCorretas"]
        )
    ) {

        $exibicao .= $char . " ";

    } else {

        $exibicao .= "_ ";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Jogo da Forca PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Jogo da Forca PHP</h1>

    <h2><?php echo $exibicao; ?></h2>

    <form method="POST">

        <input
            type="text"
            name="letra"
            maxlength="1"
            required>

        <button type="submit">
            Tentar
        </button>

    </form>

</div>

</body>
</html>