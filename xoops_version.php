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

$modversion['name'] = _MI_ISTATS_NAME;
$modversion['version'] = '2.1';
$modversion['description'] = _MI_ISTATS_DESC;
$modversion['author'] = 'Original module: Paul Cooke (alias Scripter)<br>Xoops 2 adaptation/rewrite: Sylvain B.';
$modversion['credits'] = 'Sam Tang for the original i_Stats script.';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = 'images/istats_logo.png';
$modversion['dirname'] = 'istats';

/**
 * @upgrade
 * v1.01 to v1.02
 * Upload the files to your server.
 * From E-Xoops Admin update module 'Web Stats'.
 */

// Blocks

$modversion['blocks'][1]['file'] = 'istats_blocks.php';
$modversion['blocks'][1]['name'] = _MI_ISTATS_NAME;
$modversion['blocks'][1]['description'] = 'Shows stats';
$modversion['blocks'][1]['show_func'] = 'b_istats_show';
$modversion['blocks'][1]['options'] = '1';
$modversion['blocks'][1]['edit_func'] = 'b_istats_edit';
$modversion['blocks'][1]['template'] = 'istats_block_show.html';
$modversion['blocks'][2]['file'] = 'istats_blocks.php';
$modversion['blocks'][2]['name'] = _MI_ISTATS_CNT;
$modversion['blocks'][2]['description'] = 'Show counter';
$modversion['blocks'][2]['show_func'] = 'b_istats_counter_show';
$modversion['blocks'][2]['options'] = '1|6|default';
$modversion['blocks'][2]['edit_func'] = 'b_istats_counter_edit';
$modversion['blocks'][2]['template'] = 'istats_block_counter.html';

// All tables should not have any prefix!

$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'][0] = 'is_count';
$modversion['tables'][1] = 'is_daycount';
$modversion['tables'][2] = 'is_referer';
$modversion['tables'][3] = 'is_hour';
$modversion['tables'][4] = 'is_today_hour';
$modversion['tables'][5] = 'is_browser';
$modversion['tables'][6] = 'is_os';
$modversion['tables'][7] = 'is_hostname';
$modversion['tables'][8] = 'is_week';
$modversion['tables'][9] = 'is_week_count';
$modversion['tables'][10] = 'is_mth';
$modversion['tables'][11] = 'is_mth_days';
$modversion['tables'][12] = 'is_screen';
$modversion['tables'][13] = 'is_color';
$modversion['tables'][14] = 'is_page';

// Admin things

$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Blocks

// Menu

$modversion['hasMain'] = 1;

// Search

$modversion['hasSearch'] = 0;

// Comments

$modversion['hasComment'] = 0;

// Templates

$modversion['templates'][1]['file'] = 'istats_index.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'istats_footer.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'istats_summary.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'istats_referer.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'istats_stats.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file'] = 'istats_user_info.html';
$modversion['templates'][6]['description'] = '';

$modversion['config'][1]['name'] = 'longdate';
$modversion['config'][1]['title'] = '_MI_ISTATS_DATE';
$modversion['config'][1]['description'] = '_MI_ISTATS_DATE_DESC';
$modversion['config'][1]['formtype'] = 'select';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 1;
$modversion['config'][1]['options'] = ['_MI_ISTATS_DATE_FR' => '1', '_MI_ISTATS_DATE_US' => '2'];

$modversion['config'][2]['name'] = 'maxpage';
$modversion['config'][2]['title'] = '_MI_ISTATS_MAXPAGE';
$modversion['config'][2]['description'] = '';
$modversion['config'][2]['formtype'] = 'texbox';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = 30;

$modversion['config'][3]['name'] = 'maxhostname';
$modversion['config'][3]['title'] = '_MI_ISTATS_HOSTNAME';
$modversion['config'][3]['description'] = '';
$modversion['config'][3]['formtype'] = 'texbox';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = 30;

$modversion['config'][4]['name'] = 'maxreferer';
$modversion['config'][4]['title'] = '_MI_ISTATS_REFERER';
$modversion['config'][4]['description'] = '';
$modversion['config'][4]['formtype'] = 'texbox';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = 30;



