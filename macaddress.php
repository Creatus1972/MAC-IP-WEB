<?php
    // MAC cím lekérdezése - 1
    $MAC = exec('getmac');
    if (!empty($MAC)) {
        $MAC = "Az Ön MAC címe: " . strtok($MAC, ' ');
    } else {
        $MAC = 'Az Ön MAC címe: ISMERETLEN<br><i style="font-size: 14px; color: #cc0033 !important;">(Előfordulhat, hogy a tárhely-szolgáltatója biztonsági okokból nem engedélyezi a MAC cím megjelenítését!)</i>';
    }
    // Példa1: echo $MAC;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$MAC</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>AZ Ön MAC címe: $MAC</div>";
    // Csak LOCALHOST - on működik
/*======================================================================================================*/
    // MAC cím lekérdezése - 2 
    $ip = substr(shell_exec ("ipconfig/all"),1821,18);
    $MACADDR = 'Az Ön MAC címe: ISMERETLEN<br><i style="font-size: 14px; color: #cc0033 !important;">(Előfordulhat, hogy a tárhely-szolgáltatója biztonsági okokból nem engedélyezi a MAC cím megjelenítését!)</i>';
    foreach(explode("\n",str_replace(' ','',trim(`getmac`,"\n"))) as $i) {
        if(strpos($i,'Tcpip')>-1){
            $MACADDR = "Az Ön MAC címe: " . substr($i,0,17);
            break;
        }
    }
    // Példa1: echo $MACADDR;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$MACADDR</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>AZ Ön MAC címe: $MACADDR</div>";
    // Csak LOCALHOST - on működik.
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
    // Csak LOCALHOST - on működik.
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
    // Csak LOCALHOST - on működik.
/*======================================================================================================*/
    // IP cím lekérdezése
    $ipServer = "Szerver IP cím: " . $_SERVER['SERVER_ADDR']; // Szerver (Domain szolgáltató) - Fix
    $ipPublic = "Publikus IP cím: " . $_SERVER['REMOTE_ADDR']; // Publikus (Internet szolgáltató által kiosztott) - Fix, Dinamikus
    // Példa1: echo $ipPublic;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$ipPublic</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>AZ Ön MAC címe: $ipPublic</div>";  
    // Megjegyzés: a Szerver IP címet nem ajánlott nyílvánosan megjeleníteni, biztonsági okokból! A publikus IP - t is csak fiók korlátozására ajánlott használni. 
/*======================================================================================================*/
    // Böngésző motor lekérdezése
    $web = "Böngésző motor: " . $_SERVER['HTTP_USER_AGENT'];
    // Példa1: echo $web;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$web</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>Böngésző motor: $MAC</div>";
/*======================================================================================================*/
    // Szervernév (Domain) lekérdezése
    $ServerName = "Szervernév: " . $_SERVER['SERVER_NAME'];
    // Példa1: echo $ServerName;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$ServerName</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>Böngésző motor: $ipServerName</div>";
/*======================================================================================================*/
    // Szerver-szoftver lekérdezése
    $ServerSoftware = "Szerver-szoftver: " . $_SERVER['SERVER_SOFTWARE'];
    // Példa1: echo $ipServerName;
    // Példa2: echo "<h6 style='width: 100%; text-align: center;'>$ServerSoftware</h6>";
    // Példa3: echo "<div style='width: 100%; text-align: center;'>Böngésző motor: $ServerSoftware</div>";
/*======================================================================================================*/
    
/* 
$_SERVER['SERVER_PROTOCOL']         Visszaadja az információs protokoll nevét és változatát (például HTTP/1.1)
$_SERVER['REQUEST_METHOD']          Az oldal eléréséhez használt kérési módot adja vissza (például POST)
$_SERVER['REQUEST_TIME']            A kérés kezdetének időbélyegét adja vissza (például 1377687496)
$_SERVER['QUERY_STRING']            A lekérdezési karakterláncot adja vissza, ha az oldal lekérdezési karakterláncon keresztül érhető el
$_SERVER['HTTP_ACCEPT']             Az aktuális kérés Elfogadás fejlécét adja vissza
$_SERVER['HTTP_ACCEPT_CHARSET']     Az aktuális kérés karakterkódolását fejlécét adja vissza (például utf-8, ISO-8859-1)
$_SERVER['HTTP_HOST']               Az aktuális kérés Host fejlécét adja vissza
$_SERVER['HTTP_REFERER']            Az aktuális oldal teljes URL-jét adja vissza (nem megbízható, mert nem minden user-agent támogatja)
$_SERVER['HTTPS']                   A szkript lekérdezése biztonságos HTTP protokollon keresztül történik
$_SERVER['REMOTE_ADDR']             Azt az IP-címet adja vissza, ahonnan a felhasználó az aktuális oldalt nézi
$_SERVER['REMOTE_HOST']             A gazdagép nevét adja vissza, ahonnan a felhasználó az aktuális oldalt nézi (például mcomp.hu)
$_SERVER['REMOTE_PORT']             A felhasználó gépén a webszerverrel való kommunikációhoz használt portot adja vissza
$_SERVER['SCRIPT_FILENAME']         Az aktuálisan futó szkript abszolút elérési útját adja vissza
$_SERVER['SERVER_ADMIN']            A webszerver konfigurációs fájljában a SERVER_ADMIN direktívának adott értéket adja vissza (ha a szkript egy virtuális gazdagépen fut, akkor ez az adott virtuális gazdagéphez meghatározott érték lesz) (például valaki@mcomp.hu)
$_SERVER['SERVER_PORT']             A webszerver által kommunikációhoz használt szervergép portját adja vissza (például 80)
$_SERVER['SERVER_SIGNATURE']        A kiszolgáló által generált oldalakhoz hozzáadott kiszolgáló verzióját és virtuális gazdagépnevét adja vissza
$_SERVER['PATH_TRANSLATED']         Visszaadja az aktuális szkript fájlrendszer alapú elérési útját
$_SERVER['SCRIPT_NAME']             Az aktuális szkript elérési útját adja vissza
$_SERVER['SCRIPT_URI']              Az aktuális oldal URI-jét adja vissza
*/
?>
