@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: -56px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Feedback</div>

                <div class="card-body" style="overflow-x:auto;">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>District</th>
                                <th>Panah Gah </th>
                                <th>Bedding</th>
                                <th>Cleanliness</th>
                                <th>Electricity</th>
                                <th>Food</th>
                                <th>Security</th>
                                <th>Shower</th>
                                <th>Toilet</th>
                                <th>Doctor</th>
                                <th>Corona SOP's</th>
                                <th>Hand Washing</th>
                                <th>Drinkable Water</th>
                                <th>Medical Checkup</th>
                                <th>Hall Cleanliness</th>
                                <th>Electrical Machine</th>
                                <th>Activity Image</th>
                                <th>Activity Date</th>
                                <th>Submitted By</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feedback as $f)
                            <tr>
                                <td>{{ $loop->iteration + $feedback->firstItem() - 1 }}</td>
                                <td>{{ $f->district->name }}</td>
                                <td>{{ $f->shelterHome->name }}</td>
                                <td>{{ $f->bedding }}</td>
                                <td>{{ $f->cleanliness }}</td>
                                <td>{{ $f->electricity }}</td>
                                <td>{{ $f->food }}</td>
                                <td>{{ $f->security }}</td>
                                <td>{{ $f->shower }}</td>
                                <td>{{ $f->toilet }}</td>
                                <td>{{ $f->extra_attributes->doctor }}</td>
                                <td>{{ $f->extra_attributes->corona_sops }}</td>
                                <td>{{ $f->extra_attributes->hand_washing }}</td>
                                <td>{{ $f->extra_attributes->drinkable_water }}</td>
                                <td>{{ $f->extra_attributes->medical_checkup }}</td>
                                <td>{{ $f->extra_attributes->hall_cleanliness }}</td>
                                <td>{{ $f->extra_attributes->electrical_machines }}</td>
                                <td>
                                    <a href='{{ $f->getFirstMediaUrl() }}' target='_blank'>{{ $f->getFirstMedia() }}</a>
                                </td>
                                <td>{{ date('d , M Y H:i:s', strtotime($f->activity_datetime)) }}</td>
                                <td>{!! $f->user->getRoleNames()->first() == 'guest' ? 'public' : $f->user->username !!}</td>



                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $feedback->links() !!}





                </div>
            </div>
        </div>
    </div>
</div>
@endsection