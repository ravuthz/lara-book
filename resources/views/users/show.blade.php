@extends('layouts.app')

@section('content')

    @if ($user)
        <div class="row">
            <div class="col-md-3">
                <h1>{{ $user->fullName() }}</h1>
                @include('layouts.partials.avatar', ['size' => 100])
                <br/>
                @if (!$user->isAuth())
                    @include('layouts.partials.follows-form')
                @endif

                <div class="media-body">
                    <h1 class="media-heading">{{ $user->username }}</h1>
                    <ul class="list-inline">
                        <li>{{ label_count('Status', $user->statuses()->count() ) }}</li>
                        <li>{{ label_count('Follow', $user->followers()->count()) }}</li>
                    </ul>
                    <p class="text-muted">{{ label_count('Status', $user->statuses()->count() ) }}</p>
                </div>

                @foreach ($user->followers as $follower)
                    @include('layouts.partials.avatar', ['size' => 25, 'user' => $follower])
                @endforeach

            </div>
            <div class="col-md-6">
                @if ($user->isAuth())
                    @include('layouts.partials.status-form')
                @endif

                @include('layouts.partials.statuses', ['statuses' => $user->getWithStatuses()])

                <!-- @if ($user->status)
                    @foreach ($user->getWithStatuses() as $status)
                        @include('layouts.partials.status')
                    @endforeach
                @else
                    <p>This user has not yet posted a status.</p>
                @endif -->
            </div>
        </div>
    @endif

@endsection