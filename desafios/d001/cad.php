<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Resultado Final</h1>
    </header>
    <section>
        <main>
            <?php
            $numero = $_GET["numero"] ;

            $numeroAntecessor = ($numero - 1);

            $numeroSucessor  = ($numero + 1);

            echo "<p> o número escoldido foi $numero <br>
            O seu antecessor é $numeroAntecessor <br>
            O seu sucessor é $numeroSucessor </p>"
            ?>
            <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
        </main>
    </section>

</body>

</html>