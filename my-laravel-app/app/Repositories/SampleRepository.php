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

    public function index($request)
    {
        // リポジトリ層では、Model を直接参照せず、「$this->model」を参照し、モックとの差し替えを容易にしています。
        // 通常の使用において、「$this->model」には getModelClass() に記述したクラスが格納されます。（詳細は継承元の AbstractRepository を参照）
        $query = $this->model->query();
        $query->select('name');
        if ($request['limit']) {
            $query->take($request['limit']);
        }
        $records = $query->get();

        return $records;
    }

    public function create($request)
    {
        return __METHOD__;
    }

    public function show($request)
    {
        // return $this->sampleRepository->getLatestRecords();
        return __METHOD__;
    }

    public function store($request)
    {
        // $validated = $request->validated();
        // $sample = Sample::create([
        //     'name' => $validated['name']
        // ]);
        // return new SampleResource($sample);

        return __METHOD__;
    }

    public function edit($request)
    {
        return __METHOD__;
    }

    public function update($request)
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