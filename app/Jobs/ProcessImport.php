<?php

namespace App\Jobs;

use App\Imports\CertificatesImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ProcessImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $file_path;
    private $activity_id;
    private $user_id;
    public function __construct($file_path,$activity_id,$user_id)
    {
        //
        $this->activity_id = $activity_id;
        $this->user_id = $user_id;
        $this->file_path = $file_path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Excel::import(new CertificatesImport($this->activity_id,$this->user_id), $this->file_path);

    }
}
