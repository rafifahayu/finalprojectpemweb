<?php 

class Model{

	private $server = "localhost";
	private $username = "root";
	private $password = "rhefinix29";
	private $db = "finalproject";
	private $conn;

	public function __construct(){
		try {
			$this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
		} catch (Exception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

	public function insert(){
		if (isset($_POST['submit'])) {
			if (isset($_POST['pemesan']) && isset($_POST['pesanan']) && isset($_POST['status'])) {
				if (!empty($_POST['pemesan']) && !empty($_POST['pesanan']) && !empty($_POST['status'])) {
					$pemesan = $_POST['pemesan'];
					$pesanan = $_POST['pesanan'];
					$status = $_POST['status'];

					$query = "INSERT INTO pemesanan (pemesan, pesanan, status) VALUES ('$pemesan', '$pesanan', '$status')";
					if ($sql = $this->conn->query($query)) {
						echo "<script>alert('Data has been added!');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					} else {
						echo "<script>alert('Failed to add data!');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				} else {
					echo "<script>alert('Fields cannot be empty!');</script>";
					echo "<script>window.location.href = 'index.php';</script>";
				}
			}
		}
	}

	public function fetch(){
		$data = null;
		$query = "SELECT * FROM pemesanan";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function delete($pemesan){
		$query = "DELETE FROM pemesanan WHERE pemesan = '$pemesan'";
		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	public function fetch_single($pemesan){
		$data = null;
		$query = "SELECT * FROM pemesanan WHERE pemesan = '$pemesan'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}

	public function edit($pemesan){
		$data = null;
		$query = "SELECT * FROM pemesanan WHERE pemesan = '$pemesan'";
		if ($sql = $this->conn->query($query)) {
			while($row = $sql->fetch_assoc()){
				$data = $row;
			}
		}
		return $data;
	}

	public function update($data){
		$query = "UPDATE pemesanan SET pesanan='$data[pesanan]', status='$data[status]' WHERE pemesan='$data[pemesan]'";
		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}
}

?>
