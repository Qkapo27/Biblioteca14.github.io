<?php
    echo '
            <div class="col-md-4 col-sm-11">
                <div class="card">
                    <h5 class="card-header">
                        <strong>'.$dato["Libro"].'</strong>
                    </h5>
                    <div class="card-body ratio ratio-16x9">
                        <iframe id="pdfViewer" src="'.$URL.'/Public/File/Fisico/'.$dato["Portada"].'"></iframe>
                        
                    </div>
                    <a href="'.$URL.'/Public/File/Fisico/'.$dato["Portada"].'" target="_blank" class="btn btn-outline-success col-12">Ver</a>
                    <div class="row">
                        <!-- Editar  -->
                            <div class="col-6">
                                <a class="EyE" data-bs-toggle="modal" data-bs-target="#Editar'.$dato["Id"].'">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Modal Editar  -->
                                                    <div class="modal fade" id="Editar'.$dato["Id"].'" tabindex="-1" aria-labelledby="ModalEditar" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="editar">Editar Libro</h1>
                                                                </div>
                                                                <div class="modal-body">'.
                                                                    include($URL.'App/Php/ModalEditar.php')
                                                                .'</div>                    
                                                            </div>
                                                        </div>
                                                    </div>
                            </div>
                        
                            <div class="col-6">
                            </div>
                    </div>
                </div>
            </div>';
?>