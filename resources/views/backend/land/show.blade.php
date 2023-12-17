@extends('backend.layout.appAuth')
@section('title',trans('Land'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Mouza NO')}}</th>
                            <th scope="col">{{__('RS NO')}}</th>
                            <th scope="col">{{__('BS NO')}}</th>
                            <th scope="col">{{__('Registration NO')}}</th>
                            <th scope="col">{{__('Land Area')}}</th>
                            <th scope="col">{{__('Acquire Date')}}</th>
                             <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection