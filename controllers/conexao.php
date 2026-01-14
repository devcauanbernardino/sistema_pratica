<?php 

// Define o endereço do servidor do banco de dados (normalmente localhost no XAMPP)
$host = 'localhost';

// Define o usuário do banco de dados (padrão do MySQL no XAMPP é root)
$user = 'root';

// Define a senha do banco de dados (vazia por padrão no XAMPP)
$pass = '';

// Define o nome do banco de dados que será utilizado
$db = 'sistema_pratica';

// Cria a conexão com o banco de dados MySQL usando a classe mysqli
$conn = new mysqli($host, $user, $pass, $db);

?>
