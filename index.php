<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Главная страница</title>
		<link rel="stylesheet" href="animation.css">
		<link rel="stylesheet" href="header.css">
		<link rel="stylesheet" href="footer.css">
		<!--<script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>-->
	</head>
	<body>
		<!--<script type="text/javascript">
			VK.init({apiId: 7529481, onlyWidgets: true});
		</script>-->
		<div id="header">
			<ul>
				<li>URL-Cool</li>
				<li><a href="/site/faq">FAQ</a></li>
			</ul>
		</div>
		<form action="site/error" method="post">
			<?php
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			 
				function generate_string($input, $strength = 16) {
					$input_length = strlen($input);
					$random_string = '';
					for($i = 0; $i < $strength; $i++) {
						$random_character = $input[mt_rand(0, $input_length - 1)];
						$random_string .= $random_character;
					}
							 
					return $random_string;
				}

				$open_key = generate_string($permitted_chars, 8);
				echo "<input name=\"open-key\" type=\"hidden\" value=\"".$open_key."\">";
				echo "<input name=\"hash\" type=\"hidden\" value=\"".sha1("r4Ep2YM6pW8f".$open_key.strval(floor(time()/1000)))."\">";
			?>
			<input name="ref" type="url" class="shadow-drop-2-center" autocomplete="off" placeholder="https://example.com">
			<input type="submit" value="Отправить">
		</form>
		<!--<div id="vk_comments"></div>
		<script type="text/javascript">
			VK.Widgets.Comments("vk_comments", {limit: 10, width: "600", attach: "*"});
		</script>-->
		<div id="footer">
			e-mail:oleg10047@gmail.com
		</div>
		<script>
			/*document.getElementsByTagName("form")[0].onsubmit = function() {
				let xhr = new XMLHttpRequest();
				xhr.open('GET', '/generate_hidden_inputs.php');
				xhr.send();
				xhr.onload = function() {
					if (xhr.status != 200) {
						alert(`Ошибка ${xhr.status}: ${xhr.statusText}`);
					} else {
						alert(xhr.response);
						var ref = document.getElementsByTagName("form")[0].children[0];
						document.getElementsByTagName("form")[0].insertBefore(xhr.response, ref);
					}
				}
			};*/
			/*alert(PerformanceNavigation.type);
			if(performance.navigation.type == 2){
			   	location.reload(true);
			}*/
			function getBrowser() {
				var a;
				if (navigator.userAgent.search(/Safari/) > 0) {a = 'Safari'};
				if (navigator.userAgent.search(/Firefox/) > 0) {a = 'MozillaFirefox'};
				if (navigator.userAgent.search(/MSIE/) > 0 || navigator.userAgent.search(/NET CLR /) > 0) {a = 'Internet Explorer'};
				if (navigator.userAgent.search(/Chrome/) > 0) {a = 'Google Chrome'};
				if (navigator.userAgent.search(/YaBrowser/) > 0) {a = 'Яндекс браузер'};
				if (navigator.userAgent.search(/OPR/) > 0) {a = 'Opera'};
				if (navigator.userAgent.search(/Konqueror/) > 0) {a = 'Konqueror'};
				if (navigator.userAgent.search(/Iceweasel/) > 0) {a = 'Debian Iceweasel'};
				if (navigator.userAgent.search(/SeaMonkey/) > 0) {a = 'SeaMonkey'};
				if (navigator.userAgent.search(/Edge/) > 0) {a = 'Microsoft Edge'};
				return a;
			}
			if (getBrowser() == 'Google Chrome' || getBrowser() == 'Microsoft Edge' || getBrowser() == 'Opera' || getBrowser() == 'Яндекс браузер') {
				if(performance.navigation.type == 2){
					//alert("hello");
				   	location.reload(true);
				}
			}
			window.onpageshow = function(event) {
				if (getBrowser() != 'Google Chrome' && getBrowser() != 'Microsoft Edge' && getBrowser() != 'Opera' && getBrowser() != 'Яндекс браузер') {
					if (event.persisted) {
						//alert("hello");
					    window.location.reload();
					}
				}
			};
			var startTime;
			function time(){
				return new Date().getTime();
			}
			function sayHi() {
				//alert(startTime + " " + Math.floor(time()/10000));
				if (Math.floor(time()/1000000) - startTime > 0) {
					//document.getElementsByTagName("body")[0].innerHTML = "Время сессии истекло. Пожалуйста, перезагрузите страницу";
					window.location.reload();
					clearInterval(interval);
				}
			}
			window.onload = function() {
				startTime = Math.floor(time()/1000000);
			}
			var interval = setInterval(sayHi, 1000);
		</script>
	</body>
</html>