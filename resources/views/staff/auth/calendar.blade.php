@extends('layouts.staff.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           {{ $calendar->getTitle() }}
           {!! $calendar->render() !!}
           {{--
           <div class="card">
               <div class="card-header">{{ $calendar->getTitle() }}</div>
               <div class="card-body">
					{!! $calendar->render() !!}
               </div>
           </div>
           --}}
       </div>
   </div>
</div>
@endsection