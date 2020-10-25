<?php

/***************************************************************************
 * Xoops i-stats module
 *
 * Ported to xoops 2 by sylvainb
 * http://123rando.com
 *
 * Version 1.00
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
 *
 ***************************************************************************
 *
 * PHP i-Stats Version 1.5
 * -------------------------------
 * Developed By Sam Tang (sam@hkscript.com)
 * License : GNU Public License (GPL)
 * Homepage : http://hkscript.com
 ***************************************************************************/
$GLOBALS['xoopsOption']['template_main'] = 'istats_stats.html';

$xoopsTpl->assign('lang_by_weekday', _AM_BY_WEEKDAY);
$xoopsTpl->assign('lang_by_week', _AM_BY_WEEK);
$xoopsTpl->assign('lang_by_mth', _AM_BY_MTH);
$xoopsTpl->assign('lang_by_hour', _AM_BY_HOUR);
$xoopsTpl->assign('lang_by_page', _AM_BY_PAGE);
$xoopsTpl->assign('lang_by_day', _AM_BY_DAY);
$xoopsTpl->assign('lang_date_date', _AM_DATE_DATE);
$xoopsTpl->assign('lang_date_visits', _AM_DATE_VISITS);
$xoopsTpl->assign('lang_date_percent', _AM_DATE_PERCENT);

$month = ['01' => '31', '02' => '28', '03' => '31', '04' => '30', '05' => '31', '06' => '30', '07' => '31', '08' => '31', '09' => '30', '10' => '31', '11' => '30', '12' => '31'];
$this_mths = date('m');
$mths = $month[$this_mths];
$leap = date('L');
if ('2' == $this_mths && $leap > 0) {
    $mths++;
}
global $xoopsDB;
$mth = date('Y-m-');
$day_info = getResult('select distinct day, count from ' . $xoopsDB->prefix('is_mth_days') . " order by day limit $mths");
$day_total = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_mth_days') . '');
$day_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_mth_days') . ' order by day');
$day_result = PrintStats($day_total[0]['sum'], $day_max[0]['max'], $day_info, $mths);

for ($i = 0; $i < $mths; $i++) {
    $xoopsTpl->append('info_day', ['mth' => $mth, 'day' => $day_info[$i]['day'], 'count' => $day_info[$i]['count'], 'percent' => $day_result[$i]['percent'], 'bar' => $day_result[$i]['bar'], 'bgbar' => $day_result[$i]['bg_bar']]);
}

$xoopsTpl->assign('lang_wd7', _AM_WD_7);
$xoopsTpl->assign('lang_wd1', _AM_WD_1);
$xoopsTpl->assign('lang_wd2', _AM_WD_2);
$xoopsTpl->assign('lang_wd3', _AM_WD_3);
$xoopsTpl->assign('lang_wd4', _AM_WD_4);
$xoopsTpl->assign('lang_wd5', _AM_WD_5);
$xoopsTpl->assign('lang_wd6', _AM_WD_6);

global $xoopsDB;
$week_day = getResult('select * from ' . $xoopsDB->prefix('is_week') . ' order by day');
$week_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_week') . '');
$week_sum = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_week') . '');
for ($i = 0, $iMax = count($week_day); $i < $iMax; $i++) {
    if ($week_max[0]['max'] > 0) {
        $week_day_percent = $week_day[$i]['count'] / $week_sum[0]['sum'] * 100;

        $week_day_bar = $week_day[$i]['count'] / $week_max[0]['max'] * 160;
    } else {
        $week_day_percent = 0;

        $week_day_bar = 0;
    }

    $xoopsTpl->append('info_week_day', ['weekdayperc' => sprintf('%.0f', $week_day_percent), 'weekdaybar' => sprintf('%.0f', $week_day_bar), 'count' => $week_day[$i]['count']]);
}

for ($i = 0, $iMax = count($week_day); $i < $iMax; $i++) {
    $xoopsTpl->append('info_week_count', ['count' => $week_day[$i]['count']]);
}

$xoopsTpl->assign('lang_week_week', _AM_WEEK_WEEK);
$xoopsTpl->assign('lang_week_visits', _AM_WEEK_VISITS);

global $xoopsDB;
$year = date('Y');
$week_info = getResult('select distinct week, year, count from ' . $xoopsDB->prefix('is_week_count') . " where year='$year' order by id desc");
$week_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_week_count') . " where year='$year'");
$week_sum = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_week_count') . " where year='$year'");
$week_result = PrintStats($week_sum[0]['sum'], $week_max[0]['max'], $week_info, count($week_info));

for ($i = 0, $iMax = count($week_info); $i < $iMax; $i++) {
    $xoopsTpl->append('info_week', ['week' => $week_info[$i]['week'], 'year' => $year, 'count' => $week_info[$i]['count'], 'percent' => $week_result[$i]['percent'], 'bar' => $week_result[$i]['bar'], 'bgbar' => $week_result[$i]['bg_bar']]);
}
$xoopsTpl->assign('lang_mth_mth', _AM_MTH_VISITS);

global $xoopsDB;
$mth_info = getResult('select distinct mth, year, count from ' . $xoopsDB->prefix('is_mth') . " where year='$year' order by id desc");
$mth_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_mth') . " where year='$year'");
$mth_sum = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_mth') . " where year='$year'");

$mth_result = PrintStats($mth_sum[0]['sum'], $mth_max[0]['max'], $mth_info, count($mth_info));

for ($i = 0, $iMax = count($mth_info); $i < $iMax; $i++) {
    $xoopsTpl->append('info_mth', ['year' => $mth_info[$i]['year'], 'mth' => $mth_info[$i]['mth'], 'count' => $mth_info[$i]['count'], 'percent' => $mth_result[$i]['percent'], 'bar' => $mth_result[$i]['bar'], 'bgbar' => $mth_result[$i]['bg_bar']]);
}

global $xoopsDB;
$hour_info = getResult('select * from ' . $xoopsDB->prefix('is_hour') . ' order by hour');
$max_hour = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_hour') . '');
$total_hour = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_hour') . '');
if ($hour_info) {
    for ($i = 0, $iMax = count($hour_info); $i < $iMax; $i++) {
        if ($total_hour[0]['sum'] > 0) {
            $hour_percent = $hour_info[$i]['count'] / $max_hour[0]['max'] * 200;

            $hr_percent[] = $hour_info[$i]['count'] / $total_hour[0]['sum'] * 100;
        } else {
            $hour_percent = 0;

            $hr_percent[] = 0;
        }

        $xoopsTpl->append('img_hour_perc', ['imgperc' => sprintf('%.0f', $hour_percent)]);
    }
} else {
    echo '<td colspan="25" background="images/bg.bmp">&nbsp</td>';
}

$xoopsTpl->assign('lang_hr_hour', _AM_HR_HOUR);
$xoopsTpl->assign('lang_hr_visits', _AM_HR_VISITS);

if ($hour_info) {
    for ($i = 0, $iMax = count($hr_percent); $i < $iMax; $i++) {
        $xoopsTpl->append('hr_perc', ['hrperc' => sprintf('%.0f', $hr_percent[$i])]);
    }
} else {
    echo '<td colspan="24">&nbsp;</td>';
}
$xoopsTpl->assign('lang_p_page', _AM_P_PAGE);
$xoopsTpl->assign('lang_p_visits', _AM_P_VISITS);
$xoopsTpl->assign('lang_p_percent', _AM_P_PERCENT);
/**
 * @feature
 * Displays Top xx page requests
 */
global $xoopsDB;
$max = $xoopsModuleConfig['maxpage'];
$page_info = getResult('select distinct page, count from ' . $xoopsDB->prefix('is_page') . " WHERE page NOT LIKE '%istats%' order by count desc limit $max ");
$page_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_page') . '');
$page_sum = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_page') . '');
$page_result = PrintStats($page_sum[0]['sum'], $page_max[0]['max'], $page_info, count($page_info), 300);
for ($i = 0, $iMax = count($page_info); $i < $iMax; $i++) {
    $xoopsTpl->append('info_page', ['page' => $page_info[$i]['page'], 'count' => $page_info[$i]['count'], 'percent' => $page_result[$i]['percent'], 'bar' => $page_result[$i]['bar'], 'bgbar' => $page_result[$i]['bg_bar']]);
}
