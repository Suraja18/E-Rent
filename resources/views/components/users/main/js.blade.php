<script src="https://cdn.tiny.cloud/1/2ldp0s7ro357labm48hsnpkf8z7l2f7no918ybqutp20eryq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
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
    tinymce.init({
      selector: '#description',
      menubar: false,
      name:'description',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
      setup: function (editor) {
            editor.on('init', function () {
                editor.getBody().style.fontSize = '0.85rem';
                editor.getBody().style.fontWeight = '600';
                editor.getBody().style.lineHeight = '1.49';
                editor.getBody().style.color = '#3d3975';
            });
        }
    });
  </script>
  <script>
    function confirmDelete(formId) {
        Swal.fire({
            title: 'Are you sure want to delete this?',
            text: 'This action cannot be undone.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            } else {
                return false;
            }
        });
    }
</script>
