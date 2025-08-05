<?php
function convert_to_clash($input)
{
    $ch = curl_init();
    $url = "https://pub-api-1.bianyuan.xyz/sub?target=clash&url=" . $input . "&insert=false";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3");
    $data = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
        return null;
    }
    
    curl_close($ch);

    $translations = array(
        '节点选择' => 'MANUAL',
        '自动选择' => 'AUTO SELECT',
        '全球直连' => 'DIRECT',
        'NETFLIX' => 'NETFLIX',
        '广告拦截' => 'AD BLOCK',
        '全球拦截' => 'GLOBAL BLOCK',
        '运营劫持' => 'OPERATION',
        '国外媒体' => 'FOREIGN MEDIA',
        '国内媒体' => 'DOMESTIC MEDIA',
        '微软服务' => 'MICROSOFT',
        '电报信息' => 'TELEGRAM',
        '苹果服务' => 'APPLE',
        '全球直连' => 'GLOBAL DIRECT',
        '漏网之鱼' => 'LEAK',
    );

    $config_en = str_replace(array_keys($translations), array_values($translations), $data);
    
    return $config_en;
}
?>
