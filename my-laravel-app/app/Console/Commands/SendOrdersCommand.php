<?php
declare(strict_types=1);

// namespace App\Console\Commands;  // コメントアウトしておくと 「php artisan schedule:list」コマンドでリストアップされない。

use App\Services\ChatWorkService;
use App\UseCases\SendOrdersUseCase;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Psr\Log\LoggerInterface;

class SendOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-orders {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '購入情報を送信する'; // <---(1)

    /** @var SendOrdersUseCase */
    private $useCase; // <---(1)

    /** @var LoggerInterface */
    private $logger;

    /** @var ChatWorkService */
    private $chatwork;

    /**
     * @param SendOrdersUseCase $useCase
     * @param LoggerInterface $logger
     * @param ChatWorkService $chatwork
     */
    public function __construct(
        SendOrdersUseCase $useCase,
        LoggerInterface $logger,
        ChatWorkService $chatwork
    ) {
        parent::__construct();

        $this->useCase = $useCase;
        $this->logger = $logger;
        $this->chatwork = $chatwork;
    }

    /**
     * Execute the console command.
     * @throws \Throwable
     */
    public function handle()
    {
        $this->logger->info(__METHOD__ . ' ' . 'start');

        $date = $this->argument('date');
        $targetDate = Carbon::createFromFormat('Ymd', $date);

        $this->logger->info('TargetDate:' . $date);

        $count = $this->useCase->run($targetDate);

        $message = sprintf('対象日:%s / 送信件数:%d件', $targetDate->toDateString(), $count);
        $this->chatwork->sendMessage('購入情報送信バッチ', $message);

        $this->logger->info(__METHOD__ . ' ' . 'done sent_count:' . $count);
    }
}
