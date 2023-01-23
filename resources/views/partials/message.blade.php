
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ (session('error')) }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ (session('success')) }}
    </div>
@endif
<script>
    $(document).ready(function() {

        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(700, function() {
                $(this).remove();
            });
        }, 1000);
    });
</script>