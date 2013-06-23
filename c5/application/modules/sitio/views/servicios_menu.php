<ul>
  <?php foreach($list as $servicio): ?>
  <li>
    <?php 
      $url_help = $servicio->id."/".url_title($servicio->name, '-', TRUE);
    ?>
    <a class="<?php echo ($servicio_id == "servicios_".$servicio->id) ? "current" : "";?>" href="<?php echo site_url('servicios/'.$url_help); ?>">
      <?php echo ($servicio->name); ?>
    </a>
  </li>
  <?php endforeach; ?>
 </ul>