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
 * Copyright © 2003 Paul Cooke <paul_sw19@yahoo.com>
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
define('_AM_TRAFFIC_REPORT', 'Relatório de Tráfego do Site');
define('_AM_SUMMARY', 'Índice');
define('_AM_REFERER', 'Referências');
define('_AM_VISITOR_INFO', 'Sistema');
define('_AM_TRAFFIC', 'Estatísticas de Tráfego');
define('_AM_LOCA', 'Localização');

// text of stats topic
define('_AM_BY_TODAY_HOUR', 'Tráfego do Dia');
define('_AM_BY_DAY', 'Dia do Mês');
define('_AM_BY_WEEKDAY', 'Dia da Semana');
define('_AM_BY_WEEK', 'Por Semana');
define('_AM_BY_MTH', 'Por Mês');
define('_AM_BY_REF', 'Referências');
define('_AM_BY_HOUR', 'Por Hora');
define('_AM_BY_PAGE', 'Páginas');
define('_AM_BY_BROWSER', 'Navegador');
define('_AM_BY_OS', 'Sistema Operacional');
define('_AM_BY_HOST', 'Endereço');
define('_AM_FORECAST', 'Previsão para Hoje');

// text of summary
define('_AM_STATS_INFO', 'Índice');
define('_AM_SITENAME', 'Website');
define('_AM_NOW', 'Dia e Hora Atuais');
define('_AM_MAX_DATE', 'Dia Mais visitado');
define('_AM_MAX_DAYCOUNT', 'Maior Número de Visitas - Dia');
define('_AM_MAX_WEEK', 'Semana Mais visitada');
define('_AM_MAX_WEEKCOUNT', 'Maior Número de Visitas - Semana');
define('_AM_MAX_MTH', 'Mês mais visitado');
define('_AM_MAX_MTHCOUNT', 'Maior Número de Visitas - Mês');
define('_AM_TOTAL_DAYS', 'Total de Dias');
define('_AM_TOTAL_VISITS', 'Total de Visitantes');
define('_AM_TODAY', 'Visitantes de Hoje');
define('_AM_THIS_WEEK', 'Visitantes desta Semana');
define('_AM_THIS_MTH', 'Visitantes deste Mês');
define('_AM_AVE_HOUR', 'Média de Visitantes por Hora');
define('_AM_AVE_DAY', 'Média de Visitantes por Dia');
define('_AM_AVE_WEEK', 'Média de Visitantes por Semana');
define('_AM_AVE_MTH', 'Média de Visitantes por Mês');
define('_AM_PER_HOUR', 'Visitantes por Hora');

// text of "Visits by day" section
define('_AM_DATE_DATE', 'Data');
define('_AM_DATE_VISITS', 'Visitantes');
define('_AM_DATE_PERCENT', 'Porcentagem');

// text of "Visits by week" section
define('_AM_WEEK_WEEK', 'Semana');
define('_AM_WEEK_VISITS', 'Visitantes');

// text of "Visits by month" section
define('_AM_MTH_MTH', 'Mês');
define('_AM_MTH_VISITS', 'Visitantes');

// text of "Visits by Referer" section
define('_AM_REF_VISITS', 'Visitantes');
define('_AM_REF_PERCENT', 'Porcentagem');
define('_AM_REF_REF', 'Referência');

// text of "Visits by hour" section
define('_AM_HR_HOUR', 'Hora');
define('_AM_HR_VISITS', 'Visitantes');

// text of "Visits by week-days" section
define('_AM_WD_1', 'Segunda-feira');
define('_AM_WD_2', 'Terça-feira');
define('_AM_WD_3', 'Quarta-feira');
define('_AM_WD_4', 'Quinta-feira');
define('_AM_WD_5', 'Sexta-feira');
define('_AM_WD_6', 'Sábado');
define('_AM_WD_7', 'Domingo');

// text of "Visits by pages" section
define('_AM_P_VISITS', 'Visitantes');
define('_AM_P_PERCENT', 'Porcentagem');
define('_AM_P_PAGE', 'Total de Páginas');

// text of "Browser" section
define('_AM_BRO_BRO', 'Navegador');

// text of "OS" section
define('_AM_OS_OS', 'Sistema Operacional');

// text of "Screen Width" section
define('_AM_SW_SW', 'Resolução');

// text of "Screen Color" section
define('_AM_SC_SC', 'Cores');

// text of "hostname" section
define('_AM_HOST_HOST', 'Endereço');
define('_AM_HOST_IP', 'Somente IP');

// text of "Forecast for today" section
define('AM_AVE', 'Em média');
define('AM_DAILY_VISIT', 'das visitas ocorreram antes das');
define('AM_BAS_NBR', 'Baseado no número de visitantes de hoje (');
define('AM_SO_FAR', '), possivelmente teremos');
define('AM_PAGE_VIEW', 'visitas ao site.');
