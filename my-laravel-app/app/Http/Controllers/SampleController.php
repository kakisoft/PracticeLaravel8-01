<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SampleService;
use App\Http\Requests\SampleRequest;
use Carbon\Carbon;
use App\Utils\DateUtil;

/*
// php artisan make:request SampleRequest

＜備考＞
Validation 等は、SampleRequest にて実施。
（StoreRequest, InquireStatusRequest といった感じで、機能単位の切り出しになる事も多い）

*/

class SampleController extends Controller
{
    private $sampleService;

    public function __construct(
        SampleService $sampleService
    ) {
        $this->sampleService = $sampleService;
    }

    /**
     * show list
     */
    public function index(SampleRequest $request)
    {
        // コントローラ層では、ビジネスロジックを記述せず、基本的にはサービスをコールするだけに留める。
        // ただし、ログの出力・特定のリクエストに対し、決まったレスポンスを返す、といったロジックは入る。
        // （アクセスに対応する処理は書くが、ビジネスロジックに関係するロジックは記述しない）
        return $this->sampleService->index($request);
    }

    /**
     * -
     */
    public function create(SampleRequest $request)
    {
        $returnCode = $this->sampleService->create($request);

        // Service の実行内容を要件に合うように整形したりとか。
        return ['receipt_no' => $returnCode];
    }

    /**
     * show 1 record
     */
    public function show(SampleRequest $request)
    {
        // $request の一部のパラメータを渡す、という方法でも可。
        return $this->sampleService->show($request->get('name'));
    }

    /**
     * create new record
     */
    public function store(SampleRequest $request)
    {
        $sample = $this->sampleService->store($request);

        return $sample;
    }

    /**
     * -
     */
    public function edit(SampleRequest $request)
    {
        return $this->sampleService->edit($request);
    }

    /**
     * update 1 record
     */
    public function update(SampleRequest $request)
    {
        return $this->sampleService->update($request);
    }

    /**
     * -
     */
    public function destroy(SampleRequest $request)
    {
        return $this->sampleService->destroy($request->get('id'));
    }

    /**
     * delete 1 record
     */
    public function delete(SampleRequest $request)
    {
        return $this->sampleService->delete($request->get('id'));
    }

    //==========================================================================
    //==========================================================================
    //==========================================================================

    /**
     * 適当に実験して遊ぶ用
     */
    public function sampleAction01(string $date, Request $request)
    {
        //-----------------------------------------
        //  Carbon :   subDay と subDays
        //-----------------------------------------
        $date1 = new Carbon('2021-07-15 11:23:45');
        $date2 = new Carbon('2021-07-15 11:23:45');

        echo $date1->subDay(1) . "<br>";
        echo $date2->subDays(1). "<br>";


        //-----------------------------------------
        //                isDate
        //-----------------------------------------
        $argumentDate = $date;

        if(DateUtil::isDate($argumentDate)){
            echo "date";
        }else{
            echo "not date";
        }

        return;
    }


}
