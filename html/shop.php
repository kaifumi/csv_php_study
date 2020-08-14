<?php
$SHOP_FILEPATH = "../csv/shop_list.csv";

// csvファイルを読み込み

$shop_file = file_get_contents($SHOP_FILEPATH);
$shop_lines = str_getcsv($shop_file, "\r\n");

// csvファイルを配列データに置き換える

foreach ($shop_lines as $line) {
    $shop_records[] = preg_split("/,/", $line);
}

// 都道府県ごとに振り分ける
function area_array($prefecture_records, $area_name) {
    foreach ($prefecture_records as $record) {
        if ($record[2] == $area_name) {
            $area[] = $record;
        }
    }
    return $area;
}

// 店舗ごとに配列を用意

$area = ['北海道・東北','関東', '北陸・甲信越', '東海', '近畿', '中国', '四国', '九州・沖縄'];
foreach($area as $v) {
    $per_district_records[] = area_array($prefecture_records,$v);
}

?>
