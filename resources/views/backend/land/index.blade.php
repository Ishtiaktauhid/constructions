@extends('backend.layout.app')
@section('title',trans('Land'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <!-- table bordered -->
            <div class="table-responsive"><div>
                <a class="pull-right fs-1" href="{{route('land.create')}}"><i class="fa fa-plus"></i></a>
            </div>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Description')}}</th>
                            <th scope="col">{{__('Mouza NO')}}</th>
                            <th scope="col">{{__('RS NO')}}</th>
                            <th scope="col">{{__('RS Image')}}</th>
                            <th scope="col">{{__('BS NO')}}</th>
                           <th scope="col">{{__('BS Image')}}</th>
                            <th scope="col">{{__('Registration NO')}}</th>
                            <th scope="col">{{__('Registration Image')}}</th>
                            <th scope="col">{{__('Land Area')}}</th>
                            <th scope="col">{{__('Acquire Date')}}</th>
                            <th scope="col">{{__('Owner Details')}}</th>
                            <th scope="col">{{__('Price')}}</th>
                             <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land as $p)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$p->name_en}}</td>
                            <td>{{$p->description}}</td>
                            <td>{{$p->mouza_no_en}}</td>
                            <td>{{$p->rs_no_en}}</td>
                            <td><img width="50px" src="{{asset('public/uploads/lands/rs/'.$p->rs_image)}}" alt=""></td>
                            <td>{{$p->bs_no_en}}</td>
                            <td><img width="50px" src="{{asset('public/uploads/lands/bs/'.$p->bs_image)}}" alt=""></td>
                            <td>{{$p->registration_no_en}}</td>
                            <td><img width="50px" src="{{asset('public/uploads/lands/registration/'.$p->registration_image)}}" alt=""></td>
                            <td>{{$p->land_area}}</td>
                            <td>{{$p->acquire_date}}</td>
                            <td>{{$p->original_owner_details}}</td>
                            <td>{{$p->price}}</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('land.edit',encryptor('encrypt',$p->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$p->id}}" action="{{route('land.destroy',encryptor('encrypt',$p->id))}}" method="post">
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