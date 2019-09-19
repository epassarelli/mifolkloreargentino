<!-- start:section -->
<section class="canciones">
    
    <header>
        <h1>Letras de Canciones Folkloricas</h1>
        <span class="borderline"></span>
    </header>

<!-- Si existen Artistas -->

<!-- Cada 3 voy agregando una fila -->
    <?php if(isset($interpretes)): ?>
    <?php $i = 0; ?>
        <?php foreach($interpretes as $fila): ?>

        <?php if ($i % 3 == 0): ?>
        
            <?php if($i == 0): ?>
                <div class="row">
                <!-- start:row -->  
            <?php else: ?>
                </div>
                <!-- end:row -->

                <div class="row">
                <!-- start:row -->
            <?php endif; ?>    

        <?php endif; ?>

            <?php 
            $foto = base_url() . "assets/upload/interpretes/" . $fila->inte_foto;
            if (is_dir($foto)) 
                { $foto = base_url() . "assets/upload/sin_foto.jpg"; }
            ?>

        <div class="col-sm-4">
        <!-- start:article -->
            
            <article class="thumb thumb-lay-two cat-7" itemscope="" itemtype="http://schema.org/Article">
                <div class="thumb-wrap relative">
                    <a itemprop="url" href="<?php echo base_url()?>fotos-de-<?php echo $fila->inte_alias?>">
                    <img itemprop="image" src="<?php echo $foto?>" width="167" height="120" alt="<?php echo $fila->inte_nombre?>" class="img-responsive"></a>
                    <a href="<?php echo base_url()?>fotos/" class="theme">Fotos</a>
                </div>
                <span class="published" itemprop="dateCreated">Folkloricas</span>                    
                <h3 itemprop="name"><a itemprop="url" href="<?php echo base_url()?>fotos-de-<?php echo $fila->inte_alias?>"><?php echo $fila->inte_nombre?></a></h3>
            </article>

        <!-- end:article -->
        </div>

		<?php $i++; ?>
        
        <?php endforeach; ?>
        
        </div>

    <?php else: ?>
        <p>No tenemos la FOTO que esta buscando</p>
    <?php endif; ?> 

</section>
