<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:addthis="http://www.addthis.com/help/api-spec" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" <?php language_attributes() ?>>


<head profile="http://gmpg.org/xfn/11">
	<?php // get page title and strip out spaces
	$strTitle = trim(wp_title("",false));
	?>

	<title><?php if (is_home()): echo get_bloginfo('name') . ": " . get_bloginfo('description') . " | Seattle Times Newspaper"; else: echo $strTitle; ?> | Seattle Times Newspaper<?php endif; ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<link rel="stylesheet" type="text/css" href="http://seattletimes.nwsource.com/css/2011/global.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

	<link rel="alternate" type="application/rss+xml" title="Entire site" href="http://seattletimes.nwsource.com/rss/seattletimes.xml" />
	<link rel="alternate" type="application/rss+xml" title="Top stories" href="http://seattletimes.nwsource.com/rss/home.xml" />

	<link rel="Shortcut Icon" href="http://seattletimes.nwsource.com/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="http://seattletimes.nwsource.com/apple-touch-icon.png"/>

	<!-- get jQuery -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

	<?php //get page description for SEO and social media sharing
	if (have_posts() && is_single() OR is_page()):while(have_posts()):the_post();
		$out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt());
		$sDescription = apply_filters('the_excerpt_rss', $out_excerpt);
		endwhile;
	elseif(is_tag()):
		$sDescription = "Posts related to Tag:
		".ucfirst(single_tag_title("", FALSE));
	elseif(is_category()):
		$categorydeschead = strip_tags(category_description());
		$sDescription = apply_filters( 'archive_meta', '' . $categorydeschead . '' );
	else:
		$sDescription = get_bloginfo('description');
	endif; ?>

	<!-- sharing -->
	<!-- Google+ -->
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	<!-- AddThis widget code -->
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=seattletimes"></script>
	<script type="text/javascript">
	var addthis_config = { "data_track_linkback":true, "ui_open_windows": true }
	var addthis_share = {
		title:'<?php echo $strTitle; ?>',
		description:'News, weather, traffic, events and photos from the City Desk at The Seattle Times.',
		templates: { twitter: '<?php echo $strTitle; ?> {{url}} via @seattletimes'  }
	}
	</script>
	<!--  End AddThis widget code -->
	<!-- Facebook -->
	<meta property="og:title" content="<?php if (is_home()): echo get_bloginfo('name'); else: echo $strTitle;; endif; ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="<?php the_permalink() ?>"/>
	<meta property="og:image" content="<?php echo catch_that_image() ?>"/>
	<meta property="og:site_name" content="The Seattle Times"/>
	<meta property="fb:page_id" content="38472826214" />
	<meta property="fb:app_id" content="225286600856790"/>
	<meta property="og:description" content="<?php echo $sDescription; ?>"/>
	<!-- bitly -->
	<meta name="bitly-verification" content="fcb5c28d2fff">
	<!-- end sharing -->

	<!-- SEO stuff -->
	<meta name="description" content="<?php echo $sDescription; ?>" />

	<!-- global javascript -->
	<script type="text/javascript" src="http://seattletimes.nwsource.com/js/ST.js?v=1.1"></script>
	<script type="text/javascript" src="http://seattletimes.nwsource.com/js/STS.js?v=1.0"></script>
	<!-- start omniture -->
	<script language="JavaScript" type="text/javascript" src="http://marketplace.nwsource.com/shared/js/s_code.js?v=1.0"></script>
	<script language="JavaScript" type="text/javascript" src="http://marketplace.nwsource.com/shared/js/omniHelper.js?v=1.0"></script>
	<script language="JavaScript" type="text/javascript"><!--
		if ('function' == typeof window.omni_pageCode) { omni_pageCode(); }
		try {var s_code=s.t();if(s_code)document.write(s_code)} catch(err){}//-->
	</script>
<!-- end omniture -->
	<!-- omniture -->
	<?php if (is_single()) { //for single article ?>
	<meta name="t_omni_pagename" content="st|localnews|todayfile|article" />
	<meta name="t_omni_pubdate" content="<?php the_time('m/d/Y h:i') ?>" />
	<meta name="t_omni_articleid" content="<?php echo($post->post_name) ?>" />
	<meta name="t_omni_site" content="st" />
	<meta name="t_omni_pagetype" content="article" />
	<meta name="t_omni_contenttitle" content="<?php single_post_title(''); ?>" />
	<meta name="t_omni_path" content="st|localnews|todayfile" />
	<meta name="t_omni_author" content="<?php the_author_firstname(); ?> <?php the_author_lastname(); ?>" />
	<?php } elseif (is_category()) { //for category pages ?>
	<meta name="t_omni_pagename" content="st|localnews|todayfile|category|front" />
	<meta name="t_omni_site" content="st" />
	<meta name="t_omni_pagetype" content="front" />
	<meta name="t_omni_contenttitle" content="Category archive: <?php single_cat_title (''); ?> - The Today File - The Seattle Times" />
	<meta name="t_omni_path" content="st|localnews|todayfile" />
	<?php } elseif (is_tag()) { //for tag pages ?>
	<meta name="t_omni_pagename" content="st|localnews|todayfile|tag|front" />
	<meta name="t_omni_site" content="st" />
	<meta name="t_omni_pagetype" content="front" />
	<meta name="t_omni_contenttitle" content="Tag archive: <?php single_tag_title(); ?>  - The Today File" />
	<meta name="t_omni_path" content="st|localnews|todayfile|archive" />
	<?php } elseif (is_author()) { //for author pages ?>
	<meta name="t_omni_pagename" content="st|localnews|todayfile|author|front" />
	<meta name="t_omni_site" content="st" />
	<meta name="t_omni_pagetype" content="front" />
	<meta name="t_omni_contenttitle" content="Author archive: <?php echo
	$strTitle = trim(wp_title("",false));
	?> - The Today File - The Seattle Times" />
	<meta name="t_omni_path" content="st|localnews|todayfile|archive" />
	<?php } else { //for other pages ?>
	<meta name="t_omni_pagename" content="st|localnews|todayfile|front" />
	<meta name="t_omni_site" content="st" />
	<meta name="t_omni_pagetype" content="front" />
	<meta name="t_omni_contenttitle" content="The Today File - The Seattle Times" />
	<meta name="t_omni_path" content="st|localnews|todayfile|category" />
	<?php } ?>

	<!-- start ad set-up -->
	<script type="text/javascript">
	<!--
	//modify for specific page info
	OAS_sitepage = 'www.seattletimes.com/local/thetodayfile/blog/index.html';
	OAS_query = encodeURI(document.location.search);
	OAS_listpos = 'Position1,TopRight,Right,Right1,Right2,Position3,Top1,Middle3,Top,Top3';
	//-->
	</script>
	<!-- end ad set-up -->
	<script type="text/javascript" src="http://seattletimes.nwsource.com/js/standardFunctionality/AdTags.js"></script>
	<!--get facebook comment count-->
	<?php function fb_comment_count() {
	    global $post;
	    $url = get_permalink($post->ID);
	    $filecontent = file_get_contents('https://graph.facebook.com/?ids=' . $url);
	    $json = json_decode($filecontent);
	    $count = $json->$url->comments;
	    if ($count == 0 || !isset($count)) {
	        $count = 0;
	    }
	    echo $count;
	} ?>

	<?php wp_head(); ?>

</head>


<!--[if lt IE 7 ]> <body class="ie6 js_disabled pg_wpblog"> <![endif]-->
<!--[if IE 7 ]> <body class="ie7 js_disabled pg_wpblog"> <![endif]-->
<!--[if IE 8 ]> <body class="ie8 js_disabled pg_wpblog"> <![endif]-->
<!--[if IE 9 ]> <body class="ie9 js_disabled pg_wpblog"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body class="js_disabled pg_wpblog"> <!--<![endif]-->

	<a href="#leftcolumn" class="skip_content">Skip to main content</a>

	<div id="container" class="clearfix">

		<a name="topofpage"></a>

		<div id="topadblock" class="clearfix">
			<div id="adtopright">

				<script type="text/javascript">
				<!--
				OAS_AD('TopRight');
				//-->
				</script>

			</div>
			<div id="adright1">
				<script type="text/javascript">
				<!--
				OAS_AD('Right1');
				//-->
				</script>
			</div>
		</div>

		<div class="header">

			<div id="nav-sec" class="clearfix">

				<ul>
					<li><a href="http://mobile.seattletimes.com/?from=stnv">Mobile site</a></li>
					<li>|</li>
					<li><a href="http://seattletimes.nwsource.com/flatpages/services/mobile.html?from=stnv">Mobile apps</a></li>
					<li>|</li>
					<li><a href="http://seattletimes.nwsource.com/flatpages/services/newsletters.html?from=stnv">Newsletters</a></li>
					<li>|</li>
					<li><a href="http://seattletimes.nwsource.com/flatpages/services/rss.html?from=stnv">RSS</a></li>
					<li>|</li>
					<li class="nav_last"><a href="javascript:void(0);" class="nav-sec-sticky">Subscriber Services</a>
						<ul class="nav-sec-tier2">
							<li><a href="https://www.myseattletimes.com/Subscribe1.aspx?from=stnv" title="Subscribe">Subscribe</a></li>
							<li><a href="https://www.myseattletimes.com/index.aspx?from=stnv" title="MyTimes">MyTimes</a></li>
							<li><a href="https://www.myseattletimes.com/VacationStop.aspx?from=stnv" title="Temporary stops">Temporary stops</a></li>
							<li><a href="http://seattletimes.nwsource.com/flatpages/services/contactus.html?tab=delivery&from=stnv" title="Delivery issues">Delivery issues</a></li>
							<li><a href="https://www.myseattletimes.com/Payment.aspx?from=stnv" title="Make a payment">Make a payment</a></li>
							<li><a href="https://www.myseattletimes.com/eedition.aspx?from=stnv" title="e-Edition">e-Edition</a></li>
							<li><a href="https://www.myseattletimes.com/evantage.aspx?from=stnv" title="Subscriber rewards">Subscriber rewards</a></li>
						</ul>
					</li>
				</ul>

				<div id="nav-sec-user">
					<ul>
					<li><span id="account_center_links"></span></li>

						<li class="nav_last"><a href="javascript:void(0);" class="nav-sec-sticky">Contact/Help</a>
							<ul class="nav-sec-tier2">
								<li><a href="http://seattletimes.nwsource.com/flatpages/services/contactus.html?from=stnv" title="Site feedback/questions">Site feedback/questions</a></li>
								<li><a href="http://seattletimes.nwsource.com/flatpages/services/contactus.html?tab=delivery&from=stnv" title="Home delivery issues">Home delivery issues</a></li>
								<li><a href="http://seattletimes.nwsource.com/flatpages/services/contactus.html?tab=newstip&from=stnv" title="Send us news tips">Send us news tips</a></li>
								<li><a href="http://seattletimes.nwsource.com/flatpages/services/frequentlyaskedquestions.html?from=stnv#letter" title="Send letters to the editor">Send letters to the editor</a></li>
								<li><a href="http://seattletimes.nwsource.com/cgi-bin/SubmitEvent.pl?from=stnv" title="Submit event listings">Submit event listings</a></li>
								<li><a href="http://seattletimes.nwsource.com/flatpages/services/contactus.html?tab=correction&from=stnv" title="Request corrections">Request corrections</a></li>
								<li><a href="http://www.seattletimescompany.com/?from=stnv" title="Company information">Company information</a></li>
							</ul>
						</li>
					</ul>
					<div class="clear"></div>
				</div>
			</div><!-- end secondary nav -->

			<div class="mast clearfix">
				<div class="interiorHead floatleft">
					<div class="headLinks">
						<ul class="nobullets horizontal clearfix">
							<li class="date"><p class="js_date_long">Friday, September 9, 2011</p></li>
							<li class="traffic"><p><a href="http://seattletimes.nwsource.com/html/traffic/?from=stnv">Traffic</a></p></li>
							<li class="weather clearfix">
								<script src="http://community.seattletimes.nwsource.com/weather/myweather.js" language="JavaScript"></script>
							</li>
						</ul>
					</div>
					<div class="clear"></div>
					<div class="logoSmall floatleft">
						<a href="http://seattletimes.nwsource.com"><img width="189" height="33" alt="The Seattle Times" src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/seattletimeslogo_inside_pulitzer.gif"></a>
						<p><a href="http://seattletimes.nwsource.com">Winner of Eight Pulitzer Prizes</a></p>
					</div>
					<div class="pageHeader floatleft">
						<h1><a href="http://seattletimes.nwsource.com/html/localnews/" title="Local Seattle News">Local News</a></h1>
					</div>
				</div><!-- end headlinks -->
				<div class="searchAndSocial floatright">
					<div class="social clearfix">
						<p class="floatleft">Follow us:</p>
						<p class="floatright">
							<a href="http://www.facebook.com/seattletimes" title="Like us on Facebook"><img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i-facebook-15x15.gif" alt="facebook" /></a>
							<a href="http://twitter.com/#!/seattletimes" title="Follow us on Twitter"><img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i-twitter-15x15.gif" alt="twitter" /></a>
						</p>
					</div>
					<div class="clear"></div>
					<div class="search">
						<form method="get" action="http://search.nwsource.com/search">
							<div class="clearfix">
								<div id="searchcontainer" class="clearfix">
									<div class="floatleft"><input type="hidden" name="from" value="ST"><input type="input" name="query" /></div>
									<div class="floatright"><input type="image" src="http://seattletimes.nwsource.com/art/ui/1024/search.gif" /></div>
									<div class="clear"></div>
								</div>
							</div>
						</form>
						<p><a href="http://community.seattletimes.nwsource.com/archive/?from=stnv">Advanced Search</a> | <a href="http://seattletimes.nwsource.com/flatpages/entertainment/advancedsearch.html?from=stnv">Events & Venues</a> | <a href="http://seattletimes.nwsource.com/html/obituaries/?from=stnv">Obituaries</a></p>
					</div>
				</div><!-- end searchandsocial -->
			</div><!-- end mast -->

		</div><!-- end header -->

		<!-- nav include -->
		<div id="nav" class="nav_v2 clearfix">
	<ul id="nav_main">
		<li class="nav-home"><a href="http://seattletimes.nwsource.com/html/home/?from=stnv1">Home</a>
			<div class="dropdown_2columns"><!-- Begin 2 columns container -->
				<h3><a href="http://seattletimes.nwsource.com/html/home/?from=stnv2">Home <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
					<li><a href="http://seattletimes.nwsource.com/html/blogsdiscussions/?from=stnv2">Blogs</a></li>
					<li><a href="http://forums.seattletimes.nwsource.com/forums/?from=stnv2">Forums</a></li>
					<li><a href="http://seattletimes.nwsource.com/flatpages/specialreports/interactives.html?from=stnv2">Graphics &amp; databases</a></li>
					<li><a href="http://seattletimes.nwsource.com/photography/?from=stnv2">Photography</a>  </li>
					<li><a href="http://seattletimes.nwsource.com/flatpages/video/seattletimesvideo.html?from=stnv2">Video</a></li>

					<li><a href="http://seattletimes.nwsource.com/html/specialreports/?from=stnv2">Special reports</a></li>
					<li><a href="http://seattletimes.nwsource.com/corrections/?from=stnv2">Corrections</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Shortcuts</h5>
					<ul>
					<li><a href="http://seattletimes.nwsource.com/html/tableofcontents/?from=stnv2">Today's news index</a></li>
					<li><a href="http://seattletimes.nwsource.com/html/trending/?from=stnv2">Trending with readers</a></li>
					<li><a href="http://nl.newsbank.com/nl-search/we/Archives/?p_product=HA-SE&amp;p_theme=histpaper&amp;p_action=keyword">Historical archives</a></li>
					</ul>
				</div>
			</div><!-- End 2 columns container -->
		</li>

		<li class="nav-news"><a href="http://seattletimes.nwsource.com/html/localnews/?from=stnv1">News</a><!-- Begin News Item -->
			<div class="dropdown_3columns"><!-- Begin 3 columns container -->
				<h3><a href="http://seattletimes.nwsource.com/html/localnews/?from=stnv2">News <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/localnews/?from=stnv2">Local News</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/nationworld/?from=stnv2">Nation &amp; World</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/obituaries/?from=stnv2">Obituaries</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/politics/?from=stnv2">Politics</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/education/?from=stnv2">Education</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/health/?from=stnv2">Health</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/specialreports/?from=stnv2">Special reports</a></li>
						<li><a href="http://seattletimes.nwsource.com/flatpages/local/newspartners/localnewssites.html?from=stnv2">Community blogs</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Blogs &amp; Columns</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/dannywestneat/?from=stnv2">Danny Westneat</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/nicolebrodeur/?from=stnv2">Nicole Brodeur</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/jerrylarge/?from=stnv2">Jerry Large</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/ronjudd/?from=stnv2">Ron Judd</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/theblotter/?from=stnv2">The Blotter</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/politicsnorthwest/?from=stnv2">Politics Northwest</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/picturethis/?from=stnv2">Picture This</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/seattlesketcher/?from=stnv2">Seattle Sketcher</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Shortcuts</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/traffic/?from=stnv2">Traffic</a></li>
						<li><a href="http://community.seattletimes.nwsource.com/weather/?from=stnv2">Weather</a></li>
						<li><a href="http://community.seattletimes.nwsource.com/lottery/index.php?from=stnv2">Lottery</a></li>
					</ul>
				</div>
			</div><!-- End 3 columns container -->
		</li><!-- End News Item -->
		<li class="nav-business-tech"><a href="http://seattletimes.nwsource.com/html/businesstechnology/?from=stnv1">Business &amp; Tech</a><!-- Begin Business/Tech Item -->
			<div class="dropdown_3columns"><!-- Begin 3 columns container -->
				<h3><a href="http://seattletimes.nwsource.com/html/businesstechnology/?from=stnv2">Business &amp; Tech <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/boeingaerospace/?from=stnv2">Boeing / Aerospace</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/microsoft/?from=stnv2">Microsoft</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/personaltechnology/?from=stnv2">Personal technology</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/realestate/?from=stnv2">Real estate</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Blogs &amp; Columns</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/technologybrierdudleysblog/?from=stnv2">Brier Dudley's Blog</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/microsoftpri0/?from=stnv2">Microsoft Pri0</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/soundeconomywithjontalton/?from=stnv2">Sound Economy | Jon Talton</a></li>
						<li><a href=" http://seattletimes.nwsource.com/html/sundaybuzz/?from=stnv2">Sunday Buzz</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Shortcuts</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/stockmarket/?from=stnv2">Stock prices</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/businesstechnology/bizeventscalendar.html">Business events</a></li>
						<li><a href="http://forums.seattletimes.nwsource.com/forums/viewforum.php?f=76&from=stnv2">Plugging In: Tech Forum</a></li>
					</ul>
				</div>
			</div><!-- End 3 columns container -->
		</li><!-- End Bus/Tech -->
		<li class="nav-sports"><a href="http://seattletimes.nwsource.com/html/sports/?from=stnv1">Sports</a><!-- Begin Sports Item -->
			<div class="dropdown_3columns"><!-- Begin 3 columns container -->
				<h3><a href="http://seattletimes.nwsource.com/html/sports/?from=stnv2">Sports <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/highschoolsports/?from=stnv2">High School</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/huskies/?from=stnv2">UW Huskies</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/cougars/?from=stnv2">WSU Cougars</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/seattleuniversity/?from=stnv2">SU Redhawks</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/collegesports/?from=stnv2">College sports</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/mariners/?from=stnv2">Mariners</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/seahawks/?from=stnv2">Seahawks</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/sounders/?from=stnv2">Sounders FC</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/storm/?from=stnv2">Storm</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/nba/?from=stnv2">NBA</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/hockey/?from=stnv2">Hockey</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/golf/?from=stnv2">Golf</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/othersports/?from=stnv2">Other sports</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Blogs &amp; Columns</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/thebrewery/?from=stnv2">Jerry Brewer</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/stevekelley/?from=stnv2">Steve Kelley</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/sidelinechatter/?from=stnv2">Sideline Chatter</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/huskyfootballblog/?from=stnv2">Husky Football</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/huskymensbasketballblog/?from=stnv2">Husky Men's Basketball</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/marinersblog/?from=stnv2">Mariners</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/seahawksblog/?from=stnv2">Seahawks</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/thehotstoneleague/?from=stnv2">The Hot Stone League</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/soundersfcblog/?from=stnv2">Sounders FC</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/highschoolsportsblog/?from=stnv2">High School Sports</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/reeltimenorthwest/?from=stnv2">Reel Time Fishing NW</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/womenshoopsblog/?from=stnv2">Women's Hoops</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Shortcuts</h5>
					<ul>
						<li><a href="http://forums.seattletimes.nwsource.com/forums/viewforum.php?f=61&sid=3676a512cb7ccec5368a0fc1bcc6d28f?from=stnv2">Sports forums</a></li>
						<li><a href="http://seattletimes.nwsource.com/sports/scores/?from=stnv2">Scores &amp; stats</a></li>
						<li><a href="http://seattletimes.nwsource.com/flatpages/sports/sports/tvradiolistings.html?from=stnv2">Sports on TV &amp; radio</a></li>
					</ul>
				</div>
			</div><!-- End 3columns container -->
		</li><!-- End Sports Item -->
		<li class="nav-entertainment"><a href="http://seattletimes.nwsource.com/html/entertainment/?from=stnv1">Entertainment</a><!-- Begin Entertainment Item -->
			<div class="dropdown_3columns"><!-- Begin 3 columns container -->
				<h3><a href="http://seattletimes.nwsource.com/html/entertainment/?from=stnv2">Entertainment <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/restaurants/?from=stnv2">Restaurants</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/movies/?from=stnv2">Movies</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/musicnightlife/?from=stnv2">Music &amp; Nightlife</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/thearts/?from=stnv2">The Arts</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/books/?from=stnv2">Books</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Blogs &amp; Columns</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/allyoucaneat/?from=stnv2">All You Can Eat | Nancy Leson</a></li>
						<li><a href="http://search.nwsource.com/search?searchtype=cq&sort=date&from=ST&byline=Mary%20Ann%20Gwinn&amp;from=stnv2">Lit Life</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/matsononmusic/?from=stnv2">Matson on Music</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/popcornprejudiceamovieblog/?from=stnv2">Popcorn &amp; Prejudice: A movie blog</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/reweb/?from=stnv2">re:Web</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Shortcuts</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/comicsgames/?from=stnv2">Games</a></li>
						<li><a href="http://seattletimes.nwsource.com/comicsgames/?from=stnv2">Comics</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/horoscopes/?from=stnv2">Horoscopes</a> </li>
						<li><a href="http://affiliate.zap2it.com/tvlistings/ZCGrid.do?aid=sea&amp;from=stnv2">TV listings</a></li>
						<li><a href="http://community.seattletimes.nwsource.com/entertainment/?date=Today&search=event&amp;from=stnv2">Today's events</a></li>
						<li><a href="http://seattletimes.nwsource.com/flatpages/entertainment/advancedsearch.html?from=stnv2">Find events &amp; venues</a></li>
						<li><a href="http://seattletimes.nwsource.com/cgi-bin/SubmitEvent.pl?from=stnv2">Submit listings</a></li>
					</ul>
				</div>
			</div><!-- End 3 columns container -->
		</li><!-- End Entertainment Item -->
		<li class="nav-living"><a href="http://seattletimes.nwsource.com/html/living/?from=stnv1">Living</a><!-- Begin Living Item -->
			<div class="dropdown_2columns clearfix"><!-- Begin 2 columns container -->
				<h3><a href="http://seattletimes.nwsource.com/html/living/?from=stnv2">Living <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/homegarden/?from=stnv2">Home &amp; Garden</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/pacificnw/?from=stnv2">Pacific NW Magazine</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/foodwine/?from=stnv2">Food &amp; Wine</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/restaurants/?from=stnv2">Restaurants</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Blogs &amp; Columns</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/allyoucaneat/?from=stnv2">All You Can Eat | Nancy Leson</a></li>
						<li><a href=" http://seattletimes.nwsource.com/html/wineadviser/?from=stnv2">Wine Adviser | Paul Gregutt</a></li>
						<li><a href="http://search.nwsource.com/search?searchtype=cq&sort=date&from=ST&byline=Ciscoe%20Morris&from=stnv2">In the Garden | Ciscoe Morris</a></li>
						<li><a href="http://search.nwsource.com/search?query=%22valerie+easton%22+&sort=date&from=ST&rs=1&amp;from=stnv2">Plant Life | Valerie Easton</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/tailsofseattle/?from=stnv2">Tails of Seattle pets blog</a></li>
					</ul>
				</div>
			</div><!-- End 2 columns container --
		</li><!-- End Living Item -->
		<li class="nav-travel"><a href="http://seattletimes.nwsource.com/html/traveloutdoors/?from=stnv1">Travel</a><!-- Begin Travel Item -->
			<div class="dropdown_2columns"><!-- Begin 2 columns container -->
				<h3><a href="http://seattletimes.nwsource.com/html/traveloutdoors/?from=stnv2">Travel &amp; Outdoors <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://seattletimes.nwsource.com/flatpages/travel/traveltools.html?from=stnv2">Travel tools</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/seattleguide/?from=stnv2">Seattle guide</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/washingtonguide/?from=stnv2">Washington guide</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/oregonguide/?from=stnv2">Oregon guide</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/britishcolumbiaguide/?from=stnv2">British Columbia guide</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Blogs &amp; Columns</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/travelwise/?from=stnv2">Travel Wise | Carol Pucci</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/destinations/?from=stnv2">Destinations | Kristin Jackson</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/ricksteveseurope/?from=stnv2">Rick Steves' Europe</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/fieldnotes/?from=stnv2">Field Notes nature blog</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/reeltimenorthwest/?from=stnv2">Reel Time Fishing Northwest</a></li>
					</ul>
				</div>
			</div><!-- End 2 columns container -->
		</li><!-- End Travel Item -->
		<li class="nav-opinion"><a href="http://seattletimes.nwsource.com/html/editorialsopinion/?from=stnv1" class="nav_last">Opinion</a><!-- Begin 2 columns Item -->
			<div class="dropdown_2columns"><!-- Begin 2 columns container -->
				<h3><a href="http://seattletimes.nwsource.com/html/editorialsopinion/?from=stnv2">Editorials &amp; Opinion <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/editorialsopinion/?from=stnv2">Editorials &amp; Opinion</a></li>
						<li><a href="http://seattletimes.nwsource.com/html/northwestvoices/index.html?from=stnv2">Letters to the Editor</a></li>
					</ul>
				</div>
				<div class="col_2">
					<h5>Blogs &amp; Columns</h5>
					<ul>
						<li><a href="http://seattletimes.nwsource.com/html/edcetera/index.html?from=stnv2">Ed Cetera Blog</a></li>
						<li><a href="http://search.nwsource.com/search?sort=date&from=ST&source=ST&byline=Joni%20Balter&amp;from=stnv2">Joni Balter</a></li>
						<li><a href="http://search.nwsource.com/search?sort=date&topic=Opinion&from=ST&searchtype=cq&byline=Ryan+Blethen&amp;from=stnv2">Ryan Blethen</a></li>
						<li><a href="http://search.nwsource.com/search?sort=date&from=ST&source=ST&byline=Lance%20Dickie&amp;from=stnv2">Lance Dickie</a></li>
						<li><a href="http://search.nwsource.com/search?sort=date&from=ST&source=ST&byline=Bruce%20Ramsey&amp;from=stnv2">Bruce Ramsey</a></li>
						<li><a href="http://search.nwsource.com/search?searchtype=cq&sort=date&from=ST&byline=Kate%20Riley&amp;from=stnv2">Kate Riley</a></li>
						<li><a href="http://search.nwsource.com/search?sort=date&from=ST&source=ST&byline=Lynne%20Varner&amp;from=stnv2">Lynne Varner</a></li>
					</ul>
				</div>
			</div><!-- End 2 columns container -->
		</li><!-- End Opinion Item -->
	</ul>
	<ul id="nav_marketplace">
		<li class="nav-shopping"><a href="http://www.nwsource.com/?from=stn">Shopping</a><!-- Begin Shopping Item -->
			<div class="dropdown_1column align_right"><!-- Begin 1 columns container -->
				<h3><a href="http://www.nwsource.com/?from=stn">Shopping <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://www.nwsource.com/column/daily-find?from=stn">Daily Find</a></li>
						<li><a href="http://www.nwsource.com/column/minding-store?from=stn">Minding the Store</a></li>
						<li><a href="http://www.nwsource.com/ae/scr/nws_oth_sr.cfm?c=&p=re&e=11&a=0&ah=0&dr=0&sd=&ed=&sales=on&from=stn">Shopping events</a></li>
						<li><a href="http://www.nwsource.com/guides/?from=stn">Editors' Picks</a></li>
						<li><a href="http://www.nwsource.com/shopping/forum?from=stn">Shopping forum</a></li>
						<li><a href="http://www.coupons.com/couponweb/Offers.aspx?pid=13100&zid=si08&nid=10&bid=alk062012062963ed574a21113?from=stn">Coupons</a></li>
					</ul>
				</div>

			</div><!-- End 1 columns container -->
		</li><!-- End Shopping Item -->
		<li class="nav-jobs"><a href="http://www.nwjobs.com/?from=stn">Jobs</a><!-- Begin Jobs Item -->
			<div class="dropdown_1column align_right"><!-- Begin 1 columns container -->
				<h3><a href="http://www.nwjobs.com/?from=stn">Jobs <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://careers.nwjobs.com/jobs/search/advanced?from=stn">Find a job</a></li>
						<li><a href="http://careers.nwjobs.com/careers/resumes?from=stn">Post a resume</a></li>
						<li><a href="http://blog.nwjobs.com/careercenter/?from=stn">Career center</a></li>
						<li><a href="http://www.nwjobs.com/employers/postjob/?from=stn">Post a job</a></li>
					</ul>
				</div>
			</div><!-- End 1 columns container -->
		</li><!-- End Jobs Item -->
		<li class="nav-autos"><a href="http://www.nwautos.com/?from=stn">Autos</a><!-- Begin Autos Item -->

			<div class="dropdown_1column align_right"><!-- Begin 1 columns container -->
				<h3><a href="http://www.nwautos.com/?from=stn">Autos <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://cars.nwautos.com/autos/search/?from=stn">Find a vehicle</a></li>
						<li><a href="http://cars.nwautos.com/motors/dealer/search/?from=stn">Find a dealer</a></li>
						<li><a href="http://www.nwautos.com/research/?from=stn">Research </a></li>
						<li><a href="http://www.nwautos.com/sell/?from=stn">Sell a vehicle</a></li>
					</ul>
				</div>
			</div><!-- End 1 columns container -->
		</li><!-- End Autos Item -->
		<li class="nav-homes"><a href="http://marketplace.nwsource.com/realestate/?from=stn">Homes</a><!-- Begin Homes Item -->
			<div class="dropdown_1column align_right"><!-- Begin 1 columns container -->
				<h3><a href="http://marketplace.nwsource.com/realestate/?from=stn">Homes <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li><a href="http://nwhomes.nwsource.com/realestate/search/?from=stn">For sale</a></li>
						<li><a href="http://marketplace.nwsource.com/realestate/rentals/?from=stn">Rentals</a></li>
						<li><a href="http://marketplace.nwsource.com/realestate/newhomes/?from=stn">New homes</a></li>
						<li><a href="http://nwhomes.nwsource.com/realestate/search/results?from=stn?distance=5&isOpenHouse=true&lotSizeUnitChoices=smallUnits&sort=LastMod+desc&terms=sell">Open houses</a></li>
						<li><a href="http://marketplace.nwsource.com/realestate/postlisting.html?from=stn">Post a listing</a></li>
					</ul>
				</div>
			</div><!-- End 1 columns container -->
		</li><!-- End Homes Item -->
		<li class="nav-classifieds"><a href="http://nwsource.kaango.com/?from=stn" class="nav_last">Classifieds</a><!-- Begin Classifieds Item -->
			<div class="dropdown_1column align_right">
				<h3><a href="http://nwsource.kaango.com/?from=stn">Classifieds <img src="http://seattletimes.nwsource.com/art/ui/1024/v_2011/i_arrow_bc5c23_right.gif" alt="" /></a></h3>
				<div class="col_1">
					<ul>
						<li class="align_right"><a href="http://nwsource.kaango.com/?from=stn">Search classifieds</a></li>
						<li class="align_right"><a href="http://www.nwsource.com/classifieds/postlisting.html?from=stn">Post a listing</a></li>
					</ul>
				</div>
			</div><!-- End 1 columns container -->
		</li><!-- End Classifieds Item -->
	</ul>
</div><!-- end nav -->
		<!-- end nav include -->

		<div id="content" class="clearfix">
		
		