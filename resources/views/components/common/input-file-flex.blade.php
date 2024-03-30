@php
    if(isset($image)){
        $imagename = Illuminate\Support\Str::slug($image);
    }
    
@endphp
<h6 class="mb-1">@if(isset($image)){!! $image !!}@endif</h6>
@if(isset($type))
<div class="attached-image">
    <div class="image-attachment-preview">
        <img src="@if(isset($value)){!! $value !!}@endif" alt="@if(isset($imagename)){!! $imagename !!}@endif" id="preview-@if(isset($imagename)){!! $imagename !!}@endif">
    </div>
</div>
@elseif(isset($type2))
<div class="attached-image">
    <div class="image-attachment-preview">
        <img src="" alt="@if(isset($imagename)){!! $imagename !!}@endif" id="preview-@if(isset($imagename)){!! $imagename !!}@endif">
    </div>
</div>
<input type="file" name="@if(isset($imagename)){!! $imagename !!}@endif" id="input-@if(isset($imagename)){!! $imagename !!}@endif" class="form-control">
@else
<div class="attached-image">
    <div class="image-attachment-preview">
        <img src="" alt="@if(isset($imagename)){!! $imagename !!}@endif" id="preview-@if(isset($imagename)){!! $imagename !!}@endif">
    </div>
</div>
<input type="file" name="@if(isset($imagename)){!! $imagename !!}@endif" id="input-@if(isset($imagename)){!! $imagename !!}@endif" class="form-control" required>
@endif

<script>
    document.querySelectorAll('.form-control').forEach(function(input) {
        input.addEventListener('change', function() {
            const file = this.files[0];
            const previewId = this.id.replace('input-image-', 'preview-image-');
            const preview = document.getElementById(previewId);
            if (file && preview) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.setAttribute('src', event.target.result);
                };
                reader.readAsDataURL(file);
                const imgcont = this.closest('.add-flex-4').querySelector('.attached-image');
                if (imgcont) {
                    imgcont.classList.add('block');
                }
            }
        });
    });

</script>