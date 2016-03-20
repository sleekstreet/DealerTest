<?
class Unique extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->model('dbAccessModel');
	}

	public function index()
	{
		
		try{
			$data['result']=$this->dbAccessModel->selectUni();
			$data['length']=count($data['result']);
			$data['title']="Unique Cars per Make";
			$this->load->view('structure/count_Uni',$data);
			
		}
		catch(Exception $e){
			echo $e->getMessage();
		}

		//$ArrMake=array_unique($rawData, )

	}
	public function make(){

		if($this->uri->segment(3)!=""){
			$make=$this->uri->segment(3);
		}else{$make="";}
		if($this->uri->segment(4)!=""){
			$group=$this->uri->segment(4);
		}else{$group="";}
		if($this->uri->segment(5)!=""){
			$year=$this->uri->segment(5);
		}else{$year="";}

		try{
			$data['result']=$this->dbAccessModel->selectUniMod("`make`, `model`, `year`, `trim`", $make, $year, $group);
			$data['title']="unique Model cars by make and Year";
			if($year!=""){$this->load->view('structure/uniques', $data);}
			else{$this->load->view('structure/uniquesCnt_year', $data);}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}

	}
}