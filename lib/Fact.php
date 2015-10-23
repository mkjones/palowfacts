<?php

require_once __DIR__.'/utils.php';

class Fact {

  const TEST_FACT = 'bad';

  // Bypass 80chars here since you can't concatenate in a static array.
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
    'Wrote the source for an entire distro in the sands of Normandy. When it washed away he didn\'t cry.',
    '\'s mother has a tattoo.  It says "Son."',
    'Pities Mr. T for being a fool.',
    'Knows how to take square roots.  Without Newton\'s Method.',
    'Can bend 4 feet of sheet metal, using only 2 pipes.  Between grep and awk.',
    'Knows who viewed your profile',
    '\'s router bastardizes the internet',
    '<script>alert("Boo");</script>Just did that', // safe XSS
    '&#8220;We live in a world where there is bugs&#8221;',
    '<img src="secret_agent_palow.png"></img>&nbsp;Name is Palow, C. Palow',
    'Can parse HTML with regular expressions',
    'Already won all the iPad 2s',
    'Was stuck in London and didn\'t need your help',
    'Opened an offshore account in Nigeria just cuz',
    'Accepts his own diffs',
    'Deletes porn and malware. With curl.',
    'Got Alice and Bob\'s private keys back in the 80s',
    'Knows your secrets',
    'finds your lack of faith disturbing',
    'has 2PB of RAM. In his brain.',
    'Denied your service',
    'Is faster than <a href="http://en.wikipedia.org/wiki/%4C%4F%49%43">loic</a>. With his mouse.',
    'Never pushes to trunk. Trunk pulls from him.',
    'Found only russian brides',
    'Totally could have phished Bruce Schneier.  But he\'s just too nice to do it.',
    'Palow has touched so many people\'s lives that the dictionary added a new word, "Palowed"',
    'Palow generates one time passwords in his mind, finds no use for generators',
    'knows where Edward Snowden is',
    'is creating a GUI interface using Visual Basic, to see if he can track an IP address',
  );

  public function __construct($id = null) {
    if ($id === null) {
      $this->fact = mt_rand(0, count(self::$facts) - 1);
    } else {
      invariant(
        (is_numeric_and_not_octal($id) || $id === self::TEST_FACT)
          && $id >= 0 && $id < count(self::$facts), // works for 'bad' lolz
        'Hey that is counterfactual'
      );
      $this->fact = $id;
    }
  }

  public function getFact() {
    return $this->fact;
  }

  public function render() {
    $fact = $this->getFact();
    if ($fact === self::TEST_FACT) {
      return 'tests facts to show when they\'re blocked';
    }
    return strtolower(self::$facts[$this->getFact()]);
  }
}
