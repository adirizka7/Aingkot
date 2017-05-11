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
  </script>
</head>
<body>
  <ons-page>
    <ons-toolbar>
      <div class="center" id="toolbar-title"></div>
    </ons-toolbar>
    <ons-tabbar position="auto">
      <ons-tab label="Sign Up" page="tab1.html" active>
      </ons-tab>
      <ons-tab label="Sign In" page="tab2.html">
      </ons-tab>
    </ons-tabbar>
  </ons-page>

  <ons-template id="tab1.html">
    <ons-page id="first-page">
      <p style="text-align: center;">
        <div style="text-align: center; margin-top: 30px;">
          <p>
            <p><ons-input id="name" modifier="underbar" placeholder="Name" float></ons-input></p>
            <p><ons-input id="email" modifier="underbar" type="email" placeholder="Email" float></ons-input></p>
            <p><ons-input id="phone" modifier="underbar" type="numeric" placeholder="Phone" float></ons-input></p>
            <p><ons-input id="password" modifier="underbar" type="password" placeholder="Password" float></ons-input></p>
            <p><ons-input id="password" modifier="underbar" type="password" placeholder="Confirm Password  " float></ons-input>
          </p>

          <p style="margin-top: 30px;">
            <ons-button onclick="login()">Sign Up</ons-button>
          </p>
        </div>
      </p>
    </ons-page>
  </ons-template>

  <ons-template id="tab2.html">
    <ons-page id="second-page">
      <p style="text-align: center;">
        <div style="text-align: center; margin-top: 30px;">
          <p>
            <ons-input id="username" modifier="underbar" placeholder="Username" float></ons-input>
          </p>
          <p>
            <ons-input id="password" modifier="underbar" type="password" placeholder="Password" float></ons-input>
          </p>

          <p style="margin-top: 30px;">
            <ons-button onclick="login()">Sign in</ons-button>
          </p>
        </div>
      </p>
    </ons-page>
  </ons-template>
</body>
</html>
