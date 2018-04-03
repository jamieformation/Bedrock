<?php require_once($_SERVER['DOCUMENT_ROOT']."/bedrock/wp-load.php");

$element = get_field('form_element_name', 'formation-autocomplete');
$values = get_field('values', 'formation-autocomplete');
$text_colour = get_field('text_colour', 'formation-autocomplete');
$background_colour = get_field('background_colour', 'formation-autocomplete');

$data = array(
  'element'           => $element,
  'values'            => explode("\n", $values),
  'text_colour'       => $text_colour,
  'background_colour' => $background_colour
);

echo json_encode($data);

?>
