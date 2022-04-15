@if (Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}")
    </script>
@elseif (Session::has('updated'))
    <script>
        toastr.success("{!! Session::get('updated') !!}")
    </script>
@elseif (Session::has('delete'))
    <script>
        toastr.success("{!! Session::get('delete') !!}")
    </script>
@endif
