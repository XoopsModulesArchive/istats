<?php

/***************************************************************************
 * Xoops i-stats module
 *
 * Ported to xoops 2 by sylvainb
 * http://123rando.com
 *
 * Version 2.1    sam jun 12 17:20:57 CEST 2004
 ***************************************************************************/
require dirname(__DIR__, 3) . '/include/cp_header.php';
require_once dirname(__DIR__) . '/cache/config.php';
require_once 'functions.php';

$istatscookies = $_POST['istatscookies'] ?? 0;

function istatsMenu()
{
    global $xoopsModule;

    xoops_cp_header();

    adminmenu(0);

    echo '<h4>' . _AM_ISTATS_CONFIG . '</h4>';

    echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

    echo " - <b><a href='index.php?op=istatsConfig'>" . _AM_ISTATS_COOKIE_CONF . '</a></b>';

    echo "<br><br>\n";

    echo " - <b><a href='" . XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule->getVar('mid') . "'>" . _AM_GENERALCONF . '</a></b>';

    echo '</td></tr></table>';

    xoops_cp_footer();
}

function istatsConfig()
{
    global $xoopsConfig, $xoopsModule, $istatscookie, $_POST, $_GET;

    xoops_cp_header();

    echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";

    echo "<form method='post' action='index.php' enctype='multipart/form-data'>\n";

    echo '<h4>' . _AM_ISTATS_COOKIE . '</h4><br>';

    echo '<b>' . _AM_ISTATS_COOKIE_DESC . "</b><br><input type='text' name='istatscookies' value='$istatscookie' size='30' maxlength='30'><br>";

    echo '<br><br>';

    echo "<input type='hidden' name='op' value='istatsConfigS'>";

    echo "<input type='submit' value='" . _AM_ISTATS_SAVE . "'>&nbsp;&nbsp;";

    echo "<input type='button' value='" . _AM_ISTATS_CANCEL . "' onclick='javascript:history.go(-1)'></form>";

    echo '</td></tr></table>';

    xoops_cp_footer();
}

function istatsConfigS($istatscookies)
{
    global $_POST, $istatscookie;

    $content = "<?php\n";

    $content .= "/***************************************************************************\n";

    $content .= "* Xoops i-stats module\n";

    $content .= "*\n";

    $content .= "* Ported to xoops 2 by sylvainb\n";

    $content .= "* http://123rando.com\n";

    $content .= "*\n";

    $content .= "* Version 2.1    sam jun 12 17:20:57 CEST 2004\n";

    $content .= "*\n";

    $content .= "***************************************************************************/\n";

    $content .= "\$istatscookie         = $istatscookies;\n";

    $content .= '?>';

    $filename = '../cache/config.php';

    if ($file = @fopen($filename, 'wb')) {
        fwrite($file, $content);

        fclose($file);
    } else {
        redirect_header('index.php?op=istatsConfig', 2, _AM_ISTATS_NOTUPDATED);

        exit();
    }

    redirect_header('index.php', 2, _AM_ISTATS_UPDATED);

    exit();
}

$op = 'default';
if (!empty($_GET['op'])) {
    $op = $_GET['op'];
}
if (!empty($_POST['op'])) {
    $op = $_POST['op'];
}

switch ($op) {
    case 'istatsConfig':
        istatsConfig();
        break;
    case 'istatsConfigS':
        istatsConfigS($istatscookies);
        break;
    default:
        istatsMenu();
        break;
}
