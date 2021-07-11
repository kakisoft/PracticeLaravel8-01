<?php

namespace App\Services;

use App\Repositories\SampleRepository;

/*
＜備考＞
ビジネスロジックは、ここに記述する。
「サービスからサービスをコール」すると、ロジックがややこしくなりやすいので、極力別の方法で実現できないかを検討する。
（ユーティリティに切り出す、トレイトに切り出す、サービスの呼び出し側で制御する、等）
*/

class SampleService
{
    private $sampleRepository;

    public function __construct(SampleRepository $sampleRepository)
    {
        $this->sampleRepository = $sampleRepository;
    }

    /**
     * method description
     *
     * @return void
     */
    public function index($request)
    {
        // 複雑なビジネスロジックが必要でない場合、リポジトリをのメソッドをコールするだけのシンプルな構造となる。
        return $this->sampleRepository->index($request);
    }

    /**
     * method description
     *
     * @return void
     */
    public function create($request)
    {
        return $this->sampleRepository->create($request);
    }

    /**
     * method description
     *
     * @return void
     */
    public function show($name)
    {
        return $this->sampleRepository->show($name);
    }

    /**
     * method description
     *
     * @return void
     */
    public function store($request)
    {
        return $this->sampleRepository->store($request);
    }

    /**
     * method description
     *
     * @return void
     */
    public function edit($request)
    {
        return $this->sampleRepository->edit($request);
    }

    /**
     * method description
     *
     * @return void
     */
    public function update($request)
    {
        return $this->sampleRepository->update($request);
    }

    /**
     * method description
     *
     * @return void
     */
    public function destroy($id)
    {
        return $this->sampleRepository->destroy($id);
    }

    /**
     * method description
     *
     * @return void
     */
    public function delete($id)
    {
        return $this->sampleRepository->delete($id);
    }
}
