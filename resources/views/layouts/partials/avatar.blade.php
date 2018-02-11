<a href="{{ route('users.show', $user->slug) }}">
    <img class="media-object img-circle avatar" src="{{ $user->gravatarLink(isset($size) ? $size : 30) }}" alt="{{ $user->fullName() }}" title="{{ $user->username }}">
</a>