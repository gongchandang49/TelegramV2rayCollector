<?php
header("Content-type: application/json;");

include "modules/clash.php";

$base_url = "https://raw.githubusercontent.com/gongchandang49/TelegramV2rayCollector/main/sub/";
$files = [
    "mix",
    "vmess",
    "trojan",
    "shadowsocks"
];

foreach ($files as $type) {
    $input_url = $base_url . $type . "_base64";
    $output_file = "clash/{$type}.yml";
    $converted = convert_to_clash($input_url);
    file_put_contents($output_file, $converted);
}
