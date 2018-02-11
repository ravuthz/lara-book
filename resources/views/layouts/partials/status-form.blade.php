<div class="status-post">
    {{ Form::open(['route' => 'statuses.store']) }}
        <div class="form-group">
            {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => "What's on your mind ???", 'rows' => 3]) }}
        </div>
        <div class="form-group status-post-submit">
            {{ Form::submit('Post Status', ['class' => 'btn btn-sm btn-primary']) }}
        </div>
    {{ Form::close() }}
</div>