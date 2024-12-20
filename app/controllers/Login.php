<?php

class Login extends Controller {
	public function index()
	{
		$data['title'] = 'Halaman Login';

		$this->view('login/login', $data);
	}

	public function prosesLogin() {
		// Perbaikan pada evaluasi kondisi
		$row = $this->model('LoginModel')->checkLogin($_POST); // Pastikan $row mendapatkan data
		if ($row) { // Cek jika $row berisi data
			$_SESSION['username'] = $row['username'];
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['session_login'] = 'sudah_login'; 

			//$this->model('LoginModel')->isLoggedIn($_SESSION['session_login']);
			
			header('location: '. base_url . '/home');
		} else {
			Flasher::setMessage('Username / Password','salah.','danger');
			header('location: '. base_url . '/login');
			exit;	
		}
	}
}
