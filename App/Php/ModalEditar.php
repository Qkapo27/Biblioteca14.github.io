<form action="../../App/Php/actualizar.php" method="POST" enctype="multipart/form-data">
    <table class = "table table-bordered">
        <input type="hidden" name="Id" value="<?= $dato['Id']?>">
        <tr>
            <td><label>Materia</label></td>
            <td>
            <select id="Materia" name="Materia">
                <option value="Literatura">Literatura</option>
                <option value="Matematica">Matematica</option>
                <option value="Sociales">Sociales</option>
                <option value="Naturales">Naturales</option>
                <option value="Fisica">Fisica</option>
                <option value="Ingles">Ingles</option>
                <option value="F.Etica">Formacion Etica</option>
                <option value="Historia">Historia</option>
                <option value="Biologia">Biologia</option>
            </select>
            </td>
        </tr>
        <tr>
            <td><label>Libro</label></td>
            <td><input type="text" name="Libro" id="" required placeholder="<?= $dato['Libro']?>"></td>
        </tr>
        <tr>
            <td><label>Portada</label></td>
            <td>
                <input type="file" name="Portada" accept="application/pdf" >
                <div class="text-center">
                    <?php
                            echo '<iframe src="'.$URL.'/Public/File/Fisico/'.$dato["Portada"].'" &embedded=true></iframe>';                        
                    ?>
                </div>
        </td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </td>
            <td>
                <input type="submit" value="Guardar" name="Guardar" class="btn btn-primary">
            </td>
        </tr>
    </table>                            
</form> 