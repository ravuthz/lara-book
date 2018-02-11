<article class="comments__comments media status-media">
    <div class="pull-left">
        @include('layouts.partials.avatar', ['user' => $comment->user, 'class' => 'status-media-object'])
    </div>

    <div class="media-body">
        <h4 class="media-heading">
            {{ $comment->user->username }}
        </h4>
        {{ $comment->body }}
    </div>
</article>