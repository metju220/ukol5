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
        $rider = $this->rider->where('country', 'fr')->findAll();
        $data["rider"] = $rider;
        echo view("index", $data);
    }
}