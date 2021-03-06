<?php
session_start();
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
if($_SESSION['status']==1){
$query = $DBcon->query("SELECT * FROM pelanggan WHERE id_pelanggan=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();
}
else{
	$query = $DBcon->query("SELECT * FROM sopir WHERE id_sopir=".$_SESSION['userSession']);
	$userRow=$query->fetch_array();
	$DBcon->close();
}
if(isset($_SESSION['popbox'])){
	echo "<script language='javascript'>
			var uhuy='Data Berhasil di Update';
            alert(uhuy);
            </script>";
	unset($_SESSION['popbox']);
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

		// Button Push Stack
		document.addEventListener('init', function(event) {
		  var page = event.target;

		  if (page.id === 'page1') {
		    page.querySelector('#push-button').onclick = function() {
		      document.querySelector('#myNavigator').pushPage('page2.html', {data: {title: 'Page 2'}});
		    };
		  } else if (page.id === 'page2') {
		    page.querySelector('ons-toolbar .center').innerHTML = page.data.title;
		  }
		});

  </script>

</head>
<body>
  <ons-splitter>
  <ons-splitter-side id="menu" side="left" width="220px" collapse swipeable>
    <ons-page>
      <ons-list>
		<ons-list-item>
      <div class="left">
				<?php if($userRow['image']==NULL){ ?>
        <img class="list-item__thumbnail" src="https://i.redd.it/w0lr6mwopkxy.png">
				<?php } else {?>
					<img class="list-item__thumbnail" src="<?php echo $userRow['image'] ?>">
					<?php } ?>
      </div>
	  <?php
	  if($_SESSION['status'] == 1){
      echo "<div class='center'>";
       echo "<span class='list-item__title'>". $userRow['username'] ."</span><span class='list-item__subtitle'>Pelanggan</span>";
      echo "</div>";
	  }
	  else if($_SESSION['status'] == 2){
      echo "<div class='center'>";
       echo "<span class='list-item__title'>". $userRow['username'] ."</span><span class='list-item__subtitle'>Sopir</span>";
      echo "</div>";
	  }
	  ?>
    </ons-list-item>
        <ons-list-item onclick="fn.load('home.php')" tappable>
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
        <ons-icon size="30px" icon="ion-android-person"></ons-icon>
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
		<ons-page id = "third-page">
			<ons-navigator id="myNavigator" page="page1.html"></ons-navigator>

			<ons-template id="page1.html">
			  <ons-page id="page1">
			    <ons-toolbar>
			      <div class="center">Pending Carteran</div>
						<div class="right">
					    <ons-toolbar-button id="push-button">New</ons-toolbar-button>
						</div>
			    </ons-toolbar>

					<ons-list-item tappable>
			      <div class="left">
			        <img class="list-item__thumbnail" src="http://placekitten.com/g/40/40">
			      </div>
			      <div class="center">
			        <span class="list-item__title">Mamat</span><span class="list-item__subtitle">Pending</span>
							<span class="list-item__subtitle">081260605050</span>
			      </div>
			    </ons-list-item>

					</ons-page>
			</ons-template>

			<ons-template id="page2.html">
			  <ons-page id="page2">
			    <ons-toolbar>
			      <div class="left"><ons-back-button>Back</ons-back-button></div>
			      <div class="center"></div>
			    </ons-toolbar>

					<ons-list-item tappable>
			      <div class="left">
			        <img class="list-item__thumbnail" src="http://placekitten.com/g/40/40">
			      </div>
			      <div class="center">
			        <span class="list-item__title">Mamat</span><span class="list-item__subtitle">Available</span>
							<span class="list-item__subtitle">F 1717 EB</span>
			      </div>
						<div class="right">
							<ons-button>Add</ons-button> <!-- Nambahin ke page1 pending -->
						</div>
			    </ons-list-item>

					<ons-list-item tappable>
			      <div class="left">
			        <img class="list-item__thumbnail" src="http://placekitten.com/g/40/40">
			      </div>
			      <div class="center">
			        <span class="list-item__title">Paijo</span><span class="list-item__subtitle">Busy</span>
							<span class="list-item__subtitle">F 8282 EB</span>
			      </div>
						<div class="right">
							<ons-button>Add</ons-button> <!-- Kalo busy gabisa di tap -->
						</div>
			    </ons-list-item>

			  </ons-page>
			</ons-template>

		</ons-page>
	</ons-template>

  <ons-template id="tab4.html">
    <ons-page id="fourth-page">
      <!-- <p style="text-align: center;"> -->
        <ons-list>
          <ons-list-header>Profile</ons-list-header>
		  <?php
          echo "<ons-list-item modifier='nodivider'>";
            echo "<div class='center'>". $userRow['username'] ."</div>";
            echo "</div>";
          echo"</ons-list-item>";
			echo "<ons-list-header>email</ons-list-header>";
          echo "<ons-list-item modifier='nodivider'>";
            echo "<div class='center'>".$userRow['email']."</div>";
            echo "</div>";
          echo "</ons-list-item>";
			echo"<ons-list-header>Nomor Telepon</ons-list-header>";
          echo"<ons-list-item modifier='nodivider'>";
            echo"<div class='center'>".$userRow['no_telp']."</div>";
            echo "</div>";
          echo "</ons-list-item>";
		  if($_SESSION['status'] == 1){
				$alamat=$userRow['alamat'];
				echo"<ons-list-header>Alamat</ons-list-header>";
				echo"<ons-list-item modifier='nodivider'>";
				echo"<div class='center'>";
				if($alamat==""){echo "Alamat belum diset!";} else {echo $alamat;}
				echo "</div>";
				echo "</div>";
				echo "</ons-list-item>";
				$ttl=$userRow['tanggal_lahir'];
				echo"<ons-list-header>Tanggal Lahir</ons-list-header>";
				echo"<ons-list-item modifier='nodivider'>";
				echo"<div class='center'>";
				if($ttl=="0000-00-00"){echo "Tanggal lahir belum diset!";} else {echo $ttl;}
				echo "</div>";
				echo "</div>";
				echo "</ons-list-item>";
		  }
		  else {
				$np=$userRow['no_plat'];
				echo"<ons-list-header>Nomor Plat</ons-list-header>";
				echo"<ons-list-item modifier='nodivider'>";
				echo"<div class='center'>";
				if($np=="0"){echo "Nomor plat belum diset!";} else {echo $np;}
				echo "</div>";
				echo "</div>";
				echo "</ons-list-item>";
		  }
		  ?>
          <p>
          <a href="edit.php"> <ons-button modifier="large">Edit</ons-button> </a>
          </div>
          </p>
        </ons-list>
      <!-- </p> -->
    </ons-page>
  </ons-template>
</body>
</html>
