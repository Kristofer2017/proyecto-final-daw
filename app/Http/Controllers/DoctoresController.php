<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PerfilDoctor;
use Illuminate\Http\Request;

class DoctoresController extends Controller
{
    private $doctorModel;

    public function __construct() {
        $this->doctorModel = new PerfilDoctor();
    }

    public function index() {
        $doctores = $this->doctorModel->obtenerTodos();
        return view('doctores.doctores', ['doctores' => $doctores]);
    }
}
