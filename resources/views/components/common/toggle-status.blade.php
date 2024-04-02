<div class="admin">
    <h4 class="mb-1">Status</h4>
    <div class="flec-centre">
        <input type="checkbox" id="checkbtn" name="status" {!! $slot !!}>
        <label for="checkbtn" class="toggle-btn"></label>
    </div>
    @error('status')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>