<?php

	class Visitor {

		private $ip;
		private $os;
		private $browser;
		private $times_visited;
		private $last_time_visited;

		function __construct ($ip, $os, $browser, $times_visited, $last_time_visited){
			$this->ip = $ip;
			$this->os = $os;
			$this->browser = $browser;
			$this->times_visited = $times_visited;
			$this->last_time_visited = $last_time_visited;
		}

		public function storeVisitor ($con){

			$sql = "INSERT INTO visitors (ip, os, browser, times_visited, last_time_visited) values (?,?,?,?,?)";
			$statement = $con->prepare($sql);
			$statement->execute(array($this->ip, $this->os, $this->browser, $this->times_visited, $this->last_time_visited));
			
		}

		public function updateVisitor ($con){

			$sql = "UPDATE visitors SET os=?, browser=?, times_visited=?, last_time_visited=? WHERE ip=?";
			$statement = $con->prepare($sql);
			$statement->execute(array($this->os, $this->browser, $this->times_visited, $this->last_time_visited->format("Y-m-d H:i:s"), $this->ip));

		}

		public function printVisitor (){
			$date = date('d.m.Y. H:i:s', strtotime($this->last_time_visited));
			echo '
				<tr>
					<td>'.$this->ip.'</td>
					<td>'.$this->os.'</td>
					<td>'.$this->browser.'</td>
					<td>'.$this->times_visited.'</td>
					<td>'.$date.'</td>
				</tr>
			';
		}

	}

?>