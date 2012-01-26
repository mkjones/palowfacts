<?php

require_once __DIR__.'/../lib/include.php';

// This probably could be derived from the request URI.
define(/*YO*/'UR_DOMAIN', 'palowfacts.com');
$fact = new Fact($_GET['id']);

?>
<html>
<head>
<link rel="cpalow.jpg" href="thumbnail_image" />
<meta property="og:title" content="Palow Fact #<?= $fact->getFact() ?>" />
<meta property="og:site_name" content="Palow Facts" />
<meta property="og:image" content="http://palowfacts.com/cpalow.jpg" />
<meta property="fb:admins" content="213359" />
<title>Palow Facts</title>
<style>
body {
  background-color:#d4c3b6;
  font-family:helvetica,arial,sans-serif;
}

#topSpacer {
 height:15%;
}

#name {
  font-size:70pt;
  margin-left:5%;
  margin-bottom:20px;
  color:#666;
}

#firstName {}
#lastName {}

#fact {
  color:#2f2f2f;
  font-size:30pt;
  width:60%;
  margin-left:20%;

}

#faceSubscribeContainer {
 float:right;
 margin:5%;
}

#face {
 -moz-border-radius: 5px;
 -webkit-border-radius: 5px;
 border:solid #555 2px;
 cursor:pointer;
}

#subscribeButton {
 margin-top:12px;
 margin-left:25%;
}

#likeButton {
  margin-left:20%;
  margin-top:10px;
}

#hacked-by-chinese {
  position: absolute;
  width: 139px;
  height: 134px;
  background: url(hacked.png) no-repeat transparent;
  top: 0;
  right: 0;
}

</style>
</head>

<body>
<div id="hacked-by-chinese"></div>
<div id='topSpacer'></div>

<div id='name'>
<div id='firstname'>chris</div> <div id='lastname'>palow...</div>
</div>

<div id='fact'>
<?= $fact->render() ?>
</div>
<div id='faceSubscribeContainer'>
<div id='face'>
<img onclick="newfact()" src='cpalow.jpg' />
</div>
<div id='subscribeButton'>
<iframe
  src="//www.facebook.com/plugins/subscribe.php?href=https%3A%2F%2Fwww.facebook.com%2Fpalow&layout=button_count&colorscheme=light&font&width=120&appId=235762803115452"
  scrolling="no"
  frameborder="0"
  style="border:none; overflow:hidden; width:120px;">
</iframe>
</div>
</div>
<div id='likeButton'>
<iframe
  src="http://www.facebook.com/widgets/like.php?href=http://<?=
        UR_DOMAIN.'/'.$fact->getFact();
      ?>"
  scrolling="no"
  frameborder="0"
  style="border:none; width:450px; height:80px">
</iframe>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ?
 "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
  "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
  var pageTracker = _gat._getTracker("UA-15344627-1");
  pageTracker._trackPageview();
} catch(err) {}</script>
<script>
function newfact() {
  if (/\d+$/.test(document.location.href)) {
    document.location = 'http://<?= UR_DOMAIN; ?>';
  } else {
    document.location.reload();
  }
}
</script>
</body>
</html>
