<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="Content-Security-Policy" content="default-src * data:; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">
  <script src="components/loader.js"></script>
  <script src="lib/onsenui/js/onsenui.min.js"></script>
	<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmLCY-oAc_LBIs8YwkGYUVHuaK0FGDCjk&callback=initMap">
	</script>
	<script src="lib/onsenui/controller.js"></script>
	<script src="css/index.js"></script>

  <link rel="stylesheet" href="components/loader.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.css">
  <link rel="stylesheet" href="css/style.css">
<script>
window.fn = {};

window.fn.open = function() {
  var menu = document.getElementById('menu');
  menu.open();
};

window.fn.load = function(page) {
  var menu = document.getElementById('menu');
  var navi = document.getElementById('navi');

  menu.close();
  navi.resetToPage(page, { animation: 'fade' });
};
</script>
</head>
<body>
<ons-splitter>
  <ons-splitter-side id="menu" side="left" width="220px" collapse swipeable>
    <ons-page>
      <ons-list>
        <ons-list-item onclick="fn.load('home.html')" tappable>
          Home
        </ons-list-item>
        <ons-list-item onclick="fn.load('settings.html')" tappable>
          Settings
        </ons-list-item>
        <ons-list-item onclick="fn.load('about.html')" tappable>
          About
        </ons-list-item>
      </ons-list>
    </ons-page>
  </ons-splitter-side>
  <ons-splitter-content>
    <ons-navigator id="navi" page="home.html"></ons-navigator>
  </ons-splitter-content>
</ons-splitter>

<ons-template id="home.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
        <ons-toolbar-button onclick="fn.open()">
          <ons-icon icon="md-menu"></ons-icon>
        </ons-toolbar-button>
      </div>
      <div class="center">
        Main
      </div>
    </ons-toolbar>
    <p style="text-align: center; opacity: 0.6; padding-top: 20px;">
      Swipe right to open the menu!
    </p>
  </ons-page>
</ons-template>

<ons-template id="settings.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
        <ons-toolbar-button onclick="fn.open()">
          <ons-icon icon="md-menu"></ons-icon>
        </ons-toolbar-button>
      </div>
      <div class="center">
        Settings
      </div>
    </ons-toolbar>
  </ons-page>
</ons-template>

<ons-template id="about.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
      </div>
      <div class="center">
        About
      </div>
    </ons-toolbar>
  </ons-page>
</ons-template>
</body>
</html>
