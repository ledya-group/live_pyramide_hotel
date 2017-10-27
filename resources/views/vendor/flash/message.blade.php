@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        @section('script')
            <script>
                $(document).ready(function(){
                    $.notify({
                        icon: '',
                        message: "{!! $message['message'] !!}"
                    },{
                        type: '{{ $message["level"] }}',
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                });
            </script>
        @endsection
        {{--  <div class="alert
                    alert-{{ $message['level'] }}
                    {{ $message['important'] ? 'alert-important' : '' }}"
                    role="alert"
        >
            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! $message['message'] !!}
        </div>  --}}
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
