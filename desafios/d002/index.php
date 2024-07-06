<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Trabalhando com números aleatórios</h1>
    </header>
    <section>
        <main>
            <?php
            $numero = rand(50, 100);

            echo "<p> Gerando um número aleatório entre 0 e 100...<br>
            O valor gerado foi $numero</p>"
            ?>

            <button onclick="javascript:document.location.reload()" type="button">Gerar número</button>
        </main>
    </section>

</body>

</html>