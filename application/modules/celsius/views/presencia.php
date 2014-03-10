<img src="<?php echo base_url(); ?>assets/celsius/images/map_exterior.jpg" class="map_exterior"><div class="clear"></div>
<div class="content_site content_internas content_internas_top0">
  <h3><?php echo lang('presencia_titulo'); ?></h3>
  <?php echo lang('presencia_texto'); ?>
</div><!-- content -->
<?php foreach ($menuCategoryList as $categoria): 
  if(isset($tableData[$categoria->id])):
    $compuestosList = array();
?>
  
  <div class="tables_exterior">
    <table cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="3" class="td_border_none">
          <div class="td_especialidad"><?php echo $categoria->name; ?></div>
          <?php echo lang('presentacion_notas'); ?>
        </td>
        <?php foreach ($countries as $country): ?>
          <td class="td_paises">
              <img src="<?php echo base_url(); ?>assets/celsius/images/banderas/<?php echo $country->flag;?>.png">
          </td>
        <?php endforeach; ?>
      </tr>
      <tr>
        <td class="td_titulo td_color_claro"><?php echo lang('presencia_producto'); ?></td>
        <td class="td_titulo td_color_claro"><?php echo lang('presencia_nombre_generico'); ?></td>
        <td class="td_titulo td_color_claro"><?php echo lang('presencia_presentacion'); ?></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro"></td>
        <td class="td_notas td_color_claro td_border_none"></td>
      </tr>
      <?php foreach($tableData[$categoria->id] as $data): ?>
      <tr>
        <td class="td_color_oscuro"><?php echo $data->product;?></td>
        <td class="td_color_oscuro"><?php echo $data->genericname;?></td>
        <td class="td_color_oscuro"><?php echo $data->presentation;?></td>
        <?php 
        $indexCountry = 0;
        foreach($data->countries as $rep): 
          if(isset($rep['compuesto']))
          {
            $compuestosList[$rep['compuesto']] = $rep['compuesto'];
          }
        ?>
          <td class="td_notas td_color_oscuro <?php echo (count($data->countries) -1 == $indexCountry)? 'td_border_none' : ''?> <?php echo (isset($rep['compuesto']))? 'td_mark' : ''?>"><?php echo $rep['presencia'];?></td>
        <?php
        $indexCountry++;
        endforeach; ?>
<!--        <td class="td_notas td_color_oscuro td_border_none"></td>-->
      </tr>
      <?php endforeach; ?>
         
    </table>
    <?php
      if(count($compuestosList) > 0):
    ?>
      <div class="mark_guia">
      <?php foreach($compuestosList as $compuesto): ?>
        <div class="mark_color"></div><span><?php echo $compuesto;?></span>
      <?php endforeach; ?>
      </div>  
    <?php
      endif;
    ?>
  </div>
<?php 
  endif;
endforeach; ?>
    

