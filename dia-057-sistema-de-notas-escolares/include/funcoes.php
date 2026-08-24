<?php
require_once __DIR__ . '/../config/database.php';


function cadastrarAlunoComNota($pdo, $nome, $turma, $disciplina, $nota1, $nota2)
{
    try {

        $pdo->beginTransaction();


        $media = ($nota1 + $nota2) / 2;
        $situacao = ($media >= 20) ? 'Aprovado' : 'Reprovado'; // Ajusta a nota de corte se necessário


        $sqlAluno = "INSERT INTO alunos (nome, turma, criado) VALUES (:nome, :turma, NOW())";
        $stmtAluno = $pdo->prepare($sqlAluno);
        $stmtAluno->execute([
            ':nome'  => $nome,
            ':turma' => $turma
        ]);

        // OBTEM O ID DO ULTIMO ALUNO
        $aluno_id = $pdo->lastInsertId();


        $sqlNota = "INSERT INTO notas (aluno_id, disciplina, nota1, nota2, media, situacao) 
                    VALUES (:aluno_id, :disciplina, :nota1, :nota2, :media, :situacao)";
        $stmtNota = $pdo->prepare($sqlNota);
        $stmtNota->execute([
            ':aluno_id'   => $aluno_id,
            ':disciplina' => $disciplina,
            ':nota1'      => $nota1,
            ':nota2'      => $nota2,
            ':media'      => $media,
            ':situacao'   => $situacao
        ]);


        $pdo->commit();
        return true;
    } catch (PDOException $e) {
        // Se algo falhar, desfaz tudo
        $pdo->rollBack();
        return false;
    }
}


function editarAlunoComNota($pdo, $aluno_id, $nome, $turma, $disciplina, $nota1, $nota2)
{
    try {
        $pdo->beginTransaction();


        $media = ($nota1 + $nota2) / 2;
        $situacao = ($media >= 20) ? 'Aprovado' : 'Reprovado';


        $sqlAluno = "UPDATE alunos SET nome = :nome, turma = :turma WHERE aluno_id = :aluno_id";
        $stmtAluno = $pdo->prepare($sqlAluno);
        $stmtAluno->execute([
            ':nome'     => $nome,
            ':turma'    => $turma,
            ':aluno_id' => $aluno_id
        ]);


        $sqlNota = "UPDATE notas 
                    SET disciplina = :disciplina, nota1 = :nota1, nota2 = :nota2, media = :media, situacao = :situacao 
                    WHERE aluno_id = :aluno_id";
        $stmtNota = $pdo->prepare($sqlNota);
        $stmtNota->execute([
            ':disciplina' => $disciplina,
            ':nota1'      => $nota1,
            ':nota2'      => $nota2,
            ':media'      => $media,
            ':situacao'   => $situacao,
            ':aluno_id'   => $aluno_id
        ]);

        $pdo->commit();
        return true;
    } catch (PDOException $e) {
        $pdo->rollBack();
        return false;
    }
}

function listarAlunosComNotas($pdo)
{
    try {

        $sql = "SELECT 
                    alunos.aluno_id,
                    alunos.nome,
                    alunos.turma,
                    notas.disciplina,
                    notas.nota1,
                    notas.nota2,
                    notas.media,
                    notas.situacao
                FROM alunos
                INNER JOIN notas ON alunos.aluno_id = notas.aluno_id
                ORDER BY alunos.nome ASC";

        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}
// apaga o aluno e as notas são apagadas automatamente pois foi usado ON DELETE CASCADE
function deletarAluno($pdo, $aluno_id)
{
    try {
        $stmt = $sql = "DELETE FROM alunos WHERE aluno_id = :aluno_id";
        $stmt = $pdo->prepare($sql);

        // Executa passando o ID do aluno
        return $stmt->execute([':aluno_id' => $aluno_id]);
    } catch (PDOException $e) {
        return false;
    }
}

?>