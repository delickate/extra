<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\ShelterHome;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $shelterhomes = ShelterHome::with('complaints' , 'latestComplaint')->get();
        $markers = $shelterhomes->map(function ($shelterhome) {
            return [
                'id' => $shelterhome->id,
                'lat' => $shelterhome->lat,
                'lng' => $shelterhome->lng,
                'name' => $shelterhome->name,
                'beds' => $shelterhome->beds,
                'occupied_beds' => $shelterhome->occupied_beds,
                'pinColor' => 'blue',
                'last_visit_date' => $shelterhome->latestComplaint->activity_datetime ?? 'N/A'
            ];
        });

        return view(
            'pages/dashboard',
            [
                'markers' => $markers,
                'panagah' => ShelterHome::count(),
                'districts' => District::select('id', 'name')->whereProvinceId(6)->get(),
                'not_visited_panagah' => ShelterHome::doesnthave('complaints')->count(),
                'visited_panagah' => ShelterHome::has('complaints')->count(),
                'nonCompliant' => ShelterHome::nonCompliantShelterHomes()->count(),
                'compliant' => ShelterHome::compliantShelterHomes()->count()
            ]
        );
    }

    public function panagah(Request $request)
    {
        $district_id = $request->district_id;
        $shelterhomes = ShelterHome::where('district_id', $district_id)->get();
        return response()->json([
            'shelterhomes' => $shelterhomes
        ]);
    }

    public function filter(Request $request)
    {

        // $this->validate($request, [
        //     'from' => 'required',
        //     'to' => 'required',
        //     'district' => 'required',
        //     'panahgah' => 'required'
        // ]);

        $query = ShelterHome::query();

        if ($request->from) {
            $query = $query->whereHas('complaints', function ($query) use ($request) {
                $query->whereDate('activity_datetime', '>=', date('Y-m-d', strtotime($request->from)));
            });
        }
        if ($request->to) {
            $query = $query->whereHas('complaints', function ($query) use ($request) {
                $query->whereDate('activity_datetime', '<=', date('Y-m-d', strtotime($request->to)));
            });
        }
        if ($request->district) {
            if ($request->district == 'all') {
                $query = $query->whereHas('complaints', function ($query) use ($request) {
                    $district = District::where('province_id', 6)->pluck('id');
                    $query->whereIn('district_id', $district);
                });
            } else {
                $query = $query->whereHas('complaints', function ($query) use ($request) {
                    $query->where('district_id', $request->district);
                });
            }
        }
        if ($request->panahgah) {
            if ($request->panahgah == 'all') {
                $query = $query->whereHas('complaints', function ($query) use ($request) {
                    $panahgah = ShelterHome::pluck('id');
                    $query = $query->whereIn('panagah_id', $panahgah);
                });
            } else {
                $query = $query->whereHas('complaints', function ($query) use ($request) {
                    $query = $query->where('panagah_id', $request->panahgah);
                });
            }
        }
        if ($request->type) {
            if ($request->type == 'all') {
                $query = $query->whereHas('complaints', function ($query) {
                    $query->whereHas('user.roles', function ($query) {
                        $query->whereIn('name', ['admin', 'guest', 'inspector']);
                    });
                });
            } else {

                $query = $query->whereHas('complaints', function ($query) use ($request) {
                    $query->whereHas('user.roles', function ($query) use ($request) {
                        $query->when(($request->type == 1), function ($q) {
                            return $q->where('name', 'admin');
                        });
                        $query->when(($request->type == 2), function ($q) {
                            return $q->where('name', 'guest');
                        });
                    });
                });
            }
        }

        $data = $query->with('complaints' , 'latestComplaint')->get();

        // dd($data[0]->latestComplaint);
        $markers = array();
        foreach ($data as $d) {
            $markers[] = array(
                'id' => $d->id,
                'lat' => $d->lat,
                'lng' => $d->lng,
                'name' => $d->name,
                'beds' => $d->beds,
                'occupied_beds' => $d->occupied_beds,
                'type' => 'feedback',
                'pinColor' => 'blue',
                'last_visit_date' => $d->latestComplaint->activity_datetime


            );
        }

        $request->flash();
        // dd($markers);
        return view(
            'pages/dashboard',
            [
                'markers' => $markers,
                'panagah' => ShelterHome::count(),
                'districts' => District::select('id', 'name')->whereProvinceId(6)->get(),
                'visited_panagah' => ShelterHome::has('complaints')->count(),
                'not_visited_panagah' => ShelterHome::doesnthave('complaints')->count()
            ]
        );
    }


    function shelterHomeFilter(Request $request)
    {
        if ($request->filter) {
            if ($request->filter == 1) {
                $data = ShelterHome::with('complaints' , 'latestComplaint')->get();
                $pinColor = 'blue';
            }

            if ($request->filter == 2) {

                $data = ShelterHome::nonCompliantShelterHomes()->with('latestComplaint')->get();

                // return $data;
                $pinColor = 'red';
            }

            if ($request->filter == 3) {
                $data = ShelterHome::compliantShelterHomes()->with('latestComplaint')->get();
                $pinColor = 'green';
            }
        }


        // return $data;


        $markers = array();
        foreach ($data as $d) {
            $markers[] = array(
                'id' => $d->id,
                'lat' => $d->lat,
                'lng' => $d->lng,
                'name' => $d->name,
                'type' => 'shelterhome',
                'pinColor' => $pinColor,
                'beds' => $d->beds,
                'occupied_beds' => $d->occupied_beds,
                'last_visit_date' => $d->latestComplaint->activity_datetime ?? ''

            );
        }

        $request->flash();

        return view(
            'pages/dashboard',
            [
                'markers' => $markers,
                'panagah' => ShelterHome::count(),
                'districts' => District::select('id', 'name')->whereProvinceId(6)->get(),
                'visited_panagah' => ShelterHome::has('complaints')->count(),
                'not_visited_panagah' => ShelterHome::doesnthave('complaints')->count(),
                'nonCompliant' => ShelterHome::nonCompliantShelterHomes()->count(),
                'compliant' => ShelterHome::compliantShelterHomes()->count()
            ]
        );
    }

    function kpis(Request $request)
    {

        if ($request->id == 1) {
            $data = ShelterHome::with('district')->orderBy('id', 'DESC')->get();
        }
        if ($request->id == 2) {
            $data = ShelterHome::has('complaints')->with('district')->orderBy('id', 'DESC')->get();
        }
        if ($request->id == 3) {
            $data = ShelterHome::doesnthave('complaints')->with('district')->orderBy('id', 'DESC')->get();
        }

        return view('kpis.detail', compact('data'));
    }

    function complaints($id){

        $shelterhome = ShelterHome::find($id);
        $feedback = Feedback::where('panagah_id' , $id)->get();
        return view('pages.activities', compact('feedback' , 'shelterhome'));


    }
}
