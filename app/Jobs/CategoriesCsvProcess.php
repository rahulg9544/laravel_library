<?php

namespace App\Jobs;

use App\Models\Categories;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CategoriesCsvProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $header;

    /**
     * Create a new job instance.
     */
    public function __construct($data, $header)
    {
        $this->data   = $data;
        $this->header = $header;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->data as $value) {
            $categoryData = array_combine($this->header, $value);
            Categories::create($categoryData);
        }
       
    }

    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}
