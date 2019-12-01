<style>
#senha{
    display:none;
}
</style>
<?php
session_start();
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = addslashes(md5($_POST['senha']));

    $dsn = "mysql:dbname=sistema;host=127.0.0.1";
    $dbuser = "luiz";
    $dbpass = "1234";

    try{
        $db = new PDO($dsn, $dbuser, $dbpass);

        $sql = $db->query("SELECT * FROM usuarios WHERE usuario='$email' AND senha='$senha'");
        
        if($sql->rowCount() > 0){
            
            $dado = $sql->fetch();
            $_SESSION['id'] = $dado['id'];
            $_SESSION['usuario'] = $dado['usuario'];
            header("Location:index.php");
        }
        else{
            ?>
            <style>
                #senha{
                display:block;
                text-align:center;
                border:1px solid red;
                width:220px;
                padding: 3px 5px;
                border-radius:6px;
                clear:both;
                margin:10 auto;
                background-color:rgba(255,0,0,.3);
                }
                </style>
            <?php
        }
    } 
    catch(PDOException $e) {
        echo "Falhou: ".$e->getMessage();
    }
}

?>
<style>
body{margin:0 auto;width:100%;max-width:1080px;}
h1{text-align:center;}
input{background-color:white;color:black;}
form{text-align:center;font-size:18px;}
header{background-color:black;height:70px;width:100%;max-width:1080px;}
footer{background-color:black;height:70px;width:100%;max-width:1080px;}
</style>
<script>
console.log("------------------------------");
console.log("Olá seja bem vindo por aqui :)\n");
console.log("------------------------------");
</script>
<header></header>
<h1>Area de Login</h1>
<form method="POST">

    <label>Email:</label><br>
    <input type="text" name="email" autocomplete="on"><br>
    
    <label>Senha:</label><br>
    <input type="password" name="senha"><br><br>   
    
    <input type="submit" value="Entrar">

</form>
<div id="senha">
    Usuario ou senha ivalidos
</div>
<footer></footer>
