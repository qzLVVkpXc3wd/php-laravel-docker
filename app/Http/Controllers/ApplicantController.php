<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function editApplicantInfo (Request $request)
    {
        
        // 操作する日付を取得（テストのため、システム日付ではなく、仮の日付を使用）
        //$today = date("Y-m-d"); 
        //$today = "2024-11-10";
        // パラメータのメールアドレスより志願者情報を取得
        $mail = $request->input('google_account');
        
        // 志願者の大学院フラグを取得
        $daigakin_flg = DB::table('t_syutsugansya_test')
        ->select('m_gakka.daigakin_flg')
        ->leftjoin('m_gakka', 't_syutsugansya_test.gakka_cd_1', '=', 'm_gakka.gakka_cd')
        ->where('google_account', $request->input('google_account'))
        ->where('nyushi_nendo', '2024')// 開催年度
        ->where('nyushi_gakki_no', '1')// 入試学期（１固定？）
        ->first();
        
        if(is_null($daigakin_flg)) {
            // 大学院フラグが取得できない場合
            return view('google/edit',[
                'error_msg' => '存在しないメールアドレスです'
            ]);
        }
        

        // 志望理由テーブルより、志願者の入力済み志望理由を全て取得
        $shibo_riyus = DB::table('t_shibo_riyu_test')
        ->leftjoin('m_gakka', 't_shibo_riyu_test.gakka_cd', '=', 'm_gakka.gakka_cd')
        ->where('google_account', $request->input('google_account'))
        ->where('nyushi_nendo', '2024')// 開催年度
        ->where('nyushi_gakki_no', '1')// 入試学期（１固定？）
        ->get();
        
        // 活動報告テーブルより、志願者の入力済み活動報告を取得（1件のみ）
        $katsudo_hokoku = DB::table('t_katsudo_hokoku_test')
        ->where('google_account', $request->input('google_account'))
        ->first();
        
        // googleアカウント、大学院フラグをセッションに保存
        $request->session()->put([
            'google_account' => $request->input('google_account')
            ,'daigakin_flg' => $daigakin_flg->daigakin_flg
            //, 'nys_sbt_cd' => $syutsugansya->senbatu_kbn
        ]);

        // 取得した志願者情報をセットして登録情報修正画面を表示する
        return view('google/edit_applicant_info', [
            'daigakin_flg' => $daigakin_flg
            ,'shibo_riyus' => $shibo_riyus
            ,'katsudo_hokoku' => $katsudo_hokoku
        ]);
        
    }

    public function updateApplicantInfo(Request $request)
    {
        // postで渡されたパラメータを取得
        // googleアカウント
        $google_account = $request->session()->get('google_account');
        // 学部の志望理由（配列）を取得
        $gakubu_shiboriyus = $request->input('gakubu_shiboriyu');
        foreach((array)$gakubu_shiboriyus as $key => $value){
            DB::table('t_shibo_riyu_test')
            ->where('google_account', $google_account)
            ->where('gakka_cd', $key)
            ->update([
                'shibo_riyu' => $value
            ]);
        }

        $katsudo_hokoku_1_1 = $request->input('katsudo_hokoku_1_1');
        $daigakin_flg = $request->session()->get('daigakin_flg');
        // 学部の場合、活動報告書を更新する
        if($daigakin_flg == '0'){
            DB::table('t_katsudo_hokoku_test')
            ->where('google_account', $google_account)
            ->update([
                'katsudo_hokoku_1_1' =>  $request->input('katsudo_hokoku_1_1')
                ,'katsudo_hokoku_1_2' =>  $request->input('katsudo_hokoku_1_2')
                ,'katsudo_hokoku_1_3' =>  $request->input('katsudo_hokoku_1_3')
                ,'katsudo_hokoku_1_4' =>  $request->input('katsudo_hokoku_1_4')
                ,'katsudo_hokoku_2' =>  $request->input('katsudo_hokoku_2')
            ]);
        }

        // 大学院の志望理由（配列）を取得
        $daigakuin_shiboriyus = $request->input('daigakuin_shiboriyu');
        foreach((array)$daigakuin_shiboriyus as $key => $value){
            DB::table('t_shibo_riyu_test')
            ->where('google_account', $google_account)
            ->where('gakka_cd', $key)
            ->update([
                'shibo_riyu' => $value
            ]);
        }
        
        // 更新結果を返す true || false
        return response()->json([
            'status' => 'success',
            'message' => '操作が成功しました。'
        ], 200);
        
    }

}