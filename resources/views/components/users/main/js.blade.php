<script src="{{ asset('JS/jquery.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script src="{{ asset('JS/datatable.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('JS/chartjs.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('JS/wow.min.js') }}" type="text/javascript"></script>
{{ $slot }}
<script src="{{ asset('JS/index.js') }}" type="text/javascript"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new WOW().init();
    });
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor-description-no-image' ), {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'undo',
                'redo',
                'insertTable'
            ]
        },
        language: 'en'
    } )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
</script>
