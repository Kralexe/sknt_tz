<?php
$string = file_get_contents("http://sknt.ru/job/frontend/data.json");
$json_a = json_decode($string, true);
$pieces = explode("^", $_SERVER['QUERY_STRING']);
$period = $json_a['tarifs'][$pieces[0]]['tarifs'][$pieces[1]]['pay_period'];
$oneTimePayment = $json_a["tarifs"][$pieces[0]]['tarifs'][$pieces[1]]['price'];

$mil = $json_a["tarifs"][$pieces[0]]['tarifs'][$pieces[1]][new_payday];
$seconds = $mil/1000+1800;

echo "<head>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color:hsl(0, 0%, 85%);
}

.button {
  position: relative;
  background-color: rgb(76,175,80);
  border: none;
  font-size: 28px;
  color: white;
  padding: 20px;
  width: 200px;
  text-align: center;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
}

.button:after {
  content: '';
  background: rgb(241,241,241) ;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}

:focus {
  outline:none;
}

button::-moz-focus-inner {
  border: 0;
}

/* Arrow */
i {
  border: solid green;
  border-width: 0 10px 10px 0;
  display: inline-block;
  padding: 3px;
  margin:0 10px 0 0;
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

echo "<a href='/sknt1.php?".$pieces[0]."'><i class='left'></i></a>
<h1 style='display:inline-block;'>Выбор тарифа</h1>
<hr>";

echo "<div style='font-size:20px; background-color:white;'>
<div style='color:green'>".$json_a['tarifs'][$pieces[0]]['tarifs'][$pieces[1]][title]."</div>
<hr>
<div>Период оплаты - ";
echo "$period";
switch ($period) {
    case 1:
        echo " месяц";
        break;
    case 3:
        echo " месяца";
        break;
    case 6:
	case 12:
        echo " месяцев";
        break;
}
echo "</div>
<div><b>".$json_a['tarifs'][$pieces[0]]['tarifs'][$pieces[1]]['price']/$json_a['tarifs'][$pieces[0]]['tarifs'][$pieces[1]]['pay_period']." &#8381;/мес</b></div>
<br>
<div>разовый платёж - ".$json_a["tarifs"][$pieces[0]]['tarifs'][$pieces[1]]['price']."</div>
<div>Со счета спишется - ".$oneTimePayment."</div>
<br>
<div style='color:grey';>вступит в силу - сегодня</div>
<div style='color:grey';>активно до - ".date("d.m.Y", $seconds)."</div>
<hr>
<button class='button'>Выбрать</button>
";
echo "</a></div>";
echo "</body>";
?>
