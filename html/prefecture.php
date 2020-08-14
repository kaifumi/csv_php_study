<?php
$PREFCTUR_FILEPATH = "../csv/prefecture_list.csv";

// csvファイルを読み込み

$prefecture_file = file_get_contents($PREFCTUR_FILEPATH);
$prefecture_lines = str_getcsv($prefecture_file, "\r\n");

// csvファイルを配列データに置き換える

foreach ($prefecture_lines as $line) {
    $prefecture_records[] = preg_split("/,/", $line);
}

// 地区ごとに振り分ける
function area_array($prefecture_records, $area_name) {
    foreach ($prefecture_records as $record) {
        if ($record[2] == $area_name) {
            $area[] = $record;
        }
    }
    return $area;
}

// 地区ごとに配列を用意

$areas = ['北海道・東北','関東', '北陸・甲信越', '東海', '近畿', '中国', '四国', '九州・沖縄'];
foreach($areas as $v) {
    $per_district_records[] = area_array($prefecture_records,$v);
}

?>
