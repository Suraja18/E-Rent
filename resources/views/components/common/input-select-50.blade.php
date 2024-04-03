@php
    if(isset($column1)){
        $columnname1 = Illuminate\Support\Str::slug($column1, '_');
        $columnname1 = $columnname1 . "_id";
    }
    if(isset($column2)){
        $columnname2 = Illuminate\Support\Str::slug($column2);
    }
@endphp
<div class="admin">
    <div class="add-img-container">
        <div class="add-flex-2">
            <h4 class="mb-1">@if(isset($column1)){!! $column1 !!}@endif</h4>
            <select class="form-control" name="@if(isset($columnname1)){!! $columnname1 !!}@endif" required>
                @if(isset($type1))
                    {!! $type1 !!}
                @else
                    <option value="">Select @if(isset($column1)){!! $column1 !!}@endif...</option>
                @endif
                @if (isset($option1))
                    {!! $option1 !!}
                @endif
            </select>
            @error($columnname1)
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="add-flex-2">
            <h4 class="mb-1">@if(isset($column2)){!! $column2 !!}@endif</h4>
            <select class="form-control" name="@if(isset($columnname2)){!! $columnname2 !!}@endif" required id="@if(isset($columnname2)){!! $columnname2 !!}@endif">
                @if(isset($type2))
                    {!! $type2 !!}
                @else
                    <option value="">Select @if(isset($column2)){!! $column2 !!}@endif...</option>
                @endif
                @if (isset($option2))
                    {!! $option2 !!}
                @endif
            </select>
            @error($columnname2)
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
