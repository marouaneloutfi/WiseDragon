<!DOCTYPE HTML>
<html>
    <head>
        <title> <?php echo $this->fetch('title'); ?> The Wise Dragon</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="author" content="rottenc" />
        <meta name="Description" content="All hail the old mighty wise dragon" />

<meta property="og:url"   content="https://thewisedragon.com<?php echo $this->here; ?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="great Awesome Quotes" />
<meta property="og:description"        content="view thousands of random quotes, browse by category or by author..." />
<meta property="og:image"       content="https://thewisedragon/assets/wisy.png" />
         <link rel="shortcut icon" href="favicon.ico" >

        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link href="https://fonts.googleapis.com/css?family=Cardo:400,400italic|Radley|Tangerine" rel="stylesheet">
       
        <link rel="stylesheet" href="/assets/css/main.css" />
        <?php echo $this->fetch('page_css'); ?> 
        <style>
        #dragons {
    display: block;
    position: absolute;
    z-index: -1;
}
#dragon{

  position: absolute;
  top: 100px;
  left: 620px;
}


.quote {
  font-family: 'Cardo', serif;
  font-size: 1.5em;
  width: 80%;
  height: auto;
  margin: 0 auto;
  background-color: #efefef;
  padding: 20px;
  background-color: rgba(255,255,255,0.9);;
  border-radius: 20px;
  color: #000;
  box-shadow: -10px 10px 20px rgba(100,100,100,.8);;
}
.author {
  font-style: italic;
}

</style>
        <!--[if lte IE 9]><link rel="stylesheet" href="/assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="/assets/css/ie8.css" /><![endif]-->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1142551612640549",
    enable_page_level_ads: true
  });
</script>
    </head>
    <body>
<canvas id="dragons"> </canvas>
            <div id="wrapper">
                <div id="main">
                    <div class="inner">
                        <header id="header">
                            <?php echo $this->element('header'); ?> 
                        </header>
                            <section id="banner">
                                <?php echo $this->fetch('content'); ?>
                            </section>
                            <?php echo $this->fetch('paging'); ?>
                    </div>
                </div>
                    <div id="sidebar">
                        <div class="inner">
                            <section id="search" class="alt">
                                <?php echo $this->element('search'); ?>
                            </section>
                            <nav id="menu">
                                <?php echo $this->element('menu'); ?>
                            </nav>
                            <section>
                               <?php echo $this->element('contact'); ?>
                            </section>
                            <footer id="footer">
                                <?php echo $this->element('footer'); ?>
                            </footer>
                        </div>
                    </div>
            </div>
            <script src="/assets/js/jquery.min.js"></script>
            <script src="/assets/js/skel.min.js"></script>
            <script src="/assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="/assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="/assets/js/main.js"></script>
            <script src="/assets/js/dragons.js"></script>

  <script>
         $( document ).ready(function() {
   

    <?php echo $this->fetch('generate_js'); ?>
    $("#firebreath").on( "click", function() {
    generate();
});  

<?php echo $this->fetch('ready_script'); ?>
});


    </script>
    </body>
</html>