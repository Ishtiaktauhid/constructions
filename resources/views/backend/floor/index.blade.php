@extends('backend.layout.app')
@section('title',trans('Floor List'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('floor.create')}}"><i class="fa fa-plus"></i></a>
            </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Project Name')}}</th>
                            <th scope="col">{{__('Floor Name')}}</th>
                            <th scope="col">{{__('total_square_ft')}}</th>
                            <th scope="col">{{__('Total Cost')}}</th>
                            <th scope="col">{{__('Total Budget')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($floor as $f)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$f->project?->project_name}}</td>
                            <td>{{$f->floorname}}</td>
                            <td>{{$f->total_square_ft}}</td>
                            <td>{{$f->total_cost}}</td>
                            <td>{{$f->total_budget}}</td>
                            <td>{{$f->use_status}}</td>
                            
                            <td class="white-space-nowrap">
                                <a href="{{route('floor.edit',encryptor('encrypt',$f->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$f->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$f->id}}" action="{{route('floor.destroy',encryptor('encrypt',$f->id))}}" method="post">
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