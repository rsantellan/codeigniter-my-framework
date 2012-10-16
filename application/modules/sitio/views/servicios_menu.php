<ul>
  <?php foreach($list as $servicio): ?>
  <li>
    <a href="javascript:void(0)">
      <?php echo ($servicio->name); ?>
    </a>
  </li>
  <?php endforeach; ?>
 </ul>