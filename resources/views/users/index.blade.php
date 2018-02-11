@extends('layouts.app')

@section('content')

    <h1>All Users</h1>

    {{-- @foreach (array_chunk($users->all(), 4) as $userSet) --}}
    
    @foreach($users->chunk(4) as $userSet)
        <div class="row users">
            @foreach ($userSet as $user)
                <div class="col-md-3 user-block">
                    @include('layouts.partials.avatar', ['size' => '70'])
                    <h4 class="user-block-username">
                        {{ link_to_route('users.show', $user->fullName(), $user->slug) }}
                    </h4>
                </div>
            @endforeach
        </div>
    @endforeach

    {{ $users->links() }}

@endsection