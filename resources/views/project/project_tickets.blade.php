@foreach (  $project->tickets as $ticket  )
    <details>
        <summary>#{{ $ticket->id }} {{ $ticket->title }}<small class='text-white float-right'> {{ date('d/m/Y h:s', strtotime($ticket->created_at)); }}</small></summary>
        <div class="folder">
                <div class="inlineblock float-left">
                <a class="btn btn-warning-block inlineblock" href="{{ route('show.ticket',$ticket->id) }}"><strong>#{{ $ticket->id }} </strong>More Detail</a>
                @if ($ticket->status =='open')
                <span class="badge badge-primary">{{ $ticket->status }}</span>

                @elseif ($ticket->status =='in progress')
                <span class="badge badge-warning">{{ $ticket->status }}</span>

                @elseif ($ticket->status =='resolve')
                <span class="badge badge-success">{{ $ticket->status }}</span>

                @else
                <span class="badge badge-danger">{{ $ticket->status }}</span>

                @endif
                @if ($ticket->priority =='low')
                <span class="badge badge-primary">{{ $ticket->priority }}</span>

                @elseif ($ticket->priority =='medium')
                <span class="badge badge-warning">{{ $ticket->priority }}</span>

                @else
                <span class="badge badge-danger">{{ $ticket->priority }}</span>

                @endif
            </div>
            <div class="float-right"><small style='color:black'>{{ date('d/m/Y h:m', strtotime($ticket->end_time));  }}</small></div></br>
            <div class='clearfix'></div>
        <p class="text-black p-0.5">{{ $ticket->description }}</p>
        <div class="body">
            <ul class="comment-reply list-unstyled">
                @comments(['model' => $ticket])
            </ul>
        </div>
        </div>
    </details>

@endforeach

