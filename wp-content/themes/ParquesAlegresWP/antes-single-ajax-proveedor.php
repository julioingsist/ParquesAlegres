<?php

    $post = get_post($_POST['id']);

?>

    <?php while (have_posts()) : the_post(); ?>

    <h3><?php the_title();?></h3>
    <p>Giro: Áreas Verdes</p>
    <p>Descripción: Fertilizante Orgánico (Humus de Lombriz)</p>
    <p>Correo: humiegrom@hotmail.com</p>
    <p>Celular: (667) 142 24 48 - ID: 72*149905*1</p>
    <p>Contacto: Ing. Alonso Javier Tiznado Antio</p>
    <p>El humus de lombriz rehabilita los suelos dañados y les aporta nuevamente nutrientes necesarios de manera natural.</p>
    <a href="#" class="link link--natural">ver más</a>

    <?php endwhile;?>

