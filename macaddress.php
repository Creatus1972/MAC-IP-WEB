<?php
    // MAC cím lekérdezése - 1
    $MAC = exec('getmac');
    $MAC = "Az Ön MAC címe: " . strtok($MAC, ' ');
    // Példa1: echo $MAC;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$MAC</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>AZ Ön MAC címe: $MAC</div>";
/*======================================================================================================*/
    // MAC cím lekérdezése - 2 
    $ip = substr(shell_exec ("ipconfig/all"),1821,18);
    $MACADDR = 'Az Ön MAC címe: ISMERETLEN<br><i style="font-size: 14px; color: #cc0033 !important;">(Előfordulhat, hogy a szolgáltatója biztonsági okokból nem engedélyezi a MAC cím megjelenítését!)</i>';
    foreach(explode("\n",str_replace(' ','',trim(`getmac`,"\n"))) as $i) {
        if(strpos($i,'Tcpip')>-1){
            $MACADDR = "Az Ön MAC címe: " . substr($i,0,17);
            break;
        }
    }
    // Példa1: echo $MACADDR;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$MACADDR</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>AZ Ön MAC címe: $MACADDR</div>";
/*======================================================================================================*/
    // MAC cím lekérdezése - 3
    ob_start();   
    system('ipconfig /all'); 
    $mycomsys = ob_get_contents();
    ob_clean();  
    $find_mac = "Physical"; 
    $pmac = strpos($mycomsys, $find_mac); 
    $macaddress = "Az Ön MAC címe: " . substr($mycomsys,($pmac+36),17);  
    // Példa1: echo $MAC;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$MAC</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>AZ Ön MAC címe: $MAC</div>";  
/*======================================================================================================*/
    // MAC cím lekérdezése - 4
    function GetMAC(){
        ob_start();
        system('getmac');
        $Content = ob_get_contents();
        ob_clean();
        return substr($Content, strpos($Content,'\\')-20, 17);
    }
    // Példa1: echo GetMAC();
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>".GetMAC()."</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>AZ Ön MAC címe: ".GetMAC()."</div>";
/*======================================================================================================*/
    // IP cím lekérdezése
    $ipServer = "Szerver IP cím: " . $_SERVER['SERVER_ADDR']; // Szerver (Domain szolgáltató) - Fix
    $ipPublic = "Publikus IP cím: " . $_SERVER['REMOTE_ADDR']; // Publikus (Internet szolgáltató által kiosztott) - Fix, Dinamikus
    // Példa1: echo $ipPublic;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$ipPublic</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>AZ Ön MAC címe: $ipPublic</div>";  
    // Megjegyzés: a Szerver IP címet nem ajánlott nyílvánosan megjeleníteni, biztonsági okokból! A publikus IP - t is csak fiók korlátozására ajánlott használni. 
    // Böngésző motor lekérdezése
    $web = "Böngésző motor: " . $_SERVER['HTTP_USER_AGENT'];
    // Példa1: echo $web;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$web</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>Böngésző motor: $MAC</div>";
/*======================================================================================================*/
?>

