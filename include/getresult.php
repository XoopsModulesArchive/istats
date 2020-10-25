<?php

/***************************************************************************
 * Xoops i-stats module
 *
 * Ported to xoops 2 by sylvainb
 * http://123rando.com
 *
 * Version 1.00
 **************************************************************************
 * @param $query
 * @return mixed
 */

// get result from mysql
function getResult($query)
{
    global $xoopsDB;

    $result = $xoopsDB->query($query);

    $row = $xoopsDB->fetchArray($result);

    while (null != $row) {
        $data[] = $row;

        $row = $xoopsDB->fetchArray($result);
    }

    return $data ?? null;
}
