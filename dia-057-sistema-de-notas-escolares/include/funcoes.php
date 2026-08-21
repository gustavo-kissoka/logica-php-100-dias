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
?>