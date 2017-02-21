<?php
	class CustomerCare {
		protected $servername = "localhost";
		protected $username = "id669386_wp_98765f315a67bce839858a4246c9de66";
		protected $password = "doordie123";
		protected $dbname = "id669386_wp_98765f315a67bce839858a4246c9de66";
		protected $conn;
		
		function connect() {
			// Create connection
			$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

			// Check connection
			if (!$this->conn) {
			    return mysqli_connect_error();
			}
			else{
				$query="CREATE TABLE IF NOT EXISTS `services` (
				  `id` int(11) NOT NULL,
				  `service_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `service_description` text COLLATE utf8_unicode_ci NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
				if(mysqli_query($this->conn,$query)){
					return 'success';
				}
				else{
					return mysqli_connect_error();
				}
			}
	    }

	    function addService($post){
	    	$name=$post['serviceName'];
	    	$desc=$post['serviceDesc'];

	    	$query="INSERT INTO services VALUES(NULL,'".$name."','".$desc."')";
			if(mysqli_query($this->conn,$query)){
				return 'success';
			}
			else{
				return mysqli_connect_error();
			}
	    }

	    function saveService($post,$id){
	    	$name=$post['serviceName'];
	    	$desc=$post['serviceDesc'];

	    	$query="UPDATE services SET service_title='".$name."',service_description='".$desc."' WHERE id=".$id;
			if(mysqli_query($this->conn,$query)){
				return 'success';
			}
			else{
				return mysqli_connect_error();
			}
	    }

	    function getServices(){
	    	$query="SELECT * FROM services";
			$result=mysqli_query($this->conn,$query);
			if(mysqli_num_rows($result) > 0) {
				return $result;
			}
			else{
				return false;
			}
	    }

	    function getService($id){
	    	$query="SELECT * FROM services WHERE id=".$id;
			$result=mysqli_query($this->conn,$query);
			if(mysqli_num_rows($result) > 0) {
				return $result;
			}
			else{
				return false;
			}
	    }

	    function deleteService($id){
	    	$query="DELETE FROM services WHERE id=".$id;
			$result=mysqli_query($this->conn,$query);
			if(mysqli_num_rows($result) > 0) {
				return 'success';
			}
			else{
				return false;
			}
	    }
	}
?>