<?php
include('../common.php');
try{
	$db=new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::ATTR_PERSISTENT=>PERSISTENT]);
}catch(PDOException $e){
	die('No Connection to MySQL database!');
}
header('Content-Type: text/html; charset=UTF-8');
session_start();
if(!empty($_SESSION['hosting_username'])){
	header('Location: home.php');
	exit;
}
$msg='';
$username='';
if($_SERVER['REQUEST_METHOD']==='POST'){
	$ok=true;
	if($error=check_captcha_error()){
		$msg.="<p style=\"color:red;\">$error</p>";
		$ok=false;
	}elseif(!isset($_POST['username']) || $_POST['username']===''){
		$msg.='<p style="color:red;">Error: username may not be empty.</p>';
		$ok=false;
	}else{
		$stmt=$db->prepare('SELECT username, password, id FROM users WHERE username=?;');
		$stmt->execute([$_POST['username']]);
		$tmp=[];
		if(($tmp=$stmt->fetch(PDO::FETCH_NUM))===false && preg_match('/^([2-7a-z]{16}).onion$/', $_POST['username'], $match)){
			$stmt=$db->prepare('SELECT users.username, users.password, users.id FROM users INNER JOIN onions ON (onions.user_id=users.id) WHERE onions.onion=?;');
			$stmt->execute([$match[1]]);
			$tmp=$stmt->fetch(PDO::FETCH_NUM);
		}
		if($tmp){
			$username=$tmp[0];
			$password=$tmp[1];
			$stmt=$db->prepare('SELECT new_account.approved FROM new_account INNER JOIN users ON (users.id=new_account.user_id) WHERE users.id=?;');
			$stmt->execute([$tmp[2]]);
			if($tmp=$stmt->fetch(PDO::FETCH_NUM)){
				if(REQUIRE_APPROVAL && !$tmp[0]){
					$msg.='<p style="color:red;">Error: Your account is pending admin approval. Please try again later.</p>';
				}else{
					$msg.='<p style="color:red;">Error: Your account is pending creation. Please try again in a minute.</p>';
				}
				$ok=false;
			}elseif(!isset($_POST['pass']) || !password_verify($_POST['pass'], $password)){
				$msg.='<p style="color:red;">Error: wrong password.</p>';
				$ok=false;
			}
		}else{
			$msg.='<p style="color:red;">Error: username was not found. If you forgot it, you can enter youraccount.onion instead.</p>';
			$ok=false;
		}
	}
	if($ok){
		$_SESSION['hosting_username']=$username;
		session_write_close();
		header('Location: home.php');
		exit;
	}
}
//theme
echo '<!DOCTYPE html><html><head>';
echo '<title>CHANGE-THIS-TO-YOUR-OWN-NAME\'s Hosting - Login</title>';
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
echo "<a href=\"/login.php\" class=\"w3-bar-item w3-gre w3-button\" title=\"Login\">Login</a>\n";
echo "<a href=\"/list.php\" class=\"w3-hide-small w3-bar-item w3-button\" title=\"List of hosted sites\">List</a>\n";
echo "<a class=\"w3-bar-item w3-hide-medium w3-hide-large w3-button\" href=\"/list/\" title=\"List of hosted sites\"><i class=\"fa fa-sticky-note\"></i></a>\n";
echo "<a href=\"/faq.php\" class=\"w3-hide-small w3-bar-item  w3-button\" title=\"FAQ\">FAQ</a>\n";
echo "<a class=\"w3-bar-item w3-hide-medium w3-hide-large w3-button w3-gre\" href=\"/faq\" title=\"FAQ\"><i class=\"fa fa-book\"></i></a>\n";
echo "<a href=\"/contact.php\" class=\"w3-bar-item w3-button w3-hide-small\" title=\"Contact me\">Contact</a>\n";
echo "<a class=\"w3-bar-item w3-button w3-hide-medium w3-hide-large\" href=\"/contact/\" title=\"Contact me\"><i class=\"fa fa-envelope\"></i></a>\n";
echo "</div>\n";
echo "<div class=\"w3-row-padding w3-padding-64\">\n";
echo "<div class=\"w3-container\">\n";
echo "<header class=\"w3-container w3-black\">\n";
echo "<h2 class=\"w3-center\">CHANGE-THIS-TO-YOUR-OWN-NAME Hosting</h2>\n";
echo "</header>\n";
echo "<div class=\"w3-container w3-grey\">\n";
echo "<p class=\"w3-left w3-tag w3-small\">All Systems Active..</p>\n";
echo "<div class=\"w3-display-container w3-container\">\n";

echo '</head><body>';
echo '<h1>Hosting - Login</h1>';
echo '<p><a href="index.php">Info</a> | <a href="register.php">Register</a> | Login | <a href="list.php">List of hosted sites</a> | <a href="faq.php">FAQ</a></p>';
echo $msg;
echo '<form method="POST" action="login.php"><table>';
echo '<tr><td>Username</td><td><input type="text" name="username" value="';
if(isset($_POST['username'])){
	echo htmlspecialchars($_POST['username']);
}
echo '" required autofocus></td></tr>';
echo '<tr><td>Password</td><td><input type="password" name="pass" required></td></tr>';
send_captcha();
echo '<tr><td colspan="2"><input type="submit" value="Login"></td></tr>';
echo '</table></form>';
echo '<p>If you disabled cookies, please re-enable them. You can\'t log in without!</p>';
echo '</body></html>';
//theme