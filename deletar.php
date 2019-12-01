<?php
require 'db.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
    
    if($id == 1){
        echo "Você não tem permissão para executar esta ação.";exit;
    }

    $sql = "DELETE from usuarios WHERE id='$id'";
    $pdo->query($sql);

    header("Location: index.php");

} else {
    header("Location: index.php");
}
?>