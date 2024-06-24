<script>
    console.log('hi');
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
    // @if (Session::has('error'))
    //     toastr.success("{{ Session::get('error') }}");
    // @endif
</script>
{{-- error --}}
