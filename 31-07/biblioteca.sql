create database biblioteca;
use biblioteca;

CREATE TABLE Alunos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  turma VARCHAR(50)
);

CREATE TABLE Livros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100),
  autor VARCHAR(100),
  ano_publicacao INT,
  emprestimo BOOLEAN DEFAULT FALSE,
  data_emprestimo DATE,
  data_devolucao DATE,
  aluno_id INT,
  FOREIGN KEY (aluno_id) REFERENCES Alunos(id)
);

ALTER TABLE Livros
ADD categoria VARCHAR(50);

ALTER TABLE Alunos
DROP COLUMN turma;

INSERT INTO Alunos (id, nome, turma) VALUES (1, 'Ana Paula', '1A');
INSERT INTO Alunos (id, nome, turma) VALUES (2, 'João Marcos', '2B');

INSERT INTO Livros 
(id, titulo, autor, ano_publicacao, emprestimo, data_emprestimo, data_devolucao, aluno_id, categoria) 
VALUES 
(1, 'Dom Casmurro', 'Machado de Assis', 1899, FALSE, NULL, NULL, NULL, 'Romance');

INSERT INTO Livros 
(id, titulo, autor, ano_publicacao, emprestimo, data_emprestimo, data_devolucao, aluno_id, categoria) 
VALUES 
(2, 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 1943, FALSE, NULL, NULL, NULL, 'Infantil');

INSERT INTO Emprestimos (id, livro_id, aluno_id, data_emprestimo, data_devolucao) 
VALUES (1, 1, 2, '2025-07-20', NULL);

UPDATE Livros
SET autor = 'Machado de Assis'
WHERE titulo = 'Dom Casmurro';

DELETE FROM Alunos
WHERE nome = 'João Marcos';

SELECT * FROM Livros;

SELECT * FROM Alunos;

SELECT * FROM Emprestimos;

