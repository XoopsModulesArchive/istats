<?php

/***************************************************************************
 * Xoops i-stats module
 *
 * Ported to xoops 2 by sylvainb
 * http://123rando.com
 *
 * Version 2.1    sam jun 12 17:20:57 CEST 2004
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

require_once __DIR__ . '/getresult.php';

// count the information that show on summary
function CountDays()
{
    global $xoopsDB, $xoopsModule, $xoopsConfig;

    $date = date('Y-m-d');

    $week = date('W');

    $mth = date('m');

    $year = date('Y');

    $days = getResult('select count(distinct date) as count from ' . $xoopsDB->prefix('is_daycount') . '');

    $result['days'] = $days[0]['count'];

    $total_visits = getResult('select * from ' . $xoopsDB->prefix('is_count') . '');

    $result['total'] = $total_visits[0]['count'];

    if ($result['total'] > 0) {
        $result['ava_day'] = $result['total'] / $result['days'];

        $result['ava_hour'] = $result['ava_day'] / 24;

        $result['ava_week'] = $result['ava_day'] * 7;

        $result['ava_mth'] = $result['ava_day'] * 30;
    } else {
        $result['ava_day'] = 0;

        $result['ava_hour'] = 0;

        $result['ava_week'] = 0;

        $result['ava_mth'] = 0;

        $result['total'] = 0;
    }

    $max_date = getResult('select * from ' . $xoopsDB->prefix('is_daycount') . ' order by daycount desc limit 1');

    if ($max_date) {
        $result['max_date'] = strtotime($max_date[0]['date']);

        $result['max_daycount'] = $max_date[0]['daycount'];
    } else {
        $result['max_date'] = '------';

        $result['max_daycount'] = 0;
    }

    $today = getResult('select daycount from ' . $xoopsDB->prefix('is_daycount') . " where date='$date'");

    $this_week = getResult('select count from ' . $xoopsDB->prefix('is_week_count') . " where week='$week' and year='$year'");

    $this_mth = getResult('select count from ' . $xoopsDB->prefix('is_mth') . " where mth='$mth' and year='$year'");

    if ($today) {
        $result['today'] = $today[0]['daycount'];
    } else {
        $result['today'] = 0;
    }

    if ($this_week) {
        $result['this_week'] = $this_week[0]['count'];
    } else {
        $result['this_week'] = 0;
    }

    if ($this_mth) {
        $result['this_mth'] = $this_mth[0]['count'];
    } else {
        $result['this_mth'] = 0;
    }

    $max_week = getResult('select * from ' . $xoopsDB->prefix('is_week_count') . ' order by count desc limit 1');

    $max_mth = getResult('select * from ' . $xoopsDB->prefix('is_mth') . ' order by count desc limit 1');

    if ($max_week) {
        $result['max_week_w'] = $max_week[0]['week'];

        $result['max_week_y'] = $max_week[0]['year'];

        $result['max_weekcount'] = $max_week[0]['count'];
    } else {
        $result['max_week'] = '------';

        $result['max_weekcount'] = 0;
    }

    if ($max_mth) {
        $result['max_mth_m'] = $max_mth[0]['mth'];

        $result['max_mth_y'] = $max_mth[0]['year'];

        $result['max_mthcount'] = $max_mth[0]['count'];
    } else {
        $result['max_mth'] = '------';

        $result['max_mthcount'] = 0;
    }

    /**
     * @changelog
     * v1.02 Total pages served can be displayed in counter.
     */

    $totalpages = getResult('select sum(count) as total from ' . $xoopsDB->prefix('is_page') . '');

    $result['totalpages'] = $totalpages[0]['total'];

    ///////

    return $result ?? null;
}

function ShowDays()
{
    $date = date('Y-m-d');

    $mth = [1 => '31', 2 => '28', 3 => '31', 4 => '30', 5 => '31', 6 => '30', 7 => '31', 8 => '31', 9 => '30', 10 => '31', 11 => '30', 12 => '31'];

    $date = explode('-', $date);

    if ($date[2] < 30) {
        $start_day = $date[2] + 1;

        if ($date[1] > 1) {
            $start_month = $date[1] - 1;

            $start_year = $date[0];
        } else {
            $start_month = 12;

            $start_year = $date[0] - 1;
        }

        $count = $start_day;

        $end_day = $mth[$start_month];

        $leap = $date[0] % 4;

        if (2 == $start_month && $leap) {
            $end_day++;
        }

        $check_end = 0;

        while ($count <= $end_day) {
            $days[] = $start_year . '-' . $start_month . '-' . $count;

            $count++;

            $check_end++;
        }

        $new_day = 1;

        for ($i = $check_end; $i <= 30; $i++) {
            $days[] = $date[0] . '-' . $date[1] . '-' . $new_day;

            $new_day++;
        }
    } else {
        for ($i = 0; $i < $date[2]; $i++) {
            $new_day = 1;

            $new_day += $i;

            $days[] = $date[0] . '-' . $date[1] . '-' . $new_day;
        }
    }

    return $days;
}

function CountAvg($item)
{
    global $xoopsDB;

    if ('hour' == $item) {
        $hour = getResult('select * from ' . $xoopsDB->prefix('is_hour') . ' order by hour');

        $hour_sum = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_hour') . '');

        for ($i = 0, $iMax = count($hour); $i < $iMax; $i++) {
            $result[$i] = $hour[$i]['count'] / $hour_sum[0]['sum'];

            $result[$i] = sprintf('%.0f', $result[$i]);
        }

        $result['sum'] = $hour_sum[0]['sum'];
    }

    return $result;
}

// this function used by print day, week and month
function PrintStats($sum, $max, $visit, $period, $d_bar = 380)
{
    $total_bar = $d_bar + 10;

    for ($i = 0; $i < $period; $i++) {
        if ($max > 0) {
            $percent = $visit[$i]['count'] / $sum * 100;

            $percent = sprintf('%.2f', $percent);

            $bar = $visit[$i]['count'] / $max * $d_bar;

            $bar = sprintf('%.0f', $bar);

            $bg_bar = $total_bar - $bar;
        } else {
            $percent = 0;

            $bar = 0;

            $bg_bar = $total_bar;
        }

        if ($i % 2) {
            $bg_color = "class='even'";
        } else {
            $bg_color = "class='odd'";
        }

        $result[$i]['percent'] = $percent;

        $result[$i]['bar'] = $bar;

        $result[$i]['bg_bar'] = $bg_bar;

        $result[$i]['bg_color'] = $bg_color;
    }

    return $result ?? null;
}
