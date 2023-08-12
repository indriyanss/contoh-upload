<?php
//memasukkan file config.php
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>TUGAS AKHIR JWD 2023</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>

<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Poppins:400,600,700,700i');
	@import url('https://fonts.googleapis.com/css?family=Roboto+Slab:300,400');

	body{
		font-family: 'Poppins', sans-serif;
		margin: 0px;
	}
	.slider{
		background: #67bef991;
	}
	section.slider{
		background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url("perpus.jpg") fixed;
		background-position: center;
		background-size: 100%;
		height: 50vh;
	}
	.font-slider{
		margin-top: 10%;
		text-align: center;
	}
	.judulsejarah{

		color: #3498db;
		font-weight: bold;
		margin-bottom: 20px;
	}

	.paragraph{
		text-align: justify;
		border-left: 7px solid #3498db;
		padding-left: 30px;
	}
	.paragraph2{
		margin-top: 30%;
		text-align: justify;
		border-right: 7px solid #3498db;
		padding-right: 30px;
	}
	.komentest{
	    padding: 10px 0px;
	    border-top: 1px solid #ccc;
	    border-bottom: 1px solid #ccc;
	    font-family: poppins;
	    font-size: 11pt;
	    text-align: justify;
	}
	.mark{
		background: linear-gradient(to bottom right, #eaeaeab0, whitesmoke);
	    text-align: center;
	    padding: 20px;
	    box-shadow: 0px 4px #ccc;
	    border-radius: 11px;
	    margin: 50px 0px 0px 0px;
	    margin-bottom: 15px;
	}
	.sejarah{
		padding-top: 6%;
	}

	.informasi{
		background: #f9f9f9;
		padding-bottom: 15px;
	}
	.visi{
		padding: 20px;
	    background: #dcdcd8;
	    border-radius: 6px;
	    line-height: 1.5em;
	    box-shadow: 0 1px 10px 0 rgba(0,0,0,.12);
	}
	.misi{
		padding: 20px;
	    background: #fdf3e5;
	    border-radius: 6px;
	    line-height: 1.5em;
	    box-shadow: 0 1px 10px 0 rgba(0,0,0,.12);
	}

	.kontak-informasi{
		padding: 20px;
	    background: #d6e4fc;
	    border-radius: 6px;
	    line-height: 1.5em;
	    box-shadow: 0 1px 10px 0 rgba(0,0,0,.12);
	}
	.top{
		margin-top: 5px;
		padding: 10px;
		background: #eee1b9;
	}

	.footer{
		background: #333;
	    color: white;
	    text-align: center;
	    padding: 20px 0px;
	    margin-top: 30px;
	}

	.footer h6{
		margin: 0px;
	}
</style>
<body>
<?php 
include 'navbar.php';
?>
<section class="top">
	<marquee>Selamat Datang Di Perpustakaan Politeknik Negeri Banjarmasin</marquee>
</section>

<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="font-slider" style="color: #fff;">Perpustakaan<br> <span style="color: #3066D5; font-weight: bold;">Politeknik Negeri Banjarmasin</span></h1>
			</div>
		</div>
	</div>
</section>

<section class="about" id="about">
	<div class="container sejarah">
		<div class="row">
			<div class="col">
				<h5 class="judulsejarah">Sejarah</h5>
				<p class="paragraph">Awal Sejarah berdirinya Politeknik Negeri Banjarmasin, dimulai dari dibuka nya Politeknik Pertama pada tingkat tersier pada tahun 1976. Politeknik tersebut adalah Politeknik Mekanik Swiss. Pendidikan Politeknik tersebut dilaksanakan dalam rangka kerjasama antara Pemerintah Republik Indonesia dan Pemerintah Federal Swiss, yang pada tingkat teknis ditangani secara bersama oleh Institut Teknologi Bandung dan Swiss Contact. Gagasan Pendidikan Politeknik sebagai lembaga pendidikan keahlian khusus pada tingkat tarsier memperoleh tanggapan yang baik.</p>
			</div>
			<div class="col text-center">
				<p class="paragraph2">Setelah Gagasan Pendidikan Politeknik mendapat tanggapan yang baik, pada tahun 1978 Pemerintah mendirikan 6 (enam) buah Politeknik Teknologi di enam Perguruan Tinggi Negeri yaitu; Politeknik USU di Medan, Politeknik UNSRI di Palembang, Politeknik UI di Jakarta, Politeknik ITB di Bandung, Politeknik UNDIP di Semarang dan Politeknik UNIBRAW di Malang.</p>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="mark">
					<h5 style="margin: 0px">PERPUSTAKAAN <b>POLIBAN</b></h5>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="informasi" id="informasi">
	<div class="container">
		<div class="row">
			<div class="col">
				<h5 style="font-weight: bold; margin: 30px 0px;">INFORMASI</h5>
			</div>
		</div>
		<div class="row wow bounceIn" duration="2s" delay="5s">
			<div class="col">
				<div class="visi">
					<h3>Visi</h3>
					<div>
						<p>Menjadi Lembaga Pendidikan Tinggi Vokasi yang Berkualitas dan Unggul Dalam Sains Terapan.</p>
					</div>

				</div>
			</div>

			<div class="col">
				<div class="misi">
					<h3>Misi</h3>
					<div>
						<p>
							<ol>
								<li>Menyelenggarakan pendidikan vokasi yang berkualitas dengan di dukung oleh suasana akademik yang kondusif bagi peningkatan mutu sumber daya manusia.</li>
								<li>Melaksanakan penelitian dan pengabdian kepada masyarakat yang memberi kontribusi bagi ilmu pengetahuan dan teknologi serta masyarakat.</li>
								<li>Melaksanakan tata kelola dan tata pamong yang menjamin peningkatan kualitas perguruan tinggi secara berkelanjutan.</li>
							</ol>
						</p>
					</div>

				</div>
			</div>
		</div>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col">
				<h6>Copyright &copy 2023 By Indri Yani</h6>
			</div>
		</div>
	</div>
</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>