<?php

$content = get_field('content');
$heading = get_field('heading');

if ($content) {

?>

<div class="flexible-content-container">

  <div class="highlighted-section flexible-content">
    <?php if ($heading) { ?>
      <h2><?= $heading; ?></h2>
    <?php } ?>
    <div class="content"><?= $content; ?></div>
  </div>

</div>

<?php }