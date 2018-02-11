<article class="media status-media">
    <div class="pull-left">
        @include('layouts.partials.avatar', ['user' => $status->user])
    </div>
    <div class="media-body">
        <h4 class="media-heading">
            {{ $status->user->fullName() }}
        </h4>

        <p>{{ $status->user->accountAge() }}</p>

        <p>{{ $status->body }}</p>
    </div>

    <hr/>

    @include('layouts.partials.comments', ['user' => $status->user])

</article>

