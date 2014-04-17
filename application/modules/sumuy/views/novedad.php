<h1><?php echo lang('novedades_titulo');?></h1>
<div class="content">
  <div class="novedades_desarrollo">
    <h3><?php echo $novedad->getNombre();?></h3>
    <?php echo html_purify(html_entity_decode($novedad->getDescripcion())); ?>
    <a href="#" class="recomendar">recomendar</a>
  </div><!--NOVEDADES DESARROLLO-->
</div><!--CONTENT-->