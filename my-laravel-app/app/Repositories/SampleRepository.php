<?php

namespace App\Repositories;

use App\Models\Sample;
use Exception;
use Illuminate\Support\Facades\Log;

class SampleRepository extends AbstractRepository
{
    public function getModelClass(): string
    {
        return Sample::class;
    }

    public function index()
    {
        // $samples = DB::table('samples');
        // if ($request['limit']) {
        //     $samples = $samples->limit($request['limit']);
        // }

        // return new SampleCollection($samples->get());

        return __METHOD__;
    }

    public function create()
    {
        return __METHOD__;
    }

    public function show()
    {
        // return $this->sampleRepository->getLatestRecords();
        return __METHOD__;
    }

    public function store()
    {
        // $validated = $request->validated();
        // $sample = Sample::create([
        //     'name' => $validated['name']
        // ]);
        // return new SampleResource($sample);

        return __METHOD__;
    }

    public function edit()
    {
        return __METHOD__;
    }

    public function update()
    {
        // $validated = $request->validated();
        // $sample->fill([
        //     'name' => $validated['name']
        // ]);
        // $sample->save();
        // return new SampleResource($sample);

        return __METHOD__;
    }

    public function destroy()
    {
        // $sample->delete();
        // return response()->json(['result' => true]);

        // return __METHOD__;

        return __METHOD__;
    }

    public function delete()
    {
        return __METHOD__;
    }
}