@php
    if(isset($column1)){
        $columnname1 = Illuminate\Support\Str::slug($column1);
    }
    if(isset($column2)){
        $columnname2 = Illuminate\Support\Str::slug($column2);
    }
@endphp
<div class="admin">
    <h4 class="mb-1">Building Info</h4>
    <div class="add-img-container">
        <div class="add-flex-2">
            <h6 class="mb-1">@if(isset($column1)){!! $column1 !!}@endif</h6>
            <input name="@if(isset($columnname1)){!! $columnname1 !!}@endif" placeholder="Write @if(isset($column1)){!! $column1 !!}@endif here..." @if(isset($value1))value="{!! $value1 !!}"@endif class="form-control" @if(isset($type)) readonly @else required @endif>
        </div>
        <div class="add-flex-2">
            <h6 class="mb-1">@if(isset($column2)){!! $column2 !!}@endif</h6>
            <input name="@if(isset($columnname2)){!! $columnname2 !!}@endif" placeholder="Write @if(isset($column2)){!! $column2 !!}@endif here..." @if(isset($value2))value="{!! $value2 !!}"@endif class="form-control" @if(isset($type)) readonly @else required @endif>
        </div>
    </div>
</div>