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
 * @brief
 * E-Xoops i-Stats module.
 *
 * @desc
 * Records anonymous data as supplied by the users browser (via javascript).
 *
 * It displays details of the usual stats plus:<ul>
 * <li> the pages served</li>
 * <li> users browser</li>
 * <li> users OS</li>
 * <li> users screen size</li>
 * <li> users colour depth</li>
 * <li> lists (with count) referers</li>
 * <li> etc.</li>
 * </ul>
 *
 * As of version 1.01 i-Stats can be used as a graphical counter.
 *
 * @version
 * Version 1.03
 *
 * @author
 * Paul Cooke <paul_sw19@yahoo.com>
 * <a href="http://?">http://paul-cooke.com</a>
 *
 * @copyright
 * Copyright (c) 2003 Paul Cooke <paul_sw19@yahoo.com>
 *
 * @license
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

/**
 * @note
 * This module is based on:
 * PHP i-Stats Version 1.5
 * Developed By Sam Tang (sam@hkscript.com)
 * License : GNU Public License (GPL)
 * Homepage : http://hkscript.com
 *
 * @faq
 * Q. Why did you choose to use i-Stats
 * A. For several reasons,
 * * It was written in English, making it easy for me to understand,
 * * It is well written, both syntactically and logically,
 * * Uses database accesses economically,
 * * Is designed in a way that does not get bogged down with historical data.
 */
/**
 * @changelog
 * v1.02 Fixed problem with truncated referer URL's (change to Installation).
 * v1.03 Hopefully corrected problem with path names in v1.02 zip file.*/
require __DIR__ . '/header.php';

$GLOBALS['xoopsOption']['template_main'] = 'istats_index.html';

if ('istats' == $xoopsConfig['startpage']) {
    $xoopsOption['show_rblock'] = 1;

    require_once XOOPS_ROOT_PATH . '/header.php';

    make_cblock();
} else {
    $xoopsOption['show_rblock'] = 0;

    require_once XOOPS_ROOT_PATH . '/header.php';
}

require_once __DIR__ . '/include/function.php';

$xoopsTpl->assign('lang_traffic_report', _AM_TRAFFIC_REPORT);
$xoopsTpl->assign('lang_summary', _AM_SUMMARY);
$xoopsTpl->assign('lang_traffic', _AM_TRAFFIC);
$xoopsTpl->assign('lang_visitor_info', _AM_VISITOR_INFO);
$xoopsTpl->assign('lang_referer', _AM_REFERER);

$action = !empty($_GET['action']) ? $_GET['action'] : 1;
switch ($action) {
    case 4:
        include 'include/referer.php';
        break;
    case 3:
        include 'include/user_info.php';
        break;
    case 2:
        include 'include/stats.php';
        break;
    case 1:
    default:
        include 'include/summary.php';
        break;
}

require_once XOOPS_ROOT_PATH . '/footer.php';
