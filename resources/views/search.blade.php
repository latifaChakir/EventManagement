
@foreach ($events as $event)
<div class="col-md-6 col-sm-8 col-10 m-auto">
    <div class="blog-post">
        <div class="post-thumb">
            <a href="/eventDetail/{{ $event->id }}">
                <img src="/images/{{ $event->image_path }}" alt="post-image" class="img-fluid">
            </a>
        </div>
        @php
        $date = $event->date;
        $formattedDate = date("j", strtotime($date));
        $formattedMonth = substr(date("F", strtotime($date)), 0, 3);
       @endphp

        <div class="post-content">
            <div class="date">
                {{-- <h4>20<span>May</span></h4> --}}
                <h4>{{ $formattedDate }}<span>{{ $formattedMonth }}</span></h4>
            </div>
            <div class="post-title">
                <h2><a href="/eventDetail/{{ $event->id }}">{{ $event->title }}</a></h2>
            </div>
            <div class="post-meta">
                <ul class="list-inline">
                    
                    <li class="list-inline-item">
                        <i class="fa fa-ticket"></i>
                        @if ($event->number_places > 0)
                        <a href="/ticket/{{ $event->id }}">Ticket</a>
                        @else
                        complet
                        @endif
                    </li>
                    <li class="list-inline-item">
                        <i class="fa fa-heart-o"></i>
                        <a href="#">350</a>
                    </li>
                    <li class="list-inline-item">
                        <i class="fa fa-comments-o"></i>
                        <a href="#">30</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach



