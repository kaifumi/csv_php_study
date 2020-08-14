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
function shop_prefecture_array($shop_records, $district) {
    foreach ($shop_records as $record) {
        // echo $record[0] . "<br/>";
        // echo $record[1] . "<br/>";
        if (array_search($record[1], $district)) {
            $area[] = $record;
        }
    }
    return $area;
}

// 地区ごとの店舗配列を用意

$area = [range(0, 7), range(8, 14), range(15, 20), range(21, 23), range(24, 30), range(31, 35), range(36, 39), range(40, 47)];
foreach($area as $v) {
    $per_district_shops[] = shop_prefecture_array($shop_records,$v);
}



?>
