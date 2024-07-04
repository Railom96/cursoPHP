<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $nome = "Israel";
    $sobrenome = "Moreira";
    $idade = 27;
    $peso = 73.5;
    $casado = true;
    

    if ($casado == true) {
        $estadoCivil = "casado";
    } else {
        $estadoCivil = "solteiro";
    }

    const PAIS = "Brasil";

    echo "Olá, me chamo $nome $sobrenome, tenho $idade de idade e peso $peso quilos. Eu sou $estadoCivil e moro no " . PAIS . ".";
    ?>
    
</body>
</html>