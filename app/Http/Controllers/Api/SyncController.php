<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\District;
use App\Http\Resources\DistrictCollection;
use App\Http\Resources\FeedbackCollection;
use App\Http\Resources\ShelterHomeCollection;
use App\ShelterHome;
use App\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SyncController extends Controller
{
    public function index(Request $request)
    {

        if (auth('api')->check()) {
            $user = Auth::guard('api')->user();
            $roles = $user->roles()->first();

            $all_feedback = Feedback::accessable()->notMine()->notDeleted();
            $dashboard_counts = getFeedbackStatusCounts($all_feedback->get());

            $complaints_to_resolve = $all_feedback->unresolved()->ofCitizen()->get();

            return response()->json([
                'code' => 811,
                'status' => true,
                'message' => 'User Synced Successfully',
                'data' => [
                    'config' =>  [
                        'can_resolve' => $roles->hasPermissionTo('resolve-complaint'),
                        'can_view_my_complaints' => $roles->hasPermissionTo('app-view-my-complaints'),
                        'can_submit_complaints' => $roles->hasPermissionTo('app-submit-complaints'),
                        'can_submit_evidence_pictures' => $roles->hasPermissionTo('pictorial-evidence')
                    ],
                    'dashboard_counts' => $dashboard_counts,
                    'districts' => new DistrictCollection(
                        District::ofPunjab()->whereId($user->district_id)->get()
                    ),
                    'shelterHomes' => new ShelterHomeCollection(
                        ShelterHome::whereDistrictId($user->district_id)->live()->get()
                    ),
                    'mycomplaints' => new FeedbackCollection(
                        Feedback::mine()->notDeleted()->get()
                    ),
                    'complaints_to_resolve' => new FeedbackCollection($complaints_to_resolve)
                ]
            ]);
        } else {

            $dashboard_counts = getFeedbackStatusCounts(null);
            return response()->json([
                'code' => 834,
                'status' => true,
                'message' => 'Public Synced Successfully',
                'data' => [
                    'config' =>  [
                        'can_resolve' => false,
                        'can_view_my_complaints' => false,
                        'can_submit_complaints' => false,
                        'can_submit_evidence_pictures' => false
                    ],
                    'dashboard_counts' => $dashboard_counts,
                    'districts' => new DistrictCollection(
                        District::ofPunjab()->get()
                    ),
                    'shelterHomes' => new ShelterHomeCollection(
                        // ShelterHome::Distance($request->lat, $request->lng)->get()
                        ShelterHome::live()->get()
                    ),
                    'mycomplaints' => [],
                    'complaints_to_resolve' => []
                ]
            ]);
        }
    }
}
