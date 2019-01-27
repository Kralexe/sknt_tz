<?php
$string = file_get_contents("http://sknt.ru/job/frontend/data.json");
$json_a = json_decode($string, true);

echo "<head>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

<style>
* {
  box-sizing: border-box;
}

body {
   background-color:hsl(0, 0%, 85%);
}

:focus {
  outline:none;
}

/* Arrow */
i {
  border: solid green;
  border-width: 0 10px 10px 0;
  display: inline-block;
  padding: 3px;
  margin-right:10px;
}

/* Here we're making it to point in left direction */
.left {
  transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
}

/* This I took from your webpage */
.tarif_one_n_box {
  text-decoration:none;
  color:#222;
  display:block

}
</style>
</head>
<body>
";

echo "<a href='sknt.php'><i class='left'></i></a>
<h1 style='display:inline-block;'>Тариф ".$json_a["tarifs"][$_SERVER['QUERY_STRING']]["title"]."</h1>
<hr>";

for ($i=0; $i<count($json_a['tarifs'][$_SERVER['QUERY_STRING']]['tarifs']) ; $i++) {
echo "<div style='font-size:20px; background-color:white; margin:10px 0 10px 0;'>
<a class='tarif_one_n_box' href='/sknt2.php?".$_SERVER['QUERY_STRING'].'^'.$i."'>
<div style='color:green'>".$json_a['tarifs'][$_SERVER['QUERY_STRING']]['tarifs'][$i][title]."</div>
<hr>
<div><b>".$json_a['tarifs'][$_SERVER['QUERY_STRING']]['tarifs'][$i]['price']/$json_a['tarifs'][$_SERVER['QUERY_STRING']]['tarifs'][$i]['pay_period']." &#8381;/мес</b></div>
<br>
<div>разовый платёж - ".$json_a["tarifs"][$_SERVER['QUERY_STRING']]['tarifs'][$i]['price']."</div>";
$discount = $json_a['tarifs'][$_SERVER['QUERY_STRING']]['tarifs'][0]['price']*$json_a['tarifs'][$_SERVER['QUERY_STRING']]['tarifs'][$i]['pay_period']-$json_a["tarifs"][$_SERVER['QUERY_STRING']]['tarifs'][$i]['price'];
if ($discount != 0) {echo "<div>скидка - ".$discount."</div>";}
echo "</a></div>";
}
echo "</body>";
?>
