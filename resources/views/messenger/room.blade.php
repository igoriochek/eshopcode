<div>
    <h1>{{$user->name}}</h1>
</div>
<div class="card" style="display: flex-column; margin: 20px 0; padding: 20px; overflow: scroll; height: 40vh;">
    @foreach ($messages as $message)
        @if ($message->user_from === $user->id)
            <div style="display: flex; align-items: center; gap: 20px; margin: 10px 0;">
                <span style="width: clamp(50px, 200px);">
                    {{$user->name}}
                </span>
                <span style="background-color: #eeeeee; border-radius: 5px; padding: 10px; width: 500px;">
                    {{$message->message_text}}
                </span>
            </div>
        @else
            <div style="display: flex; flex-direction: row-reverse; justify-content: flex-start; align-items: center; gap: 20px; margin: 10px 0;">
                <span style="width: clamp(50px, 200px);">
                    {{auth()->user()->name}}
                </span>
                <span style="background-color: #eeeeee; border-radius: 5px; padding: 10px; width: 500px;">
                    {{$message->message_text}}
                </span>
            </div>
        @endif
    @endforeach
</div>
<div class="row">
    {!! Form::open(['route' => 'messenger.store']) !!}
        {{ Form::hidden('user_from_id', $user->id, ['id' => 'user_from_id']) }}
        {!! Form::text(
            'message_text', 
            null, 
            ['class' => 'form-control mb-3', 'placeholder' => 'Type your message here...']
        ) !!}
        {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>