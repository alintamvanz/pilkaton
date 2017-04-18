<div class="w3-container w3-center w3-animate-left" >
<div class="w3-row">
	<div class="w3-col m3 l3 s12"><img src="www/w9_img/logo.png" class="w3-circle" style="width:200px;height:200px;"></div>
	<div class="w3-col m6 l6 s12"><h1>SMK WALISONGO JEPARA</h1><h2>PEMILIHAN KETUA OSIS ONLINE 2017/2018</h2></div>
	<div class="w3-col m3 l3 s12"><img src="www/w9_img/pemilu.png" class="w3-circle" style="width:200px;height: 200px"></div>
</div>
<ul class="w3-navbar w3-teal">
	<li><a href="?home"><i class="fa fa-home"></i> Home</a></li>
	<li><a href="?w9=login"><i class="fa fa-sign-in"></i> Masuk</a></li>
	<li><a href="?w9=suara"><i class="fa fa-volume-up"></i> Perolehan Suara</a></li>
	<li><a href="?_calon"><i class="fa fa-user-circle"></i> Lihat Calon</a></li>
	<li class="w3-right"><marquee class="w3-input" style="width:500px;text-align: center;">
	<?php
	$q=w9_sql("SELECT * FROM w9_calon ");
		$n=1;
		while($x=w9_sql_array($q)){
			$qx=w9_sql("SELECT * FROM w9_suara WHERE no_urut='$x[no_urut]' ");
			$c=w9_sql_array($qx);
			$jml=w9_sql_nums($qx);
			$marquee=" | <b>".$jml."</b> SUARA UNTUK <b>".$x['nama']."</b> | ";
			echo $marquee;
		}
		?>
		</marquee>
		</li>
</ul>
