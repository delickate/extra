<?php
use App\CourseLevels;

if (! function_exists('include_route_files')) {

      function validationErrorsToString($errArray) {
            if(empty($errArray))
                  return '';

            if(!$errArray)
                  return '';

            $valArr = array();
            foreach ($errArray->toArray() as $key => $value) {
                  $errStr = $key.':'.$value[0];
                  array_push($valArr, $errStr);
            }
            if(!empty($valArr)){
                  $errStrFinal = implode(' ', $valArr);
            }
            return $errStrFinal;
      }


/**
 * Loops through a folder and requires all PHP files
 * Searches sub-directories as well.
 *
 * @param $folder
 */
      function include_route_files($folder)
      {
            try {
                  $rdi = new recursiveDirectoryIterator($folder);
                  $it = new recursiveIteratorIterator($rdi);

                  while ($it->valid()) {
                        if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                        require $it->key();
                        }

                        $it->next();
                  }
            } catch (Exception $e) {
                  echo $e->getMessage();
            }
      }

      function send_feedback_notification($feedback, $fcm_tokens)
      {
            if (!$feedback instanceof App\Feedback):
                  return false;
            endif;

            if(!$fcm_tokens || !is_array($fcm_tokens)):
                  return false;
            endif;

      //     $feedback = Feedback::find(28);

          $feedback_resource = new App\Http\Resources\Feedback($feedback);
          $feedback_resource = json_encode($feedback_resource);


      //     $server_key = "AAAA4J55kFM:APA91bFH1ZNzufN3azK6iq-bVTLBaenVzmpZq3yLvLDF1NbvN9TVzpsZbbUf0L94bmQzSBb3UfPFRV99xyJnmJCQbkJv1uCVssPWJKrwzfEavUKtpSHyVc30uf83komuscJySuovJ_rH";
      //     $fcm_token  = "dXlYAdJ6QnaISxXMoWi7uW:APA91bHr_jE3llm7hhf2uGPQjFGCvLsqGi5LPbRKvAJfCuaZLxYvzqGNb4Srs25gXD52NvJKF8Bc16_zhFRyyaVonsCZpjp3AjOCBugF1uLH4LOtC2ofJNSm0kj1kWhc-9CY3KODRELz";

          $shelter_home = optional($feedback->shelterHome()->first())->name;

          $ModelNotification['complaint'] = $feedback_resource;
          $ModelNotification['title'] = "New Complaint";
          $ModelNotification['message'] = "Complaint ".$feedback->feedback_code." is logged for ".$shelter_home." panahgah";


              $fields = array(
                      'registration_ids'  => $fcm_tokens,
                      'data'          	=> $ModelNotification
              );

              $headers = array(
                      'Authorization: key=' . config('services.firebase.server_key'),
                      // 'Authorization: key='.$server_key,
                      'Content-Type: application/json'
              );

              //pre($headers);
              //pre($fields); die();

              $ch = curl_init();

              curl_setopt( $ch,CURLOPT_URL, config('services.firebase.send_url'));
              curl_setopt( $ch,CURLOPT_POST, true );
              curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
              curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
              curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
              curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
              curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
              curl_setopt($ch, CURLOPT_TIMEOUT, 10);
              $result = curl_exec($ch );
              // ==== 1.1 Start : for testing below ====
              // $error = curl_error($ch);
              // if(isset($error)){
              // 	return $error;
              // };
              //   var_dump($result);
              // exit;
              // ==== 1.1 End ===================
              curl_close( $ch );
              // return $result;

      }
      
        function evaluateStudentlevel($obtain_percentage) {
           if($obtain_percentage <= 33){
               $level = 1;
           }else if($obtain_percentage <= 66){
               $level = 2;
           }else if($obtain_percentage > 66){
               $level = 3;
           }
           return $level;
      }
      
      function dateConv($inDate)
        {
            if ($inDate != '') {
               // return str_replace("(00:00)", '', date('F j, Y (H:i)', strtotime($inDate)));
                return str_replace("(00:00)", '', date('M j, Y (H:i)', strtotime($inDate)));
            } else {
                return "-";
            }
        }
      function studentPath($leval_id)
        {
          
          //$leval_id = '1';
           $path = CourseLevels::where('level_id' , '>=', $leval_id)->get();
           $path_text  = '';
           foreach ($path as $key => $value) {
               if(!empty($path_text)){
                   $path_text .= ' > ';
               }
               $path_text .= ucfirst($value->leval_name);
 
           }
           
           return $path_text;
        }
      function studentCourseLevel($_id)
        {
          
          //$leval_id = '1';
           $path = CourseLevels::where('level_id' , '>=', $leval_id)->get();
           $path_text  = '';
           foreach ($path as $key => $value) {
               if(!empty($path_text)){
                   $path_text .= ' > ';
               }
               $path_text .= ucfirst($value->leval_name);
 
           }
           
           return $path_text;
        }
      
      
}
if (! function_exists('getFeedbackStatusCounts')) {
      function getFeedbackStatusCounts($feedback_collection){
            $return = [];
            $return['total_resolved_complaints']    = (int)optional(optional($feedback_collection)->filter(function ($feedback) { return $feedback->feedback_status == 1;}))->count();
            $return['total_pending_complaints']     = (int)optional(optional($feedback_collection)->filter(function ($feedback) { return $feedback->feedback_status == 2;}))->count();
            $return['total_overdue_complaints']     = (int)optional(optional($feedback_collection)->filter(function ($feedback) { return $feedback->feedback_status == 3;}))->count();
            $return['total_closed_complaints']      = (int)optional(optional($feedback_collection)->filter(function ($feedback) { return $feedback->isclosed == 1;}))->count();
            $return['total_reopened_complaints']    = (int)optional(optional($feedback_collection)->filter(function ($feedback) { return $feedback->reopened_count > 0;}))->count();
            $return['total_complaints']             = (int)optional($feedback_collection)->count();

            return $return;

      }
}

?>