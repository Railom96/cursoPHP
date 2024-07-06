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
        <h1>Converor de Moedas v1.0</h1>
    </header>
    <section>
        <main>
            <?php
            $real = $_GET["valorReal"] ;
            $cambio = 5.48;
            $dolar = ($real / $cambio);

            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
            

            echo "Seus " . numfmt_format_currency($padrao, $real, "BRL") . " equivalem a " . numfmt_format_currency($padrao, $dolar, "USD");
            ?>
            <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
        </main>
    </section>

</body>

</html>