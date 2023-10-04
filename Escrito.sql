create database escrito;

use escrito;

create table Tarea (
Id serial primary key, 
Titulo varchar (10) not null, 
Contenido varchar (25) not null, 
Estado enum ("En Proceso", "Terminado") not null, 
autor varchar (15) not null, 
created_at datetime, 
updated_at datetime, 
deleted_at datetime
); 