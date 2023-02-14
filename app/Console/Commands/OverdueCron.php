<?php

namespace App\Console\Commands;

use App\Feedback;
use Carbon\Carbon;
use Illuminate\Console\Command;


class OverdueCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'overdue:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Proccess feedback/complaints to overdue.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $rs_feedback = Feedback::where("feedback_status" , 2)
        ->where('activity_datetime', '<', Carbon::parse('-48 hours'))
        ->get();

        if($rs_feedback):
        foreach ($rs_feedback as $feedback):
            $feedback->feedback_status = 3;
            $feedback->save();
        endforeach;
        endif;


        // \Log::info("Overdue Cron for feedback/complaints");


    }
}
