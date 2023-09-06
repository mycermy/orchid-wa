<div class="bg-white rounded-top shadow-sm mb-4 rounded-bottom">

    <div class="row g-0">
        <div class="d-none d-lg-block col align-self-center text-end text-muted p-4 opacity-25">
            <img src="{{ $waqr }}" alt="" style="height:300px">
        </div>
    </div>

</div>

<script type="text/javascript">
    var site_url = "{{url('/')}}";
    @if($script_js)
        {!! $script_js !!}
    @endif
</script>
