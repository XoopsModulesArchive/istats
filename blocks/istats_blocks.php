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

/**
 * @description
 * As of version 1.02 there is a block for displaying stats.
 *
 * @feature
 * Block for showing stats.
 *
 * @changelog
 * v1.02 Added block for displaying stats
 * @faq
 *
 * Q. How do I change the contents of the block?
 * A. Comment out the lines in 'blocks/istats_blocks.php' that you dont want to display.
 */
require_once XOOPS_ROOT_PATH . '/mainfile.php';

function b_istats_show($options)
{
    global $xoopsConfig;

    require_once XOOPS_ROOT_PATH . '/modules/istats/include/function.php';

    $results = CountDays();

    $block = [];

    $block['lang_p_page'] = _MB_ISTATS_P_PAGE;                // The total number of pages served

    $block['totalpages'] = '' . $results['totalpages'] . '';

    $block['lang_total_visits'] = _MB_ISTATS_TOTAL_VISITS;        // The total number of visitors

    $block['total'] = '' . $results['total'] . '';

    $block['lang_total_days'] = _MB_ISTATS_TOTAL_DAYS;            // The number of days that stats are available for

    $block['days'] = '' . $results['days'] . '';

    $block['lang_ave_day'] = _MB_ISTATS_AVE_DAY;                // The average number of visitors per day

    $block['ava_day'] = '' . sprintf('%.2f', $results['ava_day']) . '';

    $block['lang_ave_hour'] = _MB_ISTATS_AVE_HOUR;            // The average number of visitors per hour

    $block['ava_hour'] = '' . sprintf('%.2f', $results['ava_hour']) . '';

    $block['lang_ave_week'] = _MB_ISTATS_AVE_WEEK;            // The average number of visitors per week

    $block['ava_week'] = '' . sprintf('%.2f', $results['ava_week']) . '';

    $block['lang_ave_mth'] = _MB_ISTATS_AVE_MTH;                // The average number of visitors per month

    $block['ava_mth'] = '' . sprintf('%.2f', $results['ava_mth']) . '';

    $block['lang_max_date'] = _MB_ISTATS_MAX_DATE;            // The busiest day

    if (1 == $options[0]) {
        $results['max_date'] = date('d-m-Y', $results['max_date']);
    } else {
        $results['max_date'] = date('Y-n-d', $results['max_date']);
    }

    $block['max_date'] = '' . $results['max_date'] . '';

    $block['lang_max_daycount'] = _MB_ISTATS_MAX_DAYCOUNT;        // The number of visits on the busiest day

    $block['max_daycount'] = '' . $results['max_daycount'] . '';

    $block['lang_today'] = _MB_ISTATS_TODAY;                // The number of visitors so far today

    $block['today'] = '' . $results['today'] . '';

    $block['lang_this_week'] = _MB_ISTATS_THIS_WEEK;            // The number of visitors so far this week

    $block['this_week'] = '' . $results['this_week'] . '';

    $block['lang_this_mth'] = _MB_ISTATS_THIS_MTH;            // The number of visitors so far this month

    $block['this_mth'] = '' . $results['this_mth'] . '';

    $block['lang_max_week'] = _MB_ISTATS_MAX_WEEK;            // The busiest week, as year # week number '2003 # 47'

    if (1 == $options[0]) {
        $results['max_week'] = '#' . $results['max_week_w'] . '&nbsp;&nbsp;&nbsp;' . $results['max_week_y'];
    } else {
        $results['max_week'] = $results['max_week_y'] . '&nbsp;&nbsp;&nbsp;#' . $results['max_week_w'];
    }

    $block['max_week'] = '' . $results['max_week'] . '';

    $block['lang_max_weekcount'] = _MB_ISTATS_MAX_WEEKCOUNT;        // The number of visitors in the busiest week

    $block['max_weekcount'] = '' . $results['max_weekcount'] . '';

    $block['lang_max_mth'] = _MB_ISTATS_MAX_MTH;                // The busiest month

    if (1 == $options[0]) {
        $results['max_mth'] = $results['max_mth_m'] . '/' . $results['max_mth_y'];
    } else {
        $results['max_mth'] = $results['max_mth_y'] . '/' . $results['max_mth_m'];
    }

    $block['max_mth'] = '' . $results['max_mth'] . '';

    $block['lang_max_mthcount'] = _MB_ISTATS_MAX_MTHCOUNT;        // The number of visitors in the busiest month

    $block['max_mthcount'] = '' . $results['max_mthcount'] . '';

    return $block;
}

function b_istats_counter_show($options)
{
    global $xoopsConfig, $xoopsUser, $xoopsModule;

    require_once XOOPS_ROOT_PATH . '/modules/istats/include/function.php';

    require_once XOOPS_ROOT_PATH . '/modules/istats/include/display.php';

    $result = CountDays();

    $block = [];

    $block['welcome'] = _MB_ISTATS_WELCOME;

    $block['uname'] = !empty($xoopsUser) ? $xoopsUser->getVar('uname', 'E') : _MB_ISTATS_ANONYMOUS;

    if (1 == $options[0]) {
        if (is_object($xoopsUser)) {
            $block['avatar'] = $xoopsUser->getVar('user_avatar');

            if (file_exists(XOOPS_ROOT_PATH . '/uploads/' . $block['avatar'])) {
                $block['avatar'] = '<img src="' . XOOPS_URL . '/uploads/' . $block['avatar'] . '" alt="avatar">';
            } else {
                $block['avatar'] = '';
            }
        } else {
            $block['avatar'] = '<img src="' . XOOPS_URL . '/modules/istats/images/guest.gif" alt="avatar">';
        }
    } else {
        $block['avatar'] = '';
    }

    $block['lang_there'] = _MB_ISTATS_THERE;

    $block['graphics'] = num_to_graphics($result['total'], $options[1], XOOPS_URL . '/modules/istats/images/' . $options[2] . '', 'jpg');

    $block['lang_visitor'] = _MB_ISTATS_VISITOR;

    return $block;
}

function b_istats_edit($options)
{
    global $xoopsConfig;

    require_once XOOPS_ROOT_PATH . '/mainfile.php';

    $form = '' . _MB_ISTATS_DISPLAY_DATE . "&nbsp;<input type='radio' id='options[]' name='options[]' value='1'";

    if (1 == $options[0]) {
        $form .= ' checked';
    }

    $form .= '>&nbsp;' . _MB_ISTATS_FR . "&nbsp;<input type='radio' id='options[]' name='options[]' value='0'";

    if (0 == $options[0]) {
        $form .= ' checked';
    }

    $form .= '>&nbsp;' . _MB_ISTATS_US . '<br>';

    return $form;
}

function b_istats_counter_edit($options)
{
    global $xoopsConfig;

    require_once XOOPS_ROOT_PATH . '/mainfile.php';

    $form = '' . _MB_ISTATS_DISPLAY_AVATAR . "&nbsp;<input type='radio' id='options[]' name='options[]' value='1'";

    if (1 == $options[0]) {
        $form .= ' checked';
    }

    $form .= '>&nbsp;' . _MB_ISTATS_YES . "&nbsp;<input type='radio' id='options[]' name='options[]' value='0'";

    if (0 == $options[0]) {
        $form .= ' checked';
    }

    $form .= '>&nbsp;' . _MB_ISTATS_NO . '<br>';

    $inputtag = "<input type='text' name='options[]' value='" . (int)$options[1] . "'>";

    $form .= sprintf(_MB_ISTATS_COUNTER_DISPLAY, $inputtag);

    $form .= '<br>' . sprintf(_MB_ISTATS_COUNTER_IMG_DIR, XOOPS_URL . 'modules/istats/images/') . '&nbsp;';

    $form .= "<input type='text' name='options[]' value='" . $options[2] . "'>";

    $form .= '&nbsp;' . _MB_ISTATS_DIR . '';

    $form .= '<br>' . _MB_ISTATS_DIRS_NAME . '';

    return $form;
}
