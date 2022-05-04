<div style="margin: 1em 0">
    <ul style="padding: 0;">
        @foreach($users as $user)
                <li style="display: flex; justify-content: space-between; align-items: center">
                    <a href="{{ route('messenger.show', [$user->id]) }}">{{$user->name}}</a>
                    @if ($user->unread)
                        <span>{{ $user->unread }}</span>
                    @endif
                </li>
        @endforeach
    </ul>
</div>