<?php

/***************************************************************************
 * Xoops i-stats module
 *
 * Ported to xoops 2 by sylvainb
 * http://123rando.com
 *
 * Version 1.00
 *
 * **************************************************************************
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
 * @changelog
 * v1.01 Added display.php to allow i-Stats to be used as a graphical counter
 *
 * @feature
 * Can be used as a graphical counter.
 * @usage
 * <div class="title2">i-Stats as a counter</div>
 * To use i-Stats as a counter, add the following two lines to your themes.php file(s):
 * <code>
 * require_once XOOPS_ROOT_PATH . '/modules/istats/include/function.php';
 * $result = CountDays();
 * </code>
 *
 * This gives access to the following figures:
 * $result['days']    The number of days that stats are available for
 * $result['total']    The total number of visitors
 * $result['ava_day']    The average number of visitors per day
 * $result['ava_hour']    The average number of visitors per hour
 * $result['ava_week']    The average number of visitors per week
 * $result['ava_mth']    The average number of visitors per month
 * $result['max_date']    The busiest day
 * $result['max_daycount'] The number of visits on the busiest day
 * $result['today']    The number of visitors so far today
 * $result['this_week']    The number of visitors so far this week
 * $result['this_mth']    The number of visitors so far this month
 * $result['max_week']    The busiest week, as year # week number "2003 # 47"
 * $result['max_weekcount'] The number of visitors in the busiest week
 * $result['max_mth']    The busiest month
 * $result['max_mthcount']    The number of visitors in the busiest month
 * $result['totalpages']    The total number of pages served
 *
 * For example:
 * <code>
 * There have been &lt;?php echo $result['total']; ?&gt; visitors in the last &lt;?php echo $result['days']; ?&gt; days.
 * </code>
 * produces something like:
 * <blockquote>There have been 9876 visitors in the last 100 days</blockquote>
 * Or you could use CSS to create a different effect, for example, the following:
 * <code>
 * ?&gt;
 * &lt;span style="font-family: courier; color: white; background: #336699"&gt;
 * &lt;?php echo $result['totalpages']; ?&gt;&lt;/span&gt; pages served to
 * &lt;span style="font-family: courier; color: white; background: #336699"&gt;
 * &lt;?php echo $result['total']; ?&gt;&lt;/span&gt; visitors
 * &lt;?php
 * </code>
 * produces something like:<blockquote>
 *    <span style="font-family: courier; color: white; background: #336699"> 009876</span> pages served to <span style="font-family: courier; color: white; background: #336699"> 005678</span> visitors
 * </blockquote>
 *
 * <div class="title2">Display numbers as images</div>
 *
 * To display the above numbers as graphics add these two lines in addition to the two above:
 * <code>
 * $graphics = num_to_graphics($result['total'], 8, XOOPS_URL . '/modules/istats/images/default','jpg');
 * echo $graphics;
 * </code>
 *
 * The first parameter is the number to convert.
 * The second parameter is the number of digits (includes leading zeros).
 * The third parameter is the path to the image files.
 * The fourth parameter is the file extension of the images, e.g. jpg, gif etc.
 *
 *
 * <div class="title2">Example graphical counter</div>
 *
 * Inserted into theme.php function themefooter:
 * <code>
 * require_once XOOPS_ROOT_PATH . '/modules/istats/include/function.php';
 * require_once XOOPS_ROOT_PATH . '/modules/istats/include/display.php';
 * $result = CountDays();
 * $graphics = num_to_graphics($result['total'], 8, XOOPS_URL . '/modules/istats/images/default','jpg');
 * echo $graphics;
 * </code>
 * or
 * <code>
 * require_once XOOPS_ROOT_PATH . '/modules/istats/include/function.php';
 * require_once XOOPS_ROOT_PATH . '/modules/istats/include/display.php';
 * $result = CountDays();
 * $graphics = num_to_graphics($result['totalpages'], 8, XOOPS_URL . '/modules/istats/images/default','jpg');
 * echo "&lt;div align=\"center\"&gt; $graphics &lt;/div&gt;";
 * </code>
 * or
 * <code>
 * require_once XOOPS_ROOT_PATH . '/modules/istats/include/function.php';
 * require_once XOOPS_ROOT_PATH . '/modules/istats/include/display.php';
 * $result = CountDays();
 * $pages = num_to_graphics($result['totalpages'], 8, XOOPS_URL . '/modules/istats/images/default','jpg');
 * $visitors = num_to_graphics($result['total'], 8, XOOPS_URL . '/modules/istats/images/default','jpg');
 * echo "&lt;div align=\"center\"&gt; $pages pages served to $visitors visitors &lt;/div&gt;";
 * </code>
 *
 * @changelog
 * v1.03 Added black on white graphics for numbers, courtesy of <a href="http://www.australianreptilesonline.com">TheBeastMaster</a>
 * v1.03 Renamed image folders to more accurately describe their contents.
 * @faq
 * Q. How do I change the graphic numbers?
 * A. Change the third parameter in the line '$graphics = num_to_graphics' to the directory that contains the images you want to display.
 *
 * @param mixed $length
 * @param mixed $number
 * @return mixed|string
 * @return mixed|string
 */
function leading_zero($length, $number)
{
    $length -= mb_strlen($number);

    for ($i = 0; $i < $length; $i++) {
        $number = '0' . $number;
    }

    return ($number);
}

function num_to_graphics($total = 0, $num_digits = 1, $img_dir = '', $img_ext = 'jpg')
{
    $output = '';

    $work = leading_zero($num_digits, $total);

    for ($i = 0; $i < $num_digits; $i++) {
        $output .= "<img src=\"$img_dir/$work[$i].$img_ext\" border=\"0\">\n";
    }

    return $output;
}
