<?php

include "palavras.php";

$palavra = $palavras[array_rand($palavras)];

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

    <p>Palavra sorteada:</p>

    <h2><?php echo $palavra; ?></h2>

</div>

</body>
</html>