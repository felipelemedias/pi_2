<?php

class Pessoa {
    private $nome;
    private $idade;

    public function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }
}

interface PessoaDAO {
    public function ler();
    public function criar($nome, $idade);
    public function atualizar($nome, $novaIdade);
    public function remover($nome);
}

class PessoaDAOImplementacao implements PessoaDAO {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function ler() {
        $sql = "SELECT * FROM pessoas";
        $resultado = $this->conexao->query($sql);
        $listaPessoas = [];

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $pessoa = new Pessoa($row['nome'], $row['idade']);
                $listaPessoas[] = $pessoa;
            }
        }

        return $listaPessoas;
    }

    public function criar($nome, $idade) {
        $sql = "INSERT INTO pessoas (nome, idade) VALUES ('$nome', $idade)";
        $resultado = $this->conexao->query($sql);

        if ($resultado) {
            echo "\nPessoa criada com sucesso.\n" . PHP_EOL;
        } else {
            echo "\nErro ao criar pessoa: \n" . $this->conexao->error . PHP_EOL;
        }
    }

    public function atualizar($nome, $novaIdade) {
        $sql = "UPDATE pessoas SET idade = $novaIdade WHERE nome = '$nome'";
        $resultado = $this->conexao->query($sql);

        if ($resultado) {
            echo "\nIdade atualizada com sucesso para todos os registros com o nome '$nome'.\n" . PHP_EOL;
        } else {
            echo "\nErro ao atualizar idade: \n" . $this->conexao->error . PHP_EOL;
        }
    }

    public function remover($nome) {
        $sql = "DELETE FROM pessoas WHERE nome = '$nome'";
        $resultado = $this->conexao->query($sql);

        if ($resultado) {
            echo "\nRegistros com o nome '$nome' removidos com sucesso.\n" . PHP_EOL;
        } else {
            echo "\nErro ao remover registros: \n" . $this->conexao->error . PHP_EOL;
        }
    }
}

class ConnectionFactory {
    public static function getConnection($host, $database, $user, $password) {
        $conexao = new mysqli($host, $user, $password, $database);

        // Verifica se houve algum erro na conexão
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: \n" . $conexao->connect_error);
        }

        return $conexao;
    }
}

// Teste

$host = "localhost";
$database = "crud";
$user = "root";
$password = "";

$conexao = ConnectionFactory::getConnection($host, $database, $user, $password);
$dao = new PessoaDAOImplementacao($conexao);

// Criar 4 registros distintos
$dao->criar("João", 25);
$dao->criar("Maria", 30);
$dao->criar("José", 35);
$dao->criar("Ana", 40);

// Listar todos os registros
$listaPessoas = $dao->ler();
foreach ($listaPessoas as $pessoa) {
    echo "\nNome: " . $pessoa->getNome() . ", Idade: \n" . $pessoa->getIdade() . PHP_EOL;
}

// Remover dois registros
$dao->remover("João");
$dao->remover("José");

// Listar todos os registros
$listaPessoas = $dao->ler();
foreach ($listaPessoas as $pessoa) {
    echo "\nNome: " . $pessoa->getNome() . ", Idade: \n" . $pessoa->getIdade() . PHP_EOL;
}

// Atualizar um registro
$dao->atualizar("Maria", 35);

// Listar todos os registros
$listaPessoas = $dao->ler();
foreach ($listaPessoas as $pessoa) {
    echo"\nNome: " . $pessoa->getNome() . ", Idade: \n" . $pessoa->getIdade() . PHP_EOL;
}

?>