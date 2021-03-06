<?php
session_start();
include_once 'dbconnect.php';
if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
if($_SESSION['status']==1){
$query = $DBcon->query("SELECT * FROM pelanggan WHERE id_pelanggan=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$querySopir = $DBcon->query("SELECT * FROM sopir o JOIN carter_angkot c ON o.id_sopir=c.id_sopir WHERE id_pelanggan=".$_SESSION['userSession']);
$rowinfosupir = array();
while($row = mysqli_fetch_assoc($querySopir)) {
    $rowinfosupir[] = $row;
}
$querysemuasopir = $DBcon->query("SELECT * FROM sopir");
$rowsupir = array();
while($row = mysqli_fetch_assoc($querysemuasopir)) {
    $rowsupir[] = $row;
}
$DBcon->close();
}
else{
	$query = $DBcon->query("SELECT * FROM sopir WHERE id_sopir=".$_SESSION['userSession']);
	$userRow=$query->fetch_array();
	$querp = $DBcon->query("SELECT * FROM pelanggan p JOIN carter_angkot c ON p.id_pelanggan=c.id_pelanggan WHERE id_sopir=".$_SESSION['userSession']);
	$pelanggan = array();
	while($row = mysqli_fetch_assoc($querp)) {
	    $pelanggan[] = $row;
	}
}
?>

<!DOCTYPE HTML>
<html ng-app="myApp">
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
    ons.ready(function() {
      console.log("Onsen UI is ready!");
    });
    document.addEventListener('show', function(event) {
      var page = event.target;
      var titleElement = document.querySelector('#toolbar-title');
      if (page.matches('#first-page')) {
        titleElement.innerHTML = 'I-NGKOT';
      } else if (page.matches('#second-page')) {
        titleElement.innerHTML = 'Trayek';
      } else if (page.matches('#third-page')) {
        titleElement.innerHTML = 'Carter';
      } else if (page.matches('#fourth-page')) {
        titleElement.innerHTML = 'Profile User';
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
		//Stack button tab 3
		// Button Push Stack
		document.addEventListener('init', function(event) {
		  var page = event.target;
		  if (page.id === 'page1') {
		    page.querySelector('#push-button').onclick = function() {
		      document.querySelector('#myNavigator').pushPage('page2.html', {data: {title: 'Page 2'}});
		    };
		}});
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
        <img class="list-item__thumbnail" src="http://www.sessionlogs.com/media/icons/defaultIcon.png">
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
        <ons-list-item onclick="fn.load('about.php')" tappable>
          About
        </ons-list-item>
      </ons-list>
    </ons-page>
  </ons-splitter-side>
  <ons-splitter-content id="content" page="home.php"></ons-splitter-content>
</ons-splitter>

<ons-template id="home.php">
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
      </ons-tab>
      <ons-tab page="tab2.php" active>
        <ons-icon size="30px" icon="ion-android-pin"></ons-icon>
      </ons-tab>
      <ons-tab page="tab3.php">
        <ons-icon size="30px" icon="ion-android-car"></ons-icon>
      </ons-tab>
      <ons-tab page="tab4.php">
        <ons-icon size="30px" icon="ion-android-person"></ons-icon>
      </ons-tab>
    </ons-tabbar>
  </ons-page>
</ons-template>

  <ons-template id="settings.php">
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

  <ons-template id="about.php">
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

  <ons-template id="tab2.php">
	   <ons-page id="second-page">
			 <p style="margin-top:30px">
	       <a href="maps.php"> <ons-button modifier="large">Start</ons-button> </a>
			 </p>
	    </ons-page>
  </ons-template>

	<ons-template id="tab3.php">
		<ons-page id = "third-page">
			<ons-navigator id="myNavigator" page="page1.html"></ons-navigator>

			<ons-template id="page1.html">
			  <ons-page id="page1">
          <?php if($_SESSION['status']==1) {?>
			    <ons-toolbar>
			      <div class="center">Status Carteran</div>
						<div class="right">
					    <ons-toolbar-button id="push-button">New</ons-toolbar-button>
						</div>
			    </ons-toolbar>
          <?php } else {?>
            <ons-toolbar>
              <div class="center">Status Carteran</div>
              <div class="right">
                <ons-toolbar-button id="push-button">Lihat Permintaan</ons-toolbar-button>
              </div>
            </ons-toolbar>
          <?php }?>

          <?php if($_SESSION['status']==1) {//tab 1 buat pelanggan
              for ($i=0; $i < sizeof($rowinfosupir); $i++) {
								?>
					<ons-list-item tappable>
			      <div class="left">
			        <img class="list-item__thumbnail" src="<?php if($rowinfosupir[$i]['image']==NULL) echo 'http://www.sessionlogs.com/media/icons/defaultIcon.png'; else echo $rowinfosupir[$i]['image']?>">
			      </div>
			      <div class="center">
			        <span class="list-item__title"><?php echo $rowinfosupir[$i]['username'];?></span>
              <span class="list-item__subtitle">
                <?php if($rowinfosupir[$i]['status']==0) echo "pending"; else echo "accepted";?>
              </span>
							<span class="list-item__subtitle"><?php echo $rowinfosupir[$i]['no_telp']?></span>
							<?php if($rowinfosupir[$i]['status']==0)?>
			      </div>
			    </ons-list-item>
					<span><textarea rows="5" cols="50"  name="komen_tambahan" readonly="true"><?php echo $rowinfosupir[$i]['keterangan_tambahan']?></textarea></span>
					<hr>

          <?php }} else {//tab 1 buat sopir
					for ($i=0; $i < sizeof($pelanggan); $i++) {
							if($pelanggan[$i]['status']==1) {?>
						<ons-list-item tappable>
							<div class="left">
								<img class="list-item__thumbnail" src="<?php if($pelanggan[$i]['image']==NULL) echo 'http://www.sessionlogs.com/media/icons/defaultIcon.png'; else echo $pelanggan[$i]['image']?>">
							</div>
							<div class="center">
								<span class="list-item__title"><?php echo $pelanggan[$i]['username'];?></span>
								<span class="list-item__subtitle"><?php echo $pelanggan[$i]['no_telp']?></span>
								<span class="list-item__subtitle">Lokasi Penjemputan :<?php echo $pelanggan[$i]['lokasi_awal']?></span>
								<span class="list-item__subtitle">Lokasi Tujuan :<?php echo $pelanggan[$i]['tujuan']?></span>
								<span class="list-item__subtitle">Tanggal :<?php echo $pelanggan[$i]['tanggal_pemesanan']?></span>
							</div>
						</ons-list-item>
						<span><textarea rows="5" cols="50" placeholder="keterangan" name="komen" readonly="true"><?php echo $pelanggan[$i]['Keterangan']?></textarea></span>
						<hr>
					<?php }}}?>
					</ons-page>
			</ons-template>


			<ons-template id="page2.html">
			  <ons-page id="page2">
			    <ons-toolbar>
			      <div class="left"><ons-back-button>Back</ons-back-button></div>
			      <div class="center"></div>
			    </ons-toolbar>
          <?php if($_SESSION['status']==1) {//tab 2 buat pelanggan
              for ($i=0; $i < sizeof($rowsupir); $i++) {?>
					<ons-list-item tappable>
			      <div class="left">
			        <img class="list-item__thumbnail" src="<?php if($rowsupir[$i]['image']==NULL) echo 'http://www.sessionlogs.com/media/icons/defaultIcon.png'; else echo $rowsupir[$i]['image']?>">
			      </div>
			      <div class="center">
			        <span class="list-item__title"><?php echo $rowsupir[$i]['username'];?></span>
							<?php if($rowsupir[$i]['no_plat']!=0) {?><span class="list-item__subtitle">nomor plat:<?php echo $rowsupir[$i]['no_plat'];?></span><?php }?>
              <?php if($rowsupir[$i]['no_telp']!=0) {?><span class="list-item__subtitle">nomor telepon:<?php echo $rowsupir[$i]['no_telp'];?></span><?php }?>
			      </div>
						<div class="right">
							  <a href="carter.php?id=<?php echo $rowsupir[$i]['id_sopir']?>"><button type="submit" class = "button" name="add_carter" href="page1.html">Add</button></a> <!-- Nambahin ke page1 pending -->
						</div>
			    </ons-list-item>
          <?php }} else {
						for ($i=0; $i < sizeof($pelanggan); $i++) {
								if($pelanggan[$i]['status']==0) {?>
							<ons-list-item tappable>
								<div class="left">
									<img class="list-item__thumbnail" src="<?php if($pelanggan[$i]['image']==NULL) echo 'http://www.sessionlogs.com/media/icons/defaultIcon.png'; else echo $pelanggan[$i]['image']?>">
								</div>
								<div class="center">
									<span class="list-item__title"><?php echo $pelanggan[$i]['username'];?></span>
									<span class="list-item__subtitle">Pending</span>
									<span class="list-item__subtitle">Lokasi Penjemputan :<?php echo $pelanggan[$i]['lokasi_awal']?></span>
									<span class="list-item__subtitle">Lokasi Tujuan :<?php echo $pelanggan[$i]['tujuan']?></span>
									<span class="list-item__subtitle">Tanggal :<?php echo $pelanggan[$i]['tanggal_pemesanan']?></span>
								</div>
								<div class="right">
									  <a href="add_carter.php?id=<?php echo $pelanggan[$i]['id_pelanggan']?>&idc=<?php echo $pelanggan[$i]['id_carter']?>"><button type="submit" class = "button" name="add">Accept</button></a>
										<a href="decline_carter.php?id=<?php echo $pelanggan[$i]['id_pelanggan']?>&idc=<?php echo $pelanggan[$i]['id_carter']?>"><button type="submit" class = "button" name="decline">Decline</button></a>
								</div>
							</ons-list-item>
						<?php }}}?>
			  </ons-page>
			</ons-template>
		</ons-page>
	</ons-template>


  <ons-template id="tab4.php">
    <ons-page id="fourth-page">
      <!-- <p style="text-align: center;"> -->
        <ons-list>
         <?php
			echo "<ons-list-header>Name</ons-list-header>";
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
				if($alamat==""){echo "";} else {echo $alamat;}
				echo "</div>";
				echo "</div>";
				echo "</ons-list-item>";
				$ttl=$userRow['tanggal_lahir'];
				echo"<ons-list-header>Tanggal Lahir</ons-list-header>";
				echo"<ons-list-item modifier='nodivider'>";
				echo"<div class='center'>";
				if($ttl=="0000-00-00"){echo "";} else {echo $ttl;}
				echo "</div>";
				echo "</div>";
				echo "</ons-list-item>";
		  }
		  else {
				$np=$userRow['no_plat'];
				echo"<ons-list-header>Nomor Plat</ons-list-header>";
				echo"<ons-list-item modifier='nodivider'>";
				echo"<div class='center'>";
				if($np=="0"){echo "";} else {echo $np;}
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
