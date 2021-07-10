<?php

namespace App\Http\Controllers;

use App\Http\Requests\SampleRequest;
use App\Http\Resources\SampleCollection;
use App\Http\Resources\SampleResource;
use App\Models\Sample;
use App\OpenApi\Parameters\ListSamplesParameters;
use App\OpenApi\RequestBodies\StoreSampleRequestBody;
use App\OpenApi\Responses\DestroySuccessResponse;
use App\OpenApi\Responses\ErrorNotFoundResponse;
use App\OpenApi\Responses\ErrorUnprocessableEntityResponse;
use App\OpenApi\Responses\ListSamplesResponse;
use App\OpenApi\Responses\SampleResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;
use App\Services\SampleService;

#[OpenApi\PathItem]
class SamplesController extends Controller
{
    private $sampleService;

    public function __construct(
        SampleService $sampleService
    ) {
        $this->sampleService = $sampleService;
    }

    /**
     * ListSamples
     *
     * List samples.
     */
    #[OpenApi\Operation('ListSamples', ['sample'], null, 'GET')]
    #[OpenApi\Parameters(ListSamplesParameters::class)]
    #[OpenApi\Response(ListSamplesResponse::class, 200)]
    public function index(Request $request): SampleCollection
    {
        $samples = DB::table('samples');
        if ($request['limit']) {
            $samples = $samples->limit($request['limit']);
        }

        return new SampleCollection($samples->get());
    }

    /**
     * ShowSample
     *
     * Show a sample.
     */
    #[OpenApi\Operation('ShowSample', ['sample'], null, 'GET')]
    #[OpenApi\Response(SampleResponse::class, 200)]
    #[OpenApi\Response(ErrorNotFoundResponse::class, 404)]
    public function show(Sample $sample): SampleResource
    {
        return new SampleResource($sample);
    }

    /**
     * StoreSample
     *
     * Create a sample.
     */
    #[OpenApi\Operation('StoreSample', ['sample'], 'BearerTokenSecurityScheme', 'POST')]
    #[OpenApi\RequestBody(StoreSampleRequestBody::class)]
    #[OpenApi\Response(SampleResponse::class, 200)]
    #[OpenApi\Response(ErrorUnprocessableEntityResponse::class, 422)]
    public function store(SampleRequest $request): SampleResource
    {
        $validated = $request->validated();
        $sample = Sample::create([
            'name' => $validated['name']
        ]);
        return new SampleResource($sample);
    }

    /**
     * UpdateSample
     *
     * Update a sample.
     */
    #[OpenApi\Operation('UpdateSample', ['sample'], 'BearerTokenSecurityScheme', 'PUT')]
    #[OpenApi\RequestBody(StoreSampleRequestBody::class)]
    #[OpenApi\Response(SampleResponse::class, 200)]
    #[OpenApi\Response(ErrorNotFoundResponse::class, 404)]
    #[OpenApi\Response(ErrorUnprocessableEntityResponse::class, 422)]
    public function update(SampleRequest $request, Sample $sample): SampleResource
    {
        $validated = $request->validated();
        $sample->fill([
            'name' => $validated['name']
        ]);
        $sample->save();
        return new SampleResource($sample);
    }


    /**
     * DestroySample
     *
     * Destroy a sample.
     */
    #[OpenApi\Operation('DestroySample', ['sample'], 'BearerTokenSecurityScheme', 'DELETE')]
    #[OpenApi\Response(DestroySuccessResponse::class, 200)]
    #[OpenApi\Response(ErrorNotFoundResponse::class, 404)]
    public function destroy(Sample $sample): \Illuminate\Http\JsonResponse
    {
        $sample->delete();
        return response()->json(['result' => true]);
    }
}
