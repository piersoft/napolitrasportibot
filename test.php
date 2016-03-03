<?php

//file di test
$lat=$_GET["lat"];
$lon=$_GET["lon"];
$r=$_GET["raggio"];
include("getting.php");

$text="s-sr607cdc2c-rivieradichiaia164";
$text1="r-s-151";
$data=new getdata();


$json_string = file_get_contents("https://transit.land/api/v1/onestop_id/".$text);
$parsed_json = json_decode($json_string);
$count = 0;
$countl = 0;
//  $r10=$r/10;
//    echo "Fermate più vicine rispetto a ".$lat."/".$lon." in raggio di ".$r." metri con relative linee urbane ed orari arrivi\n";
//    $count=1;
$IdFermata="";
//    echo $count;

  //var_dump($parsed_json->{'routes_serving_stop'});

//	for ($i=0;$i<$count;$i++){

foreach($parsed_json->{'routes_serving_stop'} as $data=>$csv1){
 $count = $count+1;
}
//  echo $count."</br>";


  for ($i=0;$i<$count;$i++){

$countl=0;

$json_string1 = file_get_contents("https://transit.land/api/v1/schedule_stop_pairs?destination_onestop_id=".$text);
$parsed_json1 = json_decode($json_string1);


//  $r10=$r/10;
//    echo "Fermate più vicine rispetto a ".$lat."/".$lon." in raggio di ".$r." metri con relative linee urbane ed orari arrivi\n";
//    $count=1;
//    echo $count;

//  var_dump($parsed_json->{'schedule_stop_pairs'});

//	for ($i=0;$i<$count;$i++){

foreach($parsed_json1->{'schedule_stop_pairs'} as $data12=>$csv11){
 $countl = $countl+1;
}

//echo $countl;

for ($l=0;$l<$countl;$l++)
  {


//    $temp_c1 .="\n";
  //    $temp_c1 .="Linea: ".$parsed_json->{'routes_serving_stop'}[$l]->{'route_name'};

  if ( ($parsed_json1->{'schedule_stop_pairs'}[$l]->{'route_onestop_id'}) == $parsed_json->{'routes_serving_stop'}[$i]->{'route_onestop_id'}){
      $temp_c1 .="Linea:".$parsed_json->{'routes_serving_stop'}[$i]->{'route_name'}." ";

      $temp_c1 .=$parsed_json1->{'schedule_stop_pairs'}[$l]->{'destination_arrival_time'};

      $temp_c1 .="</br>";
    //  $temp_c1 .=$parsed_json1->{'schedule_stop_pairs'}[$l]->{'route_onestop_id'};
    //  $temp_c1 .="</br>";
      }
/*
      echo $IdFermata;

      $json_string1 = file_get_contents("http://transit.land/api/v1/schedule_stop_pairs?route_onestop_id=".$text);
      $parsed_json1 = json_decode($json_string1);

      $countf = 0 ;
      foreach($parsed_json1->{'schedule_stop_pairs'} as $data11=>$csv11){
       $countf = $countf+1;
      }
    //  echo "lin". $countf;
      $h = "1";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
      $hm = $h * 60;
      $ms = $hm * 60;

      date_default_timezone_set('UTC');
      /*
      for ($f=0;$f<1000;$f++){
        if ( ($parsed_json1->{'schedule_stop_pairs'}->{'destination_onestop_id'}[$f]) == $text){
        $time =$parsed_json1->{'schedule_stop_pairs'}->{'origin_arrival_time'}[0]; //registro nel DB anche il tempo unix

        $temp_c1 .="\nLinea: ".$parsed_json->{'routes_serving_stop'}[$l]->{'route_name'}." arrivo: ".$time."";

        $temp_c1 .="\n___________\n";
        }

}
*/
}
}

echo $temp_c1;



?>
