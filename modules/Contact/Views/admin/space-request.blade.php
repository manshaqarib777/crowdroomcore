@extends('admin.layouts.app')
{{-- all-new-update --}}

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('All Contact Submissions')}}</h1>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                <form method="post" action="{{url('admin/module/contact/spaceBulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                    {{csrf_field()}}
                    <select name="action" class="form-control">
                        <option value="">{{__(" Bulk Actions ")}}</option>
                        <option value="delete">{{__(" Delete ")}}</option>
                    </select>
                    <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                </form>
               @endif
            </div>
            <div class="col-left">
               <form method="get" action="{{url('/admin/module/contact/spaceRequest')}} " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                    <input  type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search...')}}" class="form-control">
                    <button class="btn-info btn btn-icon btn_search"  type="submit">{{__('Search')}}</button>
                </form>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th >{{ __('Name')}}</th>
                                <th >{{ __('Phone / Wechat')}} / {{ __('Email')}} </th>
                                <!--<th class="author"></th>-->
                                <th >{{ __('Date')}} </th>
                                <th >{{ __('Type')}} </th>
                                <th >{{ __('People')}} </th>
                                <th >{{ __('Budget')}} </th>
                                <th >{{ __('Duration')}} </th>
                                <th >{{ __('Event')}} </th>
                                <th >{{ __('Facilities')}} </th>
                                <th >{{ __('Extra Info')}} </th>
                                <th class="date">{{__('Submission Date')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">{{$row->id}}</td>
                                        <td class="title">
                                            {{$row->user->name ?? ''}}

                                        </td>
                                        <td class="title">
                                            {{$row->user->phone ?? ''}}<br>{{$row->user->email ?? ''}} 
                                        </td>
                                        <!--<td class="author"></td>-->
                                        <td>{{$row->event_date ?? ''}} </td>
                                        <td>{{$row->space_type_id}}</td>
                                        <td>{{$row->attendee_id}}</td>
                                        <td>{{$row->budget_id}}</td>
                                        <td>{{$row->duration_id}}</td>
                                        <td>{{$row->event_type ?? ''}} </td>
                                         <td>{{$row->requirement_id}}</td>
                                         <td>{{$row->message}}</td>
                                       
                                        <td class="date">{{ display_datetime($row->updated_at)}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">{{__("No data")}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
@endsection
