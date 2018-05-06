@extends('layouts.app')

@section('content')

<div class="container" id="job-id" data-id="{{ $job->id }}">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <h5 class="card-header">
                    <span style="float: left">Job Details</span>
                    @can('Edit Company')
                    <span style="float: right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#linkCompany">
                            <span class="fa fa-plus fa-lg" aria-hidden="true"></span>
                        </button>
                    </span>
                    @endcan
                </h5>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $job->job_title }}
                        @if($job->company()->exists())
                        <p class="card-text"><a href="{{ route('companies.show', $job->company[0]->id ) }}"><b>{{ $job->company[0]->company_name }}</b><br></a></p>
                        @endif
                    </h5>
                    <p class="card-text">Description: {{ $job->job_description }}</p>
                    <p class="card-text">Salary: {{ $job->job_salary }}</p>
                    <p class="card-text">Package: {{ $job->package_id }}</p>
                </div>
                <div class="card-footer text-muted">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['jobs.destroy', $job->id] ]) !!}
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    @can('Edit Job')
                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-info" role="button">Edit</a>
                    @endcan
                    @can('Delete Job')
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    @endcan
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="linkCompany" tabindex="-1" role="dialog" aria-labelledby="LinkCompany" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if(!$job->company()->exists())
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Link Job to a Company</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="job-title" class="col-form-label">Find an existing Company.</label>
                <input type="text" class="form-control" id="search" name="search" maxlength="50">
                <br>
                <table width="100%">
                    <tr id="search-results">
                    </tr>
                </table>
            </div>
            @else
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Job Link</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table width="100%">
                    <tr>
                        <td style="float: left">{{ $job->company[0]->company_name }}</td>
                        <td style="float: right">
                            <form method="POST" action="{{ url('unlink') }}">
                                <input id="company_id" name="company_id" type="hidden" value="{{$job->company[0]->id}}">
                                <input id="job_id" name="job_id" type="hidden" value="{{$job->id}}">
                                <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                                <button type="submit" class="btn btn-danger"><i class=" fa fa-trash-o fa-lg"></i></button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
<script>

    $('#linkCompany').on('show.bs.modal', function (event) {
            var modal = $(this)
    })

    $('#search').on('keyup',function(){
        $value=$(this).val();
        var job_id = $('#job-id').attr('data-id'); // gets

        $.ajax({
            type : 'get',
            url : '{{ URL::to('search') }}',
            data:{"_token": "{{ csrf_token() }}", 'search':$value, 'job_id': job_id},
            success:function(data){
                //$('tbody').html(data);
                console.log(data);
                $('#search-results').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    })

</script>
@endsection
