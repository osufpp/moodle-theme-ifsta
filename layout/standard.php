<?php

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);



if($hassidepost && $hassidepre)
{
    $bodywidth = 14;
    $bodyclasses = "grid_" . $bodywidth;
    $bodyclasses .= " push_5";
}
elseif($hassidepre)
{
    $bodywidth = 19;
    $bodyclasses = "grid_" . $bodywidth;
    $bodyclasses .= " push_5";
}
elseif($hassidepost)
{
    $bodywidth = 19;
    $bodyclasses = "grid_" . $bodywidth;
}
else {
    $bodywidth = 24;
    $bodyclasses = "grid_" . $bodywidth;
}

echo $OUTPUT->doctype() ?>
<html>
<head>
    <title><?php echo $PAGE->title ?></title>
    <?php echo $OUTPUT->standard_head_html() ?>
    <link rel="stylesheet" type="text/css" href="/theme/ifsta/style/jquery-ui-1.8.6.css" />
    <link rel="stylesheet" type="text/css" href="/theme/ifsta/style/jquery.treeview.css" />
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses) ?>">

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<?php echo $OUTPUT->standard_top_of_body_html() ?>
<div id="bodyWrapper" class="container_24">
    <div id="page-content">
    <div id="header" class="grid_24 site_header">
        <div id="storeLogo">
            <a href="/">
                <img src="<?php echo $OUTPUT->pix_url('logo', 'theme'); ?>" alt="Ifsta" />
            </a>
        </div>
        <div id="HeaderRight">
            <?php echo $OUTPUT->login_info(); ?>
        </div>
    </div>
    <div class="grid_24 ui-widget infoBoxContainer">
        <div class="ui-widget-header ui-corner-all infoBoxHeading navbar">
        <div class="my_icon" style="margin-right: 1px;">
            <a href="http://my.ifsta.org/">
                <img src="https://images.ifsta.org/logos/myifsta/46.png" alt="MyIFSTA">
            </a>
        </div>
            <ul>
                <li>
                    <a href="https://www.ifsta.org">IFSTA Shop</a>
                </li>
                <li>
                    <a href="/course/view.php?id=1126">Skill Videos</a>
                </li>
                <li>
                    <a href="/course/view.php?id=3">Instructor Access</a>
                </li>
<!--                <li>-->
<!--                    <a href="/course/view.php?id=257">Sample Course</a>-->
<!--                </li>-->
                <li>
                    <a href="/course/view.php?id=538">FAQ</a>
                </li>
                <li>
                    <a href="/course/view.php?id=45">About Us</a>
                </li>
            </ul>
        </div>
    </div>
<?php if(false === true) { ?>
        <div class="grid_12 push_6" style="text-align: center;">
            <div style="background-color: #FCC; border: solid 1px #C66;">
                <p>Maintenance Notice: Access to ResourceOne will be intermittent between the hours of 9:15 PM CST and 8:00 AM CST.</p>
            </div>
        </div>
<?php } ?>
    <div class="breadcrumb grid_24">
        <h3>
            <?php echo $OUTPUT->navbar(); ?>
            <div class="navbutton"> <?php echo $PAGE->button; ?>
            <?php if(isloggedin()) echo '<form action="/my" method="get"><input type="submit" value="My Courses" /></form>' ?>
            <?php if(isloggedin()) echo '<form action="/message/index.php" method="get"><input type="submit" value="Messages" /></form>' ?>
            </div>
        </h3>
    </div>

    <div id="bodyContent" class="<?php echo $bodyclasses; ?>">
        <?php echo $OUTPUT->main_content() ?>
    </div>


    <div id="columnLeft" class="grid_5 pull_<?php echo $bodywidth; ?>">
        <?php if($hassidepre)
        {
            echo $OUTPUT->blocks_for_region('side-pre');
        } ?>
    </div>

    <div id="columnRight" class="grid_5">
        <?php if($hassidepost)
        {
            echo $OUTPUT->blocks_for_region('side-post');
        } ?>
    </div>


    <div class="grid_24" id="footer">

        <div class="grid_5">
            <p align="center">
                <a href="http://www.okstate.edu/" target="_blank">
                    <img src="<?php echo $OUTPUT->pix_url('tb_okst', 'theme'); ?>" alt="Oklahoma State University Main Website">
                </a>
                <a href="http://info.ifsta.org/" target="_blank">
                    <img src="<?php echo $OUTPUT->pix_url('tb_fpplog', 'theme'); ?>" alt="OSU Fire Protection Publications Main Website">
                </a>
            </p>
        </div>

        <div class="grid_5 push_14">
            <p align="center" style="float: right;">
                <a href="http://www.facebook.com/ifsta" target="_blank">
                    <img src="<?php echo $OUTPUT->pix_url('tb_bfook', 'theme'); ?>" alt="IFSTA Facebook">
                </a>
                <a href="https://twitter.com/#!/IFSTA" target="_blank">
                    <img src="<?php echo $OUTPUT->pix_url('tb_twif', 'theme'); ?>" alt="IFSTA Twitter">
                </a>
                <a href="http://www.linkedin.com/company/ifsta" target="_blank">
                    <img src="<?php echo $OUTPUT->pix_url('tb_dinklin', 'theme'); ?>" alt="IFSTA LinkedIn">
                </a>
            </p>
        </div>

        <div class="grid_24 footer">
            <p align="center">© COPYRIGHT 2013, THE BOARD OF REGENTS, OKLAHOMA STATE UNIVERSITY. ALL RIGHTS RESERVED.</p>
        </div>

    </div>
    </div>
</div>
<div id="hidden" style="display: none;">
Footer
</div>


<?php echo $OUTPUT->standard_footer_html(); ?>
<?php echo $OUTPUT->standard_end_of_body_html() ?>

</body>
</html>
