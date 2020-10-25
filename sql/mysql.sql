#
# PHP i-stats - MySQL schema
#

# --------------------------------------------------------
# Table structure for table 'is_count'
# --------------------------------------------------------
CREATE TABLE is_count (
    count INT(10) NOT NULL
);

# -- insert count
INSERT INTO is_count
VALUES ('');


# --------------------------------------------------------
# Table structure for table 'is_daycount'
# --------------------------------------------------------
CREATE TABLE is_daycount (
    id       INT(10) NOT NULL AUTO_INCREMENT,
    date     DATE    NOT NULL,
    daycount INT(10) NOT NULL,
    PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'is_referer'
# --------------------------------------------------------
CREATE TABLE is_referer (
    id    INT(10)      NOT NULL AUTO_INCREMENT,
    url   VARCHAR(255) NOT NULL,
    count INT(10)      NOT NULL,
    PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'is_hour'
# --------------------------------------------------------
CREATE TABLE is_hour (
    hour  VARCHAR(2) NOT NULL,
    count INT(10)    NOT NULL
);

# -- insert hour record
INSERT INTO is_hour
VALUES ('00', '');
INSERT INTO is_hour
VALUES ('01', '');
INSERT INTO is_hour
VALUES ('02', '');
INSERT INTO is_hour
VALUES ('03', '');
INSERT INTO is_hour
VALUES ('04', '');
INSERT INTO is_hour
VALUES ('05', '');
INSERT INTO is_hour
VALUES ('06', '');
INSERT INTO is_hour
VALUES ('07', '');
INSERT INTO is_hour
VALUES ('08', '');
INSERT INTO is_hour
VALUES ('09', '');
INSERT INTO is_hour
VALUES ('10', '');
INSERT INTO is_hour
VALUES ('11', '');
INSERT INTO is_hour
VALUES ('12', '');
INSERT INTO is_hour
VALUES ('13', '');
INSERT INTO is_hour
VALUES ('14', '');
INSERT INTO is_hour
VALUES ('15', '');
INSERT INTO is_hour
VALUES ('16', '');
INSERT INTO is_hour
VALUES ('17', '');
INSERT INTO is_hour
VALUES ('18', '');
INSERT INTO is_hour
VALUES ('19', '');
INSERT INTO is_hour
VALUES ('20', '');
INSERT INTO is_hour
VALUES ('21', '');
INSERT INTO is_hour
VALUES ('22', '');
INSERT INTO is_hour
VALUES ('23', '');

# --------------------------------------------------------
# Table structure for table 'is_today_hour'
# --------------------------------------------------------
CREATE TABLE is_today_hour (
    hour  VARCHAR(2) NOT NULL,
    count INT(10)    NOT NULL
);

# -- insert hour record
INSERT INTO is_today_hour
VALUES ('00', '');
INSERT INTO is_today_hour
VALUES ('01', '');
INSERT INTO is_today_hour
VALUES ('02', '');
INSERT INTO is_today_hour
VALUES ('03', '');
INSERT INTO is_today_hour
VALUES ('04', '');
INSERT INTO is_today_hour
VALUES ('05', '');
INSERT INTO is_today_hour
VALUES ('06', '');
INSERT INTO is_today_hour
VALUES ('07', '');
INSERT INTO is_today_hour
VALUES ('08', '');
INSERT INTO is_today_hour
VALUES ('09', '');
INSERT INTO is_today_hour
VALUES ('10', '');
INSERT INTO is_today_hour
VALUES ('11', '');
INSERT INTO is_today_hour
VALUES ('12', '');
INSERT INTO is_today_hour
VALUES ('13', '');
INSERT INTO is_today_hour
VALUES ('14', '');
INSERT INTO is_today_hour
VALUES ('15', '');
INSERT INTO is_today_hour
VALUES ('16', '');
INSERT INTO is_today_hour
VALUES ('17', '');
INSERT INTO is_today_hour
VALUES ('18', '');
INSERT INTO is_today_hour
VALUES ('19', '');
INSERT INTO is_today_hour
VALUES ('20', '');
INSERT INTO is_today_hour
VALUES ('21', '');
INSERT INTO is_today_hour
VALUES ('22', '');
INSERT INTO is_today_hour
VALUES ('23', '');

# --------------------------------------------------------
# Table structure for table 'is_browser'
# --------------------------------------------------------
CREATE TABLE is_browser (
    browser VARCHAR(30) NOT NULL,
    count   INT(10)     NOT NULL
);

# -- insert browser data
# added 5/12/03
# Opera 6
# Opera 7
# Sqworm
# Slurp
# Avant Browser
# MyIE2
# Galeon
# SurveyBot
INSERT INTO is_browser
VALUES ('Opera 6', '');
INSERT INTO is_browser
VALUES ('Opera 7', '');
INSERT INTO is_browser
VALUES ('Opera', '');
INSERT INTO is_browser
VALUES ('Konqueror', '');
INSERT INTO is_browser
VALUES ('Netscape7 ''', 0);
INSERT INTO is_browser
VALUES ('Netscape6 ''', 0);
INSERT INTO is_browser
VALUES ('Netscape4 ''', 0);
INSERT INTO is_browser
VALUES ('Netscape3 ''', 0);
INSERT INTO is_browser
VALUES ('Lynx', '');
INSERT INTO is_browser
VALUES ('Links', '');
INSERT INTO is_browser
VALUES ('OmniWeb', '');
INSERT INTO is_browser
VALUES ('WebTV', '');
INSERT INTO is_browser
VALUES ('Avant Browser', '');
INSERT INTO is_browser
VALUES ('MyIE2', '');
INSERT INTO is_browser
VALUES ('Internet Explorer 6', '');
INSERT INTO is_browser
VALUES ('Internet Explorer 5', '');
INSERT INTO is_browser
VALUES ('Internet Explorer 4', '');
INSERT INTO is_browser
VALUES ('Galeon', '');
INSERT INTO is_browser
VALUES ('Other', '');

# --------------------------------------------------------
# Table structure for table 'is_os'
# --------------------------------------------------------
CREATE TABLE is_os (
    os    VARCHAR(30) NOT NULL,
    count INT(10)     NOT NULL
);

# -- insert os data
# added 5/12/03
# Windows 98
# Windows 95
INSERT INTO is_os (os, count)
VALUES ('Windows XP', '');
INSERT INTO is_os (os, count)
VALUES ('Windows 2000', '');
INSERT INTO is_os (os, count)
VALUES ('Windows NT 4.''', '');
INSERT INTO is_os (os, count)
VALUES ('Windows 98', '');
INSERT INTO is_os (os, count)
VALUES ('Windows 95', '');
INSERT INTO is_os (os, count)
VALUES ('Windows 9x', '');
INSERT INTO is_os (os, count)
VALUES ('Windows Me', '');
INSERT INTO is_os (os, count)
VALUES ('Linux', '');
INSERT INTO is_os (os, count)
VALUES ('Macintosh', '');
INSERT INTO is_os (os, count)
VALUES ('Other', '');
INSERT INTO is_os (os, count)
VALUES ('Win32', '');
INSERT INTO is_os (os, count)
VALUES ('Mac Power PC', '');
INSERT INTO is_os (os, count)
VALUES ('SunOS', '');
INSERT INTO is_os (os, count)
VALUES ('BeOS', '');
INSERT INTO is_os (os, count)
VALUES ('FreeBSD', '');
INSERT INTO is_os (os, count)
VALUES ('OpenBSD', '');
INSERT INTO is_os (os, count)
VALUES ('IRIX', '');
INSERT INTO is_os (os, count)
VALUES ('OS/2', '');
INSERT INTO is_os (os, count)
VALUES ('Plan9', '');
INSERT INTO is_os (os, count)
VALUES ('OSF', '');
INSERT INTO is_os (os, count)
VALUES ('HP-UX', '');
INSERT INTO is_os (os, count)
VALUES ('Other Unix', '');
INSERT INTO is_os (os, count)
VALUES ('X11', '');



# --------------------------------------------------------
# Table structure for table 'is_hostname'
# --------------------------------------------------------
CREATE TABLE is_hostname (
    hostname VARCHAR(100) NOT NULL,
    count    INT(10)      NOT NULL
);

# --------------------------------------------------------
# Table structure for table 'is_week'
# --------------------------------------------------------
CREATE TABLE is_week (
    day   INT(2)  NOT NULL,
    count INT(10) NOT NULL
);

# -- insert week_days
INSERT INTO is_week
VALUES ('0', '');
INSERT INTO is_week
VALUES ('1', '');
INSERT INTO is_week
VALUES ('2', '');
INSERT INTO is_week
VALUES ('3', '');
INSERT INTO is_week
VALUES ('4', '');
INSERT INTO is_week
VALUES ('5', '');
INSERT INTO is_week
VALUES ('6', '');

# --------------------------------------------------------
# Table structure for table 'is_week_count'
# --------------------------------------------------------
CREATE TABLE is_week_count (
    id    INT(5)     NOT NULL AUTO_INCREMENT,
    week  VARCHAR(2) NOT NULL,
    year  INT(5)     NOT NULL,
    count INT(10)    NOT NULL,
    PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'is_mth'
# --------------------------------------------------------
CREATE TABLE is_mth (
    id    INT(5)     NOT NULL AUTO_INCREMENT,
    mth   VARCHAR(2) NOT NULL,
    year  INT(5)     NOT NULL,
    count INT(10)    NOT NULL,
    PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'is_mth_days'
# --------------------------------------------------------
CREATE TABLE is_mth_days (
    day   VARCHAR(2) NOT NULL,
    count INT(10)    NOT NULL
);

# -- insert is_mth_days
INSERT INTO is_mth_days
VALUES ('01', '');
INSERT INTO is_mth_days
VALUES ('02', '');
INSERT INTO is_mth_days
VALUES ('03', '');
INSERT INTO is_mth_days
VALUES ('04', '');
INSERT INTO is_mth_days
VALUES ('05', '');
INSERT INTO is_mth_days
VALUES ('06', '');
INSERT INTO is_mth_days
VALUES ('07', '');
INSERT INTO is_mth_days
VALUES ('08', '');
INSERT INTO is_mth_days
VALUES ('09', '');
INSERT INTO is_mth_days
VALUES ('10', '');
INSERT INTO is_mth_days
VALUES ('11', '');
INSERT INTO is_mth_days
VALUES ('12', '');
INSERT INTO is_mth_days
VALUES ('13', '');
INSERT INTO is_mth_days
VALUES ('14', '');
INSERT INTO is_mth_days
VALUES ('15', '');
INSERT INTO is_mth_days
VALUES ('16', '');
INSERT INTO is_mth_days
VALUES ('17', '');
INSERT INTO is_mth_days
VALUES ('18', '');
INSERT INTO is_mth_days
VALUES ('19', '');
INSERT INTO is_mth_days
VALUES ('20', '');
INSERT INTO is_mth_days
VALUES ('21', '');
INSERT INTO is_mth_days
VALUES ('22', '');
INSERT INTO is_mth_days
VALUES ('23', '');
INSERT INTO is_mth_days
VALUES ('24', '');
INSERT INTO is_mth_days
VALUES ('25', '');
INSERT INTO is_mth_days
VALUES ('26', '');
INSERT INTO is_mth_days
VALUES ('27', '');
INSERT INTO is_mth_days
VALUES ('28', '');
INSERT INTO is_mth_days
VALUES ('29', '');
INSERT INTO is_mth_days
VALUES ('30', '');
INSERT INTO is_mth_days
VALUES ('31', '');

# --------------------------------------------------------
# Table structure for table 'is_screen'
# --------------------------------------------------------
CREATE TABLE is_screen (
    id    INT(5)      NOT NULL AUTO_INCREMENT,
    width VARCHAR(20) NOT NULL,
    count INT(10)     NOT NULL,
    PRIMARY KEY (id)
);

# -- insert is_screen
INSERT INTO is_screen
VALUES ('', '640 x 480', '');
INSERT INTO is_screen
VALUES ('', '800 x 600', '');
INSERT INTO is_screen
VALUES ('', '1024 x 768', '');
INSERT INTO is_screen
VALUES ('', '1152 x 864', '');
INSERT INTO is_screen
VALUES ('', '1280 x 1024', '');
INSERT INTO is_screen
VALUES ('', '1600 x 1200', '');
INSERT INTO is_screen
VALUES ('', 'Unknown', '');

# --------------------------------------------------------
# Table structure for table 'is_color'
# --------------------------------------------------------
CREATE TABLE is_color (
    id    INT(5)      NOT NULL AUTO_INCREMENT,
    color VARCHAR(30) NOT NULL,
    count INT(10)     NOT NULL,
    PRIMARY KEY (id)
);

# -- insert is_color
INSERT INTO is_color
VALUES ('', '256 color', '');
INSERT INTO is_color
VALUES ('', '16 bit', '');
INSERT INTO is_color
VALUES ('', '24 bit', '');
INSERT INTO is_color
VALUES ('', '32 bit', '');
INSERT INTO is_color
VALUES ('', 'Unknown', '');

# --------------------------------------------------------
# Table structure for table 'is_page'
# --------------------------------------------------------
CREATE TABLE is_page (
    id    INT(5)       NOT NULL AUTO_INCREMENT,
    page  VARCHAR(100) NOT NULL,
    count INT(10)      NOT NULL,
    PRIMARY KEY (id)
);
