i-Stats v1.02
===============

Records anonymous data as supplied by the users browser (via javascript).

Based on::
PHP i-Stats Version 1.5
developed By Sam Tang (sam@hkscript.com)


Installation
===============

Upload all files to a directory called exoops/modules/istats on your server.

Run E-Xoops admin, and install 'Web Stats' module.

Give access to groups as required.

Add the following code to the footer of your pages by using::
(Admin, Meta Generator, Footer Settings)
[ still effective even if theme changed  ;-) ]

<!-- Add to footer -->
<script type="text/Javascript">
<!--
istat = new Image(1,1);
istat.src = "http://yourdomain.com/exoops/modules/istats/include/counter.php?sw="+screen.width+"&sc="+screen.colorDepth+"&refer="+document.referrer+"&page="+location.href;
//-->
</script>
<!-- end -->

Do not put a line break in the istat.src line!!

And don't forget to change 'yourdomain.com' to your sites domain.

Job done!!


Counter
==============
To use i-Stats as a counter, add the following two lines to your themes.php file(s):

include_once(XOOPS_ROOT_PATH . '/modules/istats/include/function.php');
$result = CountDays();

This gives access to the following figures:
$result['days'] 	The number of days that stats are available for
$result['total'] 	The total number of visitors
$result['ava_day'] 	The average number of visitors per day
$result['ava_hour'] 	The average number of visitors per hour
$result['ava_week'] 	The average number of visitors per week
$result['ava_mth'] 	The average number of visitors per month
$result['max_date'] 	The busiest day
$result['max_daycount'] The number of visits on the busiest day
$result['today'] 	The number of visitors so far today
$result['this_week'] 	The number of visitors so far this week
$result['this_mth'] 	The number of visitors so far this month
$result['max_week'] 	The busiest week, as year # week number "2003 # 47"
$result['max_weekcount'] The number of visitors in the busiest week
$result['max_mth'] 	The busiest month
$result['max_mthcount']	The number of visitors in the busiest month
$result['totalpages']	The total number of pages served

For example:

There have been <?php echo $result['total']; ?> visitors in the last <?php echo $result['days']; ?> days.


Display numbers as images
=========================
To display the above numbers as graphics add these two lines in addition to the two above:

$graphics = num_to_graphics($result['total'], 8, XOOPS_URL . '/modules/istats/images/default','jpg');
echo $graphics;

The first parameter is the number to convert.
The second parameter is the number of digits (includes leading zeros).
The third parameter is the path to the image files.
The fourth parameter is the file extension of the images, e.g. jpg, gif etc.

Example graphical counter
===========================
Inserted into theme.php function themefooter:

include_once(XOOPS_ROOT_PATH . '/modules/istats/include/function.php');
include_once(XOOPS_ROOT_PATH . '/modules/istats/include/display.php');
$result = CountDays();
$graphics = num_to_graphics($result['total'], 8, XOOPS_URL . '/modules/istats/images/default','jpg');
echo $graphics;

or

include_once(XOOPS_ROOT_PATH . '/modules/istats/include/function.php');
include_once(XOOPS_ROOT_PATH . '/modules/istats/include/display.php');
$result = CountDays();
$graphics = num_to_graphics($result['totalpages'], 8, XOOPS_URL . '/modules/istats/images/default','jpg');
echo "<div align=\"center\"> $graphics </div>";


Change Log
=============
xx/12/03  v1.02 Added manual in HTML, this readme.txt is now deprecated.
		Added total pages served to counter.
		Added extra browsers.
		Reordered list of browsers for better identification
		Corrected errors in readme.txt

26/11/03  v1.01 Added $myts functions to clean up referer url?querystring
                Updated readme.txt to include instructions for use as counter
                Added display.php to display numbers as graphics

24/11/03  v1.00 Initial release


Upgrade from v1.01 to v1.02
============================
Unpack and upload files.


Scripter
http://paul-cooke.com
