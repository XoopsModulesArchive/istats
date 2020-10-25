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
$GLOBALS['xoopsOption']['template_main'] = 'istats_user_info.html';

$xoopsTpl->assign('lang_by_browser', _AM_BY_BROWSER);
$xoopsTpl->assign('lang_by_os', _AM_BY_OS);
$xoopsTpl->assign('lang_sw_sw', _AM_SW_SW);
$xoopsTpl->assign('lang_sc_sc', _AM_SC_SC);
$xoopsTpl->assign('lang_by_host', _AM_BY_HOST);
$xoopsTpl->assign('lang_bro_bro', _AM_BRO_BRO);

global $xoopsDB;
$bro_info = getResult('select * from ' . $xoopsDB->prefix('is_browser') . ' order by count desc');
$bro_total = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_browser') . '');
$bro_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_browser') . '');

for ($i = 0, $iMax = count($bro_info); $i < $iMax; $i++) {
    if ($bro_total[0]['sum'] > 0) {
        $bro_percent = $bro_info[$i]['count'] / $bro_total[0]['sum'] * 100;

        $bro_bar = $bro_info[$i]['count'] / $bro_max[0]['max'] * 380;
    } else {
        $bro_percent = 0;

        $bro_bar = 0;
    }

    $bro_no = $i + 1;

    $xoopsTpl->append('info_browser', ['no' => $bro_no, 'browser' => $bro_info[$i]['browser'], 'count' => $bro_info[$i]['count'], 'brobar' => sprintf('%.0f', $bro_bar), 'percent' => sprintf('%.2f', $bro_percent)]);
}

$xoopsTpl->assign('lang_os_os', _AM_OS_OS);

global $xoopsDB;
$os_info = getResult('select * from ' . $xoopsDB->prefix('is_os') . ' order by count desc');
$os_total = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_os') . '');
$os_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_os') . '');

for ($i = 0, $iMax = count($os_info); $i < $iMax; $i++) {
    if ($os_total[0]['sum'] > 0) {
        $os_percent = $os_info[$i]['count'] / $os_total[0]['sum'] * 100;

        $os_bar = $os_info[$i]['count'] / $os_max[0]['max'] * 380;
    } else {
        $os_percent = 0;

        $os_bar = 0;
    }

    $os_no = $i + 1;

    $xoopsTpl->append('info_os', ['no' => $os_no, 'os' => $os_info[$i]['os'], 'count' => $os_info[$i]['count'], 'osbar' => sprintf('%.0f', $os_bar), 'percent' => sprintf('%.2f', $os_percent)]);
}

global $xoopsDB;
$sw_info = getResult('select * from ' . $xoopsDB->prefix('is_screen') . ' order by count desc');
$sw_total = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_screen') . '');
$sw_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_screen') . '');

for ($i = 0, $iMax = count($sw_info); $i < $iMax; $i++) {
    if ($os_total[0]['sum'] > 0) {
        $sw_percent = $sw_info[$i]['count'] / $sw_total[0]['sum'] * 100;

        $sw_bar = $sw_info[$i]['count'] / $sw_max[0]['max'] * 380;
    } else {
        $sw_percent = 0;

        $sw_bar = 0;
    }

    $sw_no = $i + 1;

    $xoopsTpl->append('info_sw', ['no' => $sw_no, 'width' => $sw_info[$i]['width'], 'count' => $sw_info[$i]['count'], 'swbar' => sprintf('%.0f', $sw_bar), 'percent' => sprintf('%.2f', $sw_percent)]);
}

global $xoopsDB;
$sc_info = getResult('select * from ' . $xoopsDB->prefix('is_color') . ' order by count desc');
$sc_total = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_color') . '');
$sc_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_color') . '');

for ($i = 0, $iMax = count($sc_info); $i < $iMax; $i++) {
    if ($sc_total[0]['sum'] > 0) {
        $sc_percent = $sc_info[$i]['count'] / $sc_total[0]['sum'] * 100;

        $sc_bar = $sc_info[$i]['count'] / $sc_max[0]['max'] * 380;
    } else {
        $sc_percent = 0;

        $sc_bar = 0;
    }

    $sc_no = $i + 1;

    $xoopsTpl->append('info_sc', ['no' => $sc_no, 'color' => $sc_info[$i]['color'], 'count' => $sc_info[$i]['count'], 'scbar' => sprintf('%.0f', $sc_bar), 'percent' => sprintf('%.2f', $sc_percent)]);
}

$xoopsTpl->assign('lang_host_host', _AM_HOST_HOST);

global $xoopsDB;
$max = $xoopsModuleConfig['maxhostname'];
$host_info = getResult('select distinct hostname, count from ' . $xoopsDB->prefix('is_hostname') . " order by count desc limit $max");
$host_total = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_hostname') . '');
$host_max = getResult('select max(count) as max from ' . $xoopsDB->prefix('is_hostname') . '');

for ($i = 0, $iMax = count($host_info); $i < $iMax; $i++) {
    if ($host_total[0]['sum'] > 0) {
        $host_percent = $host_info[$i]['count'] / $host_total[0]['sum'] * 100;

        $host_bar = $host_info[$i]['count'] / $host_max[0]['max'] * 340;
    } else {
        $host_percent = 0;

        $host_bar = 0;
    }

    $host_no = $i + 1;

    $xoopsTpl->append('info_host', ['no' => $host_no, 'hostname' => $host_info[$i]['hostname'], 'count' => $host_info[$i]['count'], 'hostbar' => sprintf('%.0f', $host_bar), 'percent' => sprintf('%.2f', $host_percent)]);
}
