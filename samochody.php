<html lang="pl">
	<head>
		<meta charset="utf-8" />
		<title>Wynajmujemy samochody</title>
		<link rel="stylesheet" type="text/css" href="styl.css" />
		<?php
			mysql_connect("localhost", "root", "")
				or die("coś nie pykło");
			mysql_select_db("Wynajem")
				or die("nie wybrano bazy");
		?>
	</head>
	<body>
		<div class="container">
			<div class="baner"><h1>Wynajem samochodów</h1></div>
			<div class="left">
				<h2>DZIŚ POLECAMY TOYOTĘ ROCZNIK 2014</h2>
				<?php
					$zapytanie1 = mysql_query("SELECT id, model, kolor FROM samochody WHERE marka='toyota' and rocznik='2014'")
						or die("błąd zapytania1");
					if(mysql_num_rows($zapytanie1) > 0){
						while($r = mysql_fetch_assoc($zapytanie1)){
							echo $r['id'] . " Toyota " . $r['model'] . " Kolor " . $r['kolor'];
						}
					}
					?>
				<h2>WSZYSTKIE DOSTĘPNE SAMOCHODY</h2>
				<?php
					$zapytanie2 = mysql_query("SELECT `id`, `marka`, `model`, `rocznik` FROM `samochody`")
						or die("błąd zapytania2");
					if(mysql_num_rows($zapytanie2) > 0){
						while($r = mysql_fetch_assoc($zapytanie2)){
							echo $r['id'] . " " . $r['marka'] . " " . $r['model'] . " " . $r['rocznik'] . "<br />";
						}
					}
				?>
				</div>
			<div class="middle">
				<h2>ZAMÓWIONE AUTA Z NUMERAMI TELEFONÓW KLIENTÓW</h2>
				<?php
					$zapytanie3 = mysql_query("SELECT `samochody`.`id`, `samochody`.`model`, `zamowienia`.`telefon` FROM `samochody` inner join `zamowienia` on `samochody`.`id`=`zamowienia`.`Samochody_id`")
						or die("błąd zapytania3");
					if(mysql_num_rows($zapytanie3) > 0){
						while($r = mysql_fetch_assoc($zapytanie3)){
							echo $r['id'] . " " . $r['model'] . " " . $r['telefon'] . "<br />";
						}
					}
					mysql_close();
				?>
			</div>
			<div class="right">
				<h2>NASZA OFERTA</h2>
				<ul>
					<li>Fiat</li>
					<li>Toyota</li>
					<li>Opel</li>
					<li>Mercedes</li>
				</ul>
				<p>Tu pobierzesz naszą<a href="komis.sql"> baze danych</a></p>
				<p>autor strony 0000000000000</p>
			</div>
		</div>
	</body>
</html>