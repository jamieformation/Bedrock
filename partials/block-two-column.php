<?php

$column_one = get_field('column_1');
$column_two = get_field('column_2');

?>

<div class="flexible-content-container">

  <div class="two-columns flexible-content">
    <div class="columns">
      <div class="column"><?= $column_one; ?></div>
      <div class="column"><?= $column_two; ?></div>
    </div>
  </div>

</div>
