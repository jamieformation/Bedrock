<?php

# Create shortcode that displays upcoming events
# [events show=3]

function upcoming_events($atts) {

  extract(shortcode_atts(array(
    'show' => -1,
   ), $atts));

  $html = '';
  $args = array(
  	'post_type' => 'formation-event',
  	'posts_per_page' => $show,
    'meta_key' => 'date',
    'order' => 'ASC',
    'orderby' => 'meta_value_num',
    'meta_query' => array(
      'key' => 'date',
      'value' => (date('Ymd')),
      'type' => 'DATE',
      'compare' => '>='
    )
  );
  $the_query = new WP_Query( $args );
  if ( $the_query->have_posts() ) :

    $html .= '<section class="formation-event-upcoming-events">';

    while ( $the_query->have_posts() ) : $the_query->the_post();

      $timestamp = strtotime(get_field('date'));
      $day = date('D', $timestamp);
      $month = date('j', $timestamp);
      $date_string = date('jS F', $timestamp);

      $html .= '<div class="formation-event">'
      . '<div class="formation-event-date">'
      .'<div class="formation-event-day">' . $day . '</div>'
      .'<div class="formation-event-month">' . $month . '</div>'
      .'</div>'
      .'<div class="formation-event-details">'
      .'<a href="' . get_the_permalink() . '" class="formation-event-name">' . get_the_title() . '</a>'
      .'<div class="formation-event-full-date">' . $date_string . ' @ ' . get_field('start_time') . ' - ' . get_field('end_time') . '</div>'
      .'</div>'
      .'</div>';

    endwhile;

    $html .= '</section>';

  endif;

  wp_reset_postdata();

  return $html;
}
add_shortcode('events', 'upcoming_events');

?>
