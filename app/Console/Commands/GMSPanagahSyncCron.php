<?php

namespace App\Console\Commands;

use App\ShelterHome;
use Illuminate\Console\Command;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;


class GMSPanagahSyncCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gms_panagah_sync:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $client = new Client(); //GuzzleHttp\Client
        $response = $client->post('https://pg.swd.punjab.gov.pk/api/sync_panagah', [
            'form_params' => [
                'key' => 'ASTP@pitb#123'
            ]
        ]);
        $result = json_decode($response->getBody(), true);
        $collection = new Collection($result['data']['shelters']);

        if(!$result):
            \Log::info("GMS Panahgah Syc: json not received");
            return;
        endif;

        if($result):
            $shelter_homes = ShelterHome::where('gms_shelter_id', '>' , 0)->get();
            if($shelter_homes):
                foreach ($shelter_homes as $shelter_home):

                    $gms_shelter_home = $collection->where('id', $shelter_home->gms_shelter_id)->first();

                    $shelter_home->beds = $gms_shelter_home['capacity'];
                    $shelter_home->occupied_beds = $gms_shelter_home['occupied'];
                    $shelter_home->save();

                endforeach;
            endif;
        endif;


    }
}
