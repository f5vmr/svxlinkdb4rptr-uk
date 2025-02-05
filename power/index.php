<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Audio Peak Meter</title>
    <meta name="Author" content="Waldek SP2ONG" />
    <meta name="Description" content="Audio Test Peak Meter for SVXLink by SP2ONG 2022" />
    <meta name="KeyWords" content="SVXLink, SVXRelector,SP2ONG" />
    <link href="/css/css.php" type="text/css" rel="stylesheet" />
<style type="text/css">

body {
  background-color: #eee;
  font-size: 18px;
  font-family: Arial;
  font-weight: 300;
  margin: 2em auto;
  max-width: 40em;
  line-height: 1.5;
  color: #444;
  padding: 0 0.5em;
}
h1, h2, h3 {
  line-height: 1.2;
}
a {
  color: #607d8b;
}
.highlighter-rouge {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: .2em;
  font-size: .8em;
  overflow-x: auto;
  padding: .2em .4em;
}
pre {
  margin: 0;
  padding: .6em;
  overflow-x: auto;
}

#player {
    position:relative;
    width:205px;
    overflow: hidden;
    direction: ltl;
}

textarea {
    background-color: #111;
    border: 1px solid #000;
    color: #ffffff;
    padding: 1px;
    font-family: courier new;
    font-size:10px;
}




</style>
</head>
<body style="background-color: #e1e1e1;font: 11pt arial, sans-serif;">
<center>
<fieldset style="border:#3083b8 2px groove;box-shadow:0 0 10px #999; background-color:#f1f1f1; width:555px;margin-top:15px;margin-left:0px;margin-right:5px;font-size:13px;border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
<div style="padding:0px;width:550px;background-image: linear-gradient(to bottom, #e9e9e9 50%, #bcbaba 100%);border-radius: 10px;-moz-border-radius:10px;-webkit-border-radius:10px;border: 1px solid LightGrey;margin-left:0px; margin-right:0px;margin-top:4px;margin-bottom:0px;line-height:1.6;white-space:normal;">
<center>
<h1 id="web-audio-peak-meters" style="color:#00aee8;font: 18pt arial, sans-serif;font-weight:bold; text-shadow: 0.25px 0.25px gray;">System Options</h1>


<?php 

// load the connlist
$retval = null;

if ( file_exists(__DIR__.'/../include/config.inc.php') ) { include_once __DIR__.'/../include/config.inc.php'; } else { define("SHUTDOWN", 0); }
if (defined('SHUTDOWN'))
   {
      if (SHUTDOWN)
         {
            if (isset($_POST['btnPower']) )
               {
                  $retval = null;
                  $screen = null;
                  $command = "sudo shutdown -h now 2>&1";
                  exec($command,$screen,$retval);
               }
         }
   }

if (isset($_POST['btnSvxlinkRE']))
    {

        $retval = null;
        $screen = null;
        $command = "sudo service svxlink restart 2>&1";
        exec($command,$screen,$retval);
}

if (isset($_POST['btnSvxlinkSTO']))
    {

        $retval = null;
        $screen = null;
        $command = "sudo service svxlink stop 2>&1";
        exec($command,$screen,$retval);
}

if (isset($_POST['btnSvxlinkSTA']))
    {

        $retval = null;
        $screen = null;
        $command = "sudo service svxlink start 2>&1";
        exec($command,$screen,$retval);
}

if (isset($_POST['btnRestart']))
    {

        $retval = null;
        $screen = null;
        $command = "sudo shutdown -r now 2>&1";
        exec($command,$screen,$retval);
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<button name="btnSvxlinkSTO" type="submit" class="red" style="height:40px; width:400px; font-size:12px;">Stop SVXlink Service</button>
	<BR><BR>
	<button name="btnSvxlinkSTA" type="submit" class="green" style="height:40px; width:400px; font-size:12px;">Start SVXlink Service</button>
	<BR><BR>
	<button name="btnSvxlinkRE" type="submit" class="orange" style="height:40px; width:400px; font-size:12px;">Restart SVXlink Service</button>
	<BR><BR>
	<button name="btnRestart" type="submit" class="orange" style="height:40px; width:400px; font-size:12px;">Restart/Reboot Device</button>
        <BR><BR>
<?php
if ( file_exists(__DIR__.'/../include/config.inc.php') ) { include_once __DIR__.'/../include/config.inc.php'; } else { define("SHUTDOWN", 0); }
        if (defined('SHUTDOWN'))
           {
              if (SHUTDOWN) 
                 {
                    echo "<button name=\"btnPower\" type=\"submit\" class=\"red\" style=\"height:40px; width:400px; font-size:12px;\">Power OFF / Shutdown</button>";
                 }
           }
?>

</form>

<p style="margin: 0 auto;"></p>
<p style="margin-bottom:-2px;"></p>

</body>
</html>
