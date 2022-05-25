
@props(['ticket'])
<li><i class="fa fa-folder-open"> </i><a class="ml-3" href="{{ route('show.ticket',$ticket->id) }}"> {{ $ticket->title }}</a>
    <small class="float-right text-blue">{{ date('d/m/Y h:s', strtotime($ticket->created_at)); }}</small><a class="float-left text-success" href="{{ route('create.sub.ticket',$ticket->id) }}"><i class="fa fa-circle-plus"></i></a>
    <ul>
        <li><i class="fa fa-tag"></i>
            <div class="ml-lg-5 float-right">
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
        </li>
        @forelse ( $ticket->children as $child)
            <x-ticket :ticket='$child' ></x-ticket>
        @empty
            <li><i class="fa fa-comments"></i></li>
            <div style="border: 1px solid;" class="body ml-5 mb-5">
                    @comments(['model' => $ticket])
            </div>
            <hr with="100%" color="black">
        @endforelse
    </ul>

</li>

