<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Rider;
use Config\MyConfig;
use App\Models\Location;
use App\Models\City;
use App\Models\jezdec;

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
            ->select('rider.*, location.name as city')
            ->join('location', 'rider.place_link = location.link', 'left')
            ->where('rider.country', 'fr') // Pokud chceš jen Francouze
            ->orderBy('rider.last_name', 'ASC')
            ->orderBy('rider.first_name', 'ASC')
            ->paginate($strankovani);
    
        $pager = $this->rider->pager;
    
        $data["rider"] = $rider;
        $data["pager"] = $pager; // <<< Tohle tam chybělo
    
        echo view("index", $data);
    }

    public function city($nazevMesta)
    {
        $cityDecoded = urldecode($nazevMesta);
    
        $riders = $this->rider
            ->select('rider.*, location.name as city')
            ->join('location', 'rider.place_link = location.link', 'left')
            ->where('location.name', $cityDecoded)
            ->orderBy('rider.last_name', 'ASC')
            ->orderBy('rider.first_name', 'ASC')
            ->findAll();
    
        $data = [
            'riders' => $riders,
            'city'   => $cityDecoded
        ];
    
        echo view('mesto', $data);
    }
}