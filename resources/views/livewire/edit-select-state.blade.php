<div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">
            الولاية
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select wire:model="selectedState" name="state"  class="form-control col-md-7 col-xs-12">
                <option value="">اختر الولاية</option>
                @foreach ($all_states as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">
            المدينة
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select wire:model="selectedCity" id="city" name="city"  class="form-control col-md-7 col-xs-12">
                <option value="">اختر المدينة</option>
                @foreach ($city as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
