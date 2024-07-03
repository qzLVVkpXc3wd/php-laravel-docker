<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_Syutsugansya;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        $param = $request->input('param');
        logs()->notice($param);
        $results = T_Syutsugansya::leftJoin('m_nys_sbt','t_syutsugansyas.senbatu_kbn','=','m_nys_sbt.nys_sbt_cd')
            ->where('google_account', $param)->select('t_syutsugansyas.*','m_nys_sbt.nys_sbt_name')->get();
        logs()->notice('test', ['ここ' => 'きた']);
        return view('search.results', ['results' => $results]);
    }
}
