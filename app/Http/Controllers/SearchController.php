<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_Syutsugansya;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        $param = $request->input('param');
        $results = T_Syutsugansya::leftJoin('m_nys_sbt','t_syutsugansyas.senbatu_kbn','=','m_nys_sbt.nys_sbt_cd')
              ->where('google_account', $param)
              ->orderBy('m_nys_sbt.nys_sbt_cd')              
              ->select('t_syutsugansyas.*','m_nys_sbt.nys_sbt_name')
              ->get();
        return view('search.results', ['results' => $results]);
    }
    public function exam(Request $request)
    {
        $param = $request->input('param');
        $results = T_Syutsugansya::leftJoin('m_nys_sbt','t_syutsugansyas.senbatu_kbn','=','m_nys_sbt.nys_sbt_cd')
            ->where('google_account', $param)
            ->orderBy('m_nys_sbt.nys_sbt_cd')
            ->select('t_syutsugansyas.*','m_nys_sbt.nys_sbt_name','m_nys_sbt.schedulemessage')->get();        
        return view('search.exam', ['results' => $results]);
    }

    public function examresult(Request $request)
    {
        // リクエストパラメータを取得
        $param = $request->input('param');
        $results = T_Syutsugansya::leftJoin('m_nys_sbt as nys','t_syutsugansyas.senbatu_kbn','=','nys.nys_sbt_cd')
            ->leftJoin('t_shigansya_gohi_temp as tmp','t_syutsugansyas.juken_cd','=','tmp.juken_cd')
            ->leftJoin('m_gohi_sbt as gohi',function($join){
                $join->on('tmp.nyushi_nendo','=','gohi.nyushi_nendo')
                    ->on('tmp.nyushi_gakki_no','=','gohi.nyushi_gakki_no')
                    ->on('tmp.gohi_sbt_cd','=','gohi.gohi_sbt_cd');
            })
            ->leftJoin('m_gakka as gakka',function($join){
                $join->on('tmp.nyushi_nendo','=','gakka.nyushi_nendo')
                    ->on('t_syutsugansyas.gakka_cd_1','=','gakka.gakka_cd');
            })
            ->where('t_syutsugansyas.google_account', $param)
            ->orderBy('nys.nys_sbt_cd')
            ->select('t_syutsugansyas.juken_cd',
                    't_syutsugansyas.google_account',
                    't_syutsugansyas.shigansya_sei_kanji',
                    't_syutsugansyas.shigansya_mei_kanji',
                    'nys.nys_sbt_cd',
                    'nys.nys_sbt_name',
                    'gohi.nyushi_nendo',
                    'gohi.gohi_sbt_cd',
                    'gohi.gohi_sbt_disp_name',
                    'gakka.print_gakka_name',
                    'tmp.gohi_date')
            ->get();        
        
        // 結果をビューに渡して表示
        return view('search.examresult', ['results' => $results]);
    }  


    public function admission(Request $request)
    {
        // リクエストパラメータを取得
        $param = $request->input('param');
        $results = T_Syutsugansya::leftJoin('m_nys_sbt as nys','t_syutsugansyas.senbatu_kbn','=','nys.nys_sbt_cd')
            ->leftJoin('t_shigansya_gohi_temp as tmp','t_syutsugansyas.juken_cd','=','tmp.juken_cd')
            ->leftJoin('m_gohi_sbt as gohi',function($join){
                $join->on('tmp.nyushi_nendo','=','gohi.nyushi_nendo')
                    ->on('tmp.nyushi_gakki_no','=','gohi.nyushi_gakki_no')
                    ->on('tmp.gohi_sbt_cd','=','gohi.gohi_sbt_cd');
            })
            ->leftJoin('m_gakka as gakka',function($join){
                $join->on('tmp.nyushi_nendo','=','gakka.nyushi_nendo')
                    ->on('t_syutsugansyas.gakka_cd_1','=','gakka.gakka_cd');
            })
            ->where('t_syutsugansyas.google_account', $param)
            ->orderBy('nys.nys_sbt_cd')
            ->select('t_syutsugansyas.juken_cd',
                    't_syutsugansyas.google_account',
                    't_syutsugansyas.shigansya_sei_kanji',
                    't_syutsugansyas.shigansya_mei_kanji',
                    'nys.nys_sbt_cd',
                    'nys.nys_sbt_name',
                    'gohi.nyushi_nendo',
                    'gohi.gohi_sbt_cd',
                    'gohi.gohi_sbt_disp_name',
                    'gakka.print_gakka_name',
                    'tmp.gohi_date')
            ->get();        
        
        // 結果をビューに渡して表示
        return view('search.admission', ['results' => $results]);
    }  
}
