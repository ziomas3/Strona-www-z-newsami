<?php $create or die();

    $db->query("create table news
	(id integer primary key autoincrement,
	autor int,
	data date,
	aktualizacja date,
	kategoria char(30),
	tytul char(20),
	skrot text,
	tekst text,
	url text,
	pokaz bool,
	main bool
	)");

    $db->query("create table user
	(id integer primary key autoincrement,
	email char(100),
	imie char(20),
	nazwisko char(30),
	login char(20),
	haslo password,
	rola int,
	token char(65)
	)");

$kat=array('Smartfony','Smartwatche','Trackery_fitnesowe');

for($i=0;$i<3;$i++)
    $db->query("insert into news (autor,tytul,skrot,tekst,pokaz,main,kategoria,data,aktualizacja)
                          values($i+1,'tytul$i','skrot$i','tekst$i',1,$i=2,'$kat[$i]',datetime('now'),datetime('now'))");

for($i=0;$i<3;$i++)
    $db->query("insert into user(email,imie,nazwisko,login,haslo,rola)
              values ('email$i','imie$i','nazwisko$i','login$i','haslo$i','$i')");

