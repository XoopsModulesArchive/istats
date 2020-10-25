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
define('_AM_TRAFFIC_REPORT', 'Raport ruchu na stronie');
define('_AM_SUMMARY', 'Podsumowanie');
define('_AM_REFERER', 'Referers');
define('_AM_VISITOR_INFO', 'System');
define('_AM_TRAFFIC', 'Statystyka ruchu');
define('_AM_LOCA', 'Lokalizacje');

// text of	stats topic
define('_AM_BY_TODAY_HOUR', 'Wykres dzisiejszych odwiedzin');
define('_AM_BY_DAY', 'Dzieñ Miesi±ca');
define('_AM_BY_WEEKDAY', 'Dzieñ Tygodnia');
define('_AM_BY_WEEK', 'Tygodniami');
define('_AM_BY_MTH', 'Miêsi±cami');
define('_AM_BY_REF', 'Odwiedziny (by Referer)');
define('_AM_BY_HOUR', 'Godzinowy');
define('_AM_BY_PAGE', 'Strony');
define('_AM_BY_BROWSER', 'Przegl±darka');
define('_AM_BY_OS', 'System Operacyjny');
define('_AM_BY_HOST', 'Nazwa Hosta');
define('_AM_FORECAST', 'Prognoza na dzisiaj');

// text of summary
define('_AM_STATS_INFO', 'Podsumowanie');
define('_AM_SITENAME', 'Strona Internetowa');
define('_AM_NOW', 'Bie¿±cy czas');
define('_AM_MAX_DATE', 'Najwiêcej wizyt - Data');
define('_AM_MAX_DAYCOUNT', 'Najwiêcej wizyt - Dzieñ');
define('_AM_MAX_WEEK', 'Najwiêcej wizyt - Tydzieñ');
define('_AM_MAX_WEEKCOUNT', 'Najwiêcej wizyt tygodniowo');
define('_AM_MAX_MTH', 'Najwiêcej wizyt - Miesi±c');
define('_AM_MAX_MTHCOUNT', 'Najwiêcej wizyt miesiêcznie');
define('_AM_TOTAL_DAYS', 'W sumie dni');
define('_AM_TOTAL_VISITS', 'Wszystkich odwiedzin');
define('_AM_TODAY', 'Odwiedzaj±cych dzisiaj');
define('_AM_THIS_WEEK', 'Odwiedzaj±cych w tym tygodniu');
define('_AM_THIS_MTH', 'Odwiedzaj±cych w tym miesi±cu');
define('_AM_AVE_HOUR', '¦rednio wizyt na godzinê');
define('_AM_AVE_DAY', '¦rednio wizyt dziennie');
define('_AM_AVE_WEEK', '¦rednio wizyt tygodniowo');
define('_AM_AVE_MTH', '¦rednio wizyt na miesiêcznie');
define('_AM_PER_HOUR', 'Odwiedzin na godzinê');

// text of "Visits by day" section
define('_AM_DATE_DATE', 'Data');
define('_AM_DATE_VISITS', 'Odwiedzin');
define('_AM_DATE_PERCENT', 'Procent');

// text of "Visits by week" section
define('_AM_WEEK_WEEK', 'Tydzieñ');
define('_AM_WEEK_VISITS', 'Odwiedzin');

// text of "Visits by month" section
define('_AM_MTH_MTH', 'Miesi±c');
define('_AM_MTH_VISITS', 'Odwiedzin');

// text of "Visits by Referer" section
define('_AM_REF_VISITS', 'Odwiedzin');
define('_AM_REF_PERCENT', 'Procent');
define('_AM_REF_REF', 'Referer');

// text of "Visits by hour" section
define('_AM_HR_HOUR', 'Godz');
define('_AM_HR_VISITS', 'Ile:');

// text of "Visits by week-days" section
define('_AM_WD_1', 'Poniedzia³ek');
define('_AM_WD_2', 'Wtorek');
define('_AM_WD_3', '¦roda');
define('_AM_WD_4', 'Czwartek');
define('_AM_WD_5', 'Pi±tek');
define('_AM_WD_6', 'Sobota');
define('_AM_WD_7', 'Niedziela');

// text of "Visits by pages" section
define('_AM_P_VISITS', 'Odwiedzin');
define('_AM_P_PERCENT', 'Procent');
define('_AM_P_PAGE', '£±cznie stron');

// text of "Browser" section
define('_AM_BRO_BRO', 'Przegl±darka');

// text of "OS" section
define('_AM_OS_OS', 'System Operacyjny');

// text of "Screen Width" section
define('_AM_SW_SW', 'Rozdzielczo¶æ');

// text of "Screen Color" section
define('_AM_SC_SC', 'Paleta kolorów');

// text of "hostname" section
define('_AM_HOST_HOST', 'Nazwa Hosta');
define('_AM_HOST_IP', 'Tylko IP');

// text of "Forecast for today" section
define('AM_AVE', 'Dla ¶redniej');
define('AM_DAILY_VISIT', 'dziennych wizyt przed godzin±');
define('AM_BAS_NBR', 'Na podstawie ilo¶ci');
define('AM_SO_FAR', 'odwiedzin w dniu dzisiejszym, dzi¶ mo¿esz siê spodziewaæ');
define('AM_PAGE_VIEW', 'odwiedzin twojej strony.');
