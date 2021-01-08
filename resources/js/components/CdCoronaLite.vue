<template>
    <div>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                    <div class="col-sm-3">
                        <h5 class="m-0 text-dark">مانیتورینگ کرونا لایت

                        </h5>
                    </div><!-- /.col -->
                    <div class="col-sm-2 m-0 p-0">
                        <a class="btn bg-info " href="\cdcorona">
                            کرونا با جزئیات
                        </a>
                    </div><!-- /.col -->
                    <div class="col-sm-7" v-if="show_timeSeries">
                        <h5 class="m-0 text-dark">
                            {{showDay()}}
                        </h5>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">

            <div class="row" v-if="$gate.isAdmin() ||$gate.isRiasat() || $gate.isBimaVagir()">
                <div class="col-lg-12" id="myMap">

                    <div class="card bg-info-gradient" id="coldChainMapHelp">

                        <div class="card-header no-border ">
                            <h3 class="card-title">
                                راهنما
                            </h3>

                            <div class="card-tools">
                                <button class="btn bg-info btn-sm" data-widget="collapse" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button class="btn bg-info btn-sm" data-widget="remove" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body small">
                            <div class="small ">
                                <!--<div class="card bg-info-gradient">
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/corona6.png">
                                            کرونا +
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_corona"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">

                                            <img alt="" src="/images/vendor/leaflet/dist/corona1.png">
                                            کرونا -
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_corona_neg"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/corona2.png">
                                            مشکوک
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_corona_mashkok"/>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="card bg-info-gradient">
                                    <div class="row pt-1">
                                        <div class="col-8">
                                            بستری
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_hospitalization_bastari"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            سرپایی
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_hospitalization_sarpaei"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-info-gradient">
                                    <div class="row pt-1">
                                        <div class="col-8">
                                            ILI
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_situation_ili"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            SARI
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_situation_sari"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-info-gradient">
                                    <!--<div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/corona3.png">
                                            بهبود
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_status_recover"/>
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/corona4.png">
                                            مرگ
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_status_death"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            درحال درمان
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_status_darhaledarman"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            بستری ویژه
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_status_icu"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            نقاهتگاه
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_status_neghahatgah"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            بستری درمنزل
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16" v-model="show_status_manzel"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="card bg-info-gradient">
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/shabake.png">
                                            شبکه بهداشت
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16" v-model="show_point_shabake"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/shahri.png">
                                            مراکز سلامت
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16" v-model="show_point_marakez"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/home.png">
                                            خانه بهداشت
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16" v-model="show_point_home"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/paygah.png">
                                            پایگاه بهداشت
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16" v-model="show_point_paygah"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 p-1">
                                        تغییرات اخیر
                                    </div>
                                    <div class="col-4 p-0 pt-1">
                                        <toggle-button :value="true" :height="16" v-model="show_latest"
                                                       :labels="{checked: 'بله', unchecked: 'خیر'}"/>
                                    </div>
                                </div>

                            </div>


                            <form v-if="$gate.isOstan()">
                                <select @change="loadTemps(),loadPoints()" class="form-control"
                                        id="county_id" name="county_id" v-model="county_id">
                                    <option value="">همه شهرستانها</option>
                                    <option :key="index"
                                            :value="r.id"
                                            v-for="(r,index) in counties"
                                            v-if="r.id!=9"
                                    >
                                        {{r.name}}
                                    </option>
                                </select>
                            </form>
                            <button @click="
                            tileProviders[1].visible=true,
                            tileProviders[0].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[3].visible=false,
                            tileProviders[4].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map small"></i>
                            </button>
                            <button @click="
                            tileProviders[2].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[0].visible=false,
                            tileProviders[3].visible=false,
                            tileProviders[4].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map-o small"></i>
                            </button>
                            <button @click="
                            tileProviders[0].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[3].visible=false,
                            tileProviders[4].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map-signs small"></i>
                            </button>
                            <button @click="
                            tileProviders[3].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[0].visible=false,
                            tileProviders[4].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map-marker small"></i>
                            </button>
                            <button @click="
                            tileProviders[4].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[0].visible=false,
                            tileProviders[3].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map-pin small"></i>
                            </button>

                        </div>
                        <!-- /.card-body -->

                    </div>

                    <div class="card bg-success-gradient" id="coldChainMapHelp2">
                        <div class="card-header no-border ">
                            <h3 class="card-title">
                                آمار
                            </h3>

                            <div class="card-tools">
                                <button class="btn bg-success btn-sm" @click="loadStat(),selectedPoint=''"
                                        type="button">
                                    <i class="fa fa-refresh"></i>
                                </button>
                                <button class="btn bg-success btn-sm" data-widget="collapse" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button class="btn bg-success btn-sm" data-widget="remove" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body small">

                        <span v-if="selectedPoint" class="label-success">
                             {{selectedPoint}}
                             <br>
                        </span>
                            تعداد کل موارد +:
                            {{stats['count']}}
                            <br>
                            مرد:
                            {{stats['count_men']}} ,
                            زن:
                            {{stats['count_women']}}
                            <br>
                            تعداد کل موارد ثبتی:
                            {{stats['count_all']}}
                            <br>
                            تعداد کل موارد منتظر آزمایش:
                            {{stats['count_mashkok']}}
                            <br>
                            <span v-if="stats['count']>0">
                            مورد+ فعال:
                            {{stats['count']-(stats['count_death']+stats['count_recover'])}}
                            <br>
                            تعداد مرگ کرونا +:
                            {{stats['count_death']}}
                            <br>
                            تعداد مرگ مشکوک:
                            {{stats['count_death_mashkok']}}
                            <br>
                            تعداد بهبود:
                            {{stats['count_recover']}}
                            <br>
                            میانگین سن:
                            {{Math.round(1399-stats['age'])}}
                            <br>
                            درصد موارد فوتی:
                            {{Math.round((stats['count_death']*100)/stats['count'])}}
                            <br>
                            درصد موارد بهبود:
                            {{Math.round((stats['count_recover']*100)/stats['count'])}}
                            <span v-if="population>1">
                                <br>
                                ابتلا در صدهزار:
                                {{Math.round((stats['count']/population)*100000)}}
                                <br>
                                جمعیت:
                                {{population}}
                            </span>

                        </span>
                            <!---->
                            <bar-chart-component ></bar-chart-component>
                            <div class="btn-group" role="group">
                                <a class="btn btn-success btn-sm" @click="day--,show_timeSeries=true"><i
                                    class="fa fa-arrow-right"></i></a>
                                <a class="btn btn-success btn-sm"
                                   @click="day=nDay,show_timeSeries=false,$emit('stop_timeSeries')"><i
                                    class="fa fa-stop"></i></a>
                                <a class="btn btn-success btn-sm"
                                   @click="show_timeSeries=true,$emit('show_timeSeries')"><i class="fa fa-play"></i>
                                </a>
                                <a class="btn btn-success btn-sm" @click="$emit('stop_timeSeries')"><i
                                    class="fa fa-pause"></i></a>
                                <a class="btn btn-success btn-sm" @click="day++,show_timeSeries=true"><i
                                    class="fa fa-arrow-left"></i></a>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>

                    <!--<span>{{ currentCenter }} زوم فعلی {{ currentZoom }}</span>-->

                    <l-map
                        :center="center"
                        :zoom="zoom"
                        @update:center="centerUpdate"
                        @update:zoom="zoomUpdate"
                        style="height:720px;"
                    >
                        <l-tile-layer :key="tileProvider.name"
                                      :name="tileProvider.name"
                                      :url="tileProvider.url"
                                      :visible="tileProvider.visible"
                                      v-for="tileProvider in tileProviders"

                        />
                        <v-marker-cluster>
                        <span :key="index" v-for="(marker,index) in markers">
                    <l-marker :lat-lng="marker"  v-if="mapWatch(marker)">

                        <l-popup class="vazir">
             <span class="label-info">
               {{marker.first_name}} {{marker.last_name}}
             </span>

                            <br/>
                            مشخصات:
                            <br/> کد ملی:
                            {{marker.national_code}}
                            <br/>سن:
                            {{1399-marker.birth}}
                            <br/>شغل:
                            {{marker.occupation}}
                            <br/>
                            وضعیت بستری:
                            {{hospitalizationCheck(marker.hospitalization)}}
                            <br/>
                            وضعیت بیمار:
                            {{situationCheck(marker.situation)}}
                            <br/>
                            تشخیص:
                            {{diagnosisCheck(marker.diagnosis)}}
                            <br/>
                            وضعیت درمان:
                            {{statusCheck(marker.status)}}
                            <br/>
                            تحت پوشش:
                            {{marker.region_point.region_center.region_county.name}} -
                            {{marker.region_point.region_center.name}} -
                            {{marker.region_point.name}}
                            <br/>
                            تاریخ ثبت:
                            {{marker.created_at|myDate}}
                            <br/>
                            تاریخ تشخیص:
                            {{marker.diagnosis_at|myDate}}
                            <br/>
                            <span v-if="marker.created_at!=marker.updated_at">
                                تاریخ آخرین بروزرسانی:
                            {{marker.updated_at|myDate}}
                                <br/>
                            </span>

                            <span v-if="((marker.status_at !=undefined) && (marker.status_at!=='0000-00-00'))">
                                تاریخ مرگ یا بهبود:
                            {{marker.status_at|myDate}}
                            </span>
                            <span class="label-warning" v-if="marker.expose !=undefined">
                                تعداد مواجهین
                            {{Math.round((marker.expose.length+1)/11)}}
                            </span>
                        </l-popup>
                        <l-icon

                            icon-url='/images/vendor/leaflet/dist/marker-icon.png'
                            shadow-url='/images/vendor/leaflet/dist/marker-shadow.png'
                        />

                    </l-marker>


    </span>
                        </v-marker-cluster>
                        <span v-for="marker2 in markers2" v-if="mapWatch2(marker2)">
                    <l-marker :lat-lng="marker2" >


                        <l-icon
                            :icon-url=iconCheck2(marker2)
                            :iconSize="[40, 40]"
                        />
<l-popup class="vazir">
             <span class="label-info">
               {{marker2.name}}
             </span>
    <br>

    {{marker2.region_center.name}}
    <br>


            <span v-if="marker2.develop!=undefined">
                   جمعیت تحت پوشش:
               {{marker2.develop.population}}
                    <br/>
            </span>
            <span v-if="marker2.population!=undefined">
                   جمعیت تحت پوشش:
               {{marker2.population}}
                    <br/>
            </span>
</l-popup>

                    </l-marker>


    </span>

                    </l-map>
                </div>
            </div>
            <!-- end is admin -->
            <div v-if="!($gate.isAdmin() ||$gate.isRiasat() || $gate.isBimaVagir())">
                <not-found></not-found>
            </div>
        </div>
    </div>
</template>

<script>

    import {LMap, LTileLayer, LMarker, LPopup, LIcon} from "vue2-leaflet";
    import Vue2LeafletMarkercluster from 'vue2-leaflet-markercluster';
    import {latLng} from "leaflet";
    import {ToggleButton} from 'vue-js-toggle-button'

    // Import stylesheet

    import "leaflet.markercluster/dist/MarkerCluster.css";
    import "leaflet.markercluster/dist/MarkerCluster.Default.css";


    Vue.component('ToggleButton', ToggleButton);

    export default {
        name: "CdCoronaLite",

        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LIcon,

            'v-marker-cluster': Vue2LeafletMarkercluster

        },
        data() {
            return {
                tileProviders: [
                    {
                        name: 'Parsijoo',
                        visible: true,
                        url: 'http://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=897f18a7e1c0407286ce168d9fdf1b09',
                    },
                    {
                        name: 'OpenStreetMap',
                        visible: false,
                        url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
                    },
                    {
                        name: 'OpenTopoMap',
                        visible: false,
                        url: 'http://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',

                    },
                    {
                        name: 'toop',
                        visible: false,
                        url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',

                    },
                    {
                        name: 'toop2',
                        visible: false,
                        url: 'https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png',

                    },
                ],
                counties: {},
                county_id: "",
                stats: {},
                day: 0,
                active_interval: '',
                show_timeSeries: false,


                mapFilter: '',


                show_point_home: false,
                show_point_paygah: false,
                show_point_shabake: false,
                show_point_marakez: false,
                show_corona: true,
                show_corona_neg: false,
                show_corona_mashkok: false,
                show_status_recover: false,
                show_status_death: false,
                //  show_status_death_mashkok: true,
                show_status_darhaledarman: true,
                show_status_manzel: true,
                show_status_neghahatgah: true,
                show_situation_ili: true,
                show_situation_sari: true,
                show_hospitalization_bastari: true,
                show_hospitalization_sarpaei: true,
                show_status_icu: true,

                show_latest: false,




                selectedPoint: '',
                population: '',
                user_county_id: '',
                markers: {},
                markers2: {},
                zoom: 9,
                center: latLng(this.$gate.user.region_point.lat, this.$gate.user.region_point.lng),

                attribution: '',
                currentZoom: 9,
                currentCenter: latLng(36.425703, 48.213501),



            };
        },

        methods: {
            loadCounties() {
                axios.get("/api/countyList").then(({data}) => (this.counties = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود لیست شهرستان رخ داد'
                    });
                });


            },
            loadTemps() {
                this.$Progress.start();
                if (this.$gate.isOstan()) {
                    this.user_county_id = this.county_id;
                } else {
                    this.user_county_id = this.$gate.user.region_point.region_center.county_id;
                    this.zoom = 10;
                }
                axios.get("/api/cd/corona/ListByCountyLite/" + this.user_county_id).then(({data}) => (this.markers = data)).then(() => {
                    //  console.log(this.markers);
                    this.$Progress.finish();
                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود نقاط رخ داد'

                    });
                    this.$Progress.fail();
                });


            },
            zoomUpdate(zoom) {
                this.currentZoom = zoom;
            },
            centerUpdate(center) {
                this.currentCenter = center;
            },


            hospitalizationCheck(val) {
                if (val == 0)
                    val = 'سرپایی';
                else val = 'بستری';
                return val;
            },
            situationCheck(val) {
                if (val == 0)
                    val = 'ili';
                else val = 'sari';
                return val;
            },
            diagnosisCheck(val) {
                if (val == 0)
                    val = 'منتظر آزمایش';
                else if (val == 1) val = 'کرونا مثبت';
                else val = 'کرونا منفی';
                return val;
            },
            statusCheck(val) {
                if (val == 0)
                    val = 'درحال درمان';
                else if (val == 1)
                    val = 'بستری ویژه';
                else if (val == 2) val = 'مرگ';
                else if (val == 3) val = 'بهبود';
                else if (val == 4) val = 'بستری در منزل';
                else if (val == 5) val = 'نقاهتگاه';

                return val;
            },
            loadStat() {
                axios.get("/api/cd/corona/StatByCounty/" + this.county_id).then(({data}) => (this.stats = data)).then(() => {
                    //  console.log(this.markers);
                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود stats رخ داد'
                    });
                });
            },
            loadStatByPoint(point_id, type_id, center_id, county_id) {
                axios.get("/api/cd/corona/StatByPoint/" + point_id + "/" + type_id + "/" + center_id + "/" + county_id).then(({data}) => (this.stats = data)).then(() => {
                    //  console.log(this.markers);
                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود stats pointرخ داد'
                    });
                });
            },
            iconCheck2(val) {
                if (val.type_id == '5')
                    val = '/images/vendor/leaflet/dist/home.png';
                else if (val.type_id == '6')
                    val = '/images/vendor/leaflet/dist/paygah.png';
                else if (val.type_id == '1')
                    val = '/images/vendor/leaflet/dist/shabake.png';
                else if (val.type_id == '2')
                    val = '/images/vendor/leaflet/dist/shahri.png';
                else if (val.type_id == '3')
                    val = '/images/vendor/leaflet/dist/shahri-rostaei.png';
                else if (val.type_id == '4')
                    val = '/images/vendor/leaflet/dist/rostaei.png';

                return val;
            },


            mapWatch(marker) {
                let x = [];
                if (this.show_corona) // agar corona mosbat bod
                {
                    x[1] = marker.diagnosis === 1;
                }

                if (this.show_corona_neg) // agar corona manfi bod
                {
                    x[2] = marker.diagnosis === 2;
                }

                if (this.show_corona_mashkok) // agar mashkok bod
                {
                    x[3] = marker.diagnosis === 0;
                }

                if (this.show_status_recover) // agar behbood bood
                {
                    x[4] = marker.status === 3;
                }

                if (this.show_status_death) // agar marg bood
                {
                    x[5] = marker.status === 2;
                }

                if (this.show_status_darhaledarman) // agar dar hale darman bood
                {
                    x[6] = marker.status === 0;
                }

                if (this.show_status_icu) {
                    x[7] = marker.status === 1;
                }

                if (this.show_status_manzel) {
                    x[8] = marker.status === 4;
                }

                if (this.show_status_neghahatgah) {
                    x[9] = marker.status === 5;
                }

                if (this.show_situation_ili) {
                    x[10] = marker.situation === 0;
                }

                if (this.show_situation_sari) {
                    x[11] = marker.situation === 1;
                }

                if (this.show_hospitalization_sarpaei) {
                    x[12] = marker.hospitalization === 0;
                }

                if (this.show_hospitalization_bastari) {
                    x[13] = marker.hospitalization === 1;
                }

                if (this.show_latest) // agar dar hale darman bood
                {
                    x[14] = !this.connectionChack(marker.updated_at);
                } else {
                    x[14] = true;
                }
                if (this.show_timeSeries) // agar dar hale darman bood
                {
                    x[20] = !this.timeSeries(marker.diagnosis_at);
                } else {
                    x[20] = true;
                }

                if (this.show_status_death_mashkok) // agar death_mashkok bood
                {
                    x[15] = (marker.diagnosis !== 1) && (marker.status === 2);
                }

                if (this.show_corona_sarpaei) // agar sarpaei + bood
                {
                    x[16] = (marker.diagnosis === 1) && (marker.hospitalization === 0);
                }

                if (this.show_corona_mashkok_bastari) // agar mashkok bastari  bood
                {
                    x[17] = (marker.diagnosis === 0) && (marker.hospitalization === 1);
                }

                if (this.show_corona_mashkok_sarpaei) // agar mashkok sarpaei  bood
                {
                    x[18] = (marker.diagnosis === 0) && (marker.hospitalization === 0);
                }

                if (this.show_corona_bastari) // agar bastari + bood
                {
                    x[19] = (marker.diagnosis === 1) && (marker.hospitalization === 1);
                }

                return ((((x[1] || x[2] || x[3]) && (x[4] || x[5] || x[6] || x[7] || x[8] || x[9]) && (x[10] || x[11]) && (x[12] || x[13])) && (x[20])) && (x[14]));
                //  return x.find(element => element === true);
            },
            mapWatch2(point) {
                let x = [];
                if (this.show_point_shabake) // agar corona mosbat bod
                {
                    x[1] = point.type_id === 1;
                }
                if (this.show_point_marakez) // agar corona mosbat bod
                {
                    x[2] = ((point.type_id === 2) || (point.type_id === 3) || (point.type_id === 4));
                }
                if (this.show_point_home) // agar corona mosbat bod
                {
                    x[3] = point.type_id === 5;
                }
                if (this.show_point_paygah) // agar corona manfi bod
                {
                    x[4] = point.type_id === 6;
                }
                //return (x[1] || x[2] || x[3] || x[4]);
                return x.find(element => element === true);
            },
            connectionChack(date) {
                var moment = require('moment-jalaali');

                var date2 = (moment().subtract(1, 'days'));
                var date = (moment(date));
                let x;
                x = moment(date2).isSameOrAfter(date);
                return x;
                //   moment('2010-10-20').isSameOrAfter('2010-10-19'); // true
            },
            timeSeries(date) {
                var moment = require('moment-jalaali');

                var date2 = (moment().subtract(this.day, 'days'));
                var date = (moment(date));
                let x;
                x = moment(date2).isSameOrAfter(date);
                return !x;
                //   moment('2010-10-20').isSameOrAfter('2010-10-19'); // true
            },
            showDay() {
                var moment = require('moment-jalaali');
                return (moment().subtract(this.day, 'days')).format('LLLL');
            },

            setDay() {
                this.day--;
                if (this.day <= 0)
                    this.day = this.nDay
            },
            loadPoints() {
                if (this.$gate.isOstan()) {
                    this.user_county_id = this.county_id;

                } else {
                    this.user_county_id = this.$gate.user.region_point.region_center.county_id;
                    this.zoom = 10;
                }
                axios.get("api/region/pointByCounty/" + this.user_county_id).then(({data}) => (this.markers2 = data)).then(() => {
                    //  console.log(this.markers);
                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود نقاط رخ داد'
                    });
                });

            },

        },
        computed: {
            nDay: function () {
                var moment = require('moment-jalaali');
                var date = (moment(date));

                var date2 = moment('2020-02-18 00:00:00');
                var diffInMinutes = date.diff(date2, 'days');
                return diffInMinutes;
            },
            chunkedItems () {
                return _.chunk(this.markers,4)
            }
        },
        directives: {
            forCallback(el, binding) {
                let element = binding.value
                if (element.key == element.array.length - 1)
                    if (typeof element.callback === 'function') {
                        element.callback()
                    }
            }
        },

        created() {
//console.log(this.subDate(Date(), Date()));

            this.day = this.nDay;
            this.loadCounties();
            this.loadTemps();
            this.loadStat();
            this.loadPoints();


            setInterval(this.loadTemps, 300000);
            // setInterval(this.loadStat, 300000);
            this.$on('show_timeSeries', () => {

                if (this.show_timeSeries)
                    this.active_interval = setInterval(this.setDay, 800);

            });
            this.$on('stop_timeSeries', () => {
                clearInterval(this.active_interval);
            });



        }
    };
</script>

