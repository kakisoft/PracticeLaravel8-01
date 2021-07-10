<?php

namespace App\Http\Controllers;

// use App\Http\Requests\SampleRequest;
// use App\Http\Resources\SampleCollection;
// use App\Http\Resources\SampleResource;
// use App\Models\Sample;
// use App\OpenApi\Parameters\ListSamplesParameters;
// use App\OpenApi\RequestBodies\StoreSampleRequestBody;
// use App\OpenApi\Responses\DestroySuccessResponse;
// use App\OpenApi\Responses\ErrorNotFoundResponse;
// use App\OpenApi\Responses\ErrorUnprocessableEntityResponse;
// use App\OpenApi\Responses\ListSamplesResponse;
// use App\OpenApi\Responses\SampleResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SampleService;

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
    public function index(Request $request)
    {
        // $samples = DB::table('samples');
        // if ($request['limit']) {
        //     $samples = $samples->limit($request['limit']);
        // }

        // return new SampleCollection($samples->get());
        return $this->sampleService->index($request);
    }

    /**
     * -
     */
    public function create(Request $request)
    {
        return $this->sampleService->create($request);
    }

    /**
     * show 1 record
     */
    public function show(Request $request)
    {
        // return new SampleResource($sample);
        // return __METHOD__;
        return $this->sampleService->show($request);
    }

    /**
     * create new record
     */
    public function store(Request $request)
    {
        // $validated = $request->validated();
        // $sample = Sample::create([
        //     'name' => $validated['name']
        // ]);
        // return new SampleResource($sample);

        return $this->sampleService->store($request);
    }

    /**
     * -
     */
    public function edit(Request $request)
    {
        return $this->sampleService->edit($request);
    }

    /**
     * update 1 record
     */
    public function update(Request $request)
    {
        // $validated = $request->validated();
        // $sample->fill([
        //     'name' => $validated['name']
        // ]);
        // $sample->save();
        // return new SampleResource($sample);


        // return __METHOD__;
        return $this->sampleService->update($request);
    }

    /**
     * delete 1 record
     */
    public function destroy(Request $request)
    {
        // $sample->delete();
        // return response()->json(['result' => true]);

        // return __METHOD__;
        return $this->sampleService->destroy($request);
    }

    /**
     * delete 1 record
     */
    public function delete(Request $request)
    {
        return $this->sampleService->delete($request);
    }

}
