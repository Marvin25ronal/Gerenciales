drop database if exists db_CRM;
CREATE DATABASE db_CRM;
use db_CRM;
CREATE TABLE administrador(
	id int auto_increment primary key, 
    nombre varchar(255), 
    user_name varchar(255), 
    pass varchar(255)
);

CREATE TABLE producto(
	id int auto_increment primary key, 
    nombre varchar(255), 
    descripcion text, 
    precio_venta numeric(9,2), -- estos dos precios son sugeridos pero seran variables. 
    precio_compra numeric(9,2), 
    stock bigint
);

CREATE TABLE cliente(
	id int auto_increment primary key, 
    user_name varchar(255), 
    pass varchar(255), 
    nombre_completo varchar(255), 
    telefono varchar(255), 
    direccion varchar(255),
    nit varchar(255));
    
create table proveedor (
	id int auto_increment primary key, 
    nombre_empresa varchar(255),
    nombre_contacto varchar(255), 
    telefono_contacto varchar(255),
    direccion varchar(255)
);

create table pedido_cliente(
	id int auto_increment primary key, 
    cliente int,
    fecha datetime, 
    estado int,
    foreign key (cliente) references cliente(id)
    
); 

create table pedido_proveedor(
	id int auto_increment primary key, 
    proveedor int,
    fecha datetime, 
    estado int,
    foreign key (proveedor) references proveedor(id)
    ); 
    
CREATE TABLE detalle_proveedor(
	id int auto_increment primary key, 
    id_pedido int , 
    id_producto int , 
    cantidad int , 
    precio numeric(9,2), -- o se copia el anterior o se usa uno nuevo como sea :D
    foreign key (id_pedido) references pedido_proveedor(id), 
    foreign key (id_producto) references producto(id)
);

CREATE TABLE detalle_cliente(
	id int auto_increment primary key, 
    id_pedido int , 
    id_producto int , 
    cantidad int , 
    precio numeric(9,2), -- o se copia el anterior o se usa uno nuevo como sea :D
    foreign key (id_pedido) references pedido_cliente(id), 
    foreign key (id_producto) references producto(id)
);

insert into producto values(null,"Manzana","Es roja",10,5,100,"img/manzana.jpg");
insert into producto values(null,"Naranja","Es naranja",100,5,100,"img/Naranja.jpg");
insert into producto values(null,"Papa","Es cafe",10,5,100,"img/Papa.jpg");
insert into producto values(null,"Zanahoria","Es naranja",10,5,100,"img/Zanahoria.jpg");

insert into producto values(null,"Tomate","Es rojo",10,5,100,"img/tomate.jpg");
insert into producto values(null,"papaya","Es cafe",10,5,100,"img/papaya.jpg");
