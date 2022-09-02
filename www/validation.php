<?php
	// включаем отображение всех ошибок, кроме E_NOTICE
    /*error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 1);
     
    // наш обработчик ошибок
    function myHandler($level, $message, $file, $line, $context) {
        // в зависимости от типа ошибки формируем заголовок сообщения
        switch ($level) {
            case E_ERROR:
                $type = 'Error';
                break;
            default;
                // это не E_WARNING и не E_NOTICE
                // значит мы прекращаем обработку ошибки
                // далее обработка ложится на сам PHP
                return false;
        }
        // выводим текст ошибки
        echo "<h2>$type: $message</h2>";
        echo "<p><strong>File</strong>: $file:$line</p>";
        echo "<p><strong>Context</strong>: $". join(', $', array_keys($context))."</p>";
        // сообщаем, что мы обработали ошибку, и дальнейшая обработка не требуется
        return true;
    }
     
    // регистрируем наш обработчик, он будет срабатывать на для всех типов ошибок
    set_error_handler('myHandler', E_ALL);*/

	/*$url = $_GET["url"];
	$domain = parse_url($url, PHP_URL_HOST);
	echo $domain;*/
	/*$matches = array();
	preg_match('/[^\\.]+\\.[^\\.]+$/', $domain, $matches);*/
	#print_r($matches);
	/*exec("whois "./*$matches[0]*//*$domain,$output,$return_var);
	$is_registered = false; 
	foreach ($output as $line){
	  	echo $line.'<br>';
		if (strpos($line, "REGISTERED, DELEGATED, VERIFIED")) {
			echo "domain is registered";
			$is_registered = true;
		}
	}
	if (!$is_registered) {
		echo "domain is not registered";
	}*/
	/*function getTitle($url) {
	    if(!$url) return ;
	    $title="";
	    @$page=file_get_contents($url); 
	    if ($page) {
	      if (preg_match("~<title>(.*?)</title>~iu", $page, $out)) {
	        $title = $out[1];   
	      }
	    }
	    return $title;
	}*/
	function isDomainAvailible($domain)
   	{
       //check, if a valid url is provided
       if(!filter_var($domain, FILTER_VALIDATE_URL))
       {
               return false;
       }

       //initialize curl
       $curlInit = curl_init($domain);
       curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
       curl_setopt($curlInit,CURLOPT_HEADER,true);
       curl_setopt($curlInit,CURLOPT_NOBODY,true);
       curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

       //get answer
       $response = curl_exec($curlInit);

       curl_close($curlInit);

       if ($response) return true;

       return false;
   	}
	error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
	$url = $_POST["ref"];
	$right_schema = false;
	$protocol = array();
	preg_match('/^http:\\/\\//', $url, $protocol);
	#print_r($protocol);
	if ($protocol) {
		$right_schema = true;
	}
	$protocol = array();
	preg_match('/^https:\\/\\//', $url, $protocol);
	#print_r($protocol);
	if ($protocol) {
		$right_schema = true;
	}
	if ($right_schema) {
		#echo "schema is right<br>";
		$domain = parse_url($url, PHP_URL_HOST);
		/*exec("nslookup -type=A ".$domain,$output,$return_var);
		#print_r($output);
		$is_registered = false;
		foreach ($output as $line){
			#echo $line."<br>";
			if (strstr($line, "Name:")) {
				#echo "domain is registered<br>";
				$is_registered = true;
			}
		}
		if (!$is_registered) {
			echo "domain is not registered<br>";
		}*/



		/*$is_registered = true;
		if (!dns_get_record($domain, DNS_A)) {
			$is_registered = false;
			echo "domain is not registered<br>";
		}*/



		/*$page_title = getTitle($url);
		if($page_title){ 
	    	echo "page works"; 
		} else {  
	    	echo "page doesnt work";
		}*/
		/*$file = file_get_contents($url);
		if ($file) {
			echo 'page responses<br>';
		}
		else {
			echo 'page doesnt response<br>';
		}*/
		/*exec("ping -n 1 ".$domain,$output_ping,$return_var_ping);
		print_r($output_ping);
		#print_r($output_ping);
		$is_responses = true;
		foreach ($output_ping as $line_ping) {
			#echo $line_ping."<br>";
			if (strstr($line_ping, "100% loss")) {
				echo "page doesnt response<br>";
				$is_responses = false;
			}
		}
		if ($is_responses) {
			#echo "page responses<br>";
		}*/



		/*$is_responses = true;
		$start = microtime(true);
		get_headers($url);
		$time = microtime(true) - $start;
		if ($time > 25 && $is_registered) {
			echo "page doesnt response<br>";
			$is_responses = false;
		}*/



		/*if (get_headers($url)) {
			#echo "page responses";
		}
		else {
			if ($is_registered) {
				echo "page doesnt response<br>";
			}
			$is_responses = false;
		}*/
		$is_registered = true;
		$is_responses = true;
		if (!isDomainAvailible($url)) {
			$is_registered = false;
			$is_responses = false;
			echo "url is not available";
		}
		$is_existing = false;
		if ($is_responses && $is_registered && $right_schema) {
			$err = get_headers($url, 1);
			#print_r($err);
			$num_of_package = 0;
			while ($err[$num_of_package + 1]) {
				$num_of_package++;
			}
			$matches = array();
			preg_match('/[0-9]{3}/', $err[$num_of_package], $matches);
			#print_r($matches);
			/*if ($matches[0] == '301' || $matches[0] == '302') {
				while ($err['Location']) {
					print_r($err);
					$err = get_headers($err['Location'], 1);
				}
				$matches = array();
				preg_match('/[0-9]{3}/', $err[0], $matches);
				#print_r($matches);
			}*/
			if ($matches[0] == '404') {
				echo 'error 404<br>';
			}
			else {
				#echo 'page exists<br>';
				$is_existing = true;
			}
		}
	}
	else {
		echo "schema is not right<br>";
	}
	
	if ($right_schema && $is_registered && $is_responses && $is_existing) {
		#header('Location: http://url.cool/create_new_ref.php?ref='.$url);
		header("Location: http://url.cool/create_new_ref.php", true, 307);
	}
?>