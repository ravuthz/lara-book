@if ($user->isFollowedBy(Auth::user()))
   {{ Form::open(['route' => ['follows.destroy', $user->id], 'method' => 'DELETE']) }}
        {{ Form::hidden('userIdToFollow', $user->id) }}
        <button type="submit" class="btn btn-sm btn-danger btn-profile-follow">
            UnFollow
        </button>
    {{ Form::close() }}
@else
    {{ Form::open(['route' => 'follows.store']) }}
        {{ Form::hidden('userIdToFollow', $user->id) }}
        <button type="submit" class="btn btn-sm btn-primary btn-profile-follow">
            Follow
        </button>
    {{ Form::close() }}
@endif