@extends('backend.layout.app')
@section('title',trans('Project List'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- table bordered -->
            <div>
                <a class="pull-right fs-1" href="{{route('project.create')}}"><i class="fa fa-plus"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Project Name')}}</th>
                            <th scope="col">{{__('Land')}}</th>
                            <th scope="col">{{__('Start Time')}}</th>
                            <th scope="col">{{__('End Time')}}</th>
                            <th scope="col">{{__('Proect Value')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($project as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->project_name}}</td>
                            <td>{{$p->land?->name_en}}</td>
                            <td>{{$p->start_time}}</td>
                            <td>{{$p->end_time}}</td>
                            <td>{{$p->project_value}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('project.show',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{route('project_file.create',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-file"></i>
                                </a>
                                <a href="{{route('project.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('project.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="8" class="text-center">No Pruduct Found</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection