<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Rider;
use Config\MyConfig;

class Main extends BaseController
{

    var $rider;

    public function __construct()
    {
        $this->rider = new Rider();

    }

    public function index()
    {
        $config = new MyConfig();
        $strankovani = $config->strankovani;
    
        $rider = $this->rider
            ->where('rider.country', 'fr') // Pokud chceš jen Francouze
            ->paginate($strankovani);
    
        $pager = $this->rider->pager;
    
        $data["rider"] = $rider;
        $data["pager"] = $pager; // <<< Tohle tam chybělo
    
        echo view("index", $data);
    }
}