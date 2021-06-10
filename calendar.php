<?php


function display_event(array  $event)
{

    $date = $event["date"];
    $annee = substr($date, 0, -4);
    $mois = substr($date, -4, -2);
    $jour = substr($date, -2);
    $date = "$jour-$mois-$annee";


    echo 'The '."“".$event["name"]."” event will take place on ".$date." in ".$event["location"].PHP_EOL;
    
}


function  display_events_by_month(array  $events)
{
    $nbr_total =  count($events);
   

 $tableau_final = [];
for ($i=0; $i < $nbr_total; $i++) { 
    
    $date = $events[$i]["date"];
    $annee = substr($date, 0, -4);
    $mois = substr($date, -4, -2);
    $jour = substr($date, -2);
    $date = "$jour-$mois-$annee";
    $date_mois = "$annee-$mois";

    $tableau_final[$date_mois]= 'The '."“".$events[$i]["name"]."” event will take place on ".$date." in ".$events[$i]["location"];

}
ksort($tableau_final,SORT_STRING);

foreach ($tableau_final as $key => $value) {
      echo $key.PHP_EOL;
      echo "  ".$value.PHP_EOL;
}
    
}


function  display_events_between_months(array  $events , string  $dateBegin , string $dateEnd){




    $nbr_total =  count($events);
   

 $tableau_final = [];
for ($i=0; $i < $nbr_total; $i++) { 
    
    $date = $events[$i]["date"];
    $annee = substr($date, 0, -4);
    $mois = substr($date, -4, -2);
    $jour = substr($date, -2);
    $date = "$jour-$mois-$annee";
    $date_mois = "$annee-$mois";

    $moisAnnee = (int)  "$annee$mois";

    if ($moisAnnee >= (int) $dateBegin && $moisAnnee <= (int) $dateEnd) : 
        if (array_key_exists($date_mois, $tableau_final)){
            $tableau_final[$date_mois] = $tableau_final[$date_mois].PHP_EOL.'  The '."“".$events[$i]["name"]."” event will take place on ".$date." in ".$events[$i]["location"];
        }
        else{
            $tableau_final[$date_mois]= 'The '."“".$events[$i]["name"]."” event will take place on ".$date." in ".$events[$i]["location"];
        }
        
    endif;
    

}
ksort($tableau_final,SORT_STRING);

foreach ($tableau_final as $key => $value) {
      echo $key.PHP_EOL;
      echo "  ".$value.PHP_EOL;
}


}


