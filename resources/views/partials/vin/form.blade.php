<fieldset>

    <!-- Form Name -->
    <legend>Запрос по VIN</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="vincode">VIN-код / № кузова</label>
        <div class="col-md-8">
            <input id="vincode" name="vincode" type="text" placeholder="Введите номер" class="form-control input-md"
                   required>
            <span class="help-block">например: VF1BJ0J0B28221999</span>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="year">Год выпуска</label>
        <div class="col-md-8">
            <select id="year" name="year" class="form-control" required>
                @for($i=2019;$i>1982;$i--)
                    <option value="{{$i}}">{{$i}} год</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="month">Месяц</label>
        <div class="col-md-8">
            <select id="month" name="month" class="form-control" required>
                @foreach($month as $m)
                    <option value="1">{{$m}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="category">Категория</label>
        <div class="col-md-8">
            <select id="category" name="category" class="form-control" required>
                <option value="-1">не выбрано</option>
                @foreach($rio->getCategories() as $cat)
                    <option value="{{$cat["value"]}}">{{$cat["name"]}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="carmake">Марка</label>
        <div class="col-md-8">
            <select id="carmake" name="carmake" class="form-control" disabled required>
                <option value="-1">не выбрано</option>
                @foreach($rio->getMarks() as $mark)
                    <option value="{{$mark["value"]}}">{{$mark["name"]}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="model">Модель</label>
        <div class="col-md-8">
            <select id="model" name="model" class="form-control" required disabled>
                <option value="-1">не выбрано</option>
                @foreach($rio->getModels(2,9) as $model)
                    <option value="{{$model["value"]}}">{{$model["name"]}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="volume">Объем двигателя, см3</label>
        <div class="col-md-8">
            <input id="volume" name="volume" type="text" placeholder="Объем двигателя авто"
                   class="form-control input-md" required>
            <span class="help-block">например: 250 см3</span>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="power">Мощность, л.с.</label>
        <div class="col-md-8">
            <input id="power" name="power" type="text" placeholder="Мощность двигателя" class="form-control input-md"
                   required="">
            <span class="help-block">например: 120 л.с.</span>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="additional_information">Дополнительная информация</label>
        <div class="col-md-8">
            <textarea class="form-control" id="additional_information" name="additional_information"></textarea>
        </div>
    </div>


</fieldset>

