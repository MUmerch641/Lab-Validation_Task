@php
    $isEdit = isset($student);
@endphp

<div class="form-grid">
    <div class="field">
        <label for="name">Student Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $student->name ?? '') }}" required maxlength="255">
        @error('name')<p class="error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="roll_no">Roll Number</label>
        <input type="text" name="roll_no" id="roll_no" value="{{ old('roll_no', $student->roll_no ?? '') }}" required maxlength="100">
        @error('roll_no')<p class="error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="section">Section</label>
        <input type="text" name="section" id="section" value="{{ old('section', $student->section ?? '') }}" required maxlength="50">
        @error('section')<p class="error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="{{ old('age', $student->age ?? '') }}" required min="1" max="120">
        @error('age')<p class="error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $student->phone ?? '') }}" required maxlength="30">
        @error('phone')<p class="error">{{ $message }}</p>@enderror
    </div>

    <div class="field field-full">
        <label for="address">Address</label>
        <textarea name="address" id="address" rows="4" required maxlength="1000">{{ old('address', $student->address ?? '') }}</textarea>
        @error('address')<p class="error">{{ $message }}</p>@enderror
    </div>
</div>

<div class="form-actions">
    <a href="{{ route('students.index') }}" class="btn btn-muted">Cancel</a>
    <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Student' : 'Save Student' }}</button>
</div>
