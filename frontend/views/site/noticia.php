<?php
use kartik\alert\AlertBlock;
?>
<section class="col-md-9">
    <br><br><br><br>
    
    

    <h1>            <?=
                yii\helpers\ArrayHelper::getValue($noticia, function ($noticia, $defaultValue) {
                return $noticia[0]['titulo'];
            });
            ?>  </h1>


    
        <div class=" container-fluid" align="justify">
        <p style="text-align: justify">
            <?=
                yii\helpers\ArrayHelper::getValue($noticia, function ($noticia, $defaultValue) {
                return $noticia[0]['contenido'];
            });
            ?>           
        </p>

    </div>

    
</section>
