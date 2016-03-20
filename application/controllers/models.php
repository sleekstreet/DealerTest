<?


class Models extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->model('dbAccessModel');
	}

	public function index()
	{

	}

	public function make()
	{	
		//Checking url for the name of the make
		if($this->uri->segment(3)!=""){
			$make=$this->uri->segment(3);
		}
		if($this->uri->segment(4)!=""){
			$trim=$this->uri->segment(4);
		}
		else{$year="";}

		//Actual process of the query and load of view
		try{
			$data['result']=$this->dbAccessModel->selectMake("`year`, `make`, `model`, `trim`", $make, "", $trim, "");
			$data['length']=count($data['result']);
			$data['title']="BMW's that have XI trim";
			$this->load->view('structure/main',$data);
		}
		catch (Exception $e){
			echo $e->getMessage();
		}
	}
}

?>