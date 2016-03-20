<?


class TwoDoor extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->model('dbAccessModel');
	}

	public function index()
	{

		try{
			$data['result']=$this->dbAccessModel->selectLike("`year`, `make`, `model`, `trim`","2dr", "", "");
			$data['length']=count($data['result']);
			$data['title']="Two Door cars";
			$this->load->view('structure/main',$data);
			
		}
		catch (Exception $e){
			echo $e->getMessage();
		}

	}

	public function ford()
	{	
		if($this->uri->segment(3)!=""){
			$year=$this->uri->segment(3);
		}
		else{$year="";}
		try{
			$data['result']=$this->dbAccessModel->selectMake("`year`, `make`, `model`, `trim`","ford", $year, "", "2dr");
			$data['length']=count($data['result']);
			$data['title']="2014 Fords that have Two Doors";
			$this->load->view('structure/main',$data);
		}
		catch (Exception $e){
			echo $e->getMessage();
		}
	}

}

?>