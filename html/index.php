<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>php7.4-apache</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
$PREFCTUR_FILEPATH = "../csv/prefecture_list.csv";
$SHOP_FILEPATH = "../csv/shop_list.csv";

// csvファイルを読み込み

$prefecture_file = file_get_contents($PREFCTUR_FILEPATH);
$shop_file = file_get_contents($SHOP_FILEPATH);
$prefecture_lines = str_getcsv($prefecture_file, "\r\n");
$shop_lines = str_getcsv($shop_file, "\r\n");

// csvファイルを配列データに置き換える

foreach ($prefecture_lines as $line) {
    $prefecture_records[] = preg_split("/,/", $line);
}
foreach ($shop_lines as $line) {
    $shop_records[] = preg_split("/,/", $line);
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

$HOKAIDO_TOHOKU_records = area_array($prefecture_records, "北海道・東北");
$KANTO_records = area_array($prefecture_records, "関東");
$HOKURIKU_KOUSINETU_records = area_array($prefecture_records, "北陸・甲信越");
$TOKAI_records = area_array($prefecture_records, "東海");
$KINKI_records = area_array($prefecture_records, "近畿");
$CHUGOKU_records = area_array($prefecture_records, "中国");
$SHIKOKU_records = area_array($prefecture_records, "四国");
$KYUSYU_OKINAWA_records = area_array($prefecture_records, "九州・沖縄");


// 配列の中身を出力

foreach ($prefecture_records as $record) {
    echo $record[0] . "<br/>";
    echo $record[1] . "<br/>";
    echo $record[2] . "<br/>";
    echo "<br/>";
}

foreach ($shop_records as $record) {
    echo $record[1] . "<br/>";
    echo $record[2] . "<br/>";
    echo $record[3] . "<br/>";
    echo $record[4] . "<br/>";
    echo $record[5] . "<br/>";
    echo $record[6] . "<br/>";
    echo $record[7] . "<br/>";
    echo "<br/>";
}

?>
</body>
</html>