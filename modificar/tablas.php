<?php function tableProducts($productos){?>
<table class="table-shopping-cart">
    <tr class="table_head">
        <th class="column-1">Product</th>
        <th class="column-1">#</th>
        <th class="column-2">Nombre <i class="fas fa-phone-volume"></i></th>
        <th class="column-4">Precio</th>
        <th class="column-5">Categoria</th>
        <th class="column-1">Editar</th>
        <th class="column-1">Eliminar</th>
    </tr id="tablaProductos">
    <?php foreach ($productos as $producto):?>
    <tr>
        <td class="column-1">
        <div class="card">
            <img class="card-img-top" src="imagenes_a_subir/<?php echo $producto['imagen']?>" alt="Card image cap">
        </div>
        </td>
        <td class="column-1"><?php echo $producto['id']?></td>
        <td class="column-2"><?php echo $producto['Nombre']?></td>
        <td class="column-4">$ <?php echo $producto['precio']?> MXN</td>
        <td class="column-5"><?php echo $producto['idCategoria']?></td>
        <td class="column-1">   
            <form action="modificar.php" method="post">
                <input type="text" name="id" value= "<?php echo $producto['id']?>" hidden>
                <input type="text" name="Nombre" value= "<?php echo $producto['Nombre']?>" hidden>
                <input type="text" name="precio" value= "<?php echo $producto['precio']?>" hidden>
                <input type="text" name="idCategoria" value= "<?php echo $producto['idCategoria']?>" hidden>
                <input type="text" name="Descripcion" value= "<?php echo $producto['Descripcion']?>" hidden>
                <button type="submit"><i class="far fa-edit"></i></button>
            </form>
        </td>
        <td class="column-1"><a href="#"><i class="far fa-times-circle"></i></a></td>
    <tr>
    <?php endforeach;?>
</table>

<?php }?>