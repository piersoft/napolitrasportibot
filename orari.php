<?php

//file di test
$lat=$_GET["lat"];
$lon=$_GET["lon"];
$r=$_GET["raggio"];
$text=$_GET["id"];
$text1=$_GET["route"];
include("getting.php");

//$text="s-sr607cdc2c-rivieradichiaia164";
//$text1="r-s-151";
$data=new getdata();
date_default_timezone_set("Europe/Rome");
$ora=date("H:i:s", time());
$ora2=date("H:i:s", time()+60*60);

$json_string = file_get_contents("https://transit.land/api/v1/onestop_id/".$text);
$parsed_json = json_decode($json_string);
$count = 0;
$countl = 0;

$IdFermata="";

foreach($parsed_json->{'routes_serving_stop'} as $data=>$csv1){
 $count = $count+1;
}
//  echo $count."</br>";


  for ($i=0;$i<$count;$i++){

$countl=0;

$json_string1 = file_get_contents("https://transit.land/api/v1/schedule_stop_pairs?destination_onestop_id=".$text."&origin_departure_between=".$ora.",".$ora2);
$parsed_json1 = json_decode($json_string1);


foreach($parsed_json1->{'schedule_stop_pairs'} as $data12=>$csv11){
 $countl = $countl+1;
}
$start=0;
if ($countl == 0){
  echo "Non ci sono arrivi nella prossima ora";

}else{
    $start=1;
}
//echo $countl;
$distanza=[];
for ($l=0;$l<$countl;$l++)
  {
  //	if ( ($parsed_json1->{'schedule_stop_pairs'}[$l]->{'route_onestop_id'}) == $parsed_json->{'routes_serving_stop'}[$i]->{'route_onestop_id'})
  //	{
    $distanza[$l]['orari']=$parsed_json1->{'schedule_stop_pairs'}[$l]->{'destination_arrival_time'};
  //	}
  }
  sort($distanza);

for ($l=0;$l<$countl;$l++)
  {

  if ( ($parsed_json1->{'schedule_stop_pairs'}[$l]->{'route_onestop_id'}) == $parsed_json->{'routes_serving_stop'}[$i]->{'route_onestop_id'}){
      $temp_c1 .="Linea:".$parsed_json->{'routes_serving_stop'}[$i]->{'route_name'}." ";

    //  $temp_c1 .=$parsed_json1->{'schedule_stop_pairs'}[$l]->{'destination_arrival_time'};
$temp_c1 .=$distanza[$l]['orari'];
      $temp_c1 .="</br>";

      }

}
}
if ( $start==1){
echo "Linee in arrivo nella prossima ora:\n</br>";
}
echo $temp_c1;



?>
