create database cfpickem;

use cfpickem;

create table usuarios (
	id int(11) not null auto_increment,
    email varchar(255) not null,
    senha varchar(255) not null, 
    nome varchar(255) not null,
    sobrenome varchar(255) not null,
    tipoUsuario int(1) not null,
    ativo boolean not null default 1,
    cadastro datetime default CURRENT_TIMESTAMP not null,
    status int(1) not null default 1,
    UNIQUE (email),
    primary key (id));

insert into usuarios (email, senha, tipousuario, ativo, cadastro) values ('usuario@email.com', md5('user123'), 1, true, CURRENT_TIMESTAMP);

insert into usuarios (email, senha, tipousuario, ativo, cadastro) values ('rakellcd@gmail.com', md5('senha123'), 1, true, CURRENT_TIMESTAMP);
    
create table atletas (
	id int(11) not null auto_increment,
    nome varchar(255) not null,
    sobrenome varchar(255) not null,
    regiao_id int(11) not null,
    primary key (id)
);    

alter table atletas add column divisao int(1) not null;

select * from atletas;

create table regioes (
	id int (11) not null auto_increment,
    nome varchar(255) not null,
    primary key(id)
);


insert into regioes (nome) values
('East Regional'),
('Europe Regional'),
('South Regional'),
('Central Regional'),
('West Regional'),
('Latin America Regional'),
('Atlantic Regional'),
('Meridian Regional'),
('Pacific Regional');

select * from regiao;

SELECT a.nome, a.sobrenome, r.nome as regiao_nome FROM atletas as a JOIN regiao as r ON a.regiao_id = r.id;









