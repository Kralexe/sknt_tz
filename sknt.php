<?php

$string = file_get_contents("http://sknt.ru/job/frontend/data.json");
$json_a = json_decode($string, true);

echo "<head>
<style>
* {
  box-sizing: border-box;
}

body {
   background-color:hsl(0, 0%, 85%);
}

/* Arrow */
i {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
}

/* Here we're making it to point in right direction */
.right {
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

/* This I took from your webpage */
.tarif_one_n_box {
  text-decoration:none;
  color:#222;
  display:block
}

/* removes outline from some elems in firefox */
:focus {
  outline:none;
}

/* parent for divs*/
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 80px 0 0 0;
}

/* Create three equal columns that sit next to each other */
@media screen and (min-width: 1024px) {
.column {
  -ms-flex: 33%; /* IE10 */
  flex: 33%;
  max-width: 33%;
  background-color:white;
  border: 10px solid transparent;
border-color: hsl(0, 0%, 85%);
position: relative;
  min-height: 150px;

  }
}

/* Responsive layout - makes a two column-layout instead of three columns */
@media screen and (max-width: 1023px) {
  .column {
    -ms-flex: 50%;
    flex: 50%;
    max-width: 50%;
    background-color:white;
border: 10px solid transparent;
border-color: hsl(0, 0%, 85%);
    
position: relative;
  min-height: 150px;
  }
}

/* Responsive layout - makes columns stack on top of each other instead of next to each other */
@media screen and (max-width: 640px) {
  .column {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
    background-color:white;
    border: 10px solid transparent;
border-color: hsl(0, 0%, 85%);
position: relative;
  min-height: 150px;
  }
}
</style>
</head>
<body>
<div class='row'>
";

for ($i=0; $i<count($json_a["tarifs"]) ; $i++) {
echo "<div class='column' style='font-size:20px; width:100%'>
<a class='tarif_one_n_box' href='/sknt1.php?".$i."'>
<div style='color:green'>Тариф ".$json_a["tarifs"][$i]["title"]."</div>
<hr>
<div style='position: absolute; margin-right: -100px;color:white;background-color:";
if (strpos($json_a["tarifs"][$i]["title"], "Земля") !== FALSE) {echo "Dimgrey";}
elseif (strpos($json_a["tarifs"][$i]["title"], "Вода") !== FALSE) {echo "blue";}
elseif (strpos($json_a["tarifs"][$i]["title"], "Огонь") !== FALSE) {echo "Chocolate";}
echo "'>".$json_a["tarifs"][$i]["speed"]." Мбит/с</div>
<br>
<div><b>".$json_a["tarifs"][$i]["tarifs"][0]["price"]." - ".$json_a["tarifs"][$i]["tarifs"][3]["price"]." &#8381;/мес</b></div>
<br>";
for ($k=0; $k<3; $k++) {
if (isset($json_a["tarifs"][$i]["free_options"][$k])) {
echo $json_a["tarifs"][$i]["free_options"][$k]."<br>";
}
}
echo "<br><br>
<div style='color:blue;position: absolute; bottom: 0; left: 0;'>узнать подробнее на сайте www.sknt.ru<i class='right'></i></div>
</div></a>";

}
echo "</div></body>";
?>
