{{-- <form action="{{ route('book.adventure', $adventure->id) }}" method="POST" onsubmit="return checkAuth(event)">
    @csrf
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control" required>
        @error('start_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" id="end_date" class="form-control" required>
        @error('end_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="group_size">Group Size</label>
        <input type="number" name="group_size" id="group_size" class="form-control" min="1" required>
        @error('group_size')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Book Now</button>
</form> --}}