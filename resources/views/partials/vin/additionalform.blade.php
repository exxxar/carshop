<fieldset>

    <!-- Form Name -->
    <legend>Дополнительные параметры</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for=" cylinders">Целиндры</label>
        <div class="col-md-8">
            <input id="cylinders" name="cylinders" type="text" placeholder="" class="form-control input-md">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="engine_type">Тип/буквы двигателя</label>
        <div class="col-md-8">
            <input id="engine_type" name="engine_type" type="text" placeholder="" class="form-control input-md">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="valves">Клапанов</label>
        <div class="col-md-8">
            <input id="valves" name="valves" type="text" placeholder="" class="form-control input-md">

        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="body_type">Тип кузова</label>
        <div class="col-md-8">
            <select id="body_type" name="body_type" class="form-control" disabled>
                <option value="-1">не выбрано</option>
                @foreach($rio->getBodyStyles() as $body)
                    <option value="{{$body["value"]}}">{{$body["name"]}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="number_of_doors">Число дверей</label>
        <div class="col-md-8">
            <select id="number_of_doors" name="number_of_doors" class="form-control">
                <option value="0">не выбрано</option>
                <option value="1">2</option>
                <option value="2">3</option>
                <option value="3">4</option>
                <option value="4">5</option>
                <option value="5">6 и более</option>
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="drive">Привод</label>
        <div class="col-md-8">
            <select id="drive" name="drive" class="form-control" disabled>
                <option value="-1">не выбрано</option>
                @foreach($rio->getDriverType() as $drive)
                    <option value="{{$drive["value"]}}">{{$drive["name"]}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Multiple Radios (inline) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="steering_wheel">Руль</label>
        <div class="col-md-8">
            <label class="radio-inline" for="steering_wheel-0">
                <input type="radio" name="steering_wheel" id="steering_wheel-0" value="1" checked="checked">
                слева
            </label>
            <label class="radio-inline" for="steering_wheel-1">
                <input type="radio" name="steering_wheel" id="steering_wheel-1" value="2">
                справа
            </label>
        </div>
    </div>

    <!-- Multiple Checkboxes (inline) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="equipment">Опции комплектации</label>
        <div class="col-md-8">
            <label class="checkbox-inline" for="equipment-0">
                <input type="checkbox" name="equipment" id="equipment-0" value="1">
                ABS
            </label>
            <label class="checkbox-inline" for="equipment-1">
                <input type="checkbox" name="equipment" id="equipment-1" value="2">
                ESP
            </label>
            <label class="checkbox-inline" for=" equipment-2">
                <input type="checkbox" name="equipment" id="equipment-2" value="3">
                УР
            </label>
            <label class="checkbox-inline" for=" equipment-3">
                <input type="checkbox" name="equipment" id="equipment-3" value="4">
                Кондиционер
            </label>
            <label class="checkbox-inline" for=" equipment-4">
                <input type="checkbox" name="equipment" id="equipment-4" value="5">
                Катализатор
            </label>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="gearbox_type">Тип кпп</label>
        <div class="col-md-8">
            <select id="gearbox_type" name="gearbox_type" class="form-control" disabled>
                @foreach($rio->getGearboxes() as $gear)
                    <option value="{{$gear["value"]}}">{{$gear["name"]}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="gearbox_number">Номер кпп</label>
        <div class="col-md-8">
            <input id="gearbox_number" name="gearbox_number" type="text" placeholder="" class="form-control input-md">

        </div>
    </div>

</fieldset>

