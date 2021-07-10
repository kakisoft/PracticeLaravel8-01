<?php

namespace App\Services;

use App\Repositories\SampleRepository;

class SampleService
{
    private $sampleRepository;

    public function __construct(SampleRepository $sampleRepository)
    {
        $this->sampleRepository = $sampleRepository;
    }

    public function index($request)
    {
        // $samples = DB::table('samples');
        // if ($request['limit']) {
        //     $samples = $samples->limit($request['limit']);
        // }

        // return new SampleCollection($samples->get());


        return $this->sampleRepository->index();
    }

    public function create()
    {
        return $this->sampleRepository->create();
    }

    public function show()
    {
        // return $this->sampleRepository->getLatestRecords();
        return $this->sampleRepository->show();
    }

    public function store()
    {
        // $validated = $request->validated();
        // $sample = Sample::create([
        //     'name' => $validated['name']
        // ]);
        // return new SampleResource($sample);

        return $this->sampleRepository->store();
    }

    public function edit()
    {
        return $this->sampleRepository->edit();
    }

    public function update()
    {
        // $validated = $request->validated();
        // $sample->fill([
        //     'name' => $validated['name']
        // ]);
        // $sample->save();
        // return new SampleResource($sample);


        // return __METHOD__;
        return $this->sampleRepository->update();
    }

    public function destroy()
    {
        // $sample->delete();
        // return response()->json(['result' => true]);

        // return __METHOD__;

        return $this->sampleRepository->delete();
    }

    public function delete()
    {
        return $this->sampleRepository->delete();
    }
}
