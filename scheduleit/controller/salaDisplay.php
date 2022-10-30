<?php
    function salaDisplay($idSala, $img, $nomeFantasia, $cidade, $estado, $classificacao) {
        return    "<div class='salaDisplay border rounded bg-white me-3 mb-3 p-0' onclick='redirectSala($idSala)'>
                        <div class='m-0 p-2 d-flex align-items-center gallery_product' onclick='redirectSala($idSala)'>
                            <div class='d-inline'>
                                <img class='rounded imgsala me-2' style='padding: 0!important; width: 7rem; height: 7rem;'  src='data:imgLogo/jpeg;base64,$img'>
                            </div>
                            <div class='d-inline lh-1'>
                                <p class='mb-1 fw-bold title-card'>$nomeFantasia</p>
                                <p class='m-0'><small>$cidade - $estado</small></p>
                                <p class='mt-3 stars'><i class='bi bi-star-fill'></i> $classificacao</p>
                            </div>
                        </div>
                    </div>";
    }
?>