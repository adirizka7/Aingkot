<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="Content-Security-Policy" content="default-src * data:; style-src * 'unsafe-inline'; script-src * 'unsafe-inline' 'unsafe-eval'">
  <script src="components/loader.js"></script>
  <script src="lib/onsenui/js/onsenui.min.js"></script>

  <link rel="stylesheet" href="components/loader.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.css">
  <link rel="stylesheet" href="css/style.css">

  <script>
    ons.ready(function() {
      console.log("Onsen UI is ready!");
    });
    document.addEventListener('show', function(event) {
      var page = event.target;
      var titleElement = document.querySelector('#toolbar-title');
      if (page.matches('#first-page')) {
        titleElement.innerHTML = 'I-NGKOT';
      } else if (page.matches('#second-page')) {
        titleElement.innerHTML = 'I-NGKOT';
      }
    });
    window.fn = {};
    window.fn.open = function() {
      var menu = document.getElementById('menu');
      menu.open();
    };
    window.fn.load = function(page) {
      var content = document.getElementById('content');
      var menu = document.getElementById('menu');
      content.load(page)
        .then(menu.close.bind(menu));
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
        <ons-list-item onclick="fn.load('logout.php?logout')" tappable>
          Sign Out
        </ons-list-item>
        <ons-list-item onclick="fn.load('about.html')" tappable>
          About
        </ons-list-item>
      </ons-list>
    </ons-page>
  </ons-splitter-side>
  <ons-splitter-content id="content" page="home.html"></ons-splitter-content>
</ons-splitter>

<ons-template id="home.html">
  <ons-page>
    <ons-toolbar>
      <div class="left">
        <ons-toolbar-button onclick="fn.open()">
          <ons-icon icon="md-menu"></ons-icon>
        </ons-toolbar-button>
      </div>
      <div class="center" id="toolbar-title"></div>
    </ons-toolbar>
    <ons-tabbar position="auto">
      <ons-tab page="tab1.html" active>
        <ons-icon size="30px" icon="ion-android-car"></ons-icon>
      </ons-tab>
      <ons-tab page="tab2.html">
        <ons-icon size="30px" icon="ion-android-pin"></ons-icon>
      </ons-tab>
      <ons-tab page="tab3.html" active>
        <ons-icon size="30px" icon="ion-android-car"></ons-icon>
      </ons-tab>
      <ons-tab page="tab4.html">
        <ons-icon size="30px" icon="md-face"></ons-icon>
      </ons-tab>
    </ons-tabbar>
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
          <ons-toolbar-button onclick="fn.open()">
            <ons-icon icon="md-menu"></ons-icon>
          </ons-toolbar-button>
        </div>
        <div class="center">
          About
        </div>
      </ons-toolbar>
    </ons-page>
  </ons-template>

  <ons-template id="tab1.html">
    <ons-page id="first-page">
      <p style="text-align: center;">
        Coming Very Soon
      </p>
    </ons-page>
  </ons-template>

  <ons-template id="tab2.html">
    <ons-page id="second-page">
      <p style="text-align: center;">
        Coming Very Soon
      </p>
    </ons-page>
  </ons-template>

  <ons-template id="tab3.html">
    <ons-page id="second-page">
      <p style="text-align: center;">
        Coming Very Soon
      </p>
    </ons-page>
  </ons-template>

  <ons-template id="tab4.html">
    <ons-page id="second-page">
      <!-- <p style="text-align: center;"> -->
        <ons-list>
          <ons-list-header>Profile</ons-list-header>
          <ons-list-item modifier="nodivider">
            <div class="center">Name</div>
            <div class="right">
              <a href="adi.html"> <ons-icon size="25px" icon="ion-edit" ></ons-icon> </a>
            </div>
          </ons-list-item>

          <ons-list-item modifier="nodivider">
            <div class="center">Email</div>
            <div class="right">
              <a href="adi.html"> <ons-icon size="25px" icon="ion-edit" ></ons-icon> </a>
            </div>
          </ons-list-item>

          <ons-list-item modifier="nodivider">
            <div class="center">Phone</div>
            <div class="right">
              <a href="adi.html"> <ons-icon size="25px" icon="ion-edit" ></ons-icon> </a>
            </div>
          </ons-list-item>

          <ons-list-item modifier="nodivider">
            <div class="center">Password</div>
            <div class="right">
              <a href="adi.html"> <ons-icon size="25px" icon="ion-edit" ></ons-icon> </a>
            </div>
          </ons-list-item>

        </ons-list>
      <!-- </p> -->
    </ons-page>
  </ons-template>
</body>
</html>