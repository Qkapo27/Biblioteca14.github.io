<form action="<?php echo $URL;?>/App/Php/insertar.php" method="post" enctype="multipart/form-data">
    <table class = "table table-bordered">
        <input type="hidden" name="Id" value="Id">
        <tr>
            <td><label>Materia</label></td>
            <td>
            <select id="Materia" name="Materia">
                <option value="Literatura">Literatura</option>
                <option value="Matematica">Matematica</option>
                <option value="F.Etica">Formacion Etica</option>
                <option value="Fisica">Fisica</option>
                <option value="Historia">Historia</option>
                <option value="Ingles">Ingles</option>
                <option value="Naturales">Naturales</option>
                <option value="Sociales">Sociales</option>
                <option value="Biologia">Biologia</option>
            </select>
            </td>
        </tr>
        <tr>
            <td><label>Libro</label></td>
            <td><input type="text" name="Libro" id="" required ></td>
        </tr>
        <tr>
            <td><label>Portada</label></td>
            <td><input type="file" name="Portada" accept="application/pdf"></td>
        </tr>
            <td>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </td>
            <td>
                <input type="submit" value="Guardar" name="Guardar" class="btn btn-primary">
            </td>
        </tr>
    </table>                            
</form> 