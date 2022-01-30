<div>

    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Message!',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif


    @if (session()->has('error'))
        <script>
            Swal.fire(
                'Message!',
                '{{ session('error') }}',
                'error'
            )
        </script>
    @endif

</div>
