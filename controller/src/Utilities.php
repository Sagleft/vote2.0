<?php
	namespace Vote\Controller;
	
	class Utilities {
		function isJson($string): bool {
			return ((is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string))))) ? true : false;
		}
		
		function data_filter($string): string {
			$string = strip_tags($string);
			$string = stripslashes($string);
			$string = htmlspecialchars($string);
			$string = trim($string);
			$string = mysqli::real_escape_string($string);
			return $string;
		}
		
		function cURL(string $url, string $ref, string $header, string $cookie, $p = null): string {
			$curlDefault = true;
			//чтобы тестировать на сервере, на котором нет guzzle
			if($curlDefault) {
				$ch =  curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				if(isset($_SERVER['HTTP_USER_AGENT'])) {
					curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
				}
				if($ref != '') {
					curl_setopt($ch, CURLOPT_REFERER, $ref);
				}
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				if($cookie != '') {
					curl_setopt($ch, CURLOPT_COOKIE, $cookie);
				}
				if($p) {
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $p);
				}
				$result =  curl_exec($ch);
				curl_close($ch);
				if($result){
					return $result;
				} else {
					return '';
				}
			} else {
				try {
					$client = new \GuzzleHttp\Client();
					if($p != null) {
						parse_str($p, $params);
						$request = $client->post($url, [], [
							'body' => $params
						]);
					} else {
						$request = $client->get($url);
					}
					return $request->getbody();
				} catch(Exception $e) {
					//TODO: обработку ошибки
					//можно обернуть в json
					echo 'guzzle error: ' . $e->getMessage();
				}
			}
		}
		
		function curl_get($url): string {
			return \Vote\Utilities::cURL($url, '', '', '');
		}
	}
	