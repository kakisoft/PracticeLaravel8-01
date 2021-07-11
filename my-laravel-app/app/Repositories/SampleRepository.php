<?php

namespace App\Repositories;

use App\Models\Sample;
use Exception;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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
        // テスト実行の容易性にこだわる必要が無ければ、「$this->model」を経由せず、Model を直接参照してもOKです。
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

    public function show($name)
    {
        // name をキーにレコードを取得（実際には name がユニークになる事は無いでしょうけど）
        return $this->model::where('name', '=', $name)->get();
    }

    public function store($request)
    {
        try {
            $this->model->name = $request['name'] . Carbon::now()->format('Y-m-d  H:i:s');
            $this->model->save();

            // Return Last Inserted ID
            return $this->model->id;

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function edit($request)
    {
        return __METHOD__;
    }

    public function update($request)
    {
        $query = $this->model->query();
        $query->where('id', $request['id']);

        return $query->update(['name' => $request['name']]);
    }

    public function destroy($id)
    {
        $query = $this->model->query();
        $query->where('id', $id);

        // return number of deleted records
        return $query->delete();
    }

    public function delete($id)
    {
        $query = $this->model->query();
        $query->where('id', $id);

        // return number of deleted records
        return $query->delete();
    }
}