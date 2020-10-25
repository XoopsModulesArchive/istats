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
 * Version 1.02
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

/**
 * @decription
 * Recieves data from the surfers browser, and stores it in a MySQL db
 *
 *
 * // @todo
 *
 * //  *put forecast text into english.php
 *
 * //  *put <top> link under each item on each page
 *
 * //  *sort out functions in functions.php to avoid unessecary loading
 *
 * //  *add a reset button in relevant places
 *
 * //  *display image next to browser and ostype
 */

use Xmf\Request;

header('P3P: CP="CAO DSP LAW ADMa DEVa OUR IND PHY ONL UNI PUR COM NAV INT DEM CNT STA PRE OTC"');

require dirname(__DIR__, 3) . '/mainfile.php';

require_once __DIR__ . '/getresult.php';

require_once dirname(__DIR__) . '/cache/config.php';

$myts = MyTextSanitizer::getInstance();

$db_link = mysql_connect(XOOPS_DB_HOST, XOOPS_DB_USER, XOOPS_DB_PASS);

mysqli_select_db($GLOBALS['xoopsDB']->conn, XOOPS_DB_NAME, $db_link);

/**
 * update page count
 * @feature
 * Keeps total count of pages served, including refreshes and revisits
 */
$page = $_GET['page'];

if ('' != $page) {
    $check_page = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_is_page WHERE page='$page'");

    if ($check_page) {
        $GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_page SET count=count+1 WHERE page='$page'");
    } else {
        $GLOBALS['xoopsDB']->queryF('INSERT INTO ' . XOOPS_DB_PREFIX . "_is_page VALUES('', '$page', '1')");
    }
}

/**
 * @note
 * Only keeps stats (except total of page) for unique visitors, where a unique visitor is defined by the lifetime of the cookie.
 *
 *
 * //  does not use cookies which could be blocked and give false readings
 *
 * //  default php setting is 3 hours
 */

/**
 * @changelog
 * v1.02 Changed to work with exoops, now uses exoops cookie
 */
global $istatscookie;

if (!isset($HTTP_COOKIE_VARS['istats'])) {
    setcookie('istats', date('dmYHi'), time() + ($istatscookie), '/');
} else {
    exit();
}

/**
 * @feature
 * Keeps a count of visitors per day
 */

// update daycount record

$date = date('Y-m-d');

$check_date = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_is_daycount WHERE date='$date'");

if ($check_date) {
    $GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_daycount SET daycount=daycount+1 WHERE date='$date'");
} else {
    $GLOBALS['xoopsDB']->queryF('INSERT INTO ' . XOOPS_DB_PREFIX . "_is_daycount VALUES('', '$date', '1')");

    $GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_today_hour SET count='0'");
}

/**
 * @feature
 * Keeps a count of total visitors
 */

// update total visits

$GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . '_is_count SET count=count+1');

/**
 * @feature
 * Keeps track of users hostnames
 */

// get user hostname

$r_hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

if ($r_hostname == $_SERVER['REMOTE_ADDR']) {
    $hostname = 'IP Only';
} else {
    $r_hostname = explode('.', $r_hostname);

    $host_size = count($r_hostname);

    if (3 == $host_size) {
        $hostname = $r_hostname[$host_size - 2] . '.' . $r_hostname[$host_size - 1];
    } else {
        $hostname = $r_hostname[$host_size - 3] . '.' . $r_hostname[$host_size - 2] . '.' . $r_hostname[$host_size - 1];
    }
}

/**
 * @changelog
 * v1.01 Added $myts functions to clean up referer url?querystring
 */

// update is_hostname

$check_host = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_is_hostname WHERE hostname='$hostname'");

if ($check_host) {
    $GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_hostname set count=count+1 WHERE hostname='$hostname'");
} else {
    $GLOBALS['xoopsDB']->queryF('INSERT INTO ' . XOOPS_DB_PREFIX . "_is_hostname VALUES('$hostname', '1')");
}

/**
 * @feature
 * Keeps track of referers
 */
$referer = Request::getString('HTTP_REFERER', '', 'SERVER');

if (!mb_strstr($referer, XOOPS_URL)) {
    $check_ref = getResult('select * from ' . XOOPS_DB_PREFIX . "_is_referer where url='" . $referer . "'");

    if ($check_ref) {
        $GLOBALS['xoopsDB']->queryF('update ' . XOOPS_DB_PREFIX . "_is_referer set count=count+1 where url='" . $referer . "'");
    } elseif ('' != $referer) {
        $GLOBALS['xoopsDB']->queryF('insert into ' . XOOPS_DB_PREFIX . "_is_referer values('', '" . $referer . "', '1')");
    }
}

/**
 * @feature
 * Keeps a count of visitors per week
 */

// update is_week

$is_week = date('w');

$GLOBALS['xoopsDB']->queryF('update ' . XOOPS_DB_PREFIX . "_is_week set count=count+1 where day='$is_week'");

/**
 * @feature
 * Keeps track of users browser
 */

/**
 * @changelog
 * v1.02 Added more Browsers
 * v1.02 Improved browser detection.
 * v1.03 Improved browser detection
 */

/**
 * maybe keep original string if 'other' allowing for detection of new ones
 */

// get user browser

if (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Opera 6')) {
    $user_browser = 'Opera 6';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Opera 7')) {
    $user_browser = 'Opera 7';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Opera')) {
    $user_browser = 'Opera';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Konqueror')) {
    $user_browser = 'Konqueror';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Netscape/7')) {
    $user_browser = 'Netscape 7';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Netscape6')) {
    $user_browser = 'Netscape 6';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Netscape4')) {
    $user_browser = 'Netscape 4';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Netscape3')) {
    $user_browser = 'Netscape 3';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Lynx')) {
    $user_browser = 'Lynx';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Links')) {
    $user_browser = 'Links';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'OmniWeb')) {
    $user_browser = 'OmniWeb';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'WebTV')) {
    $user_browser = 'WebTV';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Avant Browser')) {
    $user_browser = 'Avant Browser';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'MyIE2')) {
    $user_browser = 'MyIE2';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Galeon')) {
    $user_browser = 'Galeon';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')) {
    $user_browser = 'Internet Explorer 6';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE 5')) {
    $user_browser = 'Internet Explorer 5';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE 4')) {
    $user_browser = 'Internet Explorer 4';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Gecko')) {
    $user_browser = 'Gecko';
} else {
    $user_browser = 'Other';
}

// update browser record

$check_week = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_is_browser WHERE browser='$user_browser'");

if ($check_week) {
    $GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_browser SET count=count+1 WHERE browser='$user_browser'");
} else {
    $GLOBALS['xoopsDB']->queryF('INSERT INTO ' . XOOPS_DB_PREFIX . "_is_browser VALUES('$user_browser', '1')");
}

/**
 * @feature
 * Keeps track of users OS
 */

/**
 * @changelog
 * v1.02 Added more OS's
 * v1.02 Improved OS detection
 */

// get user os

if (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Windows NT 5.1')) {
    $user_os = 'Windows XP';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Windows NT 5.0')) {
    $user_os = 'Windows 2000';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Windows NT 4')) {
    $user_os = 'Windows NT 4.0';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Windows 98') || mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Win 98')) {
    $user_os = 'Windows 98';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Windows 95') || mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Win 95')) {
    $user_os = 'Windows 95';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Windows 9') || mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Win 9')) {
    $user_os = 'Windows 9x';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Windows Me') || mb_strstr($_SERVER['HTTP_USER_AGENT'], 'winme')) {
    $user_os = 'Windows Me';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Win32')) {
    $user_os = 'Win32';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'PPC') || mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Mac_PowerPC')) {
    $user_os = 'Mac Power PC';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'mac')) {
    $user_os = 'Macintosh';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'X11')) {
    $user_os = 'X11';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'SunOS')) {
    $user_os = 'SunOS';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'BeOS')) {
    $user_os = 'BeOS';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'FreeBSD')) {
    $user_os = 'FreeBSD';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'OpenBSD')) {
    $user_os = 'OpenBSD';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'IRIX')) {
    $user_os = 'IRIX';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'OS/2')) {
    $user_os = 'OS/2';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Plan9')) {
    $user_os = 'Plan9';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'OSF')) {
    $user_os = 'OSF';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'HP-UX')) {
    $user_os = 'HP-UX';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'Linux')) {
    $user_os = 'Linux';
} elseif (mb_strstr($_SERVER['HTTP_USER_AGENT'], 'unix')) {
    $user_os = 'Other Unix';
} else {
    $user_os = 'Other';
}

// update os record

$check_week = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_is_os WHERE os='$user_os'");

if ($check_week) {
    $GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_os SET count=count+1 WHERE os='$user_os'");
} else {
    $GLOBALS['xoopsDB']->queryF('INSERT INTO ' . XOOPS_DB_PREFIX . "_is_os (os, count) VALUES('$user_os', '1')");
}

/**
 * @feature
 * Keeps track of visitors per hour (accumulative)
 */

// update hour record

$is_hour = date('H');

$GLOBALS['xoopsDB']->queryF('update ' . XOOPS_DB_PREFIX . "_is_hour set count=count+1 where hour='$is_hour'");

/**
 * @feature
 * Keeps track of visitors per hour (daily)
 */

// update today hour record

$GLOBALS['xoopsDB']->queryF('update ' . XOOPS_DB_PREFIX . "_is_today_hour set count=count+1 where hour='$is_hour'");

$week = date('W');

$mth = date('m');

$year = date('Y');

/**
 * @feature
 * Keeps track of visitors per hour (weekly)
 */
$check_week = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_is_week_count WHERE week='$week' AND year='$year'");

if ($check_week) {
    $GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_week_count SET count=count+1 WHERE week='$week' AND year='$year'");
} else {
    $GLOBALS['xoopsDB']->queryF('INSERT INTO ' . XOOPS_DB_PREFIX . "_is_week_count VALUES('', '$week', '$year', '1')");
}

/**
 * @feature
 * Keeps track of visitors per hour (monthly)
 */
$check_mth = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_is_mth WHERE mth='$mth' AND year='$year'");

if ($check_mth) {
    $GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_mth SET count=count+1 WHERE mth='$mth' AND year='$year'");
} else {
    $GLOBALS['xoopsDB']->queryF('INSERT INTO ' . XOOPS_DB_PREFIX . "_is_mth VALUES('', '$mth', '$year', '1')");

    $GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . '_is_mth_days SET count=0');
}

/**
 * @feature
 * Keeps track of visitors per month
 */
$day = date('d');

$GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_mth_days SET count=count+1 WHERE day='$day'");

/**
 * @feature
 * Keeps track of visitors screen size ie 800x600
 */

// update screen width

switch ($_GET['sw']) {
    case '640':

        $sw_id = 1;

        break;
    case '800':

        $sw_id = 2;

        break;
    case '1024':

        $sw_id = 3;

        break;
    case '1152':

        $sw_id = 4;

        break;
    case '1280':

        $sw_id = 5;

        break;
    case '1600':

        $sw_id = 6;

        break;
    default:

        $sw_id = 7;

        break;
}

$GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_screen SET count=count+1 WHERE id='$sw_id'");

/**
 * @feature
 * Keeps track of visitors screen colour depth
 */

// update screen color

switch ($_GET['sc']) {
    case '8':

        $sc_id = 1;

        break;
    case '16':

        $sc_id = 2;

        break;
    case '24':

        $sc_id = 3;

        break;
    case '32':

        $sc_id = 4;

        break;
    default:

        $sc_id = 5;

        break;
}

$GLOBALS['xoopsDB']->queryF('UPDATE ' . XOOPS_DB_PREFIX . "_is_color SET count=count+1 WHERE id='$sc_id'");



