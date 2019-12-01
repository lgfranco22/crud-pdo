<style>
input{
    background-color:white;
    color:black;
}
</style>
<?php
//requere o arquivo do banco de dados
require 'db.php';

//declara a variavel id como 0
$id = 0;

//faz um if pra verificar se foi passado um id via GET
//se foi passado e ele nao esta vazio entao atribui o valor passado a variavel id
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
}

//faz um if pra verificar se foi passado um nome via POST
//se sim entao atribui esse nome na variavel nome
//esse if nao executa quando carrega a pagina
if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = htmlspecialchars(ucfirst(addslashes($_POST['nome'])));
    
    //monta a query de atualização
    $sql = "UPDATE usuarios SET usuario='$nome' WHERE id='$id'";
    //executa a query
    $pdo->query($sql);

    //redireciona para a index
    header("Location: index.php");
}    
    //monta a query pra selecionar todos os dados do usuairo X
    //tudo isso a baixo so pra pegar o valor e preencher no form
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    //executa a query
    $sql = $pdo->query($sql);
    //faz um if pra verificar se o resultado da query anterior é maior que zero
    if($sql->rowCount() > 0){
        //se sim entao atribui o primeiro campo da busca a variavel dado
        $dado = $sql->fetch();
        if($dado['id'] == 1){
            echo "Você não tem permissão para executar esta ação.";
            exit;
        }
    }
    else{
        //se nao entao redireciona pra index
        header("Location: index.php");
    }

?>
<!--
    monta o formulario de edição
-->
<form method="POST">
    Usuario<br>
    <input type="text" name="nome" value="<?php echo $dado['usuario']?>"><br><br>
    <input type="submit" value="Atualizar">
</form>