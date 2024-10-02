<div class="card-body">
    <div class=" col-md-3">
        <select class="form-control" data-live-search="true" name="state_id" id="state_id" tabindex="-98">
            <option value="">Select State</option>
            @foreach($states as $state)
            <option value="{{$state->id}}" <?php if($state->id == $request->state_id){ echo 'selected'; } ?>>
                {{ $state->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select class="form-control" data-live-search="true" name="city_id" id="city-dropdown" tabindex="-98">
            <option value="">Select City</option>
        </select>
    </div>
    <div class="col-md-3">
        <input class="form-control" type="text" name="title" value="{{ $request->title }}"
            placeholder="Enter search title..." aria-label="Enter search title..." aria-describedby="button-search" />
    </div>

    <div class="col-md-2">

        <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
    </div>
</div>