<div>
    <!-- قائمة الولاية -->
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">
            الولاية
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select wire:model="selectedState" name="state" required class="form-control col-md-7 col-xs-12">
                <option value="">اختر الولاية</option>
                @foreach ($all_states as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                <option value="add_state">+ إضافة ولاية جديدة</option>
            </select>
        </div>
    </div>

    <!-- مودال إضافة ولاية جديدة -->
    @if($showStateModal)
        <div class="modal" style="display:block; background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">إضافة ولاية جديدة</h4>
                        <button type="button" class="close" wire:click="$set('showStateModal', false)">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="newStateName">اسم الولاية:</label>
                            <input type="text" wire:model="newStateName" class="form-control" placeholder="أدخل اسم الولاية">
                            @error('newStateName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="$set('showStateModal', false)">إغلاق</button>
                        <button type="button" class="btn btn-primary" wire:click="saveState">حفظ</button>
                    </div>

                </div>
            </div>
        </div>
    @endif

    <!-- قائمة المدينة -->
    @if(!is_null($selectedState))
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">
            المدينة
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select wire:model="selectedCity" name="city" required class="form-control col-md-7 col-xs-12">
                <option value="">اختر المدينة</option>
                @foreach ($cities as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                <option value="add_city">+ إضافة مدينة جديدة</option>
            </select>
        </div>
    </div>
    @endif

    <!-- مودال إضافة مدينة جديدة -->
    @if($showCityModal)
        <div class="modal" style="display:block; background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">إضافة مدينة جديدة</h4>
                        <button type="button" class="close" wire:click="$set('showCityModal', false)">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="newCityName">اسم المدينة:</label>
                            <input type="text" wire:model="newCityName" class="form-control" placeholder="أدخل اسم المدينة">
                            @error('newCityName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="$set('showCityModal', false)">إغلاق</button>
                        <button type="button" class="btn btn-primary" wire:click="saveCity">حفظ</button>
                    </div>

                </div>
            </div>
        </div>
    @endif

</div>
