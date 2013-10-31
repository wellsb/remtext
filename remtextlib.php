<?php

class dbstuff {

	function dbconnect(){
            $conn = mysql_connect('localhost', 'remtextuser', 'somethingwacky');
            mysql_select_db("remtext",$conn);
	}

        function SetState($uid, $data, $coloin, $size, $debug) {
            $tstamp = time();
            mysql_query("INSERT INTO main (id,user,time,data,bgcolor,size,debug) VALUES ('NULL','$uid','$tstamp','$data','$coloin','$size','$debug')");
        }

        function UpdState($uid, $data, $coloin, $size, $debug) {
            $tstamp = time();
            mysql_query("UPDATE main SET time='$tstamp', data='$data', bgcolor='$coloin', size='$size', debug='$debug' WHERE user = '$uid'");
        }

        function CheckState($uid) {
            $result = mysql_query("SELECT * FROM main WHERE user = '$uid'") or die(mysql_error());
            if (mysql_fetch_array($result)) {
                return '1';
            } else {
                return '0';
            }
        }

        function GetState(){
            $result=mysql_query("SELECT id,user,time,data,bgcolor,size,debug FROM `main` ORDER BY time DESC LIMIT 1");
            $state = mysql_fetch_array($result);
            return $state;
        }
}

class Tools {
    function genrandom($length = 8){

	$ranfn = "";
	$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
	$maxlength = strlen($possible);

	if ($length > $maxlength) {
		$length = $maxlength;
	}

	$i = 0;
	while ($i < $length) {
            $char = substr($possible, mt_rand(0, $maxlength-1), 1);
            if (!strstr($ranfn, $char)) {
                $ranfn .= $char;
                $i++;
            }
	}
    return $ranfn;
    }
}
?>