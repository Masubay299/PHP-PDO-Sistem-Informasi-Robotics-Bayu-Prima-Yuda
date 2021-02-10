<?php
session_start();
if (!$_SESSION['login']) {
    echo "<script type='text/javascript'>
        alert('Maaf anda harus login terlebih dahulu!');
            window.location = '/login.php'
        </script>";
} else {
    include('../config/koneksi.php');
    $user = new Database();
    $user = mysqli_query(
        $user->koneksi,
        "select * from users where password='$_SESSION[login]'"
    );
    // var_dump($_SESSION['login']);
    $user = mysqli_fetch_array($user);
    	if($_POST['submit']){
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
		$password_lama			= $_POST['password_lama'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];
        $nama			        = $_POST['nama'];
        $email			        = $_POST['email'];
		//cek dahulu ke database dengan query SELECT
		//kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
		//encrypt -> md5($password_lama)
		$password_lama	= md5($password_lama);
		$cek 			= mysqli_query(
                            $user->koneksi("SELECT password FROM users WHERE password='$password_lama'")
                        );
		var_dump($cek);
		if($cek->num_rows){
			//kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
			//membuat kondisi minimal password adalah 5 karakter
			if(strlen($password_baru) >= 5){
				//jika password baru sudah 5 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
				if($password_baru == $konfirmasi_password){
					//jika semua kondisi sudah benar, maka melakukan update kedatabase
					//query UPDATE SET password = encrypt md5 password_baru
					//kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
					$password_baru 	= md5($password_baru);
					$id_user 		= $user['id']; //ini dari session saat login
					
					$update 		= mysqli_query(
                                        $user->koneksi("UPDATE users SET password='$password_baru', nama='$nama',email='$email' WHERE id='$id_user'")
                                    );
                    if($update){

						//kondisi jika proses query UPDATE berhasil
                        echo "<script type='text/javascript'>
                            alert('Password berhasil di rubah!')
                                window.location = 'admin/index.php'
                            </script>";
                        // echo '';
					}else{
						//kondisi jika proses query gagal
                        echo "<script type='text/javascript'>
                            alert('Gagal merubah password!')
                                window.location = 'admin/profile.php'
                            </script>";
                        // echo '';
					}					
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
					 echo "<script type='text/javascript'>
                            alert('Konfirmasi Password Tidak Cocok!')
                                window.location = 'admin/profile.php'
                            </script>";
				}
			}else{
                //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
                 echo "<script type='text/javascript'>
                            alert('Minimal password baru adalah 5 karakter')
                                window.location = 'admin/profile.php'
                            </script>";
				// echo 'Minimal password baru adalah 5 karakter';
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
			echo "<script type='text/javascript'>
                alert('Password lama tidak cock')
                    window.location = 'admin/profile.php'
                </script>";
        }
	}
	?>
    <!-- Header -->
    <?php include('../layouts/includes/head.php') ?>
    <!-- End Header -->

    <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
        <!-- Navbar -->
        <?php include('../layouts/includes/navbar.php') ?>
        <!-- End Navbar -->
        <div class="app-body">
            <!-- Sidebar -->
            <?php include('../layouts/includes/sidebar.php') ?>
            <!-- End Sidebar -->
            <!-- Main Content -->
            <main class="main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">
                        <a href="#">Admin</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    <!-- Breadcrumb Menu-->
                    <li class="breadcrumb-menu d-md-down-none">
                        <div class="btn-group" role="group" aria-label="Button group">
                            <a class="btn" href="#">
                                <i class="icon-speech"></i>
                            </a>
                            <a class="btn" href="./">
                                <i class="icon-graph"></i>  Dashboard</a>
                            <a class="btn" href="#">
                                <i class="icon-settings"></i>  Settings</a>
                        </div>
                    </li>
                </ol>
                  <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Ubah Profile
                                </div>

                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="nama" value="<?php echo $user['nama']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" value="<?php echo $user['email']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password Lama</label>
                                            <input type="password" class="form-control" name="password_lama">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password Baru</label>
                                            <input type="password" class="form-control" name="password_baru">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="konfirmasi_password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-outline btn-block" name="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- End Main Conten -->

        </div>
        <!-- Footer -->
        <?php include('../layouts/includes/footer.php') ?>
        <!-- End Footer -->
        <!-- CoreUI and necessary plugins-->
        <!-- Scripts -->
        <?php include('../layouts/includes/scripts.php') ?>
        <!-- End Scripts -->
    </body>

    </html>
<?php
} ?>