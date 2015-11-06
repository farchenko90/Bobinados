<?php

$url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
echo "<strong>$url_actual</strong>";

function obtenerURL() {
  $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
  $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/") . $s;
  $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
  return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
}
 
function strleft($s1, $s2) {
  return substr($s1, 0, strpos($s1, $s2));
}
$url = obtenerUrl();
$datos = parse_url($url);
 
foreach ($datos as $key=>$value) {
  echo "$key: $value <br  >";
}
 
$url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
echo "<b>$url_actual</b>";
?>