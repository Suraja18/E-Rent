@php
    if(isset($column)){
        $columnname = Illuminate\Support\Str::slug($column, '_');
    }
@endphp

<div class="ck-desc admin">
    <h4 class="mb-1">@if(isset($column)){!! $column !!}@endif</h4>
    <div id="description" class="form-control" placeholder ="Write @if(isset($column)){!! $column !!}@endif here..." @if(isset($type)) readonly @else required @endif>@if(isset($value)){!! $value !!}@endif</div>
</div>
@error($columnname)
    <p class="error-message">{{ $message }}</p>
@enderror

