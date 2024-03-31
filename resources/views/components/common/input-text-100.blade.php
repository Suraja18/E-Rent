@php
    if(isset($column)){
        $columnname = Illuminate\Support\Str::slug($column, '_');
    }
@endphp
<div class="admin">
    <h4 class="mb-1">@if(isset($column)){!! $column !!}@endif</h4>
    <input placeholder="Write @if(isset($column)){!! $column !!}@endif here..." class="form-control" @if(isset($value))value="{!! $value !!}"@endif name="@if(isset($columnname)){!! $columnname !!}@endif" @if(isset($type)) readonly @else required @endif>
    @error($columnname)
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>
