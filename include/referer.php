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

/**
 * @feature
 * Displays Top xx Referers
 */
$GLOBALS['xoopsOption']['template_main'] = 'istats_referer.html';

global $xoopsDB, $_POST, $_GET;
$max = $xoopsModuleConfig['maxreferer'];
$ref_info = getResult('select distinct url, count from ' . $xoopsDB->prefix('is_referer') . " order by count desc limit $max");
$ref_sum = getResult('select sum(count) as sum from ' . $xoopsDB->prefix('is_referer') . '');
for ($i = 0, $iMax = count($ref_info); $i < $iMax; $i++) {
    if ($ref_sum[0]['sum'] > 0) {
        $ref_percent = $ref_info[$i]['count'] / $ref_sum[0]['sum'] * 100;
    } else {
        $ref_percent = 0;
    }

    $xoopsTpl->append('referer', ['count' => $ref_info[$i]['count'], 'url' => $ref_info[$i]['url'], 'percent' => sprintf('%.2f', $ref_percent)]);
}
$xoopsTpl->assign('lang_by_ref', _AM_BY_REF);
$xoopsTpl->assign('lang_ref_visits', _AM_REF_VISITS);
$xoopsTpl->assign('lang_ref_percent', _AM_REF_PERCENT);
$xoopsTpl->assign('lang_ref_ref', _AM_REF_REF);
