@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
        					<div class="d-flex align-items-center">
        						<h1>{{ $question->title }}</h1>
        						<div class="ml-auto">
        							<a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
        						</div>
        					</div>
        				</div>
                <div class="card-body">
                    {!! $question->body_html !!}
                    <div class="float-right">
                        <span class="text-muted">Asked {{ $question->created_at }}</span>
                        <div class="media">
                          <a href="{{ $question->user->url }}" class="pr-2">
                            <img src="{{ $question->user->avatar }}"/>
                          </a>
                          <div class="media-body mt-3">
                            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <h2>{{ $question->answers_count." ".str_plural('answer', $question->answers_count) }}</h2>
              </div>
              <hr>
              @foreach($question->answers as $answer)
                <div class="media">
                  <div class="media-body">
                    {!! $answer->body_html !!}
                    <div class="float-right">
                        <span class="text-muted">Answered {{ $answer->created_at }}</span>
                        <div class="media">
                          <a href="{{ $answer->user->url }}" class="pr-2">
                            <img src="{{ $answer->user->avatar }}"/>
                          </a>
                          <div class="media-body mt-3">
                            <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <hr>
              @endforeach
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
