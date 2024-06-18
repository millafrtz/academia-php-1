<?php
class Aluno {
    private $nome;
    private $id;
    private $historicoTreinos = [];
    private $historicoEquipamentos = [];

    public function __construct($nome, $id) {
        $this->nome = $nome;
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getId() {
        return $this->id;
    }

    public function getHistoricoTreinos() {
        return $this->historicoTreinos;
    }

    public function getHistoricoEquipamentos() {
        return $this->historicoEquipamentos;
    }

    public function adicionarTreino($agendamentoTreino) {
        $this->historicoTreinos[] = $agendamentoTreino;
    }

    public function adicionarEquipamento($agendamentoEquipamento) {
        $this->historicoEquipamentos[] = $agendamentoEquipamento;
    }

    public function __toString() {
        return "Aluno [nome=" . $this->nome . ", id=" . $this->id . "]";
    }
}

class Treino {
    private $nome;
    private $tipo;
    private $descricao;

    public function __construct($nome, $tipo, $descricao) {
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function __toString() {
        return "Treino [nome=" . $this->nome . ", tipo=" . $this->tipo . "]";
    }
}

class Equipamento {
    private $nome;
    private $id;

    public function __construct($nome, $id) {
        $this->nome = $nome;
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getId() {
        return $this->id;
    }

    public function __toString() {
        return "Equipamento [nome=" . $this->nome . ", id=" . $this->id . "]";
    }
}

class Instrutor {
    private $nome;
    private $id;

    public function __construct($nome, $id) {
        $this->nome = $nome;
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getId() {
        return $this->id;
    }

    public function __toString() {
        return "Instrutor [nome=" . $this->nome . ", id=" . $this->id . "]";
    }
}

class AgendamentoTreino {
    private $aluno;
    private $treino;
    private $data;
    private $instrutor;

    public function __construct($aluno, $treino, $data, $instrutor) {
        $this->aluno = $aluno;
        $this->treino = $treino;
        $this->data = $data;
        $this->instrutor = $instrutor;
    }

    public function getAluno() {
        return $this->aluno;
    }

    public function getTreino() {
        return $this->treino;
    }

    public function getData() {
        return $this->data;
    }

    public function getInstrutor() {
        return $this->instrutor;
    }

    public function __toString() {
        return "Agendamento de Treino [aluno=" . $this->aluno->getNome() . ", treino=" . $this->treino->getNome() . ", data=" . $this->data . ", instrutor=" . $this->instrutor->getNome() . "]";
    }
}

class AgendamentoEquipamento {
    private $aluno;
    private $equipamento;
    private $data;

    public function __construct($aluno, $equipamento, $data) {
        $this->aluno = $aluno;
        $this->equipamento = $equipamento;
        $this->data = $data;
    }

    public function getAluno() {
        return $this->aluno;
    }

    public function getEquipamento() {
        return $this->equipamento;
    }

    public function getData() {
        return $this->data;
    }

    public function __toString() {
        return "Agendamento de Equipamento [aluno=" . $this->aluno->getNome() . ", equipamento=" . $this->equipamento->getNome() . ", data=" . $this->data . "]";
    }
}

class SistemaAcademia {
    private $alunos = [];
    private $treinos = [];
    private $equipamentos = [];
    private $instrutores = [];

    public function adicionarAluno($aluno) {
        $this->alunos[] = $aluno;
    }

    public function adicionarTreino($treino) {
        $this->treinos[] = $treino;
    }

    public function adicionarEquipamento($equipamento) {
        $this->equipamentos[] = $equipamento;
    }

    public function adicionarInstrutor($instrutor) {
        $this->instrutores[] = $instrutor;
    }

    public function listarAlunos() {
        return $this->alunos;
    }

    public function listarTreinos() {
        return $this->treinos;
    }

    public function listarEquipamentos() {
        return $this->equipamentos;
    }

    public function listarInstrutores() {
        return $this->instrutores;
    }
}
?>
