@extends('layouts.app')
@section('content') 
<section class="container">
<div class="row row-cols-1 mb-3">
      <div class="col">
        <div class="card mb-12 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h1 class="my-0 fw-normal text-center">Задача #{{$task->id}}</h1>
            <h2 class="my-0 fw-bold">{{$task->title}}</h2>
          </div>
          <div class="card-body">
            {!! $task->description !!}
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
