/*
//# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by 
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program. If not, see .
*/
<?php

class Article
{
	var $conn;

	function __construct()
	{
		$this->conn = new mysqli('server','user','pass','bd');
	}
	
	function insert($u, $t,$a,$ag)
	{
		if($this->conn->connect_errno)
		{
			echo "No se puede conectar al servidor";
		}
		else
		{
			$query = "INSERT INTO articles (url,title,author,aggregate)values (?,?,?,?)";
			$stmt = $this->conn->prepare($query);
			if($stmt)
			{
				$stmt->bind_param("ssss",$url,$title,$author,$aggregate);
				$url = $u;
				$title = $t;
				$author = $a;
				$aggregate = $ag;
				$stmt->execute();
			}
			return $this->conn->affected_rows;
		}
	}
	
	public function get_data($sql)
	{
		$query = $this->conn->query($sql);
		return $query;
	}
	
	function close()
	{
		$this->conn->close();
	}
	
	
}
?>