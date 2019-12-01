<?php session_start(); ?>
<style>
td{
    text-align:center;
    padding:8px 0px;
    background-color:#e1e1e1;
    border-bottom:1px solid #f1f1f1;
}
th{
    padding:6px 8px;
    font-size:16px;
}
a{
    text-decoration:none;
    border:1px solid #e1e1e1;
    border-radius:5px;
    padding:2px 3px;
    color:white;
    background-color:green;
}
table{
    border-collapse:collapse;
    margin-top:5px;
    border:none;
}
.title{
    background-color:#2e2e2e;
    color:white;
}
.sem-usuarios{
    border:1px solid #e1e1e1;
    width:260px;
    padding:4px 7px;
    border-radius:6px;
    background-color:#e1e1e1;
    color:green;

}
body{
    margin:0 auto;
    width:100%;
    max-width:1080px;
}
header{
    width:100%;
    max-width:1080px;
    height:70px;
    background-color:#1e1e1e;
}
#sair{
    float:right;
    color:white;
}
#cad{
    float:left;
}
#header{
    line-height:70px;
    margin-left:15px;
    margin-right:15px;
}
</style>

<header>
    <div id="header">
        <div id="cad"><a href="insert.php">Adicionar Novo Usuario</a></div>      
        <div id="sair"> Seja bem vindo <strong><?php echo $_SESSION['usuario'];?></strong> &nbsp; <a href="logout.php">Sair</a></div>
    </div>
</header>
<table border="0" width="100%">
    
    <?php
    
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    require 'db.php';
    $sql = "SELECT * FROM usuarios order by usuario";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0) {

    ?>
        <tr class="title">
            <th>Usuario</th>
            <th>Senha</th>
            <th>Ações</th>
        </tr>
    <?php
       foreach($sql->fetchAll() as $usuario) {
           echo '<tr>';
           echo '<td>'.$usuario['usuario'].'</td>';      
           echo '<td>'.$usuario['senha'].'</td>';
           echo '<td> <a href="editar.php?id='.$usuario['id'].'">Editar</a> - <a href="deletar.php?id='.$usuario['id'].'">Deletar</a> </td>';
           echo '</tr>';
       }
    }else{
        echo "<br><br><div class='sem-usuarios'>Nao ha dados a serem exibidos!</div>";
    }
}else{
    header("Location:login.php");
}
    ?>
    </table>