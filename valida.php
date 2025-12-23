<?php 

session_start();

$usuario_autenticado = false;
$perfis = [1 => 'Administrativo', 2 => 'Usuário'];
$usuario_id = null;
$usuario_perfil_id = null;

$usuarios_logados = [
    [
        'usuario' => 'admin',
        'senha' => '123',
        'perfil_id' => 'Administrativo',
        'id' => 'admin01',
    ],
    [
        'usuario' => 'user',
        'senha' => '123',
        'perfil_id' => 'Usuário',
        'id' => 'user01',
    ]
];

    foreach($usuarios_logados as $user) {
        if ($_POST['usuario'] == $user['usuario'] && $_POST['senha'] == $user['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        } 

        if ($usuario_autenticado) {
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['id'] = $usuario_id;
            $_SESSION['perfil_id'] = $usuario_perfil_id;
            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['autenticado'] = 'SIM';
            header('Location: dashboard.php');

        } else {
            $_SESSION['autenticado'] = 'NAO';
            header('Location: login.php?login=erro');
        }
    }

    

?>