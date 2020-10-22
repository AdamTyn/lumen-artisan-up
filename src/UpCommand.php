<?php

namespace AdamTyn\Lumen\Artisan;

use Exception;
use Illuminate\Console\Command;

class UpCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '让 Lumen 应用退出维护模式';

    /**
     * @var string
     */
    protected $path;

    /**
     * UpCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->path = storage_path('framework/down');
    }

    public function handle()
    {
        try {
            if (!file_exists($this->path)) {
                $this->comment('Application is already up.');

                return;
            }

            unlink($this->path);

            $this->info('Application is now live.');
        } catch (Exception $e) {
            $this->error('Failed to disable maintenance mode.');

            $this->error($e->getMessage());

            return;
        }
    }
}
