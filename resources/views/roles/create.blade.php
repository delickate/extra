@extends('layouts.app')

@section('content')

<section class="main_warp">
    <div class="col-md-12 no-rounded mb-4 text-white">
        <div class="row">
            <div class="col-md-12 text-center mb-1">
                <h2 class="page-title">Add Role</h2>
            </div>
        </div>
    </div>
    <div class="bg-white" style="padding: 10px 0;">
        <section class="listing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form class="add-roles" method="POST" action="{{ route('roles.store') }}">
                            @csrf
                            <div class="add-name">
                                <input type="text" name="name" class="form-control" required placeholder="Enter Role">
                            </div>

                            <h5>Permissions </h5>
                            <div class="row">
                                <div class="col-3"><input type="checkbox" id="select_all"> Select/Deselect All </div>
                                @foreach($permission as $value)
                                <div class="col-3">
                                    <input class="checkbox" name="permission[]" value="{{ $value->name }}" type="checkbox"> &nbsp; {{ $value->name }}
                                </div>

                                @endforeach

                                <div class="col-12">
                                    <button  type="submit" class="submit-role">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

</div>
</section>


<script type="text/javascript">
    //select all checkboxes
    $(document).ready(function() {
        $("#select_all").change(function() { //"select all" change
            var status = this.checked; // "select all" checked status
            $('.checkbox').each(function() { //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('.checkbox').change(function() { //".checkbox" change
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if (this.checked == false) { //if this item is unchecked
                $("#select_all")[0].checked = false; //change "select all" checked status to false
            }

            //check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $("#select_all")[0].checked = true; //change "select all" checked status to true
            }
        });


    });
</script>
@endsection