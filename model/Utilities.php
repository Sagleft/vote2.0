<?php
	namespace FreelandVote;
	
	class Utilities {
		function filter($string, $useDB = false, $db = null) {
			$string = strip_tags($string);
			$string = stripslashes($string);
			$string = htmlspecialchars($string);
			$string = trim($string);
			if($useDB && $db != null) {
				if($db == null) {
					$string = mysql_real_escape_string($string);
				} else {
					$string = mysql_real_escape_string($string, $db);
				}
			} else {
				$string = mysql_escape_string($string);
			}
			return $string;
		}
	}
	