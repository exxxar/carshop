<form method="post" action="{{url('vin/tyres/add')}}" class="form-horizontal">
    <fieldset>
        {{csrf_field()}}
        <!-- Form Name -->
        <legend>Заявка на подбор шин</legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="tyre_width">Vin-code</label>
            <div class="col-md-4">
                @isset($vinrequestlist)
                    @if (count($vinrequestlist)>0)
                        <select name="vinrequest_id" id="vinrequest_id" class="form-control">
                            @foreach($vinrequestlist as $vin)
                                <option value="{{$vin->id}}">{{$vin->vincode}}</option>
                            @endforeach
                        </select>
                    @else
                        <a href="#vinPanel" class="btn btn-info open-vin-tab">Создать Vin-запрос</a>

                    @endif
                @endisset
            </div>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="tyre_width">Ширина покрышки</label>
            <div class="col-md-4">
                <select id="tyre_width" name="tyre_width" class="form-control">
                    <option value="-1">не выбрана</option>
                    <option value="125" >125</option>
                    <option value="135" >135</option>
                    <option value="145" >145</option>
                    <option value="155" >155</option>
                    <option value="165" >165</option>
                    <option value="175" >175</option>
                    <option value="185" >185</option>
                    <option value="195" >195</option>
                    <option value="205" >205</option>
                    <option value="215" >215</option>
                    <option value="225" >225</option>
                    <option value="235" >235</option>
                    <option value="245" >245</option>
                    <option value="255" >255</option>
                    <option value="265" >265</option>
                    <option value="275" >275</option>
                    <option value="285" >285</option>
                    <option value="295" >295</option>
                    <option value="305" >305</option>
                    <option value="315" >315</option>
                    <option value="325" >325</option>
                    <option value="335" >335</option>
                    <option value="345" >345</option>
                    <option value="355" >355</option>
                    <option value="365" >365</option>
                    <option value="375" >375</option>
                    <option value="385" >385</option>
                    <option value="395" >395</option>
                    <option value="405" >405</option>
                    <option value="455" >455</option>
                </select>

                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="tyre_height">Высота покрышки</label>
            <div class="col-md-4">
                <select id="tyre_height" name="tyre_height" class="form-control">
                    <option value="-1">не выбрана</option>
                    <option value="25" >25</option>
                    <option value="30" >30</option>
                    <option value="35" >35</option>
                    <option value="40" >40</option>
                    <option value="45" >45</option>
                    <option value="50" >50</option>
                    <option value="55" >55</option>
                    <option value="60" >60</option>
                    <option value="65" >65</option>
                    <option value="70" >70</option>
                    <option value="75" >75</option>
                    <option value="80" >80</option>
                    <option value="85" >85</option>
                    <option value="90" >90</option>
                    <option value="95" >95</option>
                    <option value="105" >105</option>

                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="diameter">Диаметр</label>
            <div class="col-md-4">
                <select id="diameter" name="diameter" class="form-control">
                    <option value="-1">не выбрано</option>
                    <option value="12" >12</option>
                    <option value="13" >13</option>
                    <option value="14" >14</option>
                    <option value="15" >15</option>
                    <option value="16" >16</option>
                    <option value="16.5" >16.5</option>
                    <option value="17" >17</option>
                    <option value="18" >18</option>
                    <option value="19" >19</option>
                    <option value="20" >20</option>
                    <option value="21" >21</option>
                    <option value="22" >22</option>
                    <option value="23" >23</option>
                    <option value="24" >24</option>
                    <option value="25" >25</option>
                    <option value="26" >26</option>
                    <option value="28" >28</option>
                    <option value="30" >30</option>

                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="tyre_type">Тип</label>
            <div class="col-md-4">
                <select id="tyre_type" name="tyre_type" class="form-control">
                    <option value="-1">не выбрано</option>
                    <option value="бескамерные" >бескамерные</option>
                    <option value="камерные" >камерные</option>


                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="seasonality">Сезонность</label>
            <div class="col-md-4">
                <select id="seasonality" name="seasonality" class="form-control">
                    <option value="-1">не выбрано</option>
                    <option value="всесезонные" >всесезонные</option>
                    <option value="зимние" >зимние</option>
                    <option value="летние" >летние</option>
                </select>
            </div>
        </div>


        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="manufacturer">Производитель</label>
            <div class="col-md-4">
                <select id="manufacturer" name="manufacturer" class="form-control">
                    <option value="-1">не выбрано</option>
                    <option value="ACCELERA" >ACCELERA</option>
                    <option value="ACHILLES" >ACHILLES</option>
                    <option value="ADERENZA" >ADERENZA</option>
                    <option value="AEOLUS" >AEOLUS</option>
                    <option value="ALTENZO" >ALTENZO</option>
                    <option value="AMERICA" >AMERICA</option>
                    <option value="AMTEL" >AMTEL</option>
                    <option value="ANTARES" >ANTARES</option>
                    <option value="APOLLO" >APOLLO</option>
                    <option value="APOLLO TYRES" >APOLLO TYRES</option>
                    <option value="ARCTIC CLAW" >ARCTIC CLAW</option>
                    <option value="ATTURO" >ATTURO</option>
                    <option value="AURORA TIRE" >AURORA TIRE</option>
                    <option value="AUSTONE" >AUSTONE</option>
                    <option value="AUTOGUARD" >AUTOGUARD</option>
                    <option value="AVON" >AVON</option>
                    <option value="BARUM" >BARUM</option>
                    <option value="BFGOODRICH" >BFGOODRICH</option>
                    <option value="BIG O TIRES" >BIG O TIRES</option>
                    <option value="BLACKSTONE" >BLACKSTONE</option>
                    <option value="BRASA" >BRASA</option>
                    <option value="BRIDGESTONE" >BRIDGESTONE</option>
                    <option value="CAPITOL" >CAPITOL</option>
                    <option value="CEAT" >CEAT</option>
                    <option value="CONTINENTAL" >CONTINENTAL</option>
                    <option value="CONTYRE" >CONTYRE</option>
                    <option value="COOPER" >COOPER</option>
                    <option value="COOPER CHENGSHAN" >COOPER CHENGSHAN</option>
                    <option value="CORDIANT" >CORDIANT</option>
                    <option value="CORDOVAN" >CORDOVAN</option>
                    <option value="DAEWOO" >DAEWOO</option>
                    <option value="DAYTON" >DAYTON</option>
                    <option value="DEAN TIRES" >DEAN TIRES</option>
                    <option value="DEBICA" >DEBICA</option>
                    <option value="DELINTE" >DELINTE</option>
                    <option value="DEXTERO" >DEXTERO</option>
                    <option value="DIAMONDBACK" >DIAMONDBACK</option>
                    <option value="DICK CEPEK" >DICK CEPEK</option>
                    <option value="DIPLOMAT" >DIPLOMAT</option>
                    <option value="DMACK" >DMACK</option>
                    <option value="DUNLOP" >DUNLOP</option>
                    <option value="DURUN" >DURUN</option>
                    <option value="EFFIPLUS" >EFFIPLUS</option>
                    <option value="ELDORADO TIRE" >ELDORADO TIRE</option>
                    <option value="ESA-TECAR" >ESA-TECAR</option>
                    <option value="EVERGREEN" >EVERGREEN</option>
                    <option value="FALKEN" >FALKEN</option>
                    <option value="FATE" >FATE</option>
                    <option value="FEDERAL" >FEDERAL</option>
                    <option value="FEDIMA" >FEDIMA</option>
                    <option value="FENIX" >FENIX</option>
                    <option value="FIRESTONE" >FIRESTONE</option>
                    <option value="FORTIO" >FORTIO</option>
                    <option value="FORTUNA" >FORTUNA</option>
                    <option value="FULDA" >FULDA</option>
                    <option value="FULLRUN" >FULLRUN</option>
                    <option value="FULLWAY" >FULLWAY</option>
                    <option value="FUZION" >FUZION</option>
                    <option value="GENERAL TIRE" >GENERAL TIRE</option>
                    <option value="GISLAVED" >GISLAVED</option>
                    <option value="GOFORM" >GOFORM</option>
                    <option value="GOLDWAY" >GOLDWAY</option>
                    <option value="GOODRIDE" >GOODRIDE</option>
                    <option value="GOODYEAR" >GOODYEAR</option>
                    <option value="GREENDIAMOND" >GREENDIAMOND</option>
                    <option value="GREMAX" >GREMAX</option>
                    <option value="GT RADIAL" >GT RADIAL</option>
                    <option value="HAIDA GROUP" >HAIDA GROUP</option>
                    <option value="HANKOOK" >HANKOOK</option>
                    <option value="HEADWAY" >HEADWAY</option>
                    <option value="HERCULES" >HERCULES</option>
                    <option value="HIFLY" >HIFLY</option>
                    <option value="IMPERIAL" >IMPERIAL</option>
                    <option value="INFINITY TYRES" >INFINITY TYRES</option>
                    <option value="INSA TURBO" >INSA TURBO</option>
                    <option value="INTERCO" >INTERCO</option>
                    <option value="INTERSTATE" >INTERSTATE</option>
                    <option value="IRONMAN" >IRONMAN</option>
                    <option value="JETZON TIRE" >JETZON TIRE</option>
                    <option value="JINYU" >JINYU</option>
                    <option value="KELLY" >KELLY</option>
                    <option value="KENDA" >KENDA</option>
                    <option value="KENEX" >KENEX</option>
                    <option value="KINFOREST" >KINFOREST</option>
                    <option value="KING MEILER" >KING MEILER</option>
                    <option value="KINGSTAR" >KINGSTAR</option>
                    <option value="KLEBER" >KLEBER</option>
                    <option value="KORMORAN" >KORMORAN</option>
                    <option value="KUMHO" >KUMHO</option>
                    <option value="LANDSAIL" >LANDSAIL</option>
                    <option value="LASSA" >LASSA</option>
                    <option value="LINGLONG" >LINGLONG</option>
                    <option value="MABOR" >MABOR</option>
                    <option value="MALOYA" >MALOYA</option>
                    <option value="MARANGONI" >MARANGONI</option>
                    <option value="MARSHAL" >MARSHAL</option>
                    <option value="MASTERCRAFT" >MASTERCRAFT</option>
                    <option value="MATADOR" >MATADOR</option>
                    <option value="MAXTREK" >MAXTREK</option>
                    <option value="MAXXIS" >MAXXIS</option>
                    <option value="MAYRUN" >MAYRUN</option>
                    <option value="MEDEO" >MEDEO</option>
                    <option value="MENTOR" >MENTOR</option>
                    <option value="MICHELIN" >MICHELIN</option>
                    <option value="MICKEY THOMPSON" >MICKEY THOMPSON</option>
                    <option value="MILESTONE" >MILESTONE</option>
                    <option value="MINERVA" >MINERVA</option>
                    <option value="MOTOMASTER" >MOTOMASTER</option>
                    <option value="MULTI-MILE" >MULTI-MILE</option>
                    <option value="NANKANG" >NANKANG</option>
                    <option value="NEUTON" >NEUTON</option>
                    <option value="NEXEN" >NEXEN</option>
                    <option value="NITTO" >NITTO</option>
                    <option value="NOKIAN" >NOKIAN</option>
                    <option value="NORDMAN" >NORDMAN</option>
                    <option value="NOVEX" >NOVEX</option>
                    <option value="OVATION TYRES" >OVATION TYRES</option>
                    <option value="PACE" >PACE</option>
                    <option value="PETLAS" >PETLAS</option>
                    <option value="PIRELLI" >PIRELLI</option>
                    <option value="PLATIN" >PLATIN</option>
                    <option value="PNEUMANT" >PNEUMANT</option>
                    <option value="POINT S" >POINT S</option>
                    <option value="PREMIORRI" >PREMIORRI</option>
                    <option value="PRO COMP" >PRO COMP</option>
                    <option value="RAPID" >RAPID</option>
                    <option value="REGAL" >REGAL</option>
                    <option value="RIKEN" >RIKEN</option>
                    <option value="ROADSTONE" >ROADSTONE</option>
                    <option value="ROCKSTONE" >ROCKSTONE</option>
                    <option value="ROSAVA" >ROSAVA</option>
                    <option value="ROTALLA" >ROTALLA</option>
                    <option value="ROTEX" >ROTEX</option>
                    <option value="SAGITAR" >SAGITAR</option>
                    <option value="SAILUN" >SAILUN</option>
                    <option value="SAVA" >SAVA</option>
                    <option value="SEMPERIT" >SEMPERIT</option>
                    <option value="SILVERSTONE" >SILVERSTONE</option>
                    <option value="SIME TYRES" >SIME TYRES</option>
                    <option value="SIMEX" >SIMEX</option>
                    <option value="SONAR" >SONAR</option>
                    <option value="SONNY" >SONNY</option>
                    <option value="SPORTIVA" >SPORTIVA</option>
                    <option value="STARFIRE" >STARFIRE</option>
                    <option value="SUMITOMO" >SUMITOMO</option>
                    <option value="SUMO" >SUMO</option>
                    <option value="SUNITRAC" >SUNITRAC</option>
                    <option value="SUNNY" >SUNNY</option>
                    <option value="SUNTEK" >SUNTEK</option>
                    <option value="SYRON" >SYRON</option>
                    <option value="TELSTAR TIRE" >TELSTAR TIRE</option>
                    <option value="THUNDERER" >THUNDERER</option>
                    <option value="TIGAR" >TIGAR</option>
                    <option value="TOYO" >TOYO</option>
                    <option value="TRACMAX" >TRACMAX</option>
                    <option value="TRAYAL" >TRAYAL</option>
                    <option value="TRI ACE" >TRI ACE</option>
                    <option value="TRIANGLE GROUP" >TRIANGLE GROUP</option>
                    <option value="TUNGA" >TUNGA</option>
                    <option value="UNIROYAL" >UNIROYAL</option>
                    <option value="VALLEYSTONE" >VALLEYSTONE</option>
                    <option value="VIATTI" >VIATTI</option>
                    <option value="VICTORUN" >VICTORUN</option>
                    <option value="VIKING" >VIKING</option>
                    <option value="VREDESTEIN" >VREDESTEIN</option>
                    <option value="VSP" >VSP</option>
                    <option value="WANLI" >WANLI</option>
                    <option value="WESTLAKE" >WESTLAKE</option>
                    <option value="WESTLAKE TYRES" >WESTLAKE TYRES</option>
                    <option value="WINTER TACT" >WINTER TACT</option>
                    <option value="YOKOHAMA" >YOKOHAMA</option>
                    <option value="ZEETEX" >ZEETEX</option>
                    <option value="ZETA" >ZETA</option>
                    <option value="АЛТАЙСКИЙ ШИННЫЙ КОМБИНАТ" >АЛТАЙСКИЙ ШИННЫЙ КОМБИНАТ</option>
                    <option value="БЕЛШИНА" >БЕЛШИНА</option>
                    <option value="ВОЛТАЙР" >ВОЛТАЙР</option>
                    <option value="ДНЕПРОШИНА" >ДНЕПРОШИНА</option>
                    <option value="КШЗ" >КШЗ</option>
                    <option value="МАСТЕР-СПОРТ" >МАСТЕР-СПОРТ</option>
                    <option value="МШЗ" >МШЗ</option>
                    <option value="НИЖНЕКАМСКШИНА" >НИЖНЕКАМСКШИНА</option>
                    <option value="ОМСКШИНА" >ОМСКШИНА</option>
                    <option value="УРАЛШИНА" >УРАЛШИНА</option>
                    <option value="ЯШЗ" >ЯШЗ</option>
               </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
                <input type="submit" class="btn btn-primary" value="Добавить к запросу">
            </div>
        </div>
    </fieldset>
</form>
