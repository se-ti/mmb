<?php
// заглушка, чтобы работали включения functions.php
$MyPHPScript = "self";

include("functions.php");
include("settings.php");



?>﻿
<!-- saved from url=(0032)http://mmb.progressor.ru/vp.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="text/html;" charset="utf8">
<title>Впечатления участников ММБ</title>
<style type="TEXT/CSS">
TH {font-family: sans-serif; font-size:15px; background-color: #A0A0A0;}
TD {font-family: sans-serif; font-size:15px; background-color: #C0C0C0;}
</style>
</head>
<body>

<?php

               $sql = "select ul.userlink_id, ul.userlink_name, lt.linktype_name,
		               ul.userlink_url, r.raid_name, r.raid_id,
			       u.user_name,   a.team_name, a.team_num,
			       a.distance_name, a.distance_id
		        from  UserLinks ul
			      inner join LinkTypes lt  on ul.linktype_id = lt.linktype_id
			      inner join Raids r on ul.raid_id = r.raid_id 
			      inner join Users u on ul.user_id = u.user_id 
			      left outer join (select tu.user_id, d.raid_id, t.team_name, t.team_num,
			                              d.distance_name, d.distance_id
			                       from TeamUsers tu
			                            inner join Teams t on tu.team_id = t.team_id and t.team_hide = 0
			                            inner join Distances d on t.distance_id = d.distance_id and d.distance_hide = 0
					       where tu.teamuser_hide = 0	    
					      ) a
			       on ul.user_id = a.user_id and ul.raid_id = a.raid_id
			where ul.userlink_hide = 0 
			order by r.raid_id desc, userlink_id  asc"; 
              //  echo 'sql '.$sql;
		$Result = MySqlQuery($sql);

                $PredRaid = '';
		
		while ($Row = mysql_fetch_assoc($Result))
		{
                  // сменился ММБ
                  if ($PredRaid <> $Row['raid_name']) {
		  
			print('<div align = "left" style = "margin-left: 15px; margin-top: 25px;"><b>'.$Row['raid_name'].'</b></div>'."\r\n");
		        $PredRaid = $Row['raid_name'];
		  }

                  $Label =  (empty($Row['userlink_name'])) ?  $Row['userlink_url'] : $Row['userlink_name'];
		  print('<div align = "left" style = "margin-left: 35px;padding-top: 5px;">'.$Row['linktype_name'].' '.' <a href = "'.$Row['userlink_url'].'" 
		          title = "'.$Row['userlink_name'].'">'.$Label.'</a> '.$Row['user_name'].', 
			  '.(empty($Row['team_name']) ? '' : 'команда '.$Row['team_name'].', N '.$Row['team_num'].', дистанция '.$Row['distance_name'])."\r\n");
                  print('</div>'."\r\n");
			  
		}

                mysql_free_result($Result);


?>


<p><table width="100%" border="0" cellspacing="1" cellpadding="5">
<tbody><tr><th>
<font size="+2">Впечатления участников ММБ (ссылки)</font>
</th>
</tr><tr><td><a href="http://dw.school2.ru/mb/mbfilm">Марш-бросок. фильм</a> (2007-2009)</td></tr>

<tr><th><font size="+1"><a name="13v">ММБ13-Весна, Шемякино — Протвино, 17-19 мая 2013 года</a></font></th></tr>
<tr><td><ul>
<li>3 <a href="http://al-stal.livejournal.com/201681.html">Улисс</a></li>
<li>11 <a href="http://dw.school2.ru/mb/mmb2013">Ministry of silly walks</a></li>
<li>14 <a href="http://disailor.livejournal.com/91064.html">Star Trek</a></li>
<li>20 <a href="http://moiseeva-vup.livejournal.com/9827.html">Семь вёрст</a></li>
<li>85 <a href="http://otachkin.livejournal.com/3812.html">Горный чистота</a></li>
<li>95 <a href="http://mult-yaxa.livejournal.com/28841.html">Guarana-АК МАИ</a> (+<a href="http://mult-yaxa.livejournal.com/29029.html">о снаряге</a>)</li>
<li>118 <a href="http://via-tay.livejournal.com/18542.html">подснежники МЭИ</a></li>
<li>127 <a href="http://vk.com/sabirovgr?w=note325999_11933021">Жесткая примавера</a></li>
<li>140 <a href="http://youtu.be/yfCYDDIBInU">RTS</a> (видео)</li>
<li>146 <a href="http://widermove.blogspot.ru/2013/05/2013.html">Веселый ТУ</a></li>
<li>154 <a href="http://travelequip.blogspot.ru/2013/05/2013.html">Путник-сплав</a></li>
<li>195 <a href="http://voenny.livejournal.com/228167.html">Чёрное знамя</a></li>
<li>244 <a href="http://akbulyakov.livejournal.com/238891.html">Системный поход</a></li>
<li>280 Нездоровая тенденция <a href="http://leviathan-mai.livejournal.com/83815.html">часть 1</a>, <a href="http://leviathan-mai.livejournal.com/84656.html">часть 2</a>, <a href="http://leviathan-mai.livejournal.com/85048.html">часть 3</a>, <a href="http://leviathan-mai.livejournal.com/85459.html">итоги</a></li>
<li>392 <a href="http://vk.com/dvoynev?z=photo120765_303753532%2Falbum120765_00%2Frev">Тортил Тротилыч</a></li>
<li>419 <a href="http://rtkr.livejournal.com/746556.html">Тихоходка</a></li>
<li>445 <a href="http://oleg-volkov.livejournal.com/129160.html">Мокрый примус</a></li>
<li>485 <a href="http://dimi88.livejournal.com/7539.html">Лазерные пудели</a></li>
<li>608 <a href="http://natureschool.livejournal.com/304776.html">Автостопом до Вудстока</a></li>
<li>723 www.rogainer.ru <a href="http://vonok.livejournal.com/132227.html">часть 1</a>, <a href="http://vonok.livejournal.com/132361.html">часть 2</a></li>
<li>753 <a href="http://toshische.livejournal.com/321670.html">foa</a></li>
<li>809 <a href="http://blog.grampack.ru/2013/05/mmb-snaryaga.html">я не потеряюсь</a> (+<a href="http://blog.grampack.ru/2013/05/mmb-snaryaga.html">о снаряге и питании</a>)</li>
<li>981 <a href="http://www.youtube.com/watch?v=Xmw0NEBf16M">Стикс-taganok</a> (видео)</li><li>983 <a href="https://docs.google.com/document/d/1TcmE4ShYjqp2Mu2RjjDeg7Y8EYVEjpxkZGnNyrruoas/edit?usp=sharing">Алиоп-Хеликоптер нихт</a></li>
<li>984 <a href="http://x-race.info/news/12101/">Дети болот-1</a></li>
<li>986 <a href="http://saashaamaar.livejournal.com/1878.html">Аура приключений</a></li>
<li>??? (wildflower81) <a href="http://wildflower81.diary.ru/p188273939.htm">часть 1</a>, <a href="http://wildflower81.diary.ru/p188396164.htm">часть 2</a></li>
<li>??? <a href="http://sstoryteller.wordpress.com/2013/05/21/mmb_spr_2013/">(sstoryteller)</a> (фото)</li>
<li>??? <a href="http://asandj.livejournal.com/56742.html">(asandj)</a></li>
<li>??? <a href="http://v-for-valerie.livejournal.com/226734.html">(Валерия Важнова)</a></li>
<li> <a href="http://kroko-dil.livejournal.com/918.html">Дильдин Николай (волонтёр)</a></li>
</ul></td></tr>

<tr><th><font size="+1"><a name="12o">ММБ12-Осень, Фроловское — Чисмена, 26-28 октября 2012 года</a></font></th></tr>
<tr><td><ul>
<li>14 <a href="http://byap.livejournal.com/3068.html">Бяп</a></li>
<li>31 <a href="http://kedzo.livejournal.com/4766.html">Оранжевый хорёк</a></li>
<li>32 <a href="http://mult-yaxa.livejournal.com/21373.html">Guarana-АК МАИ</a></li>
<li>36 <a href="http://otachkin.livejournal.com/2922.html">Горный чистота</a></li>
<li>38 <a href="https://docs.google.com/document/d/1YiMp_prTALHn_qUqLX47JSbAGrjf-XzqIp1wzkxzVdU">Хеликоптер нихт</a></li>
<li>71 <a href="http://tufoed.livejournal.com/81051.html">Крокодил Гена</a></li>
<li>77 <a href="http://yudaev.livejournal.com/159682.html">Люля-кебаб</a></li>
<li>125 <a href="http://mmb.progressor.ru/e-nik.livejournal.com/103049.html">Коварный поезд</a></li>
<li>144 <a href="http://mmb.progressor.ru/mongoose-85.livejournal.com/697.html">Мангуст</a></li>
<li>167 <a href="http://vonok.livejournal.com/108445.html">Юнитекс</a></li>
<li>171 <a href="http://al-stal.livejournal.com/198859.html">Улисс</a></li>
<li>203 <a href="http://www.roller.ru/newforum/viewtopic.php?t=46523&start=24">С песней по жизни</a></li>
<li>238 <a href="http://sagitt.org/index.php/blog/91-26-281012mmb">Жёсткая идея</a></li>
<li>260 <a href="http://tourclub.misis.ru/forum/7-1480-22700-16-1351514986">Формула болота</a></li>
<li>298 <a href="http://www.youtube.com/watch?v=GeVW3-8zBmQ">Пресса</a> (видеоролик)</li>
<li>408 <a href="http://shokker12.livejournal.com/21762.html">Таймаут</a></li>
<li>451 <a href="http://ira-koukou.livejournal.com/2676.html">Склад дохлых негров</a></li>
<li>458 <a href="http://voenny.livejournal.com/218373.html">Чёрное знамя</a></li>
<li>481 <a href="http://narayanan.livejournal.com/31693.html">Будь мужиком</a></li>
<li>534 <a href="http://bhbif555.livejournal.com/579.html">Шагаю</a></li>
<li>540 <a href="http://dmitry-boiko.livejournal.com/5500.html">ТруЪ ЁЖ</a></li>
<li>639 <a href="http://hippy-old.livejournal.com/112546.html">Тоторо</a></li>
<li>736 Коварные паразауролофы <a href="http://kroshka-lie.livejournal.com/173149.html">раз</a>, <a href="http://kroshka-lie.livejournal.com/173376.html">два</a>, <a href="http://kroshka-lie.livejournal.com/173777.html">три</a></li>
<li>797 <a href="http://tanyshkamorozova.blogspot.ru/2012/10/2012-2-111-7.html">GT/Буреломинг</a></li>
<li> <a href="http://gweiss.livejournal.com/15780.html">Юрий Вайс (организатор)</a></li>
<li> <a href="http://community.livejournal.com/_mmb_/235004.html">Александр Зотов (организатор), фото</a></li>
</ul></td></tr>

<tr><th><font size="+1"><a name="12v">ММБ12-Весна, Войново — Заполицы, 18-20 мая 2012 года</a></font></th></tr>
<tr><td><ul>
<li>1 <a href="http://rtkr.livejournal.com/684183.html">мать-ехидна</a></li>
<li>5 <a href="http://dabro.livejournal.com/79294.html">Восточно-европейская рванина</a></li>
<li>27 <a href="http://moiseeva-vup.livejournal.com/9517.html">Семь вёрст</a></li>
<li>89 <a href="http://prudlik.ru/%D0%BC%D0%BC%D0%B1-2012-%D0%B2%D0%B5%D1%81%D0%BD%D0%B0">Твердолик</a></li>
<li>114 <a href="http://al-stal.livejournal.com/195426.html">Улисс</a> (+<a href="http://al-stal.livejournal.com/195587.html">о снаряге и тактике</a>)</li>
<li>138 <a href="http://mmb.progressor.ru/otachkin.livejournal.com/524.html">Горный чистота</a></li>
<li>164 <a href="http://roller.ru/newforum/viewtopic.php?p=1050473#1050473">Run4Fun</a></li>
<li>254 <a href="http://ovcharova.livejournal.com/88892.html">МГУ / МГТУ - Приход-Камаз-Начало</a></li>
<li>292 <a href="http://vonok.livejournal.com/102132.html">Юнитекс</a></li>
<li>333 <a href="http://lleldorin.livejournal.com/36412.html">Green team</a></li>
<li>349 <a href="http://toshische.livejournal.com/307845.html">toshische</a></li>
<li>352 <a href="http://janelis.livejournal.com/229805.html">С поводырем</a></li>
<li>594 <a href="http://muravyed.livejournal.com/19736.html">just married</a></li>
<li>744 <a href="http://dronte-l.livejournal.com/87259.html">Через лес</a></li>
<li>764 <a href="http://ivan-tzarevich.livejournal.com/25043.html">Спутники Луны</a></li>
<li>807 <a href="http://tkmgtu.ru/index.php/19-articles/stories-skilled/1750-vpechatleniya-ot-vesennego-mmb-2012">Настоящий отдых</a></li>
<li>??? <a href="http://grotrek.livejournal.com/971.html">(grotrek)</a></li>
<li>??? <a href="http://sstoryteller.wordpress.com/2012/05/23/mmb/">(sstoryteller)</a></li>
</ul></td></tr>

<tr><th><font size="+1"><a name="11o">ММБ11-Осень, Чеховская — Тучково, 28-30 октября 2011 года</a></font></th>
</tr><tr><td>
<ul>
<li>Победитель - Зайцев Андрей <a href="http://tkmgtu.com/index.php/19-articles/eto-interesno/stories-skilled/1686-vpechatleniya-ot-osennego-mmb-2011">отчёт</a>, <a href="http://www.gpsies.com/map.do?fileId=zzgfkbgvbvfanuir">трек</a>
</li><li>2 <a href="http://alexsandir.livejournal.com/1328.html">Следы на потолке</a>
</li><li>5 <a href="http://yudaev.livejournal.com/146698.html">Люля-Кебаб</a>
</li><li>19 Нездоровая тенденция <a href="http://leviathan-mai.livejournal.com/47944.html">часть 1</a>, <a href="http://leviathan-mai.livejournal.com/47626.html">часть 2</a>, <a href="http://leviathan-mai.livejournal.com/47499.html">часть 3</a>
</li><li>25 Мама Таня, 47 ехидна и утконос, 72 cause finalis <a href="http://foto.mail.ru/mail/ia_aka/3910/">фото</a>
</li><li>28 <a href="https://picasaweb.google.com/106633654444195516331/2011?authuser=0&feat=directlink">Пикник на обочине</a> (фото)
</li><li>29 Guarana - АК МАИ <a href="http://mult-yaxa.livejournal.com/10111.html">отчёт</a>, <a href="http://www.gpsies.com/map.do?fileId=swvcwnapeqxrrqln">трек</a>
</li><li>30 <a href="http://www.diary.ru/~Kroko/p168705944.htm">Шалтай://Балтай.Фэйспалм.жпг</a>
</li><li>41 <a href="http://turclubplushiha.ru/forum/index.php?topic=1482.msg13468#msg13468">Бешеные Суслики</a>
</li><li>44 <a href="http://urfin-jusse.livejournal.com/6355.html">Куябрики</a> (фотоотчёт)
</li><li>52 <a href="http://loafery.livejournal.com/72333.html">Бакланы</a>
</li><li>61 <a href="http://skyserp.livejournal.com/67182.html">Дикий Бобер</a>
</li><li>80 <a href="http://bw-muscat.livejournal.com/72161.html">Платон и Клистроны</a>
</li><li>89 <a href="http://angry-mishka.livejournal.com/56661.html">Неплюшевый Мишка</a>
</li><li>94 <a href="http://dyachenko-mr.livejournal.com/865.html">МГУ - Адреналинщик</a>
</li><li>104 Swampers <a href="http://stas17.livejournal.com/11180.html">отчёт</a>, <a href="https://picasaweb.google.com/100430438291845554972/201103">фото</a>
</li><li>179 Пирожок <a href="http://aoaoling.livejournal.com/334420.html">отчёт</a>, <a href="http://aoaoling.livejournal.com/334921.html">фотоотчёт</a>
</li><li>197 <a href="http://disailor.livejournal.com/67303.html">Star Trek</a>
</li><li>232 <a href="https://www.youtube.com/watch?v=7aREsySAEdE">Самсон</a> (видео)
</li><li>260 Иван Царевич <a href="http://community.livejournal.com/_mmb_/211298.html">отчёт</a>, <a href="http://community.livejournal.com/_mmb_/210336.html">фото</a>
</li><li>314 <a href="http://weter-peremen.org/foto/users/mmb-osen-2011/">ВЕТЕР ПЕРЕМЕН</a>
</li><li>349 <a href="http://butchermoscow.livejournal.com/6222.html">Селёдки 20 тонн</a>
</li><li>392 В белых штанах <a href="http://na-vi-na.livejournal.com/92086.html">отчёт</a>, <a href="http://na-vi-na.livejournal.com/92366.html">фото</a>
</li><li>424 <a href="http://al-stal.livejournal.com/185785.html">Улисс</a>
</li><li>432 <a href="http://lleldorin.livejournal.com/34030.html">Green Team</a>
</li><li>435 <a href="http://users.livejournal.com/mirra__/22481.html">Ежики в тумане</a>
</li><li>474 <a href="http://hippy-old.livejournal.com/103163.html">Дурацкое название</a> (фотоотчёт)
</li><li>476 соня <a href="https://plus.google.com/photos/103076729477185490772/albums/5669571403125407793">отчёт</a>, <a href="https://maps.google.com/?t=h&q=http://www.average.org/geo/2011-10-29.kmz">трек</a>
</li><li>490 <a href="http://teufelsjunge.livejournal.com/138464.html">Пирожки без башки</a>
</li><li>627 <a href="http://voenny.livejournal.com/199871.html">Черное знамя</a> (отчёт + фото)
</li><li>658 Склад Дохлых Негров <a href="http://ira-koukou.livejournal.com/584.html">отчёт</a>, <a href="https://picasaweb.google.com/113022565025514253659/201103?authuser=0&feat=directlink">фото</a>
</li><li>689 Извне (дисквалифицированы) <a href="http://lizasom.livejournal.com/15241.html">часть 1</a>, <a href="http://lizasom.livejournal.com/15492.html">часть 2</a> (экстрим, как не стоит ходить ММБ, да и вообще)
</li><li>857 <a href="http://tt40076.ru/mmb2011-autumn.htm">им. А.И. Тентетникова</a>
</li><li>863 <a href="http://menelay.narod.ru/mmb-2011-list.html">Gvido</a>
</li><li>873 Фокс <a href="http://forest-001.livejournal.com/1272.html">часть 1</a>, <a href="http://forest-001.livejournal.com/1476.html">часть 2</a>, <a href="http://forest-001.livejournal.com/1725.html">часть 3</a>
</li><li>??? 111ypuk <a href="http://www.youtube.com/playlist?list=PLE9F2B0FD7EFC4C33&feature=viewall">видео</a>
</li><li>??? ciroja <a href="http://youtu.be/sya0Px55lNU">видео</a>
</li><li>Алексей Петров (организатор) <a href="http://aipetrov.narod.ru/2011_10_29/">фото</a>
</li><li>Александр Обухов (организатор) <a href="http://www.x-race.msk.ru/e107_plugins/sgallery/gallery.php?uview.52.1">фото</a>
</li><li>Александр Зотов (организатор) <a href="http://community.livejournal.com/_mmb_/210118.html">фото</a>
</li><li><a href="http://community.livejournal.com/_mmb_/206314.html">Пост</a> в сообществе со ссылками в комментариях
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="11v">ММБ11-Весна, Башкино - Зосимова Пустынь, 13-15 мая 2011 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://community.livejournal.com/_mmb_/190664.html">видео от hippy-old</a>
</li><li>
</li><li>Победители (разделили 1-2 места): <a href="http://www.x-race.msk.ru/page.php?218">Галкина Марина</a>, Павел Демещик; Зайцев Андрей <a href="http://tkmgtu.com/index.php/19-articles/eto-interesno/stories-skilled/1590-mmb-i-bikeadventure-den-pobedy">отчёт</a>, <a href="http://www.gpsies.com/map.do?fileId=ufljncixujzdqvvt">трек</a>
</li><li>8 SV <a href="http://krahs.livejournal.com/18809.html">отчёт</a>, <a href="http://www.gpsies.com/map.do?fileId=rfpkbwzsnzblzqtf">трек</a>
</li><li>10 <a href="http://dina-s-fizteha.livejournal.com/85039.html">Пси со звездочкой (отчёт с младенцем)</a>
</li><li>22 <a href="http://vkontakte.ru/note325999_11235643">Жесткая примавера</a>
</li><li>43 <a href="http://jglijgi.livejournal.com/9013.html">Весёлый пингвин</a> (пара слов)
</li><li>55 <a href="http://asandj.livejournal.com/32341.html">NFZ</a>
</li><li>56 <a href="http://osetrov-les.livejournal.com/200692.html">Дора</a>
</li><li>88 <a href="http://lleldorin.livejournal.com/31826.html">Green Team</a>
</li><li>90 sergeyn007 <a href="http://www.youtube.com/user/sergeyn007#p/u/12/5X5jPkLDvvA">слайдшоу</a>, <a href="http://picasaweb.google.com/SergeyN007/201102#">фото</a>
</li><li>95 <a href="http://moiseeva-vup.livejournal.com/8293.html">Семь Вёрст</a>
</li><li>112 Нездоровая тенденция <a href="http://leviathan-mai.livejournal.com/39866.html">часть 1</a>, <a href="http://leviathan-mai.livejournal.com/40066.html">часть 2</a>, <a href="http://leviathan-mai.livejournal.com/40266.html">часть 3</a>, <a href="http://leviathan-mai.livejournal.com/40519.html">часть 4</a>
</li><li>119 <a href="http://weter-peremen.ru/foto/users/mmb2011vesna/">МыСВП</a> (немного фото)
</li><li>125 <a href="http://lj.rossia.org/users/asterius/200012.html">Пырято Crew</a> (фото)
</li><li>131 <a href="http://savvateev.livejournal.com/88511.html">Вездеход</a>
</li><li>164 Контакт <a href="http://ski-fanatic.livejournal.com/47379.html">отчёт</a>, <a href="http://twitter.com/#!/Comandorus/statuses/70958729331359744">видео (дух ММБ)</a>
</li><li>178 <a href="http://e-nik.livejournal.com/82871.html">Коварный поезд</a>
</li><li>203 <a href="http://voenny.livejournal.com/188071.html">Черное знамя</a> (фотоотчёт)
</li><li>254 Балаган <a href="http://vkontakte.ru/note3342530_11014505">отчёт</a>, <a href="http://vkontakte.ru/album-8742969_135006778">фото</a>
</li><li>264 <a href="http://lightweighttravel.wordpress.com/2011/06/22/mmb-05-11/">Северный Ветер</a>
</li><li>267 <a href="http://astroblemka.livejournal.com/25832.html">Астроблемка и Ко</a> (фотоотчёт)
</li><li>280 <a href="http://ilance.livejournal.com/86052.html">Чугунный снеговик</a> (пара слов)
</li><li>295 Проворные кашаходы <a href="http://wenick.livejournal.com/39688.html">отчёт</a>, <a href="https://picasaweb.google.com/110640581970985412582/Mmb_011#">фото</a>
</li><li>344 <a href="http://akbulyakov.livejournal.com/152023.html">Системный поход</a>
</li><li>360 <a href="http://carboksyl.narod2.ru/turizm/moi_pohodi/mmb_vesna_2011/">Хитрый Лис</a> (трек + фото)
</li><li>388 В белых штанах <a href="http://sta-viator.livejournal.com/302764.html">Липатова Анастасия</a>, <a href="http://na-vi-na.livejournal.com/84556.html">Азовцев Илья</a>
</li><li>403 Четыре ноги <a href="http://hippy-old.livejournal.com/95358.html">фотоотчёт</a>, <a href="https://picasaweb.google.com/fedotov.anton/201102#">фото</a>
</li><li>448 <a href="http://vkontakte.ru/note120765_11043965">МГУ - Тортил Тротилыч</a>
</li><li>452 <a href="http://vkontakte.ru/note252326_11022207">Профи-тролль(ГС МФТИ)</a>
</li><li>483 <a href="http://butchermoscow.livejournal.com/5644.html">Селёдки 20 тонн</a>
</li><li>549 <a href="http://mult-yaxa.livejournal.com/8261.html">Guarana АК МАИ</a>
</li><li>593 <a href="http://zerg-alien.livejournal.com/109485.html">Сусанин</a>
</li><li>625 <a href="https://picasaweb.google.com/116012775119471865423/190511_MMB#">НАМВАМТУДА</a> (фото)
</li><li>649 <a href="http://vkontakte.ru/note693004_11101480">rouge et noir</a>
</li><li>677 <a href="http://roman-climber.livejournal.com/1095.html">from Georgievsk</a>
</li><li>680 <a href="http://disailor.livejournal.com/57209.html">STARTREK</a>
</li><li>699 МГУ - ВАЗ2108 <a href="http://kroshka-lie.livejournal.com/120458.html">часть 1</a>, <a href="http://kroshka-lie.livejournal.com/120458.html">часть 2</a>, <a href="http://kroshka-lie.livejournal.com/120458.html">часть 3</a>
</li><li>715 <a href="https://picasaweb.google.com/118046955259249067421/2011">Кадр-Про</a> (фото)
</li><li>722 <a href="http://kesa-2407.livejournal.com/64067.html">он сказал 'Утки'</a>
</li><li>730 <a href="https://picasaweb.google.com/Gestola4860/11?authkey=Gv1sRgCJHZuduQksPTFQ&feat=directlink">Пикник на обочине</a> (фото)
</li><li>737 Джурга <a href="http://djurga.livejournal.com/165839.html">отчёт</a>, <a href="http://photo.qip.ru/users/green-djurga/151046181/all/">фото</a>
</li><li>762 <a href="http://janelis.livejournal.com/207899.html">Мать-ехидна</a>
</li><li>763 <a href="http://rtkr.livejournal.com/622949.html">Красносельская</a>
</li><li>804 <a href="http://shokker12.livejournal.com/18572.html">Тяп-Ляп</a>
</li><li>930 <a href="http://ramatahatta.livejournal.com/142458.html">Не шучу</a>
</li><li>967 Гаттерии <a href="http://lj.rossia.org/users/yushi/89189.html">Широков Юрий</a>, <a href="http://lj.rossia.org/~zmey/116164.html">Шананина Екатерина</a>
</li><li>978 <a href="http://andrewkolpakov.livejournal.com/20026.html">IRC</a>
</li><li>1011 <a href="http://vidhir.livejournal.com/62375.html">Звероножка</a>
</li><li>??? via-tay <a href="http://via-tay.livejournal.com/12191.html">отчёт</a>
</li><li>Чупикин Андрей (организатор) <a href="http://photo.qip.ru/users/chu137/96585035/">фото</a>
</li><li>Никитин Юрий (организатор) <a href="http://fotki.yandex.ru/users/nasest/album/162427/">фото</a>
</li><li><a href="http://community.livejournal.com/_mmb_/186910.html">Пост</a> в сообществе со ссылками в комментариях
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="10o">ММБ10-Осень, Донховка - Клин, 29-31 октября 2010 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://community.livejournal.com/_mmb_/177912.html">Пост</a> в сообществе со ссылками в комментариях
</li><li>Леонид Фишкис (судья) <a href="http://picasaweb.google.com/LeonidFishkis/BelHbG">фото с финиша</a>
</li><li>Трояновская Полина (460 "Из-за сыра"). Пост в сообществе со <a href="http://community.livejournal.com/_mmb_/176496.html">статистикой</a> по составу участников ММБ
</li><li>7 <a href="http://parsik.livejournal.com/16166.html">Вышли погулять (ЛКТ)</a>
</li><li>13 <a href="http://angry-mishka.livejournal.com/45370.html">Неплюшевый мишка</a> (фото)
</li><li>48 jekyll <a href="http://kalugin-andrey.livejournal.com/47446.html">отчёт</a>, <a href="http://jekyll.homeftp.net/www/PHOTOS/MMB2010AUTUMN/index.html">фото</a>
</li><li>59 <a href="http://yudaev.livejournal.com/129289.html">Люля-кебаб</a>
</li><li>84 Семь вёрст <a href="http://moiseeva-vup.livejournal.com/7816.html">Моисеева Анна</a>, <a href="http://photo.qip.ru/users/solovei-photo/96535153/?page=1">Соловьев Алексей (фото)</a>
</li><li>100 <a href="http://lleldorin.livejournal.com/26765.html">Green Team</a>
</li><li>103 Пирожок <a href="http://ilia-yasny.livejournal.com/177039.html">Илья Ясный</a>, <a href="http://aoaoling.livejournal.com/297962.html">Антонова Ольга</a>, <a href="http://picasaweb.google.com/ilia.yasny/201005?feat=directlink">все фото</a>
</li><li>106 Следы на потолке <a href="http://alexsandir.livejournal.com/661.html">отчёт</a>, <a href="http://picasaweb.google.com/113183598044205867107/2010?authkey=Gv1sRgCMTv2b7Ftbu2IQ">фото</a>
</li><li>171 <a href="http://vonok.livejournal.com/57118.html">Юнитекс</a>
</li><li>198 <a href="http://picasaweb.google.com/kasatkanet/_2010_?feat=directlink">Кадр-Про</a> (фото)
</li><li>221 <a href="http://zhpvd.ru/component/option,com_fireboard/func,view/id,1071/catid,7/">ТК ЖЕСТЬ - Первые</a> (форум)
</li><li>223 <a href="http://tkmgtu.com/index.php/19-articles/eto-interesno/stories-skilled/1637-vpechatleniya-ot-osennego-mmb-2010">Настоящий отдых (МГТУ)</a>
</li><li>231 <a href="http://butchermoscow.livejournal.com/4087.html">Селёдки 20 тонн</a>
</li><li>293 tolyas83, 324 Топтышка <a href="http://www.youtube.com/watch?v=fW_ZXjS6PDE">видео</a>
</li><li>353 <a href="http://www.diary.ru/~Kroko/p133747016.htm">Шалтай-Балтай</a>
</li><li>388 В белых штанах <a href="http://na-vi-na.livejournal.com/79671.html">Азовцев Илья</a>, <a href="http://sta-viator.livejournal.com/296623.html">Липатова Анастасия</a>
</li><li>415 <a href="http://shokker12.livejournal.com/17094.html">В полбутылке от зимы</a>
</li><li>433 Пионеротряд <a href="http://www.liveinternet.ru/users/jglijgi/post139129398/">Шеметова Полина</a>, <a href="http://gweiss.livejournal.com/13315.html">Вайс Юрий</a>
</li><li>467 <a href="http://vonapets.livejournal.com/62523.html">Два вегетарианца и один мясоед</a>
</li><li>515 Тандем мини <a href="http://timgar.livejournal.com/1314.html">отчёт</a>, <a href="http://picasaweb.google.com/ZemlaVozduh/2010?feat=directlink">фото</a>, <a href="http://maps.google.com/maps/ms?hl=ru&ie=UTF8&msa=0&msid=113184386672702834225.000494b84194cc72a7850&ll=56.507986,36.940155&spn=0.36602,0.75531&z=10">трек</a>
</li><li>576 <a href="http://alex-3x9.narod.ru/mmb2010.html">2 тЕльцА</a>
</li><li>601 <a href="http://pvdotchet.narod.ru/101031_mmb2010/index.html">Дастархан</a> (фото)
</li><li>605 <a href="http://hippy-old.livejournal.com/91609.html">Тоторо и Ёжик</a> (фото)
</li><li>638 <a href="http://iltsy.livejournal.com/53036.html">Лапин Культа</a>
</li><li>667 <a href="http://protvino-gorizont.ru/2010/mmb-2010-otchet-vyzhivshego/">А у нас Весна</a>
</li><li>679 <a href="http://fedorovalena.livejournal.com/66201.html">Вперёд</a>
</li><li>693 <a href="http://andrewkolpakov.livejournal.com/17528.html">IRC</a>
</li><li>694 <a href="http://www.liveinternet.ru/users/2434696/post156440025/">Дора</a>
</li><li>697 Йота, 398 Самогонный агрегат <a href="http://art-error.livejournal.com/19226.html">отчёт</a>
</li><li>730 <a href="http://parfenius.livejournal.com/5583.html">Пешкарус (АК МАИ)</a>
</li><li>811 <a href="http://tt40076.ru/mmb2010-autumn.htm">им. А. И. Тентетникова</a>
</li><li>??? Роллеры (Роман) <a href="http://photo.qip.ru/users/roma-photo/96535114/">фото</a>
</li><li>Ильин Денис (судья) <a href="http://totktonado.gallery.ru/watch?a=Mwj-fS3v">фото (отобранные)</a>, <a href="http://totktonado.gallery.ru/watch?a=Mwj-fS3K">фото (все хорошие)</a>
</li><li>??? команды клуба "Ветер перемен" <a href="http://weter-peremen.ru/foto/osenniy-mmb-2010/">фото</a>
</li><li>677 <a href="http://zerg-alien.livejournal.com/106894.html">Сусанин</a>
</li><li>??? <a href="http://earlinn.livejournal.com/333450.html">earlinn</a>
</li><li> X-Race 
Новости:  <a href="http://www.x-race.msk.ru/news.php?item.1748.1">первый</a>, <a href="http://www.x-race.msk.ru/news.php?extend.1749">второй</a>   день;
<a href="http://www.x-race.msk.ru/news.php?extend.1767">Итоговый</a> материал;
<a href="http://www.x-race.msk.ru/page.php?199">Интервью</a> Александра Эдуардова; 
<a href="http://tkmgtu.com/index.php/19-articles/eto-interesno/stories-skilled/1637-vpechatleniya-ot-osennego-mmb-2010">Рассказ</a> Андрея Зайцева;
<a href="http://www.sportelement.ru/blogrecord/uid=36">Рассказ</a> Александра Гиматова.  
</li></ul>
</td></tr>


<tr><th><font size="+1"><a name="10v">ММБ10-Весна, Абрамцево - Вербилки, 14-16 мая 2010 года</a></font></th>
</tr><tr><td>
<ul>
<li>Community MMB <a href="http://community.livejournal.com/_mmb_/141090.html" target="_blank">общий пост отчётов</a>, много отчётов в комментариях
</li><li>Арсений Когут (судья) <a href="http://xfengs.livejournal.com/16193.html" target="_blank">фото со смены карт</a>
</li><li>16 <a href="http://fedorovalena.livejournal.com/54487.html" target="_blank">Вперёд</a>
</li><li>21 <a href="http://nordbez.livejournal.com/26333.html" target="_blank">ПчиХ</a>
</li><li>34 <a href="http://astroblemka.livejournal.com/2593.html" target="_blank">Астроблемка и Ко</a>

</li><li>38 <a href="http://moiseeva-vup.livejournal.com/7281.html" target="_blank">Семь вёрст</a>
</li><li>76 Мистраль-IRC <a href="http://blogs.mail.ru/mail/a.elkonin/442EC9ED36D006D1.html" target="_blank">Элконин Александр</a>, <a href="http://andrewkolpakov.livejournal.com/15798.html" target="_blank">Колпаков Андрей</a>
</li><li>83 <a href="http://vonok.livejournal.com/40353.html" target="_blank">Юнитекс</a>
</li><li>90 <a href="http://picasaweb.google.com/SergeyN007/2010#slideshow" target="_blank">sergeyn007</a> (слайдшоу)
</li><li>99 <a href="http://lleldorin.livejournal.com/22808.html" target="_blank">Green Team</a>

</li><li>126 <a href="http://stas17.livejournal.com/9266.html" target="_blank">Swampers</a>
</li><li>198 <a href="http://maps.google.com/maps/ms?hl=en&ie=UTF8&oe=UTF8&msa=0&msid=108337542163556287785.000486c3190e01d4bd1b6" target="_blank">Гербарий МГУ</a> (трек с комментариями)
</li><li>268 <a href="http://butchermoscow.livejournal.com/2022.html" target="_blank">Селёдки 20 тонн</a>
</li><li>271 <a href="http://lightweighttravel.wordpress.com/2010/05/21/mmb-05-10/" target="_blank">Говнистый лось</a>
</li><li>288 Солярис, 830 Путеводная звезда <a href="http://photofile.ru/users/star-dreamer/96461159/" target="_blank">фото</a>
</li><li>364 Норд-Ост, 366 Рязань-Таганок, 469 Каменные Ж <a href="http://www.taganok.ru/index.php?n=20657" target="_blank">шедевр</a>

</li><li>404 <a href="http://shokker12.livejournal.com/14244.html" target="_blank">Неведомы зверушки</a>
</li><li>425 <a href="http://voenny.livejournal.com/155665.html" target="_blank">Черное знамя</a>
</li><li>467 <a href="http://tt40076.ru/mmb2010-spring.htm" target="_blank">им. А.И. Тентетникова</a>
</li><li>495 <a href="http://ilia-yasny.livejournal.com/167456.html" target="_blank">Пирожок</a>
</li><li>523 <a href="http://leonid-fishkis.livejournal.com/72549.html" target="_blank">Киргизы</a>
</li><li>635 <a href="http://4apa87.livejournal.com/21285.html" target="_blank">Энтузиасты (МГТУ-МГУ)</a>

</li><li>675 <a href="http://lj.rossia.org/users/asterius/187049.html" target="_blank">Пырято crew</a>
</li><li>689 <a href="http://vkontakte.ru/note9011275_9862306" target="_blank">Zireael</a>
</li><li>690, 691  <a href="http://pvdotchet.narod.ru/100514_mmb2010/index.html" target="_blank">отчёт - Старцева Надежда, фото - Дубицкий Виктор</a>
</li><li>793 <a href="http://elena-tart.livejournal.com/22531.html" target="_blank">Мяу МГТУ</a>
</li><li>877 <a href="http://teux.ru/mmb10.html" target="_blank">Teux.ru</a>
</li><li>895 <a href="http://hippy-old.livejournal.com/85330.html" target="_blank">Сёгун</a>

</li><li>916 <a href="http://picasaweb.google.com/kasatkanet/201002#" target="_blank">Kadr-Pro</a> (фото)
</li><li>??? <a href="http://board.cufot.ru/6/1428.html" target="_blank">форум страйкбольной команды Легион</a>, впечатляет подготовка
</li><li>??? <a href="http://hunter-h13.livejournal.com/9919.html" target="_blank">hunter-h13</a> (неоконченный отчёт)
</li><li>??? <a href="http://yurick2002.livejournal.com/56523.html" target="_blank">yurick2002</a> (отчёт)
</li><li> X-Race  <a href="http://www.x-race.msk.ru/comment.php?comment.news.1557">Новость</a>
</li></ul>
</td></tr>


<tr><th><font size="+1"><a name="09o">ММБ09-Осень, Топканово - Голутвин, 23-25 октября 2009 года</a></font></th>
</tr><tr><td>
<ul>
<li>8 <a href="http://l-temulentum.livejournal.com/101494.html">Мокрое тело</a>
</li><li>29 <a href="http://moiseeva-vup.livejournal.com/6866.html">Семь вёрст</a>
</li><li>43 Green Team <a href="http://konayno.livejournal.com/60392.html">впечатления</a>, <a href="http://lleldorin.livejournal.com/17163.html">отчёт</a>
</li><li>57 <a href="http://zhpvd.ru/content/view/114/1/">ТК Жесть - первые</a>
</li><li>60 Ровер: <a href="http://weter-peremen.ru/photogallery/useralbum_376.html">фото 1</a>, <a href="http://weter-peremen.ru/photogallery/useralbum_377.html">фото 2</a>
</li><li>66 <a href="http://e-nik.livejournal.com/54639.html">Коварный поезд</a>
</li><li>85 <a href="http://vonok.livejournal.com/24251.html">Юнитекс</a>
</li><li>116 <a href="http://kolemik.ya.ru/replies.xml?item_no=1337&ncrnd=6457">МалаМуть</a>
</li><li>127 <a href="http://dw.school2.ru/mb/mmb2009o.php">Очаровательный кварк</a>
</li><li>128 <a href="http://guento.livejournal.com/151792.html">Астроблемка и Ко</a>
</li><li>145 <a href="http://boblotini.livejournal.com/5144.html">Боблотини</a>
</li><li>167 <a href="http://blogs.mail.ru/mail/lenoocik/229571824C0FDBF7.html">Снег</a>
</li><li>169 <a href="http://lifelines.net.ru/main.php?g2_itemId=14325">Альтима</a> (фото)
</li><li>224 <a href="http://www.diary.ru/~forestbrother/p83876950.htm">Лесной брат</a>
</li><li>251 <a href="http://www.diary.ru/~Kroko/p83960200.htm">Шалтай-Балтай</a>
</li><li>262 <a href="http://mult-yaxa.livejournal.com/1489.html">Guarana-АК МАИ</a>
</li><li>279 <a href="http://leviathan-mai.livejournal.com/18347.html">Нездоровая тенденция</a>
</li><li>288 <a href="http://nomin-rus.livejournal.com/28161.html">OK</a>
</li><li>297 <a href="http://oleg-volkov.livejournal.com/70198.html">Мокрый примус</a>
</li><li>308 <a href="http://kelebrindel.livejournal.com/25576.html">Пеленг05</a>
</li><li>356 <a href="http://butchermoscow.livejournal.com/815.html">Селёдки 20 тонн</a>
</li><li>360 <a href="http://asenok-ninochka.livejournal.com/123130.html">Опоссумиха</a>
</li><li>378 <a href="http://rtkr.livejournal.com/496460.html">Без присмотра</a>
</li><li>388 В белых штанах: <a href="http://na-vi-na.livejournal.com/48201.html">раз</a> - <a href="http://sta-viator.livejournal.com/232866.html">два</a>
</li><li>392 <a href="http://klem-mentina.livejournal.com/44068.html">Аномалия</a>
</li><li>427 <a href="http://kroshka-lie.livejournal.com/61949.html">Вижу суслика</a>
</li><li>443 <a href="http://pvdotchet.narod.ru/091024_mmb2009/index.html">Дубицкий Виктор</a> (фото)
</li><li>532 <a href="http://www.liveinternet.ru/users/peregar/post112984228/">им.Ивана Сусанина</a>
</li><li>557 <a href="http://gweiss.livejournal.com/12170.html">TF1</a>
</li><li>630 <a href="http://hippy-old.livejournal.com/80302.html">Спанч и Тоторо</a>
</li><li>651 <a href="http://voenny.livejournal.com/131192.html">Чёрное знамя</a>
</li><li>653 <a href="http://ilia-yasny.livejournal.com/156838.html">Пирожок</a>
</li><li>749 <a href="http://savvateev.livejournal.com/43086.html">Москва-Иркутск</a>
</li><li>844 <a href="http://angry-mishka.livejournal.com/25896.html">Неплюшевый мишка</a>
</li><li>900 Арам-зам-зам: <a href="http://shokker12.livejournal.com/13100.html">1 день</a>, <a href="http://shokker12.livejournal.com/13506.html">2 день</a>, <a href="http://shokker12.livejournal.com/13613.html">итоги</a>
</li><li>923 <a href="http://burtsev.livejournal.com/31174.html">Брауновское движение</a>
</li><li> <a href="http://stranger-soul.livejournal.com/7561.html"> ??? </a>
</li><li> <a href="http://hmm-gmm.livejournal.com/1417.html"> ??? </a>
</li><li> <a href="http://tatone4ka.livejournal.com/17283.html"> ??? </a>
</li><li>36 Настоящий Отдых, 315 Smirnoff и Палыч, 712 LoLa - <a href="http://tkmgtu.com/index.php/19-articles/eto-interesno/stories-skilled/1401-rasskazy-pro-osennij-mmb-2009">на форуме турклуба МГТУ</a>
</li><li>Осетров Виктор (судья), <a href="http://osetrov-les.livejournal.com/128466.html">фото</a> 
</li><li>Александр Зотов (судья), <a href="http://community.livejournal.com/_mmb_/125762.html">фото</a> 
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="09v">ММБ09-Весна, Омутище - 168 км, 15-17 мая 2009 года</a></font></th>
</tr><tr><td>
<ul>
<li>8А <a href="http://zhpvd.ru/component/option,com_seyret/Itemid,66/task,videodirectlink/id,9/">ТК Жесть - Первый</a> (видеодневник)
</li><li>31А <a href="http://black-rnd.livejournal.com/26351.html">ЛаТочь Оранж</a>
</li><li>32А <a href="http://ilance.livejournal.com/60665.html">КТПшники</a> (фото)
</li><li>59А <a href="http://janemouse.livejournal.com/635083.html">Мышкин дом</a>
</li><li>69А <a href="http://community.livejournal.com/_mmb_/109316.html">sergeyn007</a>
</li><li>79А <a href="http://www.diary.ru/~svchost/p70187605.htm">Buka</a>
</li><li>154А <a href="http://pit-spa.livejournal.com/166904.html">Дикие ползуны</a>
</li><li>182А Абырвалг: <a href="http://skyserp.livejournal.com/65991.html">раз</a>, <a href="http://skyserp.livejournal.com/66251.html">два</a>, <a href="http://skyserp.livejournal.com/66480.html">три</a>
</li><li>200А <a href="http://asenok-ninochka.livejournal.com/115328.html">Опоссумиха</a>
</li><li>333А <a href="http://community.livejournal.com/_mmb_/108745.html">Корреспондент СМИ</a> (star-tm, фотографии)
</li><li>371А <a href="http://gweiss.livejournal.com/10540.html">Мокропопые</a>
</li><li>375А toshische: <a href="http://toshische.livejournal.com/203442.html">о дистанции</a>, <a href="http://toshische.livejournal.com/203176.html">впечатления</a>
</li><li>389А <a href="http://n0mad-0.livejournal.com/33216.html">Спящий бугога</a>
</li><li>401А Полярная авиация: <a href="http://calmel.livejournal.com/27180.html">здесь</a> и <a href="http://voenny.livejournal.com/117036.html">здесь</a>
</li><li>413А <a href="http://yoovjik.livejournal.com/2265.html">Ледяная свежесть</a>
</li><li>427А <a href="http://aip-aip.livejournal.com/29544.html">Слава Шефу!</a>
</li><li>445А <a href="http://na-vi-na.livejournal.com/39992.html">Проходимцы</a>
</li><li>513А <a href="http://no-access.livejournal.com/85019.html">Мы в отчаянии</a>
</li><li>641А <a href="http://blogs.mail.ru/mail/butchermoscow/3D33F848080C0D74.html">Селедки 20 тонн</a>
</li><li>812А <a href="http://marat-im.livejournal.com/727.html">Вепрь</a>
</li><li>496А <a href="http://sergin-k.livejournal.com/7741.html">МГУ-Ураган</a>
</li><li>585А <a href="http://community.livejournal.com/_mmb_/109584.html">Шепилов Саша</a>
</li><li>839А <a href="http://tentetnikov.ru/mmb09v.htm">им. А.И.Тентетникова</a>
</li><li>919А <a href="http://gromova.net/2009/pro-mmb-2009-vesna/">Мал-Непобед-Вездеходы</a>
</li><li>990А/920A <a href="http://ylisen-orl.livejournal.com/121465.html">Хвост</a>/Сонный тигра
</li><li>968А <a href="http://www.diary.ru/~svchost/p70187605.htm">Фалаут</a>
</li><li>1045А <a href="http://hapchik.livejournal.com/88883.html">Муякан</a>
</li><li>1101А <a href="http://serg4n.livejournal.com/7750.html">ПК</a>
<br>
</li><li>23Б <a href="http://olger.ru/?p=287">Рязань-KiloVolT</a>
</li><li>52Б <a href="http://dw.school2.ru/mb/mmb2009.php">Сингулярность</a>
</li><li>91Б <a href="http://yacelop.blogspot.com/2009/05/2009.html">МИЭМ-Пепелац</a>
</li><li>105Б/595Б <a href="http://vonok.livejournal.com/15675.html">Юнитекс</a>/<a href="http://orient-s.livejournal.com/20370.html">Pelligrina</a>
</li><li>113Б <a href="http://tkmgtu.com/index.php/19-articles/eto-interesno/stories-skilled/1301-rasskaz-pro-vesennij-mmb-2009">Настоящий отдых</a>
</li><li>436Б <a href="http://mich-punk.livejournal.com/444124.html">Лягуха</a>
</li><li>574Б <a href="http://fedorovalena.livejournal.com/28815.html">Бродяга</a>
</li><li>577Б <a href="http://zabavart.livejournal.com/34363.html">Кодар</a> (фото)
</li><li>578Б <a href="http://savvateev.livejournal.com/29866.html">Вездеход</a>
<br>
</li><li>??? <a href="http://tatone4ka.livejournal.com/12289.html">tatone4ka</a>
</li><li>X-Race <a href="http://www.x-race.msk.ru/news.php?item.1138.1">Новость</a>;
<a href="http://tkmgtu.com/index.php/19-articles/eto-interesno/stories-skilled/1301-rasskaz-pro-vesennij-mmb-2009">Рассказ</a> Андрея Зайцева 
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="08o">ММБ08-Осень, 95 км - Кривандино, 24-26 октября 2008 года</a></font></th>
</tr><tr><td>
<ul>
<li>20А <a href="http://ladova.livejournal.com/140084.html">МГУ-Петрелиус</a> (<a href="http://ladova.livejournal.com/140450.html">снаряжение</a>)
</li><li>35А <a href="http://www.liveinternet.ru/users/t-h/post88379176/">Болотная фея</a>
</li><li>51А <a href="http://janemouse.livejournal.com/596603.html">Мышкин дом</a> (<a href="http://janemouse.livejournal.com/596737.html">продолжение</a>)
</li><li>53А <a href="http://ilance.livejournal.com/54624.html">КТПшники</a>
</li><li>54А <a href="http://johannes-dee.livejournal.com/2682.html">Заглянуть За</a>
</li><li>74А <a href="http://fizorg3z.livejournal.com/14361.html">Rapidus Hippopotamus</a>
</li><li>197А <a href="http://oleg-volkov.livejournal.com/45169.html">Мокрый примус</a>
</li><li>300А Опоссумиха: <a href="http://asenok-ninochka.livejournal.com/106279.html">начало</a>, <a href="http://asenok-ninochka.livejournal.com/106751.html">продолжение</a>, <a href="http://asenok-ninochka.livejournal.com/106849.html">окончание</a>
</li><li>338А <a href="http://voenny.livejournal.com/95395.html">Чёрное знамя</a>
</li><li>365А <a href="http://nolyunin.livejournal.com/17841.html">Никола - МФТИ</a>
</li><li>513А <a href="http://yudaev.livejournal.com/66094.html">Люля-кебаб</a>
</li><li>586А <a href="http://raddugga.livejournal.com/46140.html">Трое в лесу</a>
</li><li>615А <a href="http://blogs.mail.ru/mail/anenkov_a/42AA351F0F26DCA6.html">МАК</a>
</li><li>618А <a href="http://community.livejournal.com/_mmb_/90005.html">Корреспондент СМИ</a> (star-tm, фотографии)
</li><li>669А <a href="http://lleldorin.livejournal.com/11063.html">Green team</a> (<a href="http://konayno.livejournal.com/47224.html">ещё</a>)
</li><li>676А <a href="http://hippy-old.livejournal.com/71785.html">Клан Такеда</a>
</li><li>743А <a href="http://community.livejournal.com/_mmb_/94770.html">Пикирующий паровик</a>
</li><li>808А <a href="http://ggalka.livejournal.com/190388.html">Ggalka</a>
</li><li>871А <a href="http://dmitryslavin.livejournal.com/49941.html">Дмитрий Славин</a>
<br>
</li><li>7Б <a href="http://izib.narod.ru/Sport/20081026_MMB.htm">От Морозки</a>
</li><li>8Б <a href="http://l-temulentum.livejournal.com/82946.html">Мокрое тело</a>
</li><li>31Б/32А <a href="http://osetrov-les.livejournal.com/76456.html">Дора Vik</a> (<a href="http://osetrov-les.livejournal.com/76669.html">подробнее</a>)
</li><li>41Б <a href="http://www.liveinternet.ru/users/surrey/post88287036/">Тотторо и хомячок</a>
</li><li>116Б <a href="http://se-ti.livejournal.com/35931.html">Вестра-Титов</a>
</li><li>130Б <a href="http://www.alpclubmei.ru/index.php?option=com_content&task=view&id=690&Itemid=144">Альпклуб МЭИ</a>
</li><li>154Б <a href="http://akakilovolt.livejournal.com/2860.html">Рязань-Kilovolt</a>
</li><li>160Б <a href="http://dw.school2.ru/mb/mmb2008o.php">Сингулярность</a>
</li><li>177Б Аномалия: <a href="http://klem-mentina.livejournal.com/28390.html">часть 1</a>, <a href="http://klem-mentina.livejournal.com/28781.html">часть 2</a>
</li><li>261Б <a href="http://vonok.livejournal.com/10850.html">Юнитекс</a> (<a href="http://vonok.livejournal.com/11110.html">окончание</a>)
</li><li>369Б <a href="http://narayanan.livejournal.com/12789.html">Кодар</a>
</li><li>818Б <a href="http://www.x-race.msk.ru/news.php?extend.977">DSP</a> и 159Б Горизонт
</li><li>306А <a href="http://www.my-tour.ru/2008/20081026-95km/otchet.htm">Бешеные Суслики</a> 
</li><li><a href="http://tatone4ka.livejournal.com/5995.html">???</a>
</li><li><a href="http://stranger-soul.livejournal.com/3729.html">???</a>
</li><li>???: <a href="http://leviathan-mai.livejournal.com/7896.html">спецэтап</a>
</li><li>???A <a href="http://capitan-smallet.livejournal.com/854.html">1 день</a>, <a href="http://capitan-smallet.livejournal.com/1049.html">2 день</a>
</li><li>X-Race <a href="http://www.x-race.msk.ru/news.php?item.975.1">Новость</a>;
<a href="http://www.x-race.msk.ru/news.php?extend.977">Рассказ</a>  Дмитрия Пирожкова, Людмилы Батаевой
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="08v">ММБ08-Весна, Чисмена-Ямуга, 16-18 мая 2008 года</a></font></th>
</tr><tr><td>
<ul>
<li>8А <a href="http://turizm-club.narod.ru/mmb08.htm">ТК Жесть - Первый</a>
</li><li>21А <a href="http://pashkin-elfe.livejournal.com/117707.html">Млечный путь</a>
</li><li>36А <a href="http://insentientbeing.livejournal.com/193449.html">Пузация и суслинг</a>
</li><li>38А <a href="http://tufoed.livejournal.com/59352.html">Крокодил Гена</a>
</li><li>123А <a href="http://akakilovolt.livejournal.com/2043.html">впечатления</a>, <a href="http://akakilovolt.livejournal.com/2182.html">техн.отчёт</a>
</li><li>150А <a href="http://community.livejournal.com/ru_vestra/27014.html">Алайдор-Вестра</a>
</li><li>168А <a href="http://valechka.livejournal.com/84804.html">Глюкоза</a>
</li><li>198А <a href="http://community.livejournal.com/_mmb_/72050.html?thread=1100914">Вестра-Мамонт</a>
</li><li>199А <a href="http://hippy-old.livejournal.com/68611.html">Тоторо</a>
</li><li>242А toshishe: <a href="http://toshische.livejournal.com/131932.html">начало</a>, <a href="http://toshische.livejournal.com/132304.html">до промфиниша</a>, <a href="http://toshische.livejournal.com/132525.html">второй день - утро</a>, <a href="http://toshische.livejournal.com/132677.html">окончание</a>
</li><li>344А <a href="http://voenny.livejournal.com/82038.html">Чёрное знамя</a>
</li><li>361А <a href="http://lj.rossia.org/users/gogabr/82395.html">Броуновское движение</a>
</li><li>394А <a href="http://na-vi-na.livejournal.com/18999.html">Проходимцы</a>
</li><li>411А <a href="http://www.liveinternet.ru/users/star-tm/post75562044/">Vagabondi</a> (star-tm, фото)
</li><li>425А "Опоссумиха": <a href="http://asenok-ninochka.livejournal.com/102985.html">пятница</a>, <a href="http://asenok-ninochka.livejournal.com/103313.html">суббота утро</a>, <a href="http://asenok-ninochka.livejournal.com/103440.html">день</a>, <a href="http://asenok-ninochka.livejournal.com/103838.html">воскресенье</a>
</li><li>499А <a href="http://www.fotodia.ru/photos/yuratin/set/MMB2008spring">Дядюшка Ау</a> (фото)
</li><li>506А <a href="http://disailor.livejournal.com/29428.html">13-й маршрут</a>
</li><li>527А <a href="http://fedorovalena.livejournal.com/10439.html">Непоседы (Вестра)</a>
</li><li>541А? <a href="http://dahko.livejournal.com/35620.html">МГУ-Левый глаз</a>
</li><li>566А <a href="http://black-rnd.livejournal.com/13778.html">МГУ-Mr.C.Expo</a>
</li><li>759А <a href="http://ylisen-orl.livejournal.com/82607.html">Hvost</a>
<br>
</li><li>12Б <a href="http://dreamtrapper.livejournal.com/8946.html">Ловчий Сны</a>
</li><li>30Б <a href="http://ivanaxe.livejournal.com/34164.html">Лямбда</a>
</li><li>32Б <a href="http://pit-spa.livejournal.com/144936.html">Дикие ползуны</a>
</li><li>37Б <a href="http://legrus.livejournal.com/79202.html">Жёсткая Жомка</a>
</li><li>62Б <a href="http://dw.school2.ru/mb/mmb2008.php">Сингулярность</a>
</li><li>64Б <a href="http://izib.narod.ru/Sport/20080518_MMB.htm">От Морозки</a>
</li><li>88Б <a href="http://www.liveinternet.ru/users/2434696/post76014284/">Дора Vik</a>
</li><li>91Б "Юнитекс": <a href="http://vonok.livejournal.com/5962.html">начало</a>, <a href="http://vonok.livejournal.com/6155.html">окончание</a>
</li><li>92Б <a href="http://tkmgtu.com/index.php/19-articles/eto-interesno/stories-skilled/1111-rasskaz-pro-mmb-vesna-2008">Заяц-одиночка</a>
</li><li>110Б <a href="http://strateg-mephi.livejournal.com/5364.html">Мегапризма (МИФИ)</a>
</li><li>114Б <a href="http://stiks-speleo.ru/index.php?page=74">Стикс-Рязань</a>
</li><li>152Б <a href="http://www.liveinternet.ru/users/surrey/post76963581/">Вестра - Тотторо</a>
</li><li>164Б <a href="http://community.livejournal.com/_mmb_/72050.html?thread=1088882">Ловцы x3</a>
</li><li>223Б <a href="http://forum.velomania.ru/index.php?s=a39df77c8c2181191f3aa5c1981dfafc&showtopic=30122&st=20&p=505500&#entry505500">МГУ-Проходимец</a>
</li><li>252Б <a href="http://po-svoemu.livejournal.com/16682.html">Гарцующий пень</a>
</li><li>262Б <a href="http://moiseeva-vup.livejournal.com/5342.html">VUP</a>
</li><li>275Б <a href="http://e-nik.livejournal.com/48316.html">Коварный поезд</a>
</li><li>329Б <a href="http://community.livejournal.com/_mmb_/72050.html?thread=1071730">намвамтуда</a>
</li><li>371Б <a href="http://yudaev.livejournal.com/47222.html">Люля-кебаб</a>
</li><li>376Б <a href="http://snowfriend.livejournal.com/1523.html">Кусочек неба</a>
</li><li>417Б <a href="http://leonid-fishkis.livejournal.com/47851.html">Киргизы</a>
</li><li>418Б? <a href="http://burpoch.livejournal.com/2167.html">Мчуны</a>
</li><li>482Б <a href="http://community.livejournal.com/_mmb_/71666.html">Семь вёрст не крюк</a> (1 день)
</li><li>514Б "Дурдом на выезде": <a href="http://www.liveinternet.ru/users/1117927/post75465813/">начало</a>, <a href="http://www.liveinternet.ru/users/rysiyona/post75777888/">продолжение</a>
</li><li>764Б turn-off-sky: <a href="http://joyfolk.livejournal.com/322154.html">раз</a>, <a href="http://iltsy.livejournal.com/27303.html">два</a>
</li><li>??? <a href="http://forum.velomania.ru/index.php?s=c45708cf49c776b47b2088f3b75126ed&showtopic=30122&st=20&p=503022&#entry503022">velomania клетка</a>
</li><li>X-Race <a href="http://www.x-race.msk.ru/news.php?extend.827">Новость</a>

</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="07o">ММБ07-Осень, Покровка-Яхрома, 27-28 октября 2007 года</a></font></th>
</tr><tr><td>
<ul>
<li>5 <a href="http://askaro.livejournal.com/21574.html">"МГУ-Оранжевый возраст"</a>
</li><li>8 <a href="http://se-ti.livejournal.com/23750.html">"Вестра-Титов"</a>
</li><li>10 "ТК Жесть - Первый", 13 "ТК Жесть - Дмитров", 102 "МГУ - H2O", 600 "Бивуакер" <a href="http://turizm-club.narod.ru/mmb07o.htm">ТК Жесть</a>
</li><li>29 <a href="http://tkmgtu.com/index.php/19-articles/eto-interesno/stories-skilled/990-vpechatleniya-ot-osennego-mmb-2007">"Заяц-одиночка (МГТУ)"</a>
</li><li>59 <a href="http://dw.school2.ru/mb/mmb2007o.php">"Сингулярность"</a>
</li><li>62 <a href="http://www.diary.ru/~Kroko/?comments&postid=37040224">"Шалтай-Балтай"</a>
</li><li>87 <a href="http://www.x-race.msk.ru/news.php?extend.622">"X-race Den"</a>
</li><li>91 <a href="http://pit-spa.livejournal.com/133297.html">"Дикие ползуны"</a>
</li><li>100 <a href="http://i-sobolev.livejournal.com/87600.html">"МГУ-Альтаир"</a>
</li><li>104 <a href="http://talis-mann.livejournal.com/67043.html">"Паровой бронебубен Ы"</a> (<a href="http://fotki.yandex.ru/users/Talis-mann/album/14979/">фото</a>)
</li><li>114, 116 <a href="http://picasaweb.google.com/ovantonova/200707">"Хамачи", "Пирожок"</a> (фото)
</li><li>147 <a href="http://janemouse.livejournal.com/539460.html">"Мышкин дом"</a>
</li><li>179 <a href="http://jenskiy.livejournal.com/28837.html">"Альпклуб МЭИ"</a>
</li><li>182 "toshishe" <a href="http://toshische.livejournal.com/112722.html">раз</a>, <a href="http://toshische.livejournal.com/112957.html">два</a>, <a href="http://toshische.livejournal.com/113378.html">три</a>, <a href="http://toshische.livejournal.com/113467.html">четыре</a>, <a href="http://toshische.livejournal.com/114076.html">пять</a>
</li><li>208 <a href="http://www.liveinternet.ru/users/star-tm/post55432042/">"Пошляне-2"</a> (отчёт, фото)
</li><li>210 <a href="http://www.sportelement.ru/onerazd/guid=176">"Sportelement"</a>
</li><li>213 <a href="http://forum.pochva.com/index.php?s=&showtopic=778&view=findpost&p=45838">"МГУ-Собутыльники"</a>
</li><li>272 <a href="http://klem-mentina.livejournal.com/9341.html">Алексеева Катя</a>
</li><li>280 <a href="http://shezhe.livejournal.com/777.html">"Глюкоза"</a>
</li><li>281 <a href="http://www.totktonado.by.ru/texts/2007_mmb_o.html">"Hold Fast"</a>
</li><li>289 <a href="http://picasaweb.google.ru/podkopaev/28292007">"Дафния и Циклоп"</a> (фото)
</li><li>338 <a href="http://voenny.livejournal.com/59067.html">"Чёрное знамя"</a>
</li><li>342 "Юнитекс": <a href="http://vonok.livejournal.com/4454.html">день 1</a>, <a href="http://vonok.livejournal.com/4112.html">день 2</a>
</li><li>355 <a href="http://xyu13.livejournal.com/88463.html">"Вездехуй"</a>
</li><li>395 <a href="http://katika.narod.ru/stories/fpohody/mmb200710.htm">"Синие птицы"</a>
</li><li>416 <a href="http://www.liveinternet.ru/photoalbumshow.php?albumid=533272&seriesid=763579">"Киборг"</a> (фото)
</li><li>426 <a href="http://is-winner.livejournal.com/178737.html">"iradash"</a>
</li><li>484 <a href="http://yudaev.livejournal.com/28203.html">"Солнечный ветер"</a>
</li><li>535 <a href="http://ylisen-orl.livejournal.com/68407.html">Орлова Юля</a>
</li><li>598 <a href="http://zigzag.lvk.cs.msu.su/~tim/photo/2007-10-29">"МГУ - эстет"</a> (фото)
</li><li>650 <a href="http://www.liveinternet.ru/users/blader_ru/post57009716/">"Бирюлёво"</a>
</li><li>653 <a href="http://burningwolf.multiply.com/photos/album/12">"Irish lover"</a> (фото)
</li><li>672 <a href="http://legrus.livejournal.com/75587.html">"Соло"</a>
</li><li>687 <a href="http://orient-s.livejournal.com/322.html">"Ветеран броуновского движения"</a>
</li><li>722 <a href="http://e-nik.livejournal.com/43917.html">"Коварный поезд"</a>
</li><li>779 <a href="http://aip-aip.livejournal.com/15835.html">"Ариадна"</a>
</li><li>??? <a href="http://angel-of-spring.livejournal.com/120093.html">(angel-of-spring)</a>
</li><li>??? <a href="http://maleficxp.livejournal.com/112479.html">(maleficxp)</a>
</li><li><a href="http://dina-s-fizteha.livejournal.com/46109.html">Дина Любимова</a> (судейская бригада)
</li><li><a href="http://alexander-zotov.livejournal.com/567.html">Александр Зотов</a> (судейская бригада, фото)
</li><li><a href="http://svetlyi-lob.livejournal.com/1550.html">Александр Панкратов</a> (тестирование дистанции)
</li><li><a href="http://www.youtube.com/watch?v=zL7HX8799IY">Видеоклип про ММБ-осень-07</a>
</li><li>X-Race <a href="http://www.x-race.msk.ru/comment.php?comment.news.621">Новость</a>;
<a href="http://www.x-race.msk.ru/news.php?extend.622">Рассказ</a>  Дениса Жилина
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="07v">ММБ07, 132 км - Заокский, 11-13 мая 2007 года</a></font></th>
</tr><tr><td>
<ul>
<li>15А "Опоссумы (МФТИ)": <a href="http://asenok-ninochka.livejournal.com/95894.html">1 день</a>, <a href="http://asenok-ninochka.livejournal.com/96309.html">2 день</a>
</li><li>45А <a href="http://creaze.livejournal.com/9879.html">"Медленный_guzz"</a>
</li><li>69А <a href="http://tufoed.livejournal.com/40443.html">"Лучшие люди"</a>
</li><li>76А "Мегапризма" <a href="http://strateg-mephi.livejournal.com/3493.html">рассказ 1</a>, <a href="http://daemon07.livejournal.com/665.html">рассказ 2 (с фотами)</a> и <a href="http://photofile.ru/users/mifff/2694579">фотографии</a>
</li><li>90А <a href="http://turizm-club.narod.ru/mmb07.htm">"ТК Жесть - саблезубый"</a>, <a href="http://miha-hibinsky.livejournal.com/102901.html">еще</a>
</li><li>97А <a href="http://neoeugene.blogspot.com/2007/05/11-13-2007.html">"Впервые в лесу"</a>
</li><li>121А "Шалтай Балтай" <a href="http://www.diary.ru/~Kroko/?comments&postid=28751431">часть 1</a>, <a href="http://www.diary.ru/~Kroko/?comments&postid=28805579">часть 2</a>
</li><li>134А <a href="http://nolyunin.livejournal.com/597.html">"Колян"</a>
</li><li>140А "Шире шаг" <a href="http://zzach.livejournal.com/71282.html">рассказ</a>, <a href="">фотографии</a>
</li><li>182А <a href="http://akakilovolt.livejournal.com/1689.html">"Вертикаль-Рязань"</a>
</li><li>185А <a href="http://janemouse.livejournal.com/518088.html">"Мышкин дом"</a>
</li><li>189А "Далекая радуга" <a href="http://black-climber.livejournal.com/152253.html">раз</a>, <a href="http://community.livejournal.com/_mmb_/44286.html">два</a>
</li><li>200А "Проходимцы" <a href="http://na-vi-na.livejournal.com/5027.html">отчет</a>, фотографии <a href="http://na-vi-na.livejournal.com/6077.html">1 день</a>, <a href="http://na-vi-na.livejournal.com/6158.html">2 день</a>
</li><li>214А "Ы": <a href="http://talis-mann.livejournal.com/45887.html">раз</a>, <a href="http://talis-mann.livejournal.com/46124.html">два</a>
</li><li>245А <a href="http://geonike.livejournal.com/14906.html">"Лосеги"</a>
</li><li>249А <a href="http://perovo.fastbb.ru/?1-8-0-00000023-000-0-0-1179132508">"Перово-моцион"</a>
</li><li>263А <a href="http://woooody.livejournal.com/22787.html">"Хромые лоси"</a> (с фотографиями)
</li><li>269А "Броуновское движение": <a href="http://gogabr.livejournal.com/87653.html">раз</a>, <a href="http://ankey.alvis.ru/mmb2007.htm">два</a>, <a href="http://ankey.alvis.ru/gallery/?album=mmb2007&page=1">фотографии</a>
</li><li>290А <a href="http://vestaff.livejournal.com/18022.html">"ff"</a>
</li><li>436А <a href="http://www.liveinternet.ru/users/1119907/post39030263/">"Алайдор-Вестра"</a>
</li><li>441А <a href="http://karmamarga.livejournal.com/9507.html">"dez (МФТИ)"</a>
</li><li>494А <a href="http://mpakfm.livejournal.com/85932.html">"ТК Жесть - МРАК"</a>
</li><li>554А <a href="http://skayya.livejournal.com/36734.html">"На Восток"</a>
</li><li>562А <a href="http://hapchik.livejournal.com/58271.html">"Давайте срежем"</a>
</li><li>576А <a href="http://amelia-kamille.livejournal.com/1912.html">"МГУ - перепутье"</a>
</li><li>700А <a href="http://olkol.livejournal.com/10064.html">"olkol"</a>
<br>
</li><li>3Б <a href="http://se-ti.livejournal.com/18085.html">"Вестра-Титов"</a>
</li><li>5Б <a href="http://users.livejournal.com/dmitry_/33856.html">"Полный вперёд"</a>
</li><li>7Б <a href="http://l-temulentum.livejournal.com/43564.html">"имени Антохиной"</a>
</li><li>11Б <a href="http://www.popovm.ru/index.php?id=33">"Бегемот"</a>
</li><li>36Б Савенков <a href="http://savenkov.livejournal.com/159188.html">часть 1</a>, <a href="http://savenkov.livejournal.com/159260.html">часть 2</a>
</li><li>52Б <a href="http://dw.school2.ru/mb/mmb2007.php">"Сингулярность"</a>
</li><li>72Б <a href="http://diary.ru/~Kiryusha/?comments&postid=28845571">"Valkyria"</a>
</li><li>104Б "Дора Vik" <a href="http://osetrov-les.livejournal.com/8568.html">раз</a>, <a href="http://osetrov-les.livejournal.com/8841.html">два</a>
</li><li>109Б <a href="http://dina-s-fizteha.livejournal.com/38733.html">"Пси-функция"</a>
</li><li>157Б <a href="http://www.bike4u.ru/forum/index.php?showtopic=1850&pid=9914&st=0">"Bike4u-3x9 Клетчатый"</a>
</li><li>199Б <a href="http://irbis-olga.livejournal.com/34638.html">"Безенгийские друзья"</a> 
</li><li>225Б <a href="http://leonid-fishkis.livejournal.com/34209.html">Леонид Фишкис</a> и 289Б Михаил Агеев
</li><li>243Б <a href="http://blogs.mail.ru/mail/anenkov_a/76594E76B8E8267D.html">"Otaku"</a>
</li><li>597Б "Юнитекс" <a href="http://vonok.livejournal.com/1230.html">подготовка</a>, <a href="http://vonok.livejournal.com/1402.html">рассказ</a>
</li><li>???Б <a href="http://la-pinist.livejournal.com/43530.html">la_pinist</a> (с фотографиями)
</li><li>18Б "Cosa Nostra", 30Б "Заяц-одиночка", 328Б "Алмазный палец", 329Б "Шурик" - <a href="http://tourism.bmstu.ru/index.php?option=com_simpleboard&Itemid=87&func=view&id=12707&catid=8&limit=14&limitstart=25">на форуме турклуба МГТУ</a>
</li><li>X-Race <a href="http://www.x-race.msk.ru/news.php?item.465.1">Новость</a>
</li></ul>
</td></tr>


<tr><th><font size="+1"><a name="06o">ММБ06-Осень, Хорошово - Пески, 28-29 октября 2006 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://l-temulentum.livejournal.com/28837.html"> Шульгин Максим, команда Мокрое тело (1Б) </a>
</li><li><a href="http://osetrov-les.livejournal.com/9974.html"> Осетров Виктор, команда Dora Vik (2Б) </a>
</li><li><a href="http://dw.school2.ru/mb/mmb2006o.php"> Васильев Евгений, команда Сингулярность (7Б) </a>
</li><li><a href="http://ivanaxe.livejournal.com/9418.html"> Лысов Иван, команда Лямбда (МФТИ) (10Б) </a>
</li><li><a href="http://countff.livejournal.com/35641.html"> Кожевников Сергей, команда x3 (17А) </a>
</li><li><a href="http://dina-s-fizteha.livejournal.com/28078.html"> Любимова Дина, команда Пси-функция (21Б) </a>
</li><li><a href="http://dmitrytoda.livejournal.com/6399.html"> Долгов Дмитрй, команда Тода (МФТИ) (100Б) </a>
</li><li><a href="http://www.diary.ru/~Kroko/?comments&postid=18290221"> Дильдин Николай, команда Шалтай-Балтай (108А) </a>
</li><li><a href="http://revizzor.livejournal.com/13711.html"> Слесарев Антон, команда gang-bang.лысый(МФТИ) (141Б) </a>
</li><li><a href="http://pit-spa.livejournal.com/98897.html"> Селезенев Пётр, команда Дикие ползуны (215А) </a>
</li><li><a href="http://shmel1975.livejournal.com/15639.html"> Что случилось с ММБ за полгода?, Караман Сергей, команда ULEY  (293А) </a>
</li><li><a href="http://shmel1975.livejournal.com/16412.html"> Отчёт, Караман Сергей, команда ULEY  (293А) </a>
</li><li><a href="http://community.livejournal.com/_mmb_/25718.html"> Култаев Илья, команда ТК Перово-1 (327А) </a>
</li><li><a href="http://www.x-race.msk.ru/news.php?extend.209"> Жилин Денис, команда Пенелопа-Marmot(М) (348Б) </a>
</li><li><a href="http://svetlaychok.mylj.ru/20463.html"> Монастырская Светлана, команда Kant Deuter WST (379Б) </a>
</li><li><a href="http://gabryel.livejournal.com/7340.html"> Ершова Анна, команда Пингвины Мадагаскара (425А) </a>
</li><li><a href="http://pingv-in.livejournal.com/8632.html"> Ершова Татьяна, команда Пингвины Мадагаскара (425А) </a>
</li><li><a href="http://svetlyi-lob.livejournal.com/419.html"> Панкратов Александр, команда Пешеход (506А) </a>
</li><li><a href="http://community.livejournal.com/_mmb_/30199.html"> Гудков Олег, команда Восток-Запад (534А) </a>
</li><li><a href="http://eeonw.livejournal.com/827.html"> Начало отчёта, команда GARMIN (572A) </a>
</li><li><a href="http://mik-orient.livejournal.com/4020.html"> Савченко Михаил, команда GARMIN (572A) </a>
</li><li><a href="http://community.livejournal.com/_mmb_/28786.html"> Кучер Сергей, команда ЛКТ - Поиск (603Б) </a>
</li><li><a href="http://kopen-zla.livejournal.com/39200.html"> Отчёт о дистанции Б </a>
</li><li>X-Race <a href="http://www.x-race.msk.ru/comment.php?comment.news.213">Новость</a>;
<a href="http://www.x-race.msk.ru/news.php?item.216.1">Интервью</a> с  Даниилом Поповым
</li></ul>

<h3>Фотографии</h3>
<ul>
<li><a href="http://photofile.ru/users/stas82/2215479/"> Трек и фотографии, команда Туристы из Урюпинска (53А) </a>
</li><li><a href="http://photofile.ru/users/alymovroman/2234352/"> Алымов Роман (309Б)</a>
</li><li><a href="http://poga.westra.ru/where/mmb2006/mmb06a.html"> Команда Вестра-Пога (380А) </a>
</li><li><a href="http://photofile.ru/users/marinakim/2224473/"> Фотографии участников, Ким Марина (369Б) </a>
</li><li><a href="http://community.livejournal.com/_mmb_/29643.html"> Панорамы с ММБ </a>
</li></ul>

<h3>GPS-данные</h3>
<ul>
<li><a href="http://photofile.ru/users/stas82/2215479/"> Трек и фотографии, команда Туристы из Урюпинска (53А) </a>
</li><li><a href="http://community.livejournal.com/_mmb_/23720.html"> Трек на карте, Караман Сергей, команда ULEY  (293А) </a>
</li><li><a href="http://poga.westra.ru/where/mmb2006/mmb06a.zip">Трек для OziExplorer, команда Вестра-Пога (380А) </a>
</li><li><a href="http://poga.westra.ru/where/mmb2006/mmb06a.kmz">Трек для Google Earth, команда Вестра-Пога (380А) </a>
</li><li><a href="http://www.x-race.msk.ru/gadget/cgi-bin/reitti.cgi?act=map&id=4&kieli="> Пути команд, сервис RouteGadget на сайте www.x-race.ru </a>
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="06v">ММБ06, пл.90 км - Балакирево, 13-14 мая 2006 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://ladova.livejournal.com/76713.html">Укладова Александра (1А)</a>
</li><li><a href="http://ladova.livejournal.com/76939.html">Укладова Александра (1А), техническое</a>
</li><li><a href="http://rgu.livejournal.com/300347.html">Гусарев Роман, команда 112 (12Б)</a>
</li><li><a href="http://izib.livejournal.com/7120.html">Антон Сорокин, команда ОтМорозки (27Б)</a>
</li><li><a href="http://photofile.ru/users/izib/1302713/"> Антон Сорокин, команда ОтМорозки (27Б), фотографии</a>
</li><li><a href="http://bereznitsky.livejournal.com/12057.html">Березницкий Сергей (37Б)</a>
</li><li><a href="http://janelis.livejournal.com/47530.html">Лисовская Евгения (38А)</a>
</li><li><a href="http://photofile.ru/users/olgamru/1303897/">команда 45-А "Безенгийские друзья", фотографии</a>
</li><li><a href="http://irbis-olga.livejournal.com/22602.html">команда 45-А "Безенгийские друзья", фото и небольшой комментарий </a>
</li><li><a href="http://irbis-olga.livejournal.com/23055.html">команда 45-А "Безенгийские друзья", обсуждение</a>
</li><li><a href="http://dw.school2.ru/mb/mmb2006.php">Евгений Васильев, команда Сингулярность (57Б)</a>
</li><li><a href="http://www.x-race.msk.ru/page.php?71">Жилина Анна, команда Пенелопа-Мармот (58Б)</a>
</li><li><a href="http://ilance.livejournal.com/14920.html">Егорова Марина, команда КТПшники (60А), впечатления, фото</a>
</li><li><a href="http://photofile.ru/users/denzhilin/1303191/">Ден Жилин, команда Пенелопа-Мармот (67Б), фотографии</a>
</li><li><a href="http://marinakim.livejournal.com/37088.html">Ким Марина, команда kettler (81А)</a>
</li><li><a href="http://photofile.ru/users/marinakim/1206051/">Ким Марина, команда kettler (81А), фото</a>
</li><li><a href="http://photofile.ru/users/altervesta/">Когут Арсений, команда Красный путь (133А), фото</a>
</li><li><a href="http://slazav.mccme.ru/mmb06lr.htm">Ракунов Алексей, команда Пернатый Спецназ (151Б)</a>
</li><li><a href="http://www.livejournal.com/users/pit_spa/76249.html">Селезенев Пётр, команда Дикие ползуны (168А)</a>
</li><li><a href="http://revizzor.livejournal.com/9599.html">Баинхараев Батр, команда Любое слово (175А)</a>
</li><li><a href="http://forsale666.narod.ru/mmb2006_foto.html">команда Жесть (МИФИ) (213А), фото</a>
</li><li><a href="http://l-temulentum.livejournal.com/15051.html">Шульгин Максим, команда Мокрое тело (216Б)</a>
</li><li><a href="http://users.livejournal.com/_vasay/9114.html">Ломакин Василий, команда Genius Loci (238А)</a>
</li><li><a href="http://osetrov-les.livejournal.com/9332.html">Осетров Виктор, команда Dora (254Б)</a> (<a href="http://osetrov-les.livejournal.com/9694.html">ещё</a>)
</li><li><a href="http://ankey.alvis.ru/mmb2006.html">Бурцев Алексей, команда Игога (194Б)</a>
</li><li><a href="http://slazav.mccme.ru/mmb06ka.htm">Казанцев Алексей, команда МГУ НЕ-ЯМР (255)</a>
</li><li><a href="http://globalsquid.com/devel44/ssdb/rus/mmb2006a.html">команда МГУ-Балбесы (287А)</a>
</li><li><a href="http://stalker-rea.livejournal.com/5471.html">Рудомёткин Егор, команда Stalker(МФТИ) (297Б)</a>
</li><li><a href="http://korali.livejournal.com/1725.html">Корценштейн Лиза, команда 355А</a>
</li><li><a href="http://slazav.mccme.ru/mmb06pa.htm">Панкратов Александр, команда 395Б</a>
</li><li><a href="http://shmel1975.narod.ru/060513.html">Караман Сергей, команда ULEY (417А)</a>
</li><li><a href="http://photofile.ru/users/denzhilin/1061587/27400739/">Пути команд Noname, Пенелопа-Мармот, ОтМорозки</a>
</li><li><a href="http://niosa-data1.narod.ru/mmb-2006/index.htm">Н.Осадчий (судья), фото</a>
</li><li><a href="http://photofile.ru/users/chu137/1305165/">А.Чупикин (судья), фото</a>
</li><li><a href="http://tourism.bmstu.ru/index.php?option=com_simpleboard&Itemid=87&func=view&id=8171&catid=8">обсуждение на форуме турклуба МГТУ</a>

</li></ul>
<h3>GPS-данные</h3>
<ul>
<li><a href="http://slazav.mccme.ru/gps/20060508at.zip"> Разведка ММБ2006, на север от Балакирево, 8 мая 2006, А.Тонис</a>
</li><li><a href="http://slazav.mccme.ru/gps/20060430wz.zip"> Разведка ММБ2006, кольцо от Балакирево, 30 апреля 2006, В.Завьялов</a>
</li><li><a href="http://slazav.mccme.ru/gps/20060423wz.zip"> Разведка ММБ2006, 90 км - Балакирево, 22-23 апреля 2006, В.Завьялов</a>
</li><li><a href="http://slazav.mccme.ru/gps/20060422at.zip"> Разведка ММБ2006, кольцо от Александрова, 22 апреля 2006, А.Тонис</a>
</li><li><a href="http://slazav.mccme.ru/gps/20060513as.zip"> Антон Сорокин, команда ОтМорозки (27Б)</a>
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="05o">ММБ05-lite, пл.Некрасовская - пл.Морозки, 29-30 ноября 2005 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://photofile.ru/album.php?id=640723">Александр Корнилов и Антон Сорокин, команда 5-Б От"Морозки", фотографии</a>
</li><li><a href="http://www.livejournal.com/users/chu137/1830.html">Андрей Чупикин (команда 8-Б Zлобный Чупикин)</a>
</li><li><a href="http://www.livejournal.com/users/rtkr/142711.html">Рита Красносельская (команда 15-Б Предки)</a>
</li><li><a href="http://www.livejournal.com/users/janemouse/375613.html">Женя Кац (команда 28-А Стайка)</a>
</li><li><a href="http://www.livejournal.com/users/janemouse/375849.html">продолжение</a>
</li><li><a href="http://www.livejournal.com/users/rgu/219452.html">Роман Гусарев (команда 37-А 112)</a>
</li><li><a href="http://www.livejournal.com/users/kalugin_andrey/6377.html">Андрей Калугин (команда 41-А Jekyll)</a>
</li><li><a href="http://photofile.ru/genres_images.php?id=25&user_id=77705">Денис Жилин, команда 61-Б Пенелопа, фотографии</a>
</li><li><a href="http://slazav.mccme.ru/mmb05lps.htm">А.Ракунов, С.Дедюлин, команда 55 Пернатый Спецназ</a>
</li><li><a href="http://www.livejournal.com/users/sardanapal/103663.html">Николай Кононов (команда 73-Б СКИФ-1)</a>
</li><li><a href="http://poga.westra.ru/where/mmb2005lite/mmb05l.html">Кижватов Илья (команда 85-А Вестра - Пога )</a>
</li><li><a href="http://www.livejournal.com/users/ilance/3927.html">Егорова Марина (команда 126-А КТПшники)</a>
</li><li><a href="http://dw.school2.ru/mb/mmb2005l.php">Евгений Васильев, команда No.134 Сингулярность</a>
</li><li><a href="http://www.livejournal.com/users/shg/14602.html">Шефель Геннадий (команда 141-A)</a>
</li><li><a href="http://photofile.ru/image.php?id=21122930">команда 191-А "Безенгийские друзья", фотографии</a>
</li><li><a href="http://www.livejournal.com/users/ded_mitry/486.html">Дмитрий Пирожков (команда 194-Б DSP)</a>
</li><li><a href="http://www.livejournal.com/users/amir/30262.html">Амирджанов Петр (команда 199-А F.A.R.)</a>
</li><li><a href="http://www.pvdotchet.narod.ru/051029_MMBL2005/apsny.htm">Максим Сандалов (команда 213)</a>
</li><li><a href="http://osetrov-les.livejournal.com/9203.html">Виктор Осетров (команда 305-Б Dora Vik)</a>
</li><li><a href="http://www.livejournal.com/users/vik_hunter/7313.html">Виктор Демин (команда 327-А ЗЛые Рейнджеры)</a>
</li><li><a href="http://tourism.bmstu.ru/index.php?option=content&task=view&id=425&Itemid=27">команда 274-Б Початки Сознания МГТУ</a>
</li><li><a href="http://tourism.bmstu.ru/index.php?option=content&task=view&id=423&Itemid=27">Андрей Зайцев (команда 173-Б zaya-МГТУ)</a>
</li><li><a href="http://photofile.ru/users/denzhilin/1061587/26214755/">Пути А.Бурлиновой, команды Пенелопа-4, А.Чупикина</a>
</li><li><a href="http://photofile.ru/album.php?id=1045770">Женя Домбровский (судья), фотографии</a>
</li><li><a href="http://slazav.mccme.ru/photo/mmb05l.htm">Слава Завьялов (судья), фотографии</a>
</li><li><a href="http://www.cir.ru/misha/mmb2005lite/index.htm">Миша Агеев (судья), фотографии</a>
</li></ul>
<h3>GPS-данные</h3>
<ul>
<li><a href="http://slazav.mccme.ru/gps/20051029ac.zip"> ММБ2005-lite, 29-30 октября, А.Чупикин (N 8)</a>
</li><li><a href="http://slazav.mccme.ru/gps/20051029wz.zip"> ММБ2005-lite, 29-30 октября, В.Завьялов (велоперемещения)</a>
</li><li><a href="http://slazav.mccme.ru/gps/20051022at.zip"> разведка ММБ2005-lite (Бухарово - Горки), 22-23 октября, А.Тонис</a>
</li><li><a href="http://slazav.mccme.ru/gps/20051022av.zip"> разведка ММБ2005-lite (Некрасовская - Бухарово), 22 октября, А.Веретенников</a>
</li><li><a href="http://slazav.mccme.ru/gps/20051022wz.zip"> разведка ММБ2005-lite (Некрасовская - Бухарово), 22 октября, В.Завьялов</a>
</li><li><a href="http://slazav.mccme.ru/gps/20051016av.zip"> разведка ММБ2005-lite (Некрасовская, оз.Нерское), 16 октября, А.Веретенников</a>
</li><li><a href="http://slazav.mccme.ru/gps/20051009at.zip"> разведка ММБ2005-lite (Морозки - Горки), 10 октября, А.Тонис</a>
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="05v">ММБ05, пл.Шаликово - г.Малоярославец, 27-29 мая 2005 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://www.livejournal.com/users/maximul/18904.html">Максим Ульяненков, команда 1 Суздаль</a>
</li><li><a href="http://www.livejournal.com/users/leonid_fishkis/8244.html">Леня Фишкис, команда 6 Киргизы</a>
</li><li><a href="http://www.livejournal.com/users/sardanapal/93158.html">Николая Кононов, команда 2 СКИФ-1</a>
</li><li><a href="http://www.livejournal.com/users/lightjedi/27966.html">Дима Ховратович, команда 12 "Раздолбаи" </a>
</li><li><a href="http://www.livejournal.com/users/rtkr/96714.html">Рита Красносельская, команда 22 Барышни</a>
</li><li><a href="http://slazav.mccme.ru/mmb05ak.htm">Команда 26 Донник (А.Куреев)</a>
</li><li><a href="http://www.livejournal.com/users/savenkov/102779.html">команда 30 МГУ - Савенков</a>
</li><li><a href="http://www.turclubmai.ru/heading/papers/1088/">команда 52 Светлый Путь - ТК МАИ</a>
</li><li><a href="http://www.livejournal.com/users/shg/11570.html">Шефель Геннадий, N78</a>
</li><li><a href="http://www.livejournal.com/users/shg/12211.html">продолжение</a>
</li><li><a href="http://www.livejournal.com/users/ladova/55094.html">А.Укладова, N84 Не - МЭИС</a>
</li><li><a href="http://www.livejournal.com/users/izib/302.html">А.Сорокин, N109 Рысь</a>
</li><li><a href="http://poga.westra.ru/where/mmb2005/mmb2005.html">команда 116 Пога</a>
</li><li><a href="http://www.livejournal.com/users/dima_i/35166.html">Команда 137 SFS</a>
</li><li><a href="http://www.livejournal.com/users/dormantiger/30400.html">команда 141 Зоопарк (Виктор Колесников)</a>
</li><li><a href="http://www.livejournal.com/users/janemouse/341834.html">команда 141 Зоопарк (Женя Кац)</a>
</li><li><a href="http://www.livejournal.com/users/rgu/165066.html">Роман Гусарев, команда 146 Susanin-team</a>
</li><li><a href="http://www.livejournal.com/users/gogabr/37684.html">Бронников Георгий, команда 164 Броуновское движение</a>
</li><li><a href="http://www.livejournal.com/users/burtsev/7614.html">Бурцев Алексей, команда 164 Броуновское движение</a>
</li><li><a href="http://www.osport.ru/articles/12">Артур Судариков, команда 174 САМ-плюс</a>
</li><li><a href="http://www.livejournal.com/users/murmashka/21931.html">команда 179 Единорожцы</a>
</li><li><a href="http://www.anabar.ru/mesta/mmb/mmb2005.htm">Команда 185 Anabar.RU</a>
</li><li><a href="http://www.livejournal.com/users/livemyth/4024.html">??</a>
</li><li><a href="http://www.fryazino.net/forum?post&fid=12&tid=70826&page=0">Обсуждение и впечатления на сайте www.fryazino.net</a>
</li><li><a href="http://slazav.mccme.ru/photo/mmb05.htm">Фотографии В.Завьялова, К.Шрамова, А.Сорокина</a>
</li></ul>
<h3>GPS-данные</h3>
<ul>
<li><a href="http://mmb.progressor.ru/gps/20041121at.zip"> разведка начала первого этапа, 2004/11/21, А.Тонис</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050508at.zip"> разведка второго этапа, 8-9 мая, А.Тонис</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050508a%D1%81.zip"> разведка второго этапа, 8-9 мая, А.Чупикин</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050514at.zip"> разведка первого этапа, 14-15 мая, А.Тонис</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050514wz.zip"> разведка первого этапа, 14-15 мая, В.Завьялов</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050515ac.zip"> разведка первого этапа, 15 мая, А.Чупикин</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050522wz.zip"> разведка второго этапа, 22 мая, В.Завьялов</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050527kp.zip"> официальное положение КП</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050527wz.zip"> велопереезды, 27-29 мая, В.Завьялов</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050527bm.zip"> трек команды 52 Светлый Путь - ТК МАИ, Б.Малахов</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050604at.zip"> снятие КП 7-20, 4 июня, А.Тонис</a>
</li><li><a href="http://mmb.progressor.ru/gps/20050605wz.zip"> снятие КП 1-3,  5 июня, В.Завьялов</a>
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="04o">ММБ04-lite, Жилево - Белопесоцкий, 30-31 октября 2004 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://turclub.progressor.ru/fotoalbums/show_foto.php?fa=24">Тимофей Орлов и Аня Булгакова, фотографии</a>
</li><li><a href="http://slazav.mccme.ru/04l_ac.htm">Андрей Чупикин (команда 7 Zлобные)</a>
</li><li><a href="http://www.livejournal.com/users/dima_i/18189.html">Дима Иванов (N9)</a>
</li><li><a href="http://www.avanturisty.ru/travel/2/storyDesc.htm">Александр Караванов (команда 15 CyberTravelRu)</a>
</li><li><a href="http://public.fotki.com/bybac/2004/2004_10_30-31_mmblite/">Саша Веретенников (N17 byBAC), фотографии:</a>
</li><li><a href="http://www.popovm.ru/index.php?id=30">Максим Попов (N22 Бегемот)</a>
</li><li><a href="http://www.livejournal.com/users/rtkr/33088.html">Рита Фишкис (команда 26 Предки)</a>
</li><li><a href="http://www.livejournal.com/users/savenkov/93746.html">Константин Савенков (N28)</a>
</li><li><a href="http://www.livejournal.com/users/sardanapal/70869.html">Кононов Николай (команда 31 СКИФ-1)</a>
</li><li><a href="http://www.skif.msk.ru/literature/mb2004lite.html">он же, с коммертариями С.Арановского:</a>
</li><li><a href="http://www.livejournal.com/users/janemouse/246742.html">Женя Кац (команда 39 Мышкин Дом)</a>
</li><li><a href="http://www.livejournal.com/users/janemouse/247997.html">продолжение</a>
</li><li><a href="http://www.livejournal.com/users/mish_a/379.html">Аня Чехлова (команда 59 Черепашки) ММБ-лайт для самых маленьких.</a>
</li><li><a href="http://www.livejournal.com/users/arvest/400.html">Леонид Мерзляков (N82)</a>
</li><li><a href="http://www.livejournal.com/users/rgu/84142.html">Гисарев Роман (команда 86 Сильные духом...)</a>
</li><li><a href="http://divenow.narod.ru/mb2004lite/mb2004lite.html">команда 95 Гонцы за вином</a>
</li><li><a href="http://www.livejournal.com/users/bereznitsky/5428.html">Березницкий Сергей (N96)</a>
</li><li><a href="http://www.livejournal.com/users/lightjedi/13340.html">Буряков Михаил (команда 99 Раздолбаи)</a>
</li><li><a href="http://nikserega.newmail.ru/news/marsh2004.htm">Сергей Никитин (команда 120 Искатель)</a>
</li><li><a href="http://slazav.mccme.ru/04l_kk.htm">Кирилл Кочергин (команда 150 Marmot)</a>
</li><li><a href="http://x-team.ru/?TextView&ID=505">то же, но с фотографиями!</a>
</li><li><a href="http://www.livejournal.com/users/ladova/33296.html">Александра Укладова (команда 179 Тайная тропа)</a>
</li><li><a href="http://www.geolink-group.com/tourclub/phorum/read.php?f=1&i=1215&t=1215">Обсуждение на форуме Горного Турклуба МГУ:</a>
</li><li><a href="http://turclub.progressor.ru/phpBB2/viewtopic.php?t=128">Обсуждение на форуме КВТ МГУ:</a>
</li><li><a href="http://www.livejournal.com/community/slazav_news/31105.html">Разные комментарии</a>
</li></ul>
<h3>GPS-данные</h3>
<ul>
<li><a href="http://slazav.mccme.ru/gps/20041003wz.zip">В.Завьялов, разведка 3 октября</a>
</li><li><a href="http://slazav.mccme.ru/gps/20041010wz.zip">В.Завьялов, разведка 10 октября</a>
</li><li><a href="http://slazav.mccme.ru/gps/20041030ac.zip">Андрей Чупикин (команда 7 Zлобные)</a>
</li><li><a href="http://slazav.mccme.ru/gps/20041030av.zip">Саша Веретенников (N17 byBAC)</a>
</li><li><a href="http://slazav.mccme.ru/gps/20041030dw.zip">Борис Малахов (команда 149 Прямой Путь)</a>
</li><li><a href="http://slazav.mccme.ru/gps/20041030at.zip">А.Тонис, судья</a>
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="04v">ММБ04, пл.Морозки - пл.Семхоз, 21-23 мая 2004 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://travel.cyber.ru/Tour/CyberTravel/MMB2004.htm">команда  5 TravelCyberRu1</a>
</li><li><a href="http://slazav.mccme.ru/mmb04lf.htm">команда  7 Л.Фишкис</a>
</li><li><a href="http://slazav.mccme.ru/mmb04ak.htm">команда 14 А.Куреев</a>
</li><li><a href="http://www.marsh2003.narod.ru/my_mmb2004.htm">команда 38 Крякозяблы</a>
</li><li><a href="http://www.livejournal.com/users/alishka/109016.html">команда 59 Ловцы жуков</a>
</li><li><a href="http://www.livejournal.com/users/gogabr/21219.html">команда 65 Броуновское движение</a>
</li></ul>
<h3>GPS-данные</h3>
<ul>
<li><a href="http://slazav.mccme.ru/gps/20031206at.zip"> разведка 6 декабря, А.Тонис</a>
</li><li><a href="http://slazav.mccme.ru/gps/20040515ac.zip"> разведка 14-16 мая, А.Чупикин</a>
</li><li><a href="http://slazav.mccme.ru/gps/20040515at.zip"> разведка 14-16 мая, А.Тонис</a>
</li><li><a href="http://slazav.mccme.ru/gps/20040515wz.zip"> разведка 14-16 мая, В.Завьялов</a>
</li><li><a href="http://slazav.mccme.ru/gps/20040521av.zip"> команда 18 А.Веретенников</a>
</li><li><a href="http://slazav.mccme.ru/gps/20040521az.zip"> команда 49 Азафус</a>
</li><li><a href="http://slazav.mccme.ru/gps/20040521ur.zip"> команда 62 МГУ-Ураган</a>
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="03o">ММБ03-lite, дер.Всходы - дер.Починки, 1-2 ноября 2003 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://slazav.mccme.ru/photo/20031102/index.htm"> фотографии</a>
</li></ul>
</td></tr>

<tr><th><font size="+1"><a name="03v">ММБ03, пл.Дубосеково - пл.91км, 24-25 мая 2003 года</a></font></th>
</tr><tr><td>
<ul>
<li><a href="http://slazav.mccme.ru/mmb2003r.htm"> фотографии, впечатления участников</a>
</li><li><a href="http://poga.westra.ru/where/pogalife/mmb.html"> команда 23 Пога</a>
</li></ul>
</td></tr>

</tbody></table>

</p></body></html>