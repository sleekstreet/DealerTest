<?
class DbAccessModel extends CI_Model 
{
	function __construct(){
		parent::__construct();
		$this->db=$this->load->database('default', true);
		
	}

	function select($selects, $make, $trim){
		if($trim!=""){$query.="`trim`=".$trim;}
		$query="SELECT ".$selects." FROM `table 1` WHERE `make`='".$make."' ";
		try{
			$resultDef=$this->db->query($query);
			return $resultDef->result();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	function selectUni(){
		try{
			$resultDef = $this->db->query("SELECT DISTINCT `make`, count(*) AS count FROM `table 1` GROUP BY `make`");
			return $resultDef->result();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	function selectUniMod($selects, $make, $year, $group){
		$query="SELECT DISTINCT ".$selects.", count(*) AS count FROM `table 1` WHERE ";
		if($make!=""){$query.=" `make`='".$make."'";}
		if($year!=""){$query.=" AND `year`='".$year."'";}
		if($group!=""){$query.=" group by `".$group."`";}
		echo $query;
		try{
			$result = $this->db->query($query);
			return $result->result();
		}
		catch (Exception $e){
			echo $e->getMessage();
		}
	}


	function selectLike($selects, $like, $wheres, $AddedWheres){
		
		if($wheres==""){$wheres="style";}
		$query="SELECT ".$selects." FROM `table 1` WHERE `".$wheres."` like '%".$like."%'";
		if($AddedWheres!=""){$query.=" AND ".$AddedWheres;}
		echo $query;
		try{
	
			$resultDef = $this->db->query($query);

			return $resultDef->result();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	function selectMake($selects, $make, $year, $trim, $AddedWheres){
		$query="SELECT ".$selects." FROM `table 1` WHERE `make`='".$make."'";
		if($year!=""){$query.=" AND `year`='".$year."'";}
		if($trim!=""){$query.=" AND `trim`='".$trim."'";}
		if($AddedWheres!=""){$query.=" AND `style` LIKE '%".$AddedWheres."%'";}
		echo $query;
		try{
			$resultDef = $this->db->query($query);
			return $resultDef->result();
		}
		catch (Exception $e){
			echo $e->getMessage();
		}
	}

	
}
?>