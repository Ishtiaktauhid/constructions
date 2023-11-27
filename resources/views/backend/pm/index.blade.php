@extends('backend.layout.app')
@section('title',trans('Project Material List'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('pm.create')}}"><i class="fa fa-plus"></i></a>
            </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Project Name')}}</th>
                            <th scope="col">{{__('Material Name')}}</th>
                            <th scope="col">{{__('Quantity')}}</th>
                            <th scope="col">{{__('Issued_by')}}</th>
                            <th scope="col">{{__('Issued_date')}}</th>
                            <th scope="col">{{__('Received_by')}}</th>
                            <th scope="col">{{__('Received_date')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pmaterial as $m)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$m->project?->project_name}}</td>
                            <td>{{$m->material?->name}}</td>
                            <td>{{$m->quantity}}</td>
                            <td>{{$m->issued_by}}</td>
                            <td>{{$m->issued_date}}</td>
                            <td>{{$m->received_by}}</td>
                            <td>{{$m->received_date}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('pm.edit',encryptor('encrypt',$m->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$m->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$m->id}}" action="{{route('pm.destroy',encryptor('encrypt',$m->id))}}" method="post">
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