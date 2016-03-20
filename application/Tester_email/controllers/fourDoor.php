<?
class FourDoor extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->model('dbAccessModel');
	}

	public function index()
	{
		
		try{
			$data['result']=$this->dbAccessModel->selectLike("`year`, `make`, `model`, `trim`","4dr", "", "");
			$data['length']=count($data['result']);
			$data['title']="Four Door cars";
			$this->load->view('structure/main',$data);
			//$this->generate_view($data);
		}
		catch (Exception $e){
			echo $e->getMessage();
		}
/*
		$this->generate_view(array(
			'view_file'=>'ReturnDis'
			));
			*/
	}
	public function trim(){
		if($this->uri->segment(3)!=""){$trim=' `trim`="'.$this->uri->segment(3).'"';}
		else {$trim="";}
		try{
			$data['result']=$this->dbAccessModel->selectLike("`year`, `make`, `model`, `trim`","4dr", "", $trim);
			$data['length']=count($data['result']);
			$data['title']="Four Door cars with LE Trim";
			$this->load->view('structure/main',$data);
			//$this->generate_view($data);
		}
		catch (Exception $e){
			echo $e->getMessage();
		}
	}

}
?>