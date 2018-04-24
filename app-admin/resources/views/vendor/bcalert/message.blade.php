@section('msg-js')
    <link href="{{url('pop/dist/spop.min.css')}}" rel="stylesheet"/>
    <link href="{{url('pop/src/styles.min.css')}}" rel="stylesheet"/>
    <script src="{{url('pop/src/prism.js')}}"></script>
    <script src="{{url('pop/dist/spop.min.js')}}"></script>
    @if(Session::has('flash_notification.message'))
        <script>
            spop({
                template: '{!! session('flash_notification.message') !!}',
                autoclose: 3000,
                style: '{{ session('flash_notification.type') }}'
            });
        </script>
    @endif
@endsection