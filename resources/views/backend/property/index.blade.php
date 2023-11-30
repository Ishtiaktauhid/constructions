@extends('backend.layout.app')
@section('title',trans('Property List'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('property.create')}}"><i class="fa fa-plus"></i></a>
            </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Project Name')}}</th>
                            <th scope="col">{{__('Property Image')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pimage as $pi)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$pi->project?->project_name}}</td>
                            <td><img width="100px" src="{{asset('public/uploads/project/properties/'.      $pi->image_name)}}" alt="asdkfasdkf"></td> 
                             <td class="white-space-nowrap">
                                <a href="{{route('property.edit',encryptor('encrypt',$pi->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$pi->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$pi->id}}" action="{{route('property.destroy',encryptor('encrypt',$pi->id))}}" method="post">
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