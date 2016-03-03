<?php
//modulo delle KEYs per funzionamento dei bot (da non committare)

//Telegram
define('API','AIzaSyBDGLceJM4GbX64JHnQoxMw4w2Tsqef9H8');
define('TELEGRAM_BOT','125518218:AAE6Wdv-ZTRNdZXkdyrAGIaH-oHSL1KLbMw');
define('BOT_WEBHOOK', 'https://www.piersoft.it/baritrasportibot/start.php');
define('LOG_FILE', 'telegram.log');

// Your database
$db_path=dirname(__FILE__).'/./db.sqlite';
$csv_path=dirname(__FILE__).'/./map_data.csv';
define ('DB_NAME', "sqlite:". $db_path);
define('DB_TABLE',"user");
define('DB_TABLE_GEO',"segnalazioni");
define('DB_CONF', 0666);
define('DB_ERR', "errore database SQLITE");

// Your Openstreetmap Query settings
define('AROUND', 5000);						//Number of meters to calculate radius to search
define('MAX', 30);							//max number of points to search
//define('TAG','"amenity"="pharmacy"');

?>
