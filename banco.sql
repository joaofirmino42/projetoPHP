create database relacionamento;

use relacionamento;

create table cargo(
    idcargo int primary key auto_increment,
    nomecargo varchar(50) not null,
    salario double(8,2) not null
);

insert into cargo values(null,'Programador',3000.00);
insert into cargo values(null,'Web Designer',2500.50);
insert into cargo values(null,'Analista',2850.90);
insert into cargo values(null,'Suporte',2000.00);

create table funcionario(
    idfunc int primary key auto_increment,
    nome varchar(50) not null,
    email varchar(50) not null,
    dtnasc date not null,
    cpf char(14) unique not null,
    idcargo int not null,
    foreign key (idcargo) references cargo (idcargo)
);

alter table funcionario add foto varchar(50) default 'foto.jpg' AFTER cpf;


create table cliente(
    idcliente int primary key auto_increment,
    nome varchar(50) not null,
    email varchar(50) not null
);

create table endereco(
    idend int primary key auto_increment,
    logradouro varchar(200) not null,
    numero varchar(10),
    complemento varchar(50),
    cep char(8) not null,
    bairro varchar(50) not null,
    cidade varchar(50) not null,
    uf char(2) not null,
    idcliente int unique not null,
    foreign key (idcliente) references cliente (idcliente)
);
