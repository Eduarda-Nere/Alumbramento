drop database if exists alumbramento;
create database alumbramento;
use alumbramento;

create table login (
  email varchar(60) not null primary key,
  senha varchar(10) not null,
  nome varchar (50) not null default("nome"),
  perfil varchar (20) not null default("usuario comum")
);

insert into login (email, senha, nome, perfil) values ("kiaraalvesjaques@gmail.com", "b32f954b", "Kiara", "adm");
insert into login (email, senha, nome, perfil) values ("eduarda.nere@aluno.ifsp.edu.br", "1234", "Eduarda Nere Rodrigues", "adm");

drop database if exists acervo;
create database acervo;
use acervo;

CREATE TABLE classificacao (
  idc INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(20) NOT NULL,
  PRIMARY KEY (idc))
ENGINE = InnoDB;

    insert into classificacao values (1, 'Vestibular');
    insert into classificacao values (2, 'Clássico');
    insert into classificacao values (3, 'Contemporâneo');
    insert into classificacao values (4, 'Antologia');

CREATE TABLE livro (
  isbn double NOT NULL,
  titulo VARCHAR(50) NOT NULL,
  autor VARCHAR(45) NOT NULL,
  PRIMARY KEY (isbn))
ENGINE = InnoDB;

insert into livro values (8594318855, 'Quincas Borba', 'Machado de Assis');
insert into livro values (8501114782, 'Vidas secas', 'Graciliano Ramos');
insert into livro values (8532508120, 'A hora da estrela', 'Clarice Lispector');
insert into livro values (8594318600, 'Dom Casmurro', 'Machado de Assis');
insert into livro values (8525406783, 'A viuvinha', 'José de Alencar ');

    
create table classificacao_livro (
    idc int not null,
    isbn double not null, 
    PRIMARY KEY (`idc`, `isbn`),
  INDEX `fk_classificacao_has_livro_livro1_idx` (`isbn` ASC),
  INDEX `fk_classificacao_has_livro_classificacao1_idx` (`idc` ASC),
  CONSTRAINT `fk_classificacao_has_livro_classificacao1`
    FOREIGN KEY (`idc`)
    REFERENCES classificacao (`idc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_classificacao_has_livro_livro1`
    FOREIGN KEY (`isbn`)
    REFERENCES livro (`isbn`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO classificacao_livro (idc, isbn) VALUES ('2', '8594318855'), ('1', '8594318855');

create table forum(
  id INT NOT NULL AUTO_INCREMENT,
  comentario VARCHAR(500) NOT NULL,
  isbn_livro double NOT NULL,
  PRIMARY KEY (id),
  INDEX `fk_forum_livro1_idx` (isbn_livro ASC),
  CONSTRAINT `fk_forum_livro1`
    FOREIGN KEY (isbn_livro)
    REFERENCES livro (isbn)
    );

INSERT INTO forum (`id`, `comentario`, `isbn_livro`) VALUES 
    (1, 'Que livro maravilhoso! Recomendo que todos leiam :)', '8594318855'), 
    (2, 'Livro muito instigante me prendeu desde o inicio!', '8594318855'),
    (3, 'Eu adorei esse livro! Fala de temas bem importantes', '8501114782'), 
    (4, 'Muito bom! Pessoal, recomendo que leiam.', '8532508120'),
    (5, 'Eu amei :)', '8532508120'),
    (6, 'Comecei hoje a leitura e estou adorando.', '8594318600'), 
    (7, 'História de muitas reviravoltas!', '8525406783'),
    (8, 'Que final surpreendente!', '8525406783');
    