<?php

// [btn link="https://formationmedia.co.uk/" text="My Button Text"]
function btn_func($atts) {
  $a = shortcode_atts(array(
    'link' => '#',
    'text' => 'Default Text',
  ), $atts);
  return '<a href="' . $a['link'] . '" class="btn">' . $a['text'] . '</a>';
}
add_shortcode('btn', 'btn_func');

// [elements]
function elements_func() {
  return get_template_part('partials/partial', 'elements');
}
add_shortcode('elements', 'elements_func');