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

// text of top head
define('_AM_TRAFFIC_REPORT', 'Отчёт о трафике сайта');
define('_AM_SUMMARY', 'Всего');
define('_AM_REFERER', 'Ссылающиеся');
define('_AM_VISITOR_INFO', 'Системная');
define('_AM_TRAFFIC', 'Статистика трафика');
define('_AM_LOCA', 'Расположение');

// text of	stats topic
define('_AM_BY_TODAY_HOUR', 'Сегодняшний трафик');
define('_AM_BY_DAY', 'По дате');
define('_AM_BY_WEEKDAY', 'По дням недели');
define('_AM_BY_WEEK', 'В неделю');
define('_AM_BY_MTH', 'В месяц');
define('_AM_BY_REF', 'Посещений по Referer');
define('_AM_BY_HOUR', 'В час');
define('_AM_BY_PAGE', 'Страницы');
define('_AM_BY_BROWSER', 'Браузер');
define('_AM_BY_OS', 'Операционная система');
define('_AM_BY_HOST', 'Имя хоста');
define('_AM_FORECAST', 'Прогноз на сегодня');

// text of summary
define('_AM_STATS_INFO', 'Всего');
define('_AM_SITENAME', 'Сайт');
define('_AM_NOW', 'Текущее время');
define('_AM_MAX_DATE', 'Лучший день');
define('_AM_MAX_DAYCOUNT', 'Визитов в лучший день');
define('_AM_MAX_WEEK', 'Лучшая неделя');
define('_AM_MAX_WEEKCOUNT', 'Визитов в лучшую неделю');
define('_AM_MAX_MTH', 'Лучший месяц');
define('_AM_MAX_MTHCOUNT', 'Визитов в лучший месяц');
define('_AM_TOTAL_DAYS', 'Всего дней');
define('_AM_TOTAL_VISITS', 'Всего визитов');
define('_AM_TODAY', 'Визитов сегодня');
define('_AM_THIS_WEEK', 'Визитов на этой неделе');
define('_AM_THIS_MTH', 'Визитов в этом месяце');
define('_AM_AVE_HOUR', 'В среднем в час');
define('_AM_AVE_DAY', 'В среднем в день');
define('_AM_AVE_WEEK', 'В среднем в неделю');
define('_AM_AVE_MTH', 'В среднем в месяц');
define('_AM_PER_HOUR', 'Визитов в час');

// text of "Visits by day" section
define('_AM_DATE_DATE', 'Дата');
define('_AM_DATE_VISITS', 'Визитов');
define('_AM_DATE_PERCENT', '%');

// text of "Visits by week" section
define('_AM_WEEK_WEEK', 'Неделя');
define('_AM_WEEK_VISITS', 'Визитов');

// text of "Visits by month" section
define('_AM_MTH_MTH', 'Месяц');
define('_AM_MTH_VISITS', 'Визитов');

// text of "Visits by Referer" section
define('_AM_REF_VISITS', 'Визитов');
define('_AM_REF_PERCENT', '%');
define('_AM_REF_REF', 'Referer');

// text of "Visits by hour" section
define('_AM_HR_HOUR', 'Час');
define('_AM_HR_VISITS', 'Визитов');

// text of "Visits by week-days" section
define('_AM_WD_1', 'Понедельник');
define('_AM_WD_2', 'Вторник');
define('_AM_WD_3', 'Среда');
define('_AM_WD_4', 'Четверг');
define('_AM_WD_5', 'Пятница');
define('_AM_WD_6', 'Суббота');
define('_AM_WD_7', 'Воскресенье');

// text of "Visits by pages" section
define('_AM_P_VISITS', 'Визитов');
define('_AM_P_PERCENT', '%');
define('_AM_P_PAGE', 'Все страницы');

// text of "Browser" section
define('_AM_BRO_BRO', 'Браузер');

// text of "OS" section
define('_AM_OS_OS', 'Операционная система');

// text of "Screen Width" section
define('_AM_SW_SW', 'Разрешение экрана');

// text of "Screen Color" section
define('_AM_SC_SC', 'Глубина цвета');

// text of "hostname" section
define('_AM_HOST_HOST', 'Имя хоста');
define('_AM_HOST_IP', 'Только IP');

// text of "Forecast for today" section
define('AM_AVE', 'В среднем');
define('AM_DAILY_VISIT', 'визитов было ежедневно к');
define('AM_BAS_NBR', 'Сегодня фактически было ');
define('AM_SO_FAR', 'посетителей, прогнозируется');
define('AM_PAGE_VIEW', 'посетителя.');
