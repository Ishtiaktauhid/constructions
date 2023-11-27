
@extends('backend.layout.app')
@section('title',trans('Asset'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('asset.create')}}"><i class="fa fa-plus"></i></a>
            </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Description')}}</th>
                            <th scope="col">{{__('Schedule')}}</th>
                            <th scope="col">{{__('Details')}}</th>
                          <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($asset as $e)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$e->name}}</td>
                            <td>{{$e->description}}</td>
                            <td>{{$e->maintenance_schedule}}</td>
                             <td>{{$e->other_details}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('asset.edit',encryptor('encrypt',$e->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$e->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$e->id}}" action="{{route('asset.destroy',encryptor('encrypt',$e->id))}}" method="post">
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
