<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        @if(config('admin.show_environment'))
            <strong>Env</strong>&nbsp;&nbsp; {!! config('app.env') !!}
        @endif

        &nbsp;&nbsp;&nbsp;&nbsp;

        @if(config('admin.show_version'))
        <strong>Version</strong>&nbsp;&nbsp; {!! \Encore\Admin\Admin::VERSION !!}
        @endif

    </div>
    <!-- Default to the left -->
    @php
        $footerLink = trim((string) config('admin.footer.link', ''));
        $footerText = config('admin.footer.text', 'laravel-admin');
    @endphp
    <strong>Powered by @if($footerLink !== '')<a href="{{ $footerLink }}" target="_blank">{{ $footerText }}</a>@else{{ $footerText }}@endif</strong>
</footer>