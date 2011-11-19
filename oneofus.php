<?php
$fact = new Fact($_GET['id']);

?>
<html>
<head>
<link rel="cpalow.jpg" href="thumbnail_image" />
<meta property="og:title" content="Palow Fact #<?= $fact->getFact()?>" />
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

#face {
 float:right;
 margin:5%;
 -moz-border-radius: 5px;
 -webkit-border-radius: 5px;
 border:solid #555 2px;
 cursor:pointer;
}

#likeButton {
  margin-left:20%;
  margin-top:10px;
}

#oneofus {
  background-color:black;
  color:#d4c3b6;
  font-face:impact;
  font-size:50pt;
  margin-right:15%;
 float:right;
}

</style>
</head>

<body>
<div id='topSpacer'></div>

<!--<div id='name'>
<div id='firstname'>chris</div> <div id='lastname'>palow...</div>
</div>
-->

<div id='fact'>
<?php echo $fact->render() ?>
</div>
<!--<div id='face'>
<img onclick="newfact()" src='/cpalow.jpg' />
</div>
-->
<div id='likeButton'>
<iframe src="http://www.facebook.com/widgets/like.php?href=http://palowfacts.com/<?= $fact->getFact() ?>"
        scrolling="no" frameborder="0"
        style="border:none; width:450px; height:80px"></iframe>
</div>
<div>
<span id="oneofus">ONE OF US</span>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
  var pageTracker = _gat._getTracker("UA-15344627-1");
  pageTracker._trackPageview();
} catch(err) {}</script>
<script>
function newfact() {
  if (/\d+$/.test(document.location.href)) {
    document.location = 'http://palowfacts.com';
  } else {
    document.location.reload();
  }
}
</script>
</body>
</html>

<?php

class Fact {

  const TEST_FACT = 'bad';

  static $facts = array(
    'Once killed a bear with his bare hands.  Then he phished it.',
    'Took down a 1 million host botnet.  With a bloom filter.',
    'Derived the meaning of life.  Using only css history sniffing.',
    'Phished Barack Obama.',
    'Is having a beer at the SI Keg. Without spamming his friends\' feeds.',
    'Discovered the identity of his father. Using only his browser fingerprint.',
    'Exploited an XSS hole in Facebook.  Before he knew what javascript was.',
    'Cracks 4 WEP networks before breakfast.  With a palm pilot.',
    'Thought up of Koobface in a dream, then wrote it in 5 minutes.  In C.',
    'Has automated solving captchas. With an FPGA.',
    'Doesn\'t usually phish people.  But when he does, he phishes Bruce Schneier.',
    'Is NP complete.',
    'Discovered the identity of his father. Using only his browser fingerprint.',
    '<b>is</b> Anonymous.',
    'Remembers the Alamo.  He was the &lt;href /&gt;.',
    'Detects fake accounts effortlessly. By their uid.',
    'Can smell a phishing site from 10 miles away.',
    'Wrote the source for an entire distro in the sands of Normandy.  When it washed away he didn\'t cry.',
    '\'s mother has a tattoo.  It says "Son."',
    'Pities Mr. T for being a fool.',
    'Knows how to take square roots.  Without Newton\'s Method.',
    'Can bend 4 feet of sheet metal, using only 2 pipes.  Between grep and awk.',
    'Never pushes to trunk.  Trunk pulls from him.',
  );

  public function __construct($id = null) {
    if ($id === null) {
      $this->fact = mt_rand(0, count(self::$facts) - 1);
    } else {
      $this->fact = $id;
    }
  }

  public function getFact() {
    return $this->fact;
  }

  public function render() {
    $fact = $this->getFact();
    if ($fact == self::TEST_FACT) {
      return 'tests facts to show when they\'re blocked';
    }
    return strtolower(self::$facts[$this->getFact()]);
  }
}

function renderFact($id = null) {
  $fact = new Fact($id);
  return $fact->render();
}