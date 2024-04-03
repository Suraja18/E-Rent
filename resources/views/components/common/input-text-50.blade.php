@php
    if(isset($column1)){
        $columnname1 = Illuminate\Support\Str::slug($column1, "_");
    }
    if(isset($column2)){
        $columnname2 = Illuminate\Support\Str::slug($column2, "_");
    }
@endphp
<div class="admin">
    <div class="add-img-container">
        <div class="add-flex-2">
            <h4 class="mb-1">@if(isset($column1)){!! $column1 !!}@endif</h4>
            <input name="@if(isset($columnname1)){!! $columnname1 !!}@endif" placeholder="Write @if(isset($column1)){!! $column1 !!}@endif here..." @if(isset($value1))value="{!! $value1 !!}"@endif class="form-control" @if(isset($type)) readonly @else required @endif type="@if(isset($number1)){!! $number1 !!}@endif">
            @error($columnname1)
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="add-flex-2">
            <h4 class="mb-1">@if(isset($column2)){!! $column2 !!}@endif</h4>
            <input name="@if(isset($columnname2)){!! $columnname2 !!}@endif" placeholder="Write @if(isset($column2)){!! $column2 !!}@endif here..." @if(isset($value2))value="{!! $value2 !!}"@endif class="form-control" @if(isset($type)) readonly @else required @endif type="@if(isset($number2)){!! $number2 !!}@endif">
            @error($columnname2)
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>