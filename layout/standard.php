<?php

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$bodywidth = $hassidepost ? 14 : 18;

echo $OUTPUT->doctype() ?>
<html>
<head>
    <title><?php echo $PAGE->title ?></title>
    <?php echo $OUTPUT->standard_head_html() ?>
    <link rel="stylesheet" type="text/css" href="/theme/ifsta/style/jquery-ui-1.8.6.css" />
    <link rel="stylesheet" type="text/css" href="/theme/ifsta/style/jquery.treeview.css" />
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">

<?php echo $OUTPUT->standard_top_of_body_html() ?>
<div id="bodyWrapper" class="container_24">
    <div id="header" class="grid_24">
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
            <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
            <div class="navbutton"> <?php echo $PAGE->button; ?></div>
        </div>
    </div>

    <div id="bodyContent" class="grid_<?php echo $bodywidth; ?> push_5">
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

        <div class="grid_4 push_15">
            <p align="center">
                <a href="http://www.facebook.com/ifsta" target="_blank">
                    <img src="<?php echo $OUTPUT->pix_url('tb_bfook', 'theme'); ?>" alt="IFSTA Facebook Page">
                </a>
                <a href="https://twitter.com/#!/IFSTA" target="_blank">
                    <img src="<?php echo $OUTPUT->pix_url('tb_twif', 'theme'); ?>" alt="IFSTA Twitter Account">
                </a>
            </p>
        </div>

        <div class="grid_24 footer">
            <p align="center">© COPYRIGHT 2013, THE BOARD OF REGENTS, OKLAHOMA STATE UNIVERSITY. ALL RIGHTS RESERVED.</p>
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
