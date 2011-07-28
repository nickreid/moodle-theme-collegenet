<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($hassidepre && !$hassidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($hassidepost && !$hassidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$hassidepost && !$hassidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
<!-- START OF TOP BAR-->
<?php if ($hascustommenu) { ?>
<div class="clearfix" id="top">
	<div id="custommenu">
		<?php echo $custommenu; ?>
	</div>
	<?php if ($hasheading) { ?>
	<div id="profileblock">
		<?php
			include('profileblock.php');
		?>
	</div>
	<?php } ?>
</div>
<?php } ?>
<?php if ($hasheading || $hasnavbar) { ?>
<div id="page-header">
		<div id="page-header-wrapper" class="wrapper clearfix">
		<div class="headermain"><img src="<?php echo $OUTPUT->pix_url('logo', 'theme');?>" alt="CollegeNET" /></div>
		<div id="search-container">
			<form id="search-panel" action="http://google.co.nz/search" method="get" target="_self">
			<label class="acchide" for="id-search-term">Search on Google.</label>
			<input name="q" autocomplete="off" placeholder="Search Google" id="id-search-term" type="text"/>
			<button id="search-button" class="button" type="submit"> Search </button>
			</form>
		</div>
		</div>
</div>

<?php if ($hasnavbar) { ?>
<div class="navbar">
	<div class="wrapper clearfix">
		<div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
		<div class="navbutton"> <?php echo $PAGE->button; ?></div>
	</div>
</div>
<?php } ?>

<?php } ?>
<!-- END OF HEADER -->
<div id="main">
    <div id="page-content-wrapper" class="wrapper clearfix">
        <div id="page-content">
            <div id="region-main-box">
                <div id="region-post-box">
                    <div id="region-main-wrap">
                        <div id="region-main">
                            <div class="region-content">
                                <?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($hassidepre) { ?>
                    <div id="region-pre" class="block-region">
                        <div class="region-content">
                            <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ($hassidepost) { ?>
                    <div id="region-post" class="block-region">
                        <div class="region-content">
                            <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- START OF FOOTER -->
    <?php if ($hasfooter) { ?>
    <div id="page-footer" class="wrapper">
        <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </div>
    <?php } ?>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>