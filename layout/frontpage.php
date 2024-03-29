<?php
// ***************** IMPORTANT NOTICE ********************
// The themedirectory will NEED to be changed to $themedirectory = "theme/hrdnz_lite";
// if you want to use this on your site! This is so that it functions on my test
// server only.
// Comment out the first line and uncomment the second line to use on your own site.
$themedirectory = "../themes/hrdnz_lite";
// $themedirectory = "theme/hrdnz_lite";
// ****************** END NOTICE ***********************

$hasheading = ($PAGE->heading);
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));

$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}


if (!empty($PAGE->theme->settings->logo)) {
    $logourl = $PAGE->theme->settings->logo;
} else {
    $logourl = $OUTPUT->pix_url('banner', 'theme');
}

if (!empty($PAGE->theme->settings->footnote)) {
    $footnote = $PAGE->theme->settings->footnote;
} else {
    $footnote = '<!-- There was no custom footnote set -->';
}

if (($PAGE->theme->settings->mbcredits)==1) {
    $mbcredits = 'You can make a theme like this one by taking the <a href="http://www.moodlebites.com" target="_blank">MoodleBites for Theme Designers</a> course!';
} else {
    $mbcredits = '<!-- Credits were disabled -->';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    
    <!-- Slider start -->
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <link rel="stylesheet" type="text/css" href="<?= $themedirectory ?>/style/contentslider.css" />
    <script type="text/javascript" src="<?= $themedirectory ?>/javascript/contentslider.js">
    <!--
    /***********************************************
    * Featured Content Slider- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
    * This notice MUST stay intact for legal use
    * Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
    ***********************************************/
    -->
    </script>
    <!-- Slider end -->
    
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
	<div id="wrapper" class="clearfix">
<?php if ($hasheading || $hasnavbar) { ?>
<div id="top-bar" class="clearfix">
    <?php
    if (!empty($PAGE->layout_options['langmenu'])) { echo $OUTPUT->lang_menu(); }
    echo $OUTPUT->login_info();
    ?>
</div>

    <div id="page-header" class="clearfix">
	<!-- <img class="sitelogo" src="<?php // echo $logourl; ?>" alt="Custom logo here" /> -->
	
	    <?php if ($hascustommenu) { ?>
		<div id="custommenu"><?php echo $custommenu; ?></div>
	    <?php } ?>
	    
	        <?php if ($hasheading) { ?>
		
		    	<h1 class="headermain"><?php echo $PAGE->heading ?></h1>
    		    <div class="headermenu">
        			<?php
    			       	echo $PAGE->headingmenu
        			?>
	        	</div>
	        <?php } ?>
		
			<div id="contentslider" class="clearfix">
			    
			    <!--Inner content DIVs should always carry "contentdiv" CSS class-->
			    <!--Pagination DIV should always carry "paginate-SLIDERID" CSS class-->
			    
			    <div id="slider1" class="sliderwrapper">
			    
			    </div>
			    
			    <div id="paginate-slider1" class="pagination">
			    
			    </div>
			    
			    <script type="text/javascript">
			    
			    featuredcontentslider.init({
				    id: "slider1",  //id of main slider DIV
				    contentsource: ["ajax", "<?= $themedirectory ?>/slidercontent/content.php"],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
				    toc: ["<img src='<?= $themedirectory ?>/pix/1.png' />", "<img src='<?= $themedirectory ?>/pix/2.png' />", "<img src='<?= $themedirectory ?>/pix/3.png' />", "<img src='<?= $themedirectory ?>/pix/4.png' />", "<img src='<?= $themedirectory ?>/pix/5.png' />", "<img src='<?= $themedirectory ?>/pix/6.png' />", "<img src='<?= $themedirectory ?>/pix/7.png' />", "<img src='<?= $themedirectory ?>/pix/8.png' />", "<img src='<?= $themedirectory ?>/pix/9.png' />"],  //Valid values: "#increment", "markup", ["label1", "label2", etc]
				    nextprev: ["<img src='<?= $themedirectory ?>/pix/left.png' />", "<img src='<?= $themedirectory ?>/pix/right.png' />"],  //labels for "prev" and "next" links. Set to "" to hide.
				    revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
				    enablefade: [true, 0.2],  //[true/false, fadedegree]
				    autorotate: [true, 3000],  //[true/false, pausetime]
				    onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
					    //previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
					    //curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
				    }
			    })
			    
			    </script>
			</div>

    </div>

<?php } ?>

<!-- END OF HEADER -->

<div id="page-content-wrapper">
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">

                <div id="region-main-wrap">
                    <div id="region-main">
                        <div class="region-content">
                            <?php echo method_exists($OUTPUT, "main_content")?$OUTPUT->main_content():core_renderer::MAIN_CONTENT_TOKEN ?>
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
    <div id="page-footer" class="clearfix">
	<div class="footnote"><?php echo $footnote; ?></div>
	<div class="mbcredits"><?php echo $mbcredits; ?></div>
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