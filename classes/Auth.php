<?php 
class Auth {

    //atributos simulando um banco de dados
    private $usuarios = [
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

    //método para autenticar usuário
    public function autenticar($usuario, $senha, $nome) {
        foreach ($this->usuarios as $user) {
            if ($usuario === $user['usuario'] && $senha === $user['senha']) {
                $this->criarSessao($user, $nome);
                return true;
            }
        }

        return false;
    }

    public function criarSessao($user, $nome) {
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['perfil_id'] = $user['perfil_id'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $nome;
    }

}


?>