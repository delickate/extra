<?php

namespace App\Http\Controllers;
use App\Canal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\New_;

class ConfigController extends Controller
{
    public function clearAll(Request $request)
    {
        \Artisan::call('route:clear');
        \Artisan::call('view:clear');
        \Artisan::call('clear-compiled');
        \Artisan::call('config:cache');
    }

    

    public function cnalUpdate(Request $request)
    {
        $arr_sample=array();
        $arr_sample['31220040000007000']='1';
        $arr_sample['30620010017002000']='1';
        $arr_sample['31110000019002000']='1';
		$arr_sample['30620010012001000']='1';
        $json_imis_codes=json_encode($arr_sample);

        //Action Start

        $imis_codes=json_decode($json_imis_codes);
        
        $created_datetime	= date('Y-m-d H:i:s');
        $created_date	= date('Y-m-d');

                DB::beginTransaction();
                try {
                   
                    //Add inactve Entry
					$canal_logs_entries=Canal::get()->toArray();
					// exiisting entries as log
					$this->canal_logs($canal_logs_entries);
				
                    DB::table('canal')->update(['is_active' => 0]);
           
                   $insert_count = $update_count =0;
                // function implmetion
                foreach($imis_codes  as $imis_key => $imis_code_status)
                    {
                        $canel=Canal::where('imis_cde',$imis_key)->get()->toArray();

                        $update_canel=Canal::where('imis_cde',$imis_key)
                       ->update([
                           'is_active' => $imis_code_status
                        ]);
                    
                        if($update_canel)
                        {
                            $insert_count++;
                            
                         
                                   $log_insert=array();
                                foreach($canel as  $canel_in )
                                {
											$log_insert['division_id']=$canel_in['division_id'];
											$log_insert['division_name']=$canel_in['division_name'];
                                            $log_insert['imis_cde']=$canel_in['imis_cde'];
                                            $log_insert['name']=$canel_in['name'];
                                            $log_insert['is_active']=$imis_code_status;
                                            $log_insert['created_at']=$created_datetime;
                                        
                                            
                                            $log_insert['created_date']=$created_date;
											
											
                                          
                                            DB::table('canal_history')->insert($log_insert);
                                    
                                }
								
								
                           

                        }
                        
                    } 

						
                    DB::commit();
					
					echo $insert_count;
					
                } catch (\Exception $ex) {
                    DB::rollback();
                    return response()->json(['error' => $ex->getMessage()], 500);
                }

               

        
        dd($imis_codes);
    
        dd($arr_sample);
    }

private function canal_logs($arr_logs)
{
			   $created_datetime	= date('Y-m-d H:i:s');
			   $created_date	= date('Y-m-d');
			   $log_insert=array();
			   
                                foreach($arr_logs as  $canel_in )
                                {
                                            $log_insert['id']=$canel_in['id'];
											$log_insert['division_id']=$canel_in['division_id'];
											$log_insert['division_name']=$canel_in['division_name'];
                                            $log_insert['imis_cde']=$canel_in['imis_cde'];
                                            $log_insert['name']=$canel_in['name'];
                                            $log_insert['is_active']=$canel_in['is_active'];
                                            $log_insert['created_at']=$canel_in['created_at'];
                                            $log_insert['updated_at']=$canel_in['updated_at'];
                                            $log_insert['c_updated_at']=$created_datetime;
                                            $log_insert['cron_date']=$created_date;
										
											
                                            DB::table('canal_logs')->insert($log_insert);
                                    
                                }
								
								
								
}

}