<?php
  $lipsum_p = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dignissim tortor in sapien fringilla, eu fermentum quam pretium. Nullam tortor ante, malesuada et dui ac, elementum ullamcorper quam. Phasellus consectetur lobortis molestie. Cras posuere faucibus maximus. Sed tristique quam consectetur, dapibus quam eu, mattis lorem. Nam id venenatis ex, et varius elit. Duis eu mi turpis.</p>';
?>

<h1>Heading 1</h1>
<p><strong>Lorem ipsum</strong> dolor sit amet, <a href="#">consectetur adipiscing elit</a>. <em>Vivamus gravida libero</em> eget turpis rutrum malesuada. Cras tincidunt odio ut massa condimentum, non tristique orci semper. Nam molestie dui at lorem finibus malesuada. Mauris sagittis dictum dui non sodales. Quisque eu orci tortor. Proin pretium nulla a nibh tincidunt egestas eu at metus. Donec dictum rhoncus felis et consectetur.</p>
<h2>Heading 2</h2>
<ul>
  <li>Donec suscipit tortor non quam euismod accumsan.</li>
  <li>Maecenas sagittis orci non lorem placerat, sit amet dignissim ligula rhoncus.</li>
  <li>Praesent vel elit ut nibh vehicula tristique.
    <ul>
      <li>Cras vitae nisl et nunc euismod vestibulum.</li>
      <li>Sed sagittis leo et tortor blandit porta.</li>
    </ul>
  </li>
  <li>Sed ut sapien sed dolor ultricies volutpat dictum ut nisl.</li>
  <li>Nullam sit amet orci quis turpis posuere pellentesque.</li>
</ul>
<h3>Heading 3</h3>
<ol>
  <li>Donec suscipit tortor non quam euismod accumsan.</li>
  <li>Maecenas sagittis orci non lorem placerat, sit amet dignissim ligula rhoncus.</li>
  <li>Praesent vel elit ut nibh vehicula tristique.
    <ul>
      <li>Cras vitae nisl et nunc euismod vestibulum.</li>
      <li>Sed sagittis leo et tortor blandit porta.</li>
    </ul>
  </li>
  <li>Sed ut sapien sed dolor ultricies volutpat dictum ut nisl.</li>
  <li>Nullam sit amet orci quis turpis posuere pellentesque.</li>
</ol>
<h2>Buttons</h2>
<button class="btn">Primary Button</button>
<button class="btn btn-alt">Alternative Button</button>
<button class="btn btn-clear">Clear Button</button>
<button class="btn btn-alt btn-clear">Alternative Clear Button</button>
<button class="btn btn-next">Next Button</button>
<button class="btn btn-next btn-alt">Alternative Next Button</button>
<button class="btn btn-prev">Previous Button</button>
<button class="btn btn-prev btn-alt">Alternative Previous Button</button>

<div class="flexible-content-container">
  <div class="one-column flexible-content">
    <h2 class="secondary-header">One Column</h2>
    <div class="columns">
      <div class="column">
        <?= $lipsum_p; ?>
        <?= $lipsum_p; ?>
      </div>
    </div>
  </div>
  <div class="two-columns flexible-content">
    <h2 class="secondary-header">Two Column</h2>
    <div class="columns">
      <div class="column"><?= $lipsum_p; ?></div>
      <div class="column"><?= $lipsum_p; ?></div>
    </div>
  </div>
  <div class="three-columns flexible-content">
    <h2 class="secondary-header">Three Column</h2>
    <div class="columns">
      <div class="column"><?= $lipsum_p; ?></div>
      <div class="column"><?= $lipsum_p; ?></div>
      <div class="column"><?= $lipsum_p; ?></div>
    </div>
  </div>
  <div class="full-width-image flexible-content">
    <img class="img-responsive" src="https://placeimg.com/1200/450/any">
  </div>
  <div class="two-images flexible-content">
    <div class="image">
      <img class="img-responsive" src="https://placeimg.com/600/400/nature">
    </div>
    <div class="image">
      <img class="img-responsive" src="https://placeimg.com/600/400/tech">
    </div>
  </div>
  <div class="three-images flexible-content">
    <div class="image">
      <img class="img-responsive" src="https://placeimg.com/400/260/animals">
    </div>
    <div class="image">
      <img class="img-responsive" src="https://placeimg.com/400/260/sepia">
    </div>
    <div class="image">
      <img class="img-responsive" src="https://placeimg.com/400/260/people">
    </div>
  </div>
  <div class="image-and-content flexible-content image-left">
    <div class="columns">
      <div class="column image"><img class="img-responsive" src="https://placeimg.com/600/400/tech"></div>
      <div class="column content">
        <h2>Image & Content</h2>
        <?= $lipsum_p; ?>
        <?= $lipsum_p; ?>
      </div>
    </div>
  </div>
  <div class="image-and-content flexible-content image-right">
    <div class="columns">
      <div class="column content">
        <h2>Content & Image</h2>
        <?= $lipsum_p; ?>
        <?= $lipsum_p; ?>
      </div>
      <div class="column image"><img class="img-responsive" src="https://placeimg.com/600/400/animals"></div>
    </div>
  </div>
  <div class="highlighted-section flexible-content">
    <h2 class="secondary-header">Highlighted Section</h2>
    <div class="content"><?= $lipsum_p; ?></div>
  </div>
  <div class="youtube-video flexible-content">
    <div class="wrapper">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/QH2-TGUlwu4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>
