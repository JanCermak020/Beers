<?php
$items = json_decode(file_get_contents("https://random-data-api.com/api/v2/beers?size=10"),true);
foreach($items as $item){
    $item["alcohol"]=str_replace("%","",$item["alcohol"]);
    $item["alcohol"]=floatval($item["alcohol"]);
    //var_dump($items[0]["alcohol"]);
}
for($i = 0; $i < sizeof($items) - 1; $i++) {
        for($j = 0; $j < sizeof($items) - $i - 1; $j++) {
            if($items[$j + 1]["alcohol"] < $items[$j]["alcohol"]) {
                $tmp = $items[$j + 1]["alcohol"];
                $items[$j + 1]["alcohol"] = $items[$j]["alcohol"];
                $items[$j]["alcohol"] = $tmp;

            }
        }
}
$html ='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>beer</title>
    <style>
        td{
            background-color: aqua;
        }
    </style>
</head>
<body>
    
</body>
</html>';
$html .= "<table><tr><td>jmeno<td><td>brand<td><td>alkohol %<td></tr>";

//var_dump($items[0]["alcohol"]);
foreach ($items as $item){
    $html .="<tr><td>$item[name]<td><td>$item[brand]<td><td>$item[alcohol]<td></tr>";
}
$html .="</table>";
echo $html;