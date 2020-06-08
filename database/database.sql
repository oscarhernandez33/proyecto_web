/* Creando la base de datos */
CREATE DATABASE IF NOT EXISTS Tienda;
USE Tienda;

/* Eliminando tablas */
DROP TABLE Productos;
DROP TABLE Categoria;
DROP TABLE Usuarios;
DROP TABLE Deseados;
DROP TABLE Comentarios;
DROP TABLE Pedidos;
DROP TABle Detalle_Pedido;

/* Creando las tablas */
create table if not exists Productos(
	id_producto int primary key auto_increment not null,
    Nombre varchar(25) not null,
    Precio decimal not null,
    Descripcion varchar(100) not null,
    Categoria varchar(20) not null,
    Cantidad int not null,
    Imagen LONGBLOB
);

CREATE TABLE IF NOT EXISTS Categoria(
	id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(30) NOT NULL
); 

CREATE TABLE IF NOT EXISTS Usuarios(
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_Usuario VARCHAR(30) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Pass VARCHAR(255) NOT NULL,
	Rol VARCHAR(25) NOT NULL
);

CREATE TABLE IF NOT EXISTS Deseados(
	id_deseados INT PRIMARY KEY AUTO_INCREMENT,
    id_producto INT NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY(id_usuario) REFERENCES Usuarios(id_usuario),
    FOREIGN KEY(id_producto) REFERENCES Productos(id_producto)
);

CREATE TABLE IF NOT EXISTS Comentarios(
	id_comentario INT PRIMARY KEY AUTO_INCREMENT,
    Contenido VARCHAR(250) NOT NULL,
    Fecha VARCHAR(15) NOT NULL,
	id_producto INT NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY(id_usuario) REFERENCES Usuarios(id_usuario),
    FOREIGN KEY(id_producto) REFERENCES Productos(id_producto)
);

CREATE TABLE IF NOT EXISTS Pedidos(
	id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    Clave VARCHAR(50) NOT NULL,
    Nombre_Usuario VARCHAR(100) NOT NULL,
    Email VARCHAR(60) NOT NULL,
    Telefono VARCHAR(20) NOT NULL,
    Fecha VARCHAR(20) NOT NULL,
    Cantidad_Productos INT NOT NULL,
    Total DECIMAL NOT NULL
); 

CREATE TABLE IF NOT EXISTS Detalle_Pedido(
	id_detalle INT PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    Precio DECIMAL NOT NULL,
    Cantidad INT NOT NUll,
    Imagen LONGBLOB,
    FOREIGN KEY(id_pedido) REFERENCES Pedidos(id_pedido)
);

/* Agregar elementos a las tablas */
ALTER TABLE Usuarios 
ADD Rol VARCHAR(25) AFTER Pass;

/* Insertar datos en la tabla productos */
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen) 
Values("Oso de peluche",50,"Oso de peluche cafe","Peluches",5,"assets/img/Imagenes_prueba/1.jpg");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen) 
Values("Mapache de peluche",150,"Mapache de peluche","Peluches",3,"assets/img/Imagenes_prueba/2.jpg");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen)  
Values("Taza negra",35,"Taza mediana negra","Tazas",2,"assets/img/Imagenes_prueba/3.jpg");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen) 
Values("Bolso morado",180,"Bolso mediano","Bolsos",1,"assets/img/Imagenes_prueba/4.jpg");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen) 
Values("Taza blanca y roja",25,"Taza mediana blanca y roja","Tazas",2,"assets/img/Imagenes_prueba/5.jpg");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen)  
Values("Carro de juguete",70,"Carro de juguete azul","Juguetes",3,"assets/img/Imagenes_prueba/6.jpg");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen) 
Values("Panda de peluche",170,"Panda de peluche","Peluches",4,"assets/img/Imagenes_prueba/7.jpg");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen) 
Values("Bolso azul y blanco",150,"Bolso azul y blanco","Bolsos",5,"assets/img/Imagenes_prueba/8.jpg");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen)  
Values("Juguete extraño",120,"Juguete extraño que encontre","Juguetes",1,"assets/img/Imagenes_prueba/9.jpg");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen)  
Values("Taza azul",40,"Taza azul mediana","Tazas",2,"assets/img/Imagenes_prueba/10.png");
insert into Productos (Nombre, Precio, Descripcion, Categoria, Cantidad, Imagen)  
Values("Perro de peluche",230,"Perro de peluche cafe","Peluches",3,"assets/img/Imagenes_prueba/11.jpg");

INSERT INTO Categoria VALUES(NULL,"Peluches");

/* Selecciondando las tablas */
SELECT *FROM Productos;