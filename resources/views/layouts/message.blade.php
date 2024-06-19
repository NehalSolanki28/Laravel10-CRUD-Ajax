<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}",'dfsdf');
    @endif
</script>
{{-- error --}}
