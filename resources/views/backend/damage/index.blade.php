@extends('backend.layout.app')
@section('title',trans('Damage List'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('damage.create')}}"><i class="fa fa-plus"></i></a>
            </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Floor Name')}}</th>
                            <th scope="col">{{__('Flat Name')}}</th>
                            <th scope="col">{{__('Material Name')}}</th>
                            <th scope="col">{{__('Quantity')}}</th>
                            <th scope="col">{{__('Unit Price')}}</th>
                            <th scope="col">{{__('Total Amount')}}</th>
                            
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mdamage as $md)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$md->floor?->floorname}}</td>
                            <td>{{$md->flat?->flatName}}</td>
                            <td>{{$md->material?->name}}</td>
                            <td>{{$md->quantity}}</td>
                            <td>{{$md->unit_price}}</td>
                            <td>{{$md->total_amount}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('damage.edit',encryptor('encrypt',$md->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$md->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$md->id}}" action="{{route('damage.destroy',encryptor('encrypt',$md->id))}}" method="post">
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