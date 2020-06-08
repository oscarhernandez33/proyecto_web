USE Tienda;

SELECT d.id_deseados, p.id_producto, p.Nombre, p.Precio,  p.Descripcion, p.Imagen FROM Deseados d 
INNER JOIN Productos p ON d.id_producto = p.id_producto WHERE d.id_usuario = 5;

SELECT c.id_comentario, c.Contenido, c.Fecha, u.id_usuario, u.Nombre_Usuario FROM Comentarios c 
INNER JOIN Usuarios u ON c.id_usuario = u.id_usuario WHERE id_producto = 2;