<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Rider;
use Config\MyConfig;

class Main extends BaseController
{
    protected $rider;

    public function __construct()
    {
        $this->rider = new Rider();
    }

    public function index()
    {
        $config = new MyConfig();
        $strankovani = $config->strankovani;

        $rider = $this->rider
            ->select('rider.*, location.name as city, location.id as place_id')
            ->join('location', 'rider.place_of_birth = location.id', 'left')
            ->where('rider.country', 'fr')
            ->orderBy('rider.last_name', 'ASC')
            ->orderBy('rider.first_name', 'ASC')
            ->paginate($strankovani);

            $pager = $this->rider->pager;
    
            $data["rider"] = $rider;
            $data["pager"] = $pager; // <<< Tohle tam chybělo
        
            echo view("index", $data);
    }

    public function city($id)
    {
        $riders = $this->rider
            ->select('rider.*, location.name as city')
            ->join('location', 'rider.place_of_birth = location.id', 'left')
            ->where('rider.place_of_birth', $id)
            ->where('rider.country', 'fr')
            ->orderBy('rider.last_name', 'ASC')
            ->findAll();

        $cityName = $riders[0]['city'] ?? 'Neznámé město';

        $data = [
            'riders' => $riders,
            'city'   => $cityName
        ];

        return view('mesta', $data);
    }
}
