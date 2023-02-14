<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShelterHome;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\Models\Media;

class PictorialEvidenceController extends Controller
{
    public function index(Request $request)
    {

        $input = collect(json_decode($request->data, true));
        $input->put('picture_sitting', $request->picture_sitting);
        $input->put('picture_food', $request->picture_food);
        $input->put('picture_cleansing', $request->picture_cleansing);
        $input->put('picture_sleeping', $request->picture_sleeping);

        if (isset($input['user_id'])) :
            if (!auth('api')->check()) :
                return response()->json([
                    'code' => 801, // 801 is special code , mobile dev will logout current user on this code.
                    'status' => false,
                    'message' => 'Unauthorized'
                ]);
            endif;
        endif;

        $validator = Validator::make($input->all(), [
            "shelter_home_id" => 'exists:shelter_homes,id',
            "picture_sitting" => 'sometimes|required_without_all:picture_food,picture_cleansing,picture_sleeping',
            "picture_food" => 'sometimes|required_without_all:picture_cleansing,picture_sleeping,picture_sitting',
            "picture_cleansing" => 'sometimes|required_without_all:picture_food,picture_sleeping,picture_sitting',
            "picture_sleeping" => 'sometimes|required_without_all:picture_food,picture_cleansing,picture_sitting'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 821,
                'status' => false,
                'message' => validationErrorsToString($validator->errors()),
            ]);
        }

        $exist = ShelterHome::whereHas('media', function(Builder $query){
            return $query->whereDate('created_at' , Carbon::today()->format('Y-m-d'));
        })
        ->whereId($input['shelter_home_id'])
        ->get();

        if ($exist->count() > 0) {
            return response()->json([
                'status' => false,
                'message' => 'Pictures already submitted against this Panahgah for today'
            ]);
        }

        $uploads = collect([]);
        $request->picture_sitting  ?  $uploads->put('picture_sitting', $request->picture_sitting) : '';
        $request->picture_food  ? $uploads->put('picture_food', $request->picture_food): '';
        $request->picture_cleansing  ? $uploads->put('picture_cleaning', $request->picture_cleansing): '';
        $request->picture_sleeping  ? $uploads->put('picture_sleeping', $request->picture_sleeping): '';


        // $uploads = ['picture_sitting' , 'picture_food' , 'picture_cleansing' , 'picture_sleeping'];
        $shelterHome = ShelterHome::find($input['shelter_home_id']);
        $shelterHome->addAllMediaFromRequest()
            ->each(function ($fileAdder, $key) use ($uploads , $input) {
                $fileAdder
                    ->withCustomProperties(
                        ['type' => $uploads->keys()->all()[$key], 'activity_datetime' => $input['activity_datetime']]
                    )
                    ->toMediaCollection(Carbon::parse($input['activity_datetime'])->format('Y-m-d'));
            });

        return response()->json([
            'status' => true,
            'code' => 822,
            'message' => 'Evidence received successfully!'
        ]);
    }
}
