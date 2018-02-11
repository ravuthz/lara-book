@if ($statuses)
    @foreach ($statuses as $status)
        @include('layouts.partials.status')
    @endforeach
@else
    <p>This user has not yet posted a status.</p>
@endif