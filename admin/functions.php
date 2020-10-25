<?php

function adminmenu($currentoption = 0)
{
    global $xoopsModule, $xoopsConfig;

    $tblColors = [];

    $tblColors[0] = $tblColors[1] = '#DDE';

    $tblColors[$currentoption] = 'white';

    if (file_exists(XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
        require_once dirname(__DIR__) . '/language/' . $xoopsConfig['language'] . '/modinfo.php';
    } else {
        require_once dirname(__DIR__) . '/language/english/modinfo.php';
    }

    echo '<div id="navcontainer"><ul style="padding: 3px 0; margin-left: 0; font: bold 12px Verdana, sans-serif; ">';

    echo '<li style="list-style: none; margin: 0; display: inline; "><a href="index.php?op=istatsConfig" style="padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ' . $tblColors[0] . '; text-decoration: none; ">' . _MI_ISTATS_COOKIE_MENU . '</a></li>';

    echo '<li style="list-style: none; margin: 0; display: inline; "><a href="../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod='
         . $xoopsModule->getVar('mid')
         . '" style="padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: '
         . $tblColors[1]
         . '; text-decoration: none; ">'
         . _PREFERENCES
         . '</a></li></div></ul>';
}
