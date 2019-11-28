<?php set_time_limit(0); ini_set('display_errors','Off'); echo '<script>history.back();</script>';

if(!extension_loaded('curl')) die('Error: CURL - not found, please, install!');
if(!extension_loaded('zip')) die('Error: ZIP - not found, please, install!');

$source_file = 'https://webflow-converter.ru/users/roman-ts-supercool-project.zip';
$output_file = basename($source_file);

curl_download($source_file.'?time='.time(), $output_file);

$zip = new ZipArchive;
$zip->open($output_file);
$zip->extractTo('./');
$zip->close();

function curl_download($url, $file)
{
    $dest_file = @fopen($file, "w");
    $resource = curl_init();
    curl_setopt($resource, CURLOPT_URL, $url);
    curl_setopt($resource, CURLOPT_FILE, $dest_file);
    curl_setopt($resource, CURLOPT_HEADER, 0);
    curl_exec($resource);
    curl_close($resource);
    fclose($dest_file);
}
