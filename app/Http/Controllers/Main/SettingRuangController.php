<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\MasterRuang;
use Illuminate\Http\Request;

class SettingRuangController extends Controller
{
    public function index()
    {
        $dataRuang = MasterRuang::get();
        $parser = ['datas' => $dataRuang];
        return view('main.settingruang')->with ($parser);
    }
}
