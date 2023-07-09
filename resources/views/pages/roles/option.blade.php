<?php $options=$selectedValue->name ?> 
    <select class="form-control" name="test">
            <option>Select Test Type</option>
            @foreach ($sampleType as $value)
            <option value="{{ $value->name }}" {{ ( $value->name == $options) ? 'selected' : '' }}>
                {{ $value->name }}
            </option>
            @endforeach
    </select>