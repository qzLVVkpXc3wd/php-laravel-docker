<?php

namespace App\Http\Controllers;

use App\Models\TPaymentstatusTest;
use App\Http\Requests\CgiResultRequest;
use Illuminate\Http\Request;


class CgiResultController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tpaymentstatustests = TPaymentstatusTest::all();
        return response()->json([
            'status' => true,
            'products' => $tpaymentstatustests
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CgiResultRequest $request)
    {
        Log::info($request->all());
        $tpaymentstatustests = TPaymentstatusTest::create($request->all());

        if(strcmp($request->res_result,'OK') == 0){
            $content = 'OK,';
        }else{
            $content = 'NG,ダメ';
        }

        $headers = [
            'Content-type' => 'Content-Type: text/csv; charset=Shift-JIS'
        ];
        return Response($content,200, $headers);
    }

    /**
     * Display the specified resource.
     */
    public function show(TPaymentstatusTest $tPaymentstatusTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TPaymentstatusTest $tPaymentstatusTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TPaymentstatusTest $tPaymentstatusTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TPaymentstatusTest $tPaymentstatusTest)
    {
        //
    }
}
