<?php

# Create shortcode that displays the calendar
# [calendar]

function display_calendar() {
  if (isset($_GET['cm'])) {
    $month = $_GET['cm'];
  } else {
    $month = date('n');
  }

  $month_name = date("F", mktime(0, 0, 0, $month, 10));

  if (isset($_GET['cy'])) {
    $year = $_GET['cy'];
  } else {
    $year = date('Y');
  }

  if ($month == 12) {
    $next_month = 1;
    $next_year = $year + 1;
  } else {
    $next_month = $month + 1;
    $next_year = $year;
  }

  if ($month == 1) {
    $previous_month = 12;
    $previous_year = $year - 1;
  } else {
    $previous_month = $month - 1;
    $previous_year = $year;
  }

  if ($month == date('m') && $year == date('Y')) {
    $current_month = true;
  } else {
    $current_month = false;
  }

  $first_date_of_month = $year . $month . '01';

  $first_day_of_month = date('D', strtotime(date($year . $month . '01')));

  switch($first_day_of_month) {
    case "Sun": $blank = 6; break;
    case "Mon": $blank = 0; break;
    case "Tue": $blank = 1; break;
    case "Wed": $blank = 2; break;
    case "Thu": $blank = 3; break;
    case "Fri": $blank = 4; break;
    case "Sat": $blank = 5; break;
  }

  $html = '<div class="formation-event-calendar">'
  . '<div class="calendar-details">';

  if (!$current_month) {
    $html .= '<a href="?cm=' . sprintf("%02d", $previous_month) . '&cy=' . $previous_year . '"><</a>';
  }

  $html .= '<h2 class="month">' . $month_name . ' ' . $year . '</h2>'
  . '<a href="?cm=' . sprintf("%02d", $next_month) . '&cy=' . $next_year . '">></a>'
  . '</div>';

  $html .= '<section class="calendar">'
  . '<div class="day day-name">Monday</div>'
  . '<div class="day day-name">Tuesday</div>'
  . '<div class="day day-name">Wednesday</div>'
  . '<div class="day day-name">Thursday</div>'
  . '<div class="day day-name">Friday</div>'
  . '<div class="day day-name">Saturday</div>'
  . '<div class="day day-name">Sunday</div>';

  $days_in_month = days_in_month($month, $year);
  $last_date_of_month = $year . $month . $days_in_month;

  for ($i=0; $i < $blank; $i++) {
    $html .= '<div class="day blank"></div>';
  }

  $day_num = 0;

  $dates = array();

  $args = array(
  	'post_type' => 'formation-event',
  	'posts_per_page' => -1,
    'meta_key' => 'date',
    'order' => 'ASC',
    'orderby' => 'meta_value_num'
  );
  $the_query = new WP_Query( $args );
  if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
      if (strtotime(get_field('date')) >= strtotime($first_date_of_month) && strtotime(get_field('date')) <= strtotime($last_date_of_month)) {
        $date = new DateTime(get_field('date'));
        $dates[$date->format('j')] = array(
          'date' => $date->format('d/m/Y'),
          'start_time' => get_field('start_time'),
          'end_time' => get_field('end_time'),
          'location' => get_field('location'),
          'event_id' => get_the_ID()
        );
      }
    endwhile;
  endif;
  wp_reset_postdata();

  while ( $day_num < $days_in_month ) {
    $day_num++;
    if (isset($dates[$day_num])) {
      $html .= '<a href="' . get_the_permalink($dates[$day_num]['event_id']) . '" class="day course">' . get_the_title($dates[$day_num]['event_id']) . '<div class="date">' . $day_num . '</div></a>';
    } else {
      $html .= '<div class="day"><div class="date">' . $day_num . '</div></div>';
    }
  }

  $blanks_after = roundUpToAny($days_in_month + $blank, 7) - $days_in_month - $blank;
  for ($i=0; $i < $blanks_after; $i++) {
    $html .= '<div class="day blank"></div>';
  }

  $html .= '</section>'
  . '</div>';

  return $html;
}
add_shortcode('calendar', 'display_calendar');

?>
