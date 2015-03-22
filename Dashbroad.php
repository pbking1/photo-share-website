<?php
include('session.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="no-js ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="no-js ie8 lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html dir="ltr" lang="en-US" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>Pinfinity Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="colors/default.css" type="text/css">
    <link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css" type="text/css">
    <script src="js/modernizr.js" type="text/javascript">
</script>
</head>

<body>
    <header id="header">

        <div id="site-head">
            <div class="wrap group">
                <hgroup class="logo">
                    <h1><a href="index.html"><img src="images/dummy/logo.png" alt=""></a></h1>
                </hgroup>

                <div class="header-wgt group">
                    <aside class="widget group widget_ci_social_widget"> <a href="#" class="icn pinterest">Pinterest</a> </aside>

                    <aside class="widget widget_search group">
                        <form action="/" id="searchform1" class="searchform" method="get" role="search">
                            <input size="27" type="text" title="Search" id="s1" class="s" name="s"> <a id="searchsubmit1" class="searchsubmit"><img src="images/search.png" alt="GO"></a>
                        </form>
                    </aside>
                </div><!-- .header-wgt -->
            </div><!-- .wrap < #header -->
        </div><!-- #site-head -->

        <nav>
            <div class="wrap group">
                <ul id="navigation" class="group">
                    <li class="current_page_item"><a href="Dashbroad.php">Home</a></li>
                    <li><a href="gallery.php">Profile</a></li>
                </ul>
            </div><!-- .wrap < nav -->
        </nav>
    </header>

    <div id="page">
        <section id="main">
            <div class="wrap group">
                <div id="box-container">
                    <div id="entry-listing" class="group">


                        <!--article id="post-210" class="post-210 category-blog-posts entry box format-image">
                            <div class="entry-content-cnt">
                                <div class="entry-content">
                                    <a href="images/dummy/res8-1024x674.jpg" class="thumb" data-lightbox="fancybox[210]" title=""><img src="images/dummy/res8-500x329.jpg" class="attachment-ci_listing_thumb" alt="Swimming pool at the modern luxury villa, Crete, Greece" title="Swimming pool at the modern luxury villa, Crete, Greece"></a>
                                </div>
                            </div>

                            <div class="entry-desc">
                                <h1><a href="#" title="Permalink to Swimming pool at the modern luxury villa, Crete, Greece.">Swimming pool at the modern luxury villa, Crete, Greece.</a></h1>

                            </div>
                        </article-->
                        <?php
                        
                            $dbnum=mysql_connect("localhost","root","xxxxxx");
                            mysql_select_db("web_bug_db");
                            $result = mysql_query("select * from imagetable order by id desc");
                            if($result != 0){
                                while($fields = mysql_fetch_assoc($result)){
                                    echo "<article id='post-210' class='post-210 category-blog-posts entry box format-image'>";
                                    echo "<div class='entry-content-cnt'>";
                                    echo "<div class='entry-content'>";
                                    echo "<a href='pics/" .$fields['image'] . "' class='thumb' data-lightbox='fancybox[210]' title='' alt='game' title='game'>";
                                    echo "<img src='pics/" .$fields['image'] . "' class='attachment-ci_listing_thumb' height='200' width='200'></a>";
                                    echo "</div></div>";
                                    echo "<div class='entry-desc'>";
                                    echo "<h1><a>" . $fields['des'] . "</a></h1>";
                                    echo "</div></article>";


                                }
                            }else{
                                echo "no pic";
                            }
                            
                        ?> 
                        
                    </div><!-- #entry-listing -->

                    <div class="nav">
                        <a id="nextpage" href="content1.html">Next Page</a>
                    </div>
                </div>
            </div><!-- .wrap < #main -->
        </section><!--  #main -->

        <footer id="footer">
            <div class="wrap group">
                <div class="footer-text">
                    <a href="#">Pinfinity</a>
                </div>
            </div>
        </footer>
    </div><!-- #page -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/jquery.isotope.js" type="text/javascript"></script>
<script src="js/jquery.fitvids.js" type="text/javascript"></script>
<script src="js/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="js/jquery.formLabels1.0.js" type="text/javascript"></script>
<script src="js/jquery.jplayer.js" type="text/javascript"></script>
<script src="js/jquery.ias.min.js" type="text/javascript"></script>

<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="js/selectivizr-min.js"></script><![endif]-->
<script defer src="js/scripts.js" type="text/javascript"></script>

<script type="text/javascript">
jQuery.ias({
    container   : "#entry-listing",
    item        : ".entry",
    pagination  : ".nav",
    next        : "#nextpage",
    loader  : "images/ajax-loader.gif",
    onRenderComplete: function(items) {
      var $newElems = jQuery(items).addClass("newItem");

      $newElems.hide().imagesLoaded(function(){
        if( jQuery(".flexslider").length > 0) {
          jQuery(".flexslider").flexslider({
            'controlNav': true,
            'directionNav': true
          });
        }
        jQuery(this).show();
        jQuery('#infscr-loading').fadeOut('normal');
        jQuery("#entry-listing").isotope('appended', $newElems );
        loadAudioPlayer();
      });
    }
    });
    </script>
</body>
</html>