@extends('layouts.landing')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            @if(Auth::check())
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{url('jobs')}}">Jobs</a></li>
                <li class="breadcrumb-item active">{{$job->job_title}}</li>
            </ol>
            @endif
            <div class="jumbotron text-center">
              <h1 class="display-4">{{ $job->job_title }}</h1>
            </div>
            <div class="card">
                <div class="card-body" id="job-id" data-id="{{ $job->id }}">
                    <h5 class="card-title">
                        {{ $job->job_title }}
                    </h5>
                    @if($job->company()->exists())
                    <p class="card-text"><a href="{{ route('companies.show', $job->company[0]->id ) }}"><b>{{ $job->company[0]->company_name }}</b><br></a></p>
                    @endif
                    <p class="card-text">Description: {{ $job->job_description }}</p>
                    <p class="card-text">Salary: {{ $job->job_salary }}</p>
                    <p class="card-text">Package: {{ $job->package_id }}</p>

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
                                    <table width="100%" id="search-results">
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
                                                    <button type="submit" class="btn btn-danger icon-style"><i class=" fa fa-trash-o fa-lg"></i></button>
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
                </div>
                <div class="card-footer text-muted">
                    @if(Auth::check())
                    {!! Form::open(['method' => 'DELETE', 'route' => ['jobs.destroy', $job->id] ]) !!}
                    @if($job->user_id == Auth::user()->id)
                    <button type="button" class="btn btn-primary icon-style" data-toggle="modal" data-target="#linkCompany">
                        <span class="fa fa-plus fa-lg" aria-hidden="true"></span>
                    </button>
                    <!--<a href="{{ url('jobs') }}" class="btn btn-primary">Back</a>-->
                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-info icon-style">
                        <i class="fa fa-wrench fa-lg" aria-hidden="true"></i>
                    </a>
                    @else
                    @can('Edit Job')
                    <button type="button" class="btn btn-primary icon-style" data-toggle="modal" data-target="#linkCompany">
                        <span class="fa fa-plus fa-lg" aria-hidden="true"></span>
                    </button>
                    <!--<a href="{{ url('jobs') }}" class="btn btn-primary">Back</a>-->
                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-info icon-style">
                        <i class="fa fa-wrench fa-lg" aria-hidden="true"></i>
                    </a>
                    @endcan
                    @endif
                    @can('Delete Job')
                    {!! Form::button('<i class=" fa fa-trash-o fa-lg"></i>', ['type' => 'submit', 'class' => 'btn btn-danger icon-style'] )  !!}
                    @endcan
                    {!! Form::close() !!}
                    <hr>
                    @endif
                    <p class="card-text">Last Updated {{$job->updated_at}}</p>
                </div>
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
