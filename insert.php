<style>
input{background-color:white;color:black;}
</style>
<?php
require 'db.php';

if(isset($_POST['nome']) && !empty($_POST['nome']) &&
        (isset($_POST['senha']) && !empty($_POST['senha'])))
{
    $nome = htmlspecialchars(ucfirst(addslashes($_POST['nome'])));
    $senha = md5(addslashes($_POST['senha']));
 
    $sql = "select * from usuarios";
    $sql = $pdo->query($sql);

    $cont = $sql->rowCount();
    $id = $cont + 1;
    
    $sql = "INSERT INTO usuarios SET id='$id', usuario='$nome', senha='$senha'";
    $pdo->query($sql);

    header("Location: index.php");
} 
?>

<form method="POST">
    <label>Usuario</label>
    <br>
    <input type="text" name="nome">
    <br>
    <label>Senha</label>
    <br>
    <input type="password" name="senha">
    <br>
    <br>
    <input type="submit" value="Inserir">
</form>