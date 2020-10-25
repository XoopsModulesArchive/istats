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

// text of top head
define('_AM_TRAFFIC_REPORT', 'Rapport de Trafic du Site');
define('_AM_SUMMARY', 'R&eacute;sum&eacute;');
define('_AM_REFERER', 'R&eacute;f&eacute;rents');
define('_AM_VISITOR_INFO', 'Syst&egrave;me');
define('_AM_TRAFFIC', 'Stats du Trafic ');
define('_AM_LOCA', 'Localisation');

// text of	stats topic
define('_AM_BY_TODAY_HOUR', 'Graphe du Trafic du Jour');
define('_AM_BY_DAY', 'Jours du Mois');
define('_AM_BY_WEEKDAY', 'Jours de la semaine');
define('_AM_BY_WEEK', 'Par Semaine');
define('_AM_BY_MTH', 'Par Mois');
define('_AM_BY_REF', 'Visites par R&eacute;f&eacute;rent');
define('_AM_BY_HOUR', 'Par Heure');
define('_AM_BY_PAGE', 'Pages');
define('_AM_BY_BROWSER', 'Navigateur');
define('_AM_BY_OS', 'Syst&egrave;me d\'exploitation');
define('_AM_BY_HOST', 'Hostname');
define('_AM_FORECAST', 'Pr&eacute;visions du Jour');

// text of summary
define('_AM_STATS_INFO', 'R&eacute;sum&eacute;');
define('_AM_SITENAME', 'Site Web');
define('_AM_NOW', 'Nous sommes le');
define('_AM_MAX_DATE', 'Meilleure Date');
define('_AM_MAX_DAYCOUNT', 'Visites du Meilleur Jour');
define('_AM_MAX_WEEK', 'Meilleure Semaine');
define('_AM_MAX_WEEKCOUNT', 'Visites de la Meilleure Semaine');
define('_AM_MAX_MTH', 'Meilleur Mois');
define('_AM_MAX_MTHCOUNT', 'Visites du Meilleur Mois');
define('_AM_TOTAL_DAYS', 'Total Jours');
define('_AM_TOTAL_VISITS', 'Total Visites');
define('_AM_TODAY', 'Visiteurs Aujourd\'hui');
define('_AM_THIS_WEEK', 'Visiteurs cette semaine');
define('_AM_THIS_MTH', 'Visiteurs ce mois-ci');
define('_AM_AVE_HOUR', 'Visites Moyennes par heure');
define('_AM_AVE_DAY', 'Visites Moyennes par jour');
define('_AM_AVE_WEEK', 'Visites Moyennes par semaine');
define('_AM_AVE_MTH', 'Visites Moyennes par mois');
define('_AM_PER_HOUR', 'Visites par heure');

// text of "Visits by day" section
define('_AM_DATE_DATE', 'Date');
define('_AM_DATE_VISITS', 'Visites');
define('_AM_DATE_PERCENT', 'Pourcentage');

// text of "Visits by week" section
define('_AM_WEEK_WEEK', 'Semaine');
define('_AM_WEEK_VISITS', 'Visites');

// text of "Visits by month" section
define('_AM_MTH_MTH', 'Mois');
define('_AM_MTH_VISITS', 'Visites');

// text of "Visits by Referer" section
define('_AM_REF_VISITS', 'Visites');
define('_AM_REF_PERCENT', 'Pourcentage');
define('_AM_REF_REF', 'R&eacute;f&eacute;rent');

// text of "Visits by hour" section
define('_AM_HR_HOUR', 'Heure');
define('_AM_HR_VISITS', 'Visites');

// text of "Visits by week-days" section
define('_AM_WD_1', 'Lundi');
define('_AM_WD_2', 'Mardi');
define('_AM_WD_3', 'Mercredi');
define('_AM_WD_4', 'Jeudi');
define('_AM_WD_5', 'Vendredi');
define('_AM_WD_6', 'Samedi');
define('_AM_WD_7', 'Dimanche');

// text of "Visits by pages" section
define('_AM_P_VISITS', 'Visites');
define('_AM_P_PERCENT', 'Pourcentage');
define('_AM_P_PAGE', 'Pages Totales');

// text of "Browser" section
define('_AM_BRO_BRO', 'Navigateur');

// text of "OS" section
define('_AM_OS_OS', 'Syst&egrave;me d\'exploitation');

// text of "Screen Width" section
define('_AM_SW_SW', 'R&eacute;solution Ecran');

// text of "Screen Color" section
define('_AM_SC_SC', 'Couleurs Ecran');

// text of "hostname" section
define('_AM_HOST_HOST', 'Hostname');
define('_AM_HOST_IP', 'IP seulement');

// text of "Forecast for today" section
define('AM_AVE', 'En moyenne');
define('AM_DAILY_VISIT', 'des visites ont lieu avant');
define('AM_BAS_NBR', 'Bas&eacute; sur un nombre de');
define('AM_SO_FAR', 'visiteurs pour le moment, votre site devrait atteindre');
define('AM_PAGE_VIEW', 'page(s) consult&eacute;e(s).');
