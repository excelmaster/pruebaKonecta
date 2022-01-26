
-- Realizar una consulta que permita conocer cuál es el producto que más stock tiene
SELECT nombre, stock FROM productos ORDER BY stock DESC LIMIT 1;

-- Realizar una consulta que permita conocer cuál es el producto más vendido

SELECT p.nombre, v.id_producto, SUM(cantidad) 
FROM ventas v
JOIN productos p ON p.id=v.id_producto
GROUP BY id_producto 
ORDER BY SUM(cantidad) DESC LIMIT 1;