@extends('layouts.staff.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="text-center mb-3">
                    <h4>スタッフ一覧</h4>
                </div>
                
                {!! link_to_route('staff.staffs.create', 'スタッフアカウント作成', [], ['class' => 'btn btn-outline-info btn-block mb-3']) !!}
                
                @if (count($staffs) > 0)
                    <ul class="list-unstyled">
                        @foreach ($staffs as $staff)
                        <li class="media mb-2">
                            <div class="media-body">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="font-weight-bold">{{ $staff->last_name }} {{ $staff->first_name }}</div>
                                                <div>{{ $staff->last_name_hiragana }} {{ $staff->first_name_hiragana }}</div>
                                                <div>{{ $staff->email }}</div>
                                            </div>
                                            <div>{!! link_to_route('staff.staffs.edit', '編集', [$staff->id], ['class' => 'btn btn-outline-info btn-sm']) !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @endif
                
                {{-- ページネーションのリンク--}}
                {{ $staffs->links() }}
            </div>
        </div>
    </div>
@endsection


{{--
@if (count($staffs) > 0)
                    <ul class="list-unstyled">
                        @foreach ($staffs as $staff)
                        <li class="media mb-3 ">
                            <div class="media-body">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>{{ $staff->last_name }} {{ $staff->first_name }}</div>
                                            <div>{{ $staff->last_name_hiragana }} {{ $staff->first_name_hiragana }}</div>
                                            <div>{{ $staff->email }}</div>
                                            <div>{!! link_to_route('staff.staffs.edit', $staff->id, [$staff->id], ['class' => 'btn btn-info btn-sm']) !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @endif
--}}