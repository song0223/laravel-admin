@if(Session::has('toastr'))
@php
    $toastr = Session::pull('toastr');
    // Laravel 12 and below round-trip a MessageBag instance, Laravel 13
    // returns a plain array - support both shapes
    $bagGet = function ($key, $default = null) use ($toastr) {
        $value = (is_object($toastr) && method_exists($toastr, 'get'))
            ? $toastr->get($key, [])
            : (array) data_get((array) $toastr, $key, []);

        return $value[0] ?? $default;
    };
    $type    = $bagGet('type', 'success');
    $message = (string) $bagGet('message', '');
    $options = json_encode((is_object($toastr) && method_exists($toastr, 'get'))
        ? $toastr->get('options', [])
        : (array) data_get((array) $toastr, 'options', []));
    // only allow real toastr methods through
    $type    = in_array($type, ['success', 'info', 'warning', 'error'], true) ? $type : 'success';
    $message = json_encode($message, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
@endphp
<script>
    $(function () {
        toastr.{{ $type }}({!! $message !!}, null, {!! $options !!});
    });
</script>
@endif