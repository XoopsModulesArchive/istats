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
 */

/***************************************************************************
 * PHP i-Stats Version 1.5
 * -------------------------------
 * Developed By Sam Tang (sam@hkscript.com)
 * License : GNU Public License (GPL)
 * Homepage : http://hkscript.com
 ***************************************************************************/

$GLOBALS['xoopsOption']['template_main'] = 'istats_summary.html';

$summary = CountDays();

$xoopsTpl->assign('lang_per_hour', _AM_PER_HOUR);
$xoopsTpl->assign('lang_by_today_hour', _AM_BY_TODAY_HOUR);
$xoopsTpl->assign('lang_stats_info', _AM_STATS_INFO);
$xoopsTpl->assign('lang_total_visits', _AM_TOTAL_VISITS);
$xoopsTpl->assign('total', $summary['total']);
$xoopsTpl->assign('lang_now', _AM_NOW);
if (1 == $xoopsModuleConfig['longdate']) {
    $xoopsTpl->assign('date_now', date('d/m/Y G:i'));
} else {
    $xoopsTpl->assign('date_now', date('Y/n/d g:i a'));
}
$xoopsTpl->assign('lang_today', _AM_TODAY);
$xoopsTpl->assign('today', $summary['today']);
$xoopsTpl->assign('lang_ave_day', _AM_AVE_DAY);
$xoopsTpl->assign('ava_day', sprintf('%.0f', $summary['ava_day']));
$xoopsTpl->assign('lang_today', _AM_TODAY);
$xoopsTpl->assign('today', $summary['today']);
$xoopsTpl->assign('lang_ave_day', _AM_AVE_DAY);
$xoopsTpl->assign('ava_day', sprintf('%.0f', $summary['ava_day']));
$xoopsTpl->assign('lang_this_week', _AM_THIS_WEEK);
$xoopsTpl->assign('this_week', $summary['this_week']);
$xoopsTpl->assign('lang_ave_week', _AM_AVE_WEEK);
$xoopsTpl->assign('ava_week', sprintf('%.0f', $summary['ava_week']));
$xoopsTpl->assign('lang_this_mth', _AM_THIS_MTH);
$xoopsTpl->assign('this_mth', $summary['this_mth']);
$xoopsTpl->assign('lang_ave_mth', _AM_AVE_MTH);
$xoopsTpl->assign('ava_mth', sprintf('%.0f', $summary['ava_mth']));
$xoopsTpl->assign('lang_total_days', _AM_TOTAL_DAYS);
$xoopsTpl->assign('days', $summary['days']);
$xoopsTpl->assign('lang_ave_hour', _AM_AVE_HOUR);
$xoopsTpl->assign('ava_hour', sprintf('%.2f', $summary['ava_hour']));
$xoopsTpl->assign('lang_max_daycount', _AM_MAX_DAYCOUNT);
$xoopsTpl->assign('max_daycount', $summary['max_daycount']);
$xoopsTpl->assign('lang_max_date', _AM_MAX_DATE);
if (1 == $xoopsModuleConfig['longdate']) {
    $summary['max_date'] = date('d-m-Y', $summary['max_date']);
} else {
    $summary['max_date'] = date('Y-n-d', $summary['max_date']);
}
$xoopsTpl->assign('max_date', $summary['max_date']);
$xoopsTpl->assign('lang_max_weekcount', _AM_MAX_WEEKCOUNT);
$xoopsTpl->assign('max_weekcount', $summary['max_weekcount']);
$xoopsTpl->assign('lang_max_week', _AM_MAX_WEEK);
if (1 == $xoopsModuleConfig['longdate']) {
    $summary['max_week'] = '#' . $summary['max_week_w'] . '&nbsp;&nbsp;&nbsp;' . $summary['max_week_y'];
} else {
    $summary['max_week'] = $summary['max_week_y'] . '&nbsp;&nbsp;&nbsp;#' . $summary['max_week_w'];
}
$xoopsTpl->assign('max_week', $summary['max_week']);
$xoopsTpl->assign('lang_max_mthcount', _AM_MAX_MTHCOUNT);
$xoopsTpl->assign('max_mthcount', $summary['max_mthcount']);
$xoopsTpl->assign('lang_max_mth', _AM_MAX_MTH);
if (1 == $xoopsModuleConfig['longdate']) {
    $summary['max_mth'] = $summary['max_mth_m'] . '/' . $summary['max_mth_y'];
} else {
    $summary['max_mth'] = $summary['max_mth_y'] . '/' . $summary['max_mth_m'];
}
$xoopsTpl->assign('max_mth', $summary['max_mth']);
$xoopsTpl->assign('lang_forecast', _AM_FORECAST);
$xoopsTpl->assign('lang_ave', AM_AVE);

global $xoopsDB;
$per_hour_info = getResult('select * from ' . $xoopsDB->prefix('is_hour') . ' order by hour');
$sum_hour = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_hour') . '');

for ($i = 0, $iMax = count($per_hour_info); $i < $iMax; $i += 2) {
    $check_no = $i + 2;

    for ($j = $i; $j < $check_no; $j++) {
        if ($sum_hour[0]['sum'] > 0) {
            $per_hour_percent = $per_hour_info[$j]['count'] / $sum_hour[0]['sum'] * 100;
        } else {
            $per_hour_percent = 0;
        }

        $xoopsTpl->append('hour_info', ['hour' => $per_hour_info[$j]['hour'], 'percent' => sprintf('%.2f', $per_hour_percent)]);
    }
}
$xoopsTpl->assign('lang_per_hour', _AM_PER_HOUR);

$cur_hour = date('H');
$date = date('Y-m-d');
$cur_visits = getResult('select * from ' . $xoopsDB->prefix('is_daycount') . " where date='$date'");
$hour_info = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_hour') . " where hour between '00' and '$cur_hour'");
$hour_sum = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_hour') . '');

if ($hour_sum[0]['sum'] > 0) {
    $today_hour_percent = $hour_info[0]['sum'] / $hour_sum[0]['sum'];

    $cur_percent = $today_hour_percent * 100;

    if ($today_hour_percent > 0) {
        $today_hits = $cur_visits[0]['daycount'] / $today_hour_percent;
    } else {
        $today_hits = 0;
    }
} else {
    $cur_percent = 0;

    $today_hits = 0;
}
$xoopsTpl->assign('cur_percent', sprintf('%.0f', $cur_percent));
$curvisits = $cur_visits[0]['daycount'];

$hour_info = getResult('select * from ' . $xoopsDB->prefix('is_today_hour') . ' order by hour');
$total_hour = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_today_hour') . '');
$max_hour = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_hour') . '');
if ($max_hour[0]['max'] > 0) {
    $max_hour = $max_hour[0]['max'] / $summary['days'];
} else {
    $max_hour = 0;
}

if ($max_hour > $total_hour[0]['max']) {
    $max_hour = sprintf('%.0f', $max_hour);
} else {
    $max_hour = $total_hour[0]['max'];
}

if ($hour_info) {
    for ($i = 0, $iMax = count($hour_info); $i < $iMax; $i++) {
        if ($total_hour[0]['max'] > 0) {
            $hour_percent = $hour_info[$i]['count'] / $max_hour * 200;
        } else {
            $hour_percent = 0;
        }

        $xoopsTpl->append('hour_percent', ['percent' => sprintf('%.0f', $hour_percent)]);
    }
}

if ($hour_info) {
    for ($i = 0, $iMax = count($hour_info); $i < $iMax; $i++) {
        $xoopsTpl->append('hourinfo', ['info' => $hour_info[$i]['count']]);
    }
} else {
    echo '<td colspan="24">&nbsp;</td>';
}
$xoopsTpl->assign('lang_daily_visit', AM_DAILY_VISIT);
$xoopsTpl->assign('date_daily', date('H:i'));
$xoopsTpl->assign('lang_bas_nbr', AM_BAS_NBR);
$xoopsTpl->assign('daycount', $curvisits);
$xoopsTpl->assign('lang_so_far', AM_SO_FAR);
$xoopsTpl->assign('today_hits', sprintf('%.0f', $today_hits));
$xoopsTpl->assign('lang_page_view', AM_PAGE_VIEW);
$xoopsTpl->assign('lang_by_today_hour', _AM_BY_TODAY_HOUR);
$xoopsTpl->assign('lang_hr_hour', _AM_HR_HOUR);
$xoopsTpl->assign('lang_hr_visits', _AM_HR_VISITS);
