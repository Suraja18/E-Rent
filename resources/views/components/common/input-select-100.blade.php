@php
    if(isset($column)){
        $columnname = Illuminate\Support\Str::slug($column, '_');
        $columnname = $columnname . "_id";
    }
@endphp
<div class="admin">
    <h4 class="mb-1">@if(isset($column)){!! $column !!}@endif</h4>
    <select class="form-control" name="@if(isset($columnname)){!! $columnname !!}@endif" required>
        @if(isset($type))
            {!! $type !!}
        @else
            <option value="">Select @if(isset($column)){!! $column !!}@endif...</option>
        @endif
        {!! $slot !!}
    </select>
    @error($columnname)
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>
