select
    pedido.Codigo,
    cliente.Nombre as cliente,
    producto.nombre as producto,
    gama_producto.nombre as categoria
from
    cliente
    inner join pedido on cliente.codigo_cliente = pedido.codigo_cliente
    inner join detalle_pedido on pedido.codigo_pedido = detalle_pedido.codigo_pedido
    inner join producto on detalle_pedido.codigo_producto = producto.codigo_producto
    inner join gama_producto on producto.codigo_gama = gama_producto.codigo_gama