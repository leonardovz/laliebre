<?php function Targeta($nombre,$descripcion,$precio,$img,$categoria,$idcategoria){?>
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo str_replace(' ', '', $categoria);?>">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="<?php echo 'http://localhost/modularv2/imagenes_a_subir/'.$img;?>" alt="IMG-PRODUCT">

                <a href="product-detail.php?search=<? echo $idcategoria;?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                    Vista Previa
                </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        <?php echo $nombre;?>
                    </a>

                    <span class="stext-105 cl3">
                    $ <?php echo $precio;?> MXN
                    </span>
                </div>

                <div class="block2-txt-child2 flex-r p-t-3">
                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                        <img class="icon-heart1 dis-block trans-04" src="http://localhost/modularv2/images/icons/icon-heart-01.png" alt="ICON">
                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="http://localhost/modularv2/images/icons/icon-heart-02.png" alt="ICON">
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php function Targeta2($nombre,$descripcion,$precio,$img,$categoria,$idcategoria){
    $card = '
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$categoria.'">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="imagenes_a_subir/'.$img.'" alt="IMG-PRODUCT">

                <a href="product-detail.php?search='.$idcategoria.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                    Vista Previa
                </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        '. $nombre.'
                    </a>

                    <span class="stext-105 cl3">
                    $ '.$precio.' MXN
                    </span>
                </div>

                <div class="block2-txt-child2 flex-r p-t-3">
                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                        <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                    </a>
                </div>
            </div>
        </div>
    </div>
    ';
    return $card;
 } ?>