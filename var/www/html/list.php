<?php
header('Content-Type: text/html; charset=UTF-8');
include_once('../common.php');
try{
	$db=new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::ATTR_PERSISTENT=>PERSISTENT]);
}catch(PDOException $e){
	die('No Connection to MySQL database!');
}
//added theme
echo '<!DOCTYPE html><html><head>';
echo '<title>CHANGE-THIS-TO-YOUR-OWN-NAME\'s Hosting - List of hosted sites</title>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
echo '<meta name="author" content="CHANGE-THIS-TO-YOUR-OWN-NAME">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
echo "<!DOCTYPE html>\n";
echo "<html>\n";
echo "<title>CHANGE-THIS-TO-YOUR-OWN-NAME Web Hosting | http://CHANGE-THIS-TO-YOUR-OWN-ONION.onion/ CHANGE-THIS-TO-YOUR-OWN-NAME Hosting</title>\n";
echo "<meta charset=\"UTF-8\">\n";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
echo "<meta name=\"Keywords\" content=\"onion,HTML5,CSS,Web,Dark,Hosting,Deep,anonymity,bitcoin,donate,easy,domain,domin,host,freebie,design,photoshop,CHANGE-THIS-TO-YOUR-OWN-NAME Hosting.\">\n";
echo "<meta name=\"Description\" content=\"CHANGE-THIS-TO-YOUR-OWN-ONION.onion. Tor hosting onion\">\n";
echo "<link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">\n";
echo "<link rel=\"stylesheet\" href=\"/css/st.css\">\n";
echo "<link rel=\"stylesheet\" href=\"/css/tb.css\">\n";
echo "<link rel=\"stylesheet\" href=\"/css/font-awesome/css/font-awesome.min.css\">\n";
echo "\n";
echo "<body class=\"w3-theme-bd\">\n";
echo "<div class=\"w3-top w3-bar w3-teal\">\n";
echo "<a class=\"w3-hide-medium w3-hide-large w3-bar-item w3-button w3-theme-hm\" href=\"/\" title=\"CHANGE-THIS-TO-YOUR-OWN-NAME Hosting\"><i class=\"fa fa-home\"></i></a>\n";
echo "<a href=\"/\" class=\"w3-hide-small w3-bar-item w3-button w3-theme-hm\" title=\"CHANGE-THIS-TO-YOUR-OWN-NAME Hosting\"><i class=\"fa fa-home w3-margin-right\"></i>CHANGE-THIS-TO-YOUR-OWN-NAME Hosting</a>\n";
echo "<a href=\"/register.php\" class=\"w3-bar-item w3-button\" title=\"Register\">Register</a>\n";
echo "<a href=\"/login.php\" class=\"w3-bar-item w3-button\" title=\"Login\">Login</a>\n";
echo "<a href=\"/list.php\" class=\"w3-hide-small w3-bar-item w3-button\" title=\"List of hosted sites\">List</a>\n";
echo "<a class=\"w3-bar-item w3-hide-medium w3-hide-large w3-button\" href=\"/list/\" title=\"List of hosted sites\"><i class=\"fa fa-sticky-note\"></i></a>\n";
echo "<a href=\"/faq.php\" class=\"w3-hide-small w3-bar-item w3-button\" title=\"FAQ\">FAQ</a>\n";
echo "<a class=\"w3-bar-item w3-hide-medium w3-hide-large w3-button w3-green\" href=\"/faq\" title=\"FAQ\"><i class=\"fa fa-book\"></i></a>\n";
echo "<a href=\"/contact.php\" class=\"w3-bar-item w3-button w3-hide-small\" title=\"Contact me\">Contact</a>\n";
echo "<a class=\"w3-bar-item w3-button w3-hide-medium w3-hide-large\" href=\"/contact/\" title=\"Contact me\"><i class=\"fa fa-envelope\"></i></a>\n";
echo "</div>\n";
echo "<div class=\"w3-row-padding w3-padding-64\">\n";
echo "<div class=\"w3-container\">\n";
echo "<header class=\"w3-container w3-black\">\n";
echo "<h2 class=\"w3-center\">CHANGE-THIS-TO-YOUR-OWN-NAME Hosting</h2>\n";
echo "</header>\n";
echo "<div class=\"w3-container w3-light-grey\">\n";
echo "<p class=\"w3-left w3-tag w3-small\">All Systems Active..</p>\n";
echo "<div class=\"w3-display-container w3-container\">\n";
echo '</head><body>';
echo '<h1>Hosting - List of hosted sites</h1>';
echo '<p><a href="index.php">Info</a> | <a href="register.php">Register</a> | <a href="login.php">Login</a> | List of hosted sites | <a href="faq.php">FAQ</a></p>';
//added theme
$stmt=$db->query('SELECT COUNT(*) FROM users WHERE public=1;');
$count=$stmt->fetch(PDO::FETCH_NUM);
$stmt=$db->query('SELECT COUNT(*) FROM users WHERE public=0;');
$hidden=$stmt->fetch(PDO::FETCH_NUM);
echo "<p>Here a list of $count[0] public hosted sites ($hidden[0] sites hidden):</p>";
echo '<table border="1">';
echo '<tr><td>Onion link</td></tr>';
$stmt=$db->query('SELECT onions.onion FROM users INNER JOIN onions ON (onions.user_id=users.id) WHERE users.public=1 ORDER BY onions.onion;');
while($tmp=$stmt->fetch(PDO::FETCH_NUM)){
	echo "<tr><td><a href=\"http://$tmp[0].onion\" target=\"_blank\">$tmp[0].onion</a></td></tr>";
}
echo '</table>';
echo '</body></html>';
