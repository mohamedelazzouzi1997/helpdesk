
@props(['ticket'])

<li data-jstree='{ "opened" : false }'>{{ $ticket->title }} <span href=""><a href="{{ route('create.sub.ticket',$ticket->id) }}"><i class="fa fa-plus"></i></a></span>
    <ul>
        @forelse ( $ticket->children as $child)
            <x-ticket :ticket='$child' ></x-ticket>
        @empty
            <div class="body">
                <ul class="comment-reply list-unstyled">
                    @comments(['model' => $ticket])
                </ul>
            </div>
        @endforelse
    </ul>
</li>



{{-- <details >
    <summary class='inlineblock'><i class="fa fa-folder-open"></i>  {{ $ticket->title }} <a href="{{ route('create.sub.ticket',$ticket->id) }}" class="btn btn-link pl-2"><i class="fa fa-plus text-primary"></i></a>
        <div class='text-black float-right'>
         <a class="btn btn-link text-black" href="{{ route('show.ticket',$ticket->id) }}"><strong>#{{ $ticket->id }} <i class="fa fa-eye text-black"> </i> More Detail</a>
        </div>



    </summary>

    <div class="folder">
        <div class="inlineblock float-left">


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
        <div class='clearfix'></div>
        <p  class="p-0.5 text-black m-2">{{ $ticket->description }}</p>


            <div class="folder">
                @forelse ( $ticket->children as $child)
                    <x-ticket :ticket='$child' ></x-ticket>
                @empty
                    <div class="body">
                        <ul class="comment-reply list-unstyled">
                            @comments(['model' => $ticket])
                        </ul>
                    </div>
                @endforelse
            </div>

    </div>
</details> --}}
