@if(Session::has('toastr'))
@php
    $toastr     = Session::pull('toastr');
    $type       = \Illuminate\Support\Arr::get($toastr->get('type'), 0, 'success');
    $message    = (string) \Illuminate\Support\Arr::get($toastr->get('message'), 0, '');
    $options    = json_encode($toastr->get('options', []));
    // only allow real toastr methods through
    $type       = in_array($type, ['success', 'info', 'warning', 'error'], true) ? $type : 'success';
    $message    = json_encode($message, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
@endphp
<script>
    $(function () {
        toastr.{{ $type }}({!! $message !!}, null, {!! $options !!});
    });
</script>
@endif