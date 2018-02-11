{{--
@if (!$status->comments->isEmpty())
    <div class="comments">
        @foreach ($status->comments as $comment)
            @include('layouts.partials.comment')
        @endforeach
    </div>
@endif
--}}



<details>
    <summary>
        {{ label_count('Comment', $user->statuses()->count(), 'No Comment') }}
    </summary>

@if ($comments = $status->comments)
    <div class="comments">
        @foreach ($comments as $comment)
            @include('layouts.partials.comment')
        @endforeach
    </div>
@endif

@if (Auth::user())
    {{ Form::open(['route' => 'comments.store', 'class' => 'form-comments']) }}
        {{ Form::hidden('user_id', Auth::user()->id) }}
        {{ Form::hidden('status_id', $status->id) }}
        <div class="form-group">
            {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1, 'placeholder' => 'Write comments ...']) }}
        </div>
    {{ Form::close() }}
@endif

</details>