<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisa Número Real</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Numero real</h1>
    </header>
    <section>
        <main>
            <?php
            $numeroReal = $_POST["numeroReal"];
    
            $inteiro = (INT) $numeroReal;
            $fracionaria = $numeroReal - $inteiro;

            echo "Analisado o número ". number_format($numeroReal, 3, ",", ".") ." informado pelo usuário: <br
            <ol>
                <li>A parte inteira do número é $inteiro</li>
                <li>A parte fracionaria do número é " . number_format($fracionaria, 3) ." </li>
            </ol>" 
            ?>
            <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
        </main>
    </section>

</body>

</html>