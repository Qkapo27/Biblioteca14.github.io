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
                </div>
            </div>';
?>