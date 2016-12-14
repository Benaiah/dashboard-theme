<?php
// Run this to create the templates. Currently it only supports one
// level of templates, so you can't use subfolders of ./templates

$pwd = dirname(__FILE__);

// Load Composer
require_once( $pwd . '/vendor/autoload.php');

// Load the template compiler
use LightnCandy\LightnCandy;

$templates_directory = $pwd . '/templates/';
$templates_output_directory = $pwd . '/templates_compiled/';

echo 'Reading templates from ' . $templates_directory . "\n";
echo 'Compiling templates to ' . $templates_output_directory . "\n";

// Ensure the compilation directory exists
if ( !is_dir($templates_output_directory) ) {
  mkdir($templates_output_directory);
}

function str_ends_with($str, $suffix) {
  $length = strlen($suffix);
  if ( $length === 0 ) { return true; }
  return ( substr($str, -$length) === $suffix );
}

function filter_filename ($filename) {
  return (
    ($filename !== "") &&
    ($filename !== ".") &&
    ($filename !== "..") &&
    str_ends_with($filename, ".hbs")
  );
}

$template_files = array();
if ( $handle = opendir($templates_directory) ) {
  while ( false !== ($entry = readdir($handle)) ) {
    if (filter_filename($entry)) {
      echo $entry . "\n";
      $template_files[] = $entry;
    }
  }
  closedir($handle);
} else {
  echo "Could not open templates directory.\n";
}

foreach ($template_files as $filename) {
  echo 'Compiling ' . $filename . "...\n";
  $full_path = $templates_directory . $filename;
  $template = file_get_contents( $full_path );
  $phpStr = LightnCandy::compile($template);

  $new_filename = preg_replace('/\.hbs$/', '.php', $filename);
  $destination = $templates_output_directory . $new_filename;

  file_put_contents($destination, "<?php " . $phpStr . " ?>" );
}

?>

