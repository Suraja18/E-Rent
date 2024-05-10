@php
    if(isset($column)){
        $columnname = Illuminate\Support\Str::slug($column, '_');
    }
@endphp
<div class="admin">
    <h4 class="mb-1">@if(isset($column)){!! $column !!}@endif</h4>
    @if (isset($valuemap))
    <iframe class="google-maps"
        src="{!! $valuemap !!}"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    @endif
    <input placeholder="Write @if(isset($column)){!! $column !!}@endif here..." class="form-control" @if(isset($value))value="{!! $value !!}"@endif name="@if(isset($columnname)){!! $columnname !!}@endif" @if(isset($type)) readonly @elseif(isset($nones)) {!! $nones !!} @else required @endif @if(isset($number))type="number"@endif>
    @if (isset($head6))
        {!! $head6 !!}
    @endif
    @error($columnname)
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>
