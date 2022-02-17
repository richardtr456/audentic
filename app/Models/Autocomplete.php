<?php 

namespace App\Controllers;
use CodeIgniter\Controller;


class LiveSearchController extends Controller
{

    public function index() {
        return view('index');
    }
    
    public function getRecords()
    {
        helper(['form', 'url']);

        $records = [];

        $database = \Config\Database::connect();
        $sql = $database->table('clients');   

        $sqlQuery = $sql->like('name', $this->request->getVar('q'))
                    ->select('id, name as text')
                    ->limit(7)->get();
        
        $records = $sqlQuery->getResult();
        
		echo json_encode($records);
    }
 
}