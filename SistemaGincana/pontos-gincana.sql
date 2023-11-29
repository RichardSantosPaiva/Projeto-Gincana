DROP DATABASE IF EXISTS  gincana;
CREATE DATABASE gincana;
USE gincana;

CREATE TABLE curso (
    idCurso INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    curso VARCHAR(20) /*INFO, ADM, RH*/
);
CREATE TABLE diasGincana(
	idDiaGincana INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    dia DATE
);

CREATE TABLE turmas (
    idTurma INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    turma VARCHAR(70), /*1info, ou 2info, ou 3 info,   1adm, ou 2 adm etc*/
    idCurso INT,
    CONSTRAINT fk_curso_turma FOREIGN KEY (idCurso)
        REFERENCES curso (idCurso)
);

CREATE TABLE alunos (
    idAlunos INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    pontos INT,
    nome VARCHAR(77),
    idade INT(2),
    idDiaGincana INT,
    idTurma INT,
     CONSTRAINT fk_aluno_diaGincana FOREIGN KEY (idDiaGincana )
        REFERENCES diasGincana (idDiaGincana ),
	 CONSTRAINT fk_aluno_turma FOREIGN KEY (idTurma)
		REFERENCES turmas (idTurma)
);

/*
create table AlunosTurma (
	idAlunosTurma INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    idTurma INT,
    idAlunos INT,
    CONSTRAINT fk_aluno_turma FOREIGN KEY (idTurma)
        REFERENCES turmas (idTurma),
	 CONSTRAINT fk_alunos_turma FOREIGN KEY (idAlunos)
        REFERENCES alunos (idAlunos)
);
*/

/* Inserindo os dados na tabela cursos */
INSERT INTO curso (curso) VALUES ('INFO');
INSERT INTO curso (curso) VALUES ('ADM');
INSERT INTO curso (curso) VALUES ('RH');

/* Inserindo os dados na tabela turma */
INSERT INTO turmas (turma, idCurso) VALUES ('1º INFO', 1);
INSERT INTO turmas (turma, idCurso) VALUES ('2º INFO', 1);
INSERT INTO turmas (turma, idCurso) VALUES ('3º INFO', 1);
INSERT INTO turmas (turma, idCurso) VALUES ('1º ADM', 2);


