<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniverData</title>
    <link rel="stylesheet" href="style2.css">
    <meta name="description" content="Site que calcula quando tempo falta para seu anivesário.">
    <meta name="author" content="Jotapeh">
</head>
<body>
    <?php 
        date_default_timezone_set("America/Belem");
        $dataAtual = date("Y-m-d");
        $seuNascimento = $_POST['suaData'] ?? $dataAtual;
    ?>
    <main>
        <section id="entrada-de-dados">
            <h1>Calcula aniversário</h1>
            <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
                <label for="suaData">Quando você nasceu ?</label>
                <input type="date" name="suaData" id="suaData" value="<?= $seuNascimento?>">
                <button type="submit">Analisar</button>
            </form>
        </section>
        <section id="resultado">
            <article>
                <h2>Resultado</h2>
                <?php
                    $sep = explode("-", $seuNascimento); // [0] => Ano; [1] => Mês; [2] => Dia;
                    $apenasSeuMes = $sep[1];
                    $apenasSeuDia = $sep[2];
                    $dataOfc = $apenasSeuMes . "-" . $apenasSeuDia;
                    // print $dataOfc;
                    $aniver = new DateTime(date("Y")."-$apenasSeuMes-$apenasSeuDia");
                    $diaAtual = new DateTime();
                    $interval = $diaAtual->diff($aniver);
                    $days = $interval->days;
                    $mouths = $interval-> m;
                    $idade = date("Y") - $sep[0];
                    if($days < 0){
                        print "<p>Seu anivesário já passou!</p>";
                    }
                    else if($days > 31){
                        if($mouths == 1){
                            print "<p>Faltam $mouths mês para você completar $idade anos.</p>";
                        }
                        else{
                            print "<p>Faltam $mouths meses para você completar $idade anos.</p>";
                        }
                    }
                    else{
                        print "<p>Faltam $days dias para você completar $idade anos.</p>";
                    }
                    // else{
                    //     print "<p>Faltam $days dias e $mouths meses para você completar $idade anos.</p>";
                    // }
                    // print_r($sep);
                ?>
            </article>
        </section>
    </main>
    <footer>
        <p>Desenvolvido por <a href="https://github.com/Jotapehh">Jotapeh</a></p>
    </footer>
</body>
</html>