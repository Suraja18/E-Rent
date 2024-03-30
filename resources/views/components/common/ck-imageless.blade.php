@php
    if(isset($column)){
        $columnname = Illuminate\Support\Str::slug($column);
    }
@endphp
<div class="ck-desc admin">
    <h4 class="mb-1">@if(isset($column)){!! $column !!}@endif</h4>
    <textarea name="@if(isset($columnname)){!! $columnname !!}@endif" id="editor-description-no-image" class="form-control" placeholder ="Write @if(isset($column)){!! $column !!}@endif here..." @if(isset($type)) readonly @else required @endif></textarea>
</div>

