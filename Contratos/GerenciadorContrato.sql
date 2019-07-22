create database GerenciadorContrato;
use Gerenciadorcontrato;

Create table login(
usuariooid int primary key auto_increment,
usuario varchar(25),
senha varchar(25)
)auto_increment = 1;

Create table pessoa(
idpessoa int primary key auto_increment,
pessoa char(1) not null,
nome varchar(50) not null,
nacionalidade varchar(50) not null,
profissao varchar(50) not null,
ecivil varchar(12) not null,
sexo char(1) not null,
cpf varchar(14) not null,
endereco varchar(50) not null,
estado varchar(2) not null,
cnpj varchar(14),
empresa varchar(7)
);

insert into login(usuario,senha) values ('jessica','jessica');
insert into login(usuario,senha) values('admin','admin');

select * from login;
