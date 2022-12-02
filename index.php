<!-- Ative as animações do Windows para tornar a navegação mais agradável -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Atividade Prática de PW II </title>
</head>

<body>
    <header>
        <span class="app-title">Vaquinha para a festa junina 🎉</span>
        <a href="javascript:menuToggle()" id="menu">
            <img src="img/menu.svg" alt="menu button">
        </a>
    </header>
    <main>
        <p class="description">
            Organizar uma festa é sempre um problema.. não é mesmo? Esse app auxilia o organizador da festa a fazer o controle de quem está colaborando com alguma grana. Além disso, ele mostra o valor total acumulado para a realização da festa. Também é possível visualizar o valor médio doado por pessoa. 
            <p>
                O que fazer para tirar MB? 
            </p>
            <ul>
                <li>
                    Criar banco de daos que suporte esse sistema. ✔
                </li>
                <li>
                    Cadastro de objetos. ✔
                </li>
                <li>
                    Listagem dos objetos. ✔
                </li>
                <li>
                    Opção de remover. ✔
                </li>
                <li>
                    Colocar nomes no footer. ✔
                </li>
                <li>
                    Mostrar o total acumulado para a festa e o valor médio doado por pessoa. ✔
                </li>
            </ul>
        </p>
        

        <section class="content">
            <h1>
                💰 Pessoas que ajudaram (Total: <span id="ajuda-total">
                    <?php
                        require_once("conexao.php");
                        $sql = "SELECT SUM(valor_contribuicao) AS total FROM contribuinte";
                        $comando = $conexao->prepare($sql);
                        $comando->execute();
                        $dados = $comando->fetch(PDO::FETCH_ASSOC);
                        echo 'R$'.$dados["total"];
                    ?>
                </span>)
            </h1>
            <h2>
                Valor médio por pessoa (<span id="ajuda-media">R$ 12.50</span>)
            </h2>
            
            <div class="list">
                <?php
                require_once("conexao.php");
                $sql = "SELECT * FROM contribuinte";
                $comando = $conexao->prepare($sql);
                $comando->execute();
                $dados = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $contribuinte){
                echo '<div class="item">
                    <span class="name">' . $contribuinte["nome"] . '</span>
                    <span class="value">(💲 '. $contribuinte["valor_contribuicao"] . ')</span>
                    <a href="excluir.php?id='. $contribuinte["idContribuinte"].'">
                        <img src="img/trash.svg">
                    </a>
                </div>';
                }
                ?>
            </div>
        </section>

    </main>
    <aside>
        <h1>Nova contribuição</h1>
        <form action="cadastrar.php" autocomplete="off" method="post">
            <div class="field">
                <input type="text" id="txtpessoa" name="txtpessoa">
                <label for="txtpessoa">Nome do contribuinte</label>

            </div>
            <div class="field">
                <input id="txtvalor" name="txtvalor">
                <label for="txtvalor">Valor da contribuição</label>

            </div>
            <div class="field">
                <button id="btn-adicionar" type="submit">Adicionar</button>
            </div>
        </form>
        <a href="javascript:menuToggle()" class="close"><img src="img/close.svg" alt="Close button"></a>
    </aside>
    <footer>
        <span>Professor: <b>Giovanni Guarnieri</b></span>
        <span class="student">Aluno: <b>NÍCOLAS DE GODOI CARLOS PINTO</b></span>
    </footer>
</body>
<script src="js/navigation.js"></script>
</html>
<!-- 

-->