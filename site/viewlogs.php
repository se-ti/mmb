<?php
/**
 * Created by PhpStorm.
 * User: Serge Titov
 * Date: 10.04.2016
 * Time: 17:46
 */

// Выходим, если файл был запрошен напрямую, а не через include
if (!isset($MyPHPScript)) return;
?>

<form name="LogsForm" action="<? echo $MyPHPScript; ?>" method="post">
    <input type="hidden" value="viewLogs" name="action"/>

    <div style="margin-bottom: 2ex;">

<?php

    // фильтруем типы ошибок и печатаем селект
    $allLevels = array(CMmbLogger::Trace, CMmbLogger::Debug, CMmbLogger::Info, CMmbLogger::Error, CMmbLogger::Critical);
    $levels = array();
    $rawLevels = mmb_validate($_REQUEST, 'levels', array());
    if (!is_array($rawLevels ))
    {
        print($rawLevels . "<br/>");
        $rawLevels = array($rawLevels);
    }


    foreach ($allLevels as $lev)
        if (in_array($lev, $rawLevels))
            $levels[] = $lev;

    print("Типы сообщений: <select name=\"levels\" size=\"5\" multiple style=\"margin-left: 10px; margin-right: 5px; vertical-align: top;\"
            onchange=\"document.LogsForm.submit();\">");
    foreach ($allLevels as $lev)
    {
        $sel = in_array($lev, $levels) ? ' selected="selected"' : '';
        print("<option value=\"$lev\"$sel>$lev</option>\n");
    }
    print("</select>\n\n");

    // фильтруем кол-во ошибок и печатаем селект
    $limit = mmb_validateInt($_REQUEST, 'num_rec', 100);
    print('Количество: <select name="num_rec" style="margin-left: 10px; margin-right: 5px;" onchange="document.LogsForm.submit();">');
    foreach (array(100, 500, 1000) as $lim)
    {
        $sel = $lim == $limit ? ' selected="selected"' : '';
        print("<option value=\"$lim\"$sel>$lim</option>\n");
    }
    print("</select>\n");

    print("</div>\n");


    $cond = count($levels) == 0 ? 'true' : "logs_level in ('" . implode("', '", $levels) . "')";

    $sql = "select logs_id, logs_level, user_id, logs_operation, logs_message, logs_dt from Logs 
        where $cond 
        order by logs_id desc 
        limit $limit";

    $Result = MySqlQuery($sql);

    print("<table class='std'>\n");
    print("<tr class='gray head'><th width='50'>id</th><th>Время</th><th>Уровень</th><th>Пользователь</th><th>Операция</th><th>Сообщение</th><th>Длительность</th></tr>\n");
    while ($Row = mysql_fetch_assoc($Result))
        print("<tr><td>{$Row['logs_id']}</td><td>" . $Row['logs_dt'] /*date("Y-m-d hh:mm:ss", $Row['logs_dt'])*/ . "</td><td>{$Row['logs_level']}</td><td>{$Row['user_id']}</td><td>{$Row['logs_operation']}</td><td>{$Row['logs_message']}</td><td> </td></tr>\n"); // <td>{$Row['logs_duration']}</td>

    mysql_free_result($Result);
    print("</table>");

?>
    </form>

