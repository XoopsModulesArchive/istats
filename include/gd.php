<?php

/***************************************************************************
 * Xoops i-stats module
 *
 * Ported to xoops 2 by sylvainb
 * http://123rando.com
 *
 * Version 1.00
 *
 ***************************************************************************
 *
 * E-Xoops i-Stats module
 *
 * Scripters i-Stats module
 * Version 1.00
 *
 * author Paul Cooke <paul_sw19@yahoo.com>
 * http://paul-cooke.com
 *
 * copyright
 * Copyright (c) 2003 Paul Cooke <paul_sw19@yahoo.com>
 *
 * license
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */

/***************************************************************************
 * PHP i-Stats Version 1.5
 * -------------------------------
 * Developed By Sam Tang (sam@hkscript.com)
 * License : GNU Public License (GPL)
 * Homepage : http://hkscript.com
 ***************************************************************************/
/*
// get result from mysql
function getResult($query) {

    $result = $GLOBALS['xoopsDB']->queryF($query);
    $row = $GLOBALS['xoopsDB']->fetchBoth($result);
    while($row != NULL) {
        $data[] = $row;
        $row = $GLOBALS['xoopsDB']->fetchBoth($result);
    }

    if (isset($data)) {
        return $data;
    }
}
*/
if (function_exists('imagecreate')) {  // only run if gd installed
    require dirname(__DIR__, 3) . '/mainfile.php';

    require_once __DIR__ . '/getresult.php';

    $db_link = mysql_connect(XOOPS_DB_HOST, XOOPS_DB_USER, XOOPS_DB_PASS);

    mysqli_select_db($GLOBALS['xoopsDB']->conn, XOOPS_DB_NAME, $db_link);

    $per_hour_info = getResult('select * from ' . XOOPS_DB_PREFIX . '_is_hour order by hour');

    $sum_hour = getResult('select sum(count) as sum from ' . XOOPS_DB_PREFIX . '_is_hour');

    $max_hour = getResult('select max(count) as max from ' . XOOPS_DB_PREFIX . '_is_hour');

    $days = getResult('select count(distinct date) as days from ' . XOOPS_DB_PREFIX . '_is_daycount');

    $today_max = getResult('select max(count) as max from ' . XOOPS_DB_PREFIX . '_is_today_hour');

    if ($sum_hour[0]['sum'] > 0) {
        $max_percent = $max_hour[0]['max'] / $sum_hour[0]['sum'];

        $max_visit = $sum_hour[0]['sum'] * $max_percent / $days[0]['days'];

        if ($max_visit < $today_max[0]['max']) {
            $max_visit = $today_max[0]['max'];
        }
    } else {
        $max_visit = 0;
    }

    for ($i = 0, $iMax = count($per_hour_info); $i < $iMax; $i++) {
        if ($sum_hour[0]['sum'] > 0) {
            $hour_percent = $per_hour_info[$i]['count'] / $sum_hour[0]['sum'];

            $hour_visit[$i] = $sum_hour[0]['sum'] * $hour_percent / $days[0]['days'];
        } else {
            $hour_visit[$i] = 0;
        }
    }

    header('Content-type: image/png');

    $im = imagecreate(625, 260);

    $background_color = imagecolorallocate($im, 189, 199, 231);

    $col = imagecolorallocate($im, 189, 199, 231);

    $line_col = imagecolorallocate($im, 0, 0, 0);

    $red = imagecolorallocate($im, 255, 0, 0);

    $color_black = imagecolorallocate($im, 0, 0, 0);

    $count = 0;

    for ($i = 0; $i < 224; $i += 25) {
        if ($count % 2) {
            $col = imagecolorallocate($im, 189, 199, 231);
        } else {
            $col = imagecolorallocate($im, 206, 211, 239);
        }

        imagefilledrectangle($im, 0, $i, 625, $i + 25, $col);

        $count++;
    }

    // $max_visit = sprintf("%.0f", $max_visit);

    imagestring($im, 2, 2, 5, "dzisiaj max: $max_visit", $color_black);

    imagestring($im, 2, 2, 20, 'srednia linia wizyt: ------', $red);

    //$max_visit = 5;

    $avg_visit = $max_visit / 8;

    // $avg_visit = sprintf("%.0f", $avg_visit);

    if ($max_visit < 8) {
        $num_sec = 44 - 200 / $max_visit;

        for ($i = 0; $i < $max_visit; $i++) {
            $num_sec += 200 / $max_visit;

            $str_loca = $num_sec;

            $str = $max_visit - $i;

            if ($str > 0) {
                imagestring($im, 2, 2, $str_loca, "$str >>", $color_black);
            }
        }
    } else {
        $num_sec = 19;

        $str_temp = '';

        for ($i = 0; $i < 8; $i++) {
            $num_sec += 25;

            $str_loca = $num_sec;

            $str = floor($max_visit - $avg_visit * $i);

            if (($str !== $str_temp) and ($str > 0)) {
                imagestring($im, 2, 2, $str_loca, "$str >>", $color_black);
            }

            $str_temp = $str;
        }
    } //else < 8

    //imagestring($im, 2, 2, 245, "0", $color_black);

    $x = 37;

    for ($i = 0, $iMax = count($hour_visit); $i < $iMax; $i++) {
        if ($max_visit > 0) {
            $y = $hour_visit[$i] / $max_visit * 200;
        } else {
            $y = 0;
        }

        $y = 220 - $y;

        $y_id = $i + 1;

        if ($y_id < count($hour_visit)) {
            if ($max_visit > 0) {
                $y2 = $hour_visit[$y_id] / $max_visit * 200;
            } else {
                $y2 = 0;
            }
        } else {
            if ($max_visit > 0) {
                $y2 = $hour_visit[0] / $max_visit * 200;
            } else {
                $y2 = 0;
            }
        }

        $y2 = 220 - $y2;

        $x2 = $x + 25;

        imageline($im, $x, $y, $x2, $y2, $red);

        $x += 25;
    }

    imagepng($im);

    imagedestroy($im);
}
