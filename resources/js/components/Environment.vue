<template>
    <div>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                    <div class="col-sm-3">
                        <h5 class="m-0 text-dark">مانیتورینگ کلرسنجی</h5>
                    </div><!-- /.col -->
                    <div class="col-sm-1 m-0 p-0">
                        <!--{{ date_from }}-->
                    </div><!-- /.col -->
                    <div class="col-sm-3" >
                        <date-picker  :auto-submit="true"
                                      v-model="date_from"
                                      format="YYYY-MM-DD"
                        />
                    </div><!-- /.col -->
                    <div class="col-sm-3" >
                        <date-picker  :auto-submit="true"
                                      v-model="date_to"
                                      format="YYYY-MM-DD"
                        />
                    </div><!-- /.col -->
                    <div class="col-sm-2 m-0 p-0">
                        <a href="#" class="btn btn-primary" @click="loadTemps">فیلتر</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">

            <div class="row" v-if="$gate.isAdminOrGroup_admin() || $gate.isEnvironment() || $gate.isBehvarz() ">
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

                                <div class="card bg-info-gradient">
                                    <div class="row" v-for="item in environment_item">
                                        <div class="col-8">
                                            {{item.name}}
                                        </div>

                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_item[item.id]"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-info-gradient">
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/marker-red.png">
                                            مقدار بیش از حد
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_high"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">

                                            <img alt="" src="/images/vendor/leaflet/dist/marker-ok.png">
                                            مقدار مطلوب
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_ok"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/marker-freeze.png">
                                            مقدار کمتر از حد
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_low"/>
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
                            {{marker.environment_item.name}}
             </span>
                            <br/>
                            مقدار عددی:
                            {{marker.value}}
                            <br/>
                            ثبت کننده:
                            {{marker.user.name}}
                            <br/>
                            تاریخ نمونه برداری:
                            {{marker.created_at|myDate1}}
                            <br/>
                            تحت پوشش:
                            {{marker.region_point.region_center.region_county.name}} -
                            {{marker.region_point.region_center.name}} -
                            {{marker.region_point.name}}
                        </l-popup>
                        <l-icon
                            :icon-url=iconCheck(marker)
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
            <div v-if="!($gate.isAdminOrGroup_admin() || $gate.isEnvironment() || $gate.isBehvarz())">
                <not-found></not-found>
            </div>
        </div>
    </div>
</template>

<script>

    import {LMap, LTileLayer, LMarker, LPopup, LIcon, LCircle} from "vue2-leaflet";
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
    import Vue2LeafletMarkercluster from 'vue2-leaflet-markercluster';
    import {latLng} from "leaflet";
    import {ToggleButton} from 'vue-js-toggle-button'

    // Import stylesheet

    import "leaflet.markercluster/dist/MarkerCluster.css";
    import "leaflet.markercluster/dist/MarkerCluster.Default.css";
    var moment = require('moment-jalaali');


    Vue.component('ToggleButton', ToggleButton);

    export default {
        name: "Environment",

        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LIcon,
            'datePicker': VuePersianDatetimePicker,
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

                //date_from: "2020-08-15", //تاریخ شروع و پایان یعنی یک هفته بعدش رو پیشفرض میریزیم اینجا و پاس میدیم به کنترلر



                date_to: new Date().toISOString().slice(0,10),
                date_from:moment(new Date()).subtract(2, 'days').format('YYYY-MM-DD') ,



                mapFilter: '',


                show_point_home: false,
                show_point_paygah: false,
                show_point_shabake: false,
                show_point_marakez: false,

                show_latest: false,

                show_high: true,
                show_ok: true,
                show_low: true,




                selectedPoint: '',
                population: '',
                user_county_id: '',
                markers: {},
                markers2: {},
                environment_item: {},
                zoom: 9,
                center: latLng(this.$gate.user.region_point.lat, this.$gate.user.region_point.lng),

                attribution: '',
                currentZoom: 9,
                currentCenter: latLng(36.425703, 48.213501),



            };
        },
        props: {
            show_item: {
                default: () => ({
                    1: true,
                    2: true,
                    3: true,
                    4: true,
                    5: true,
                    6: true,
                    7: true,
                    8: true,
                    9: true,
                    10: true,
                    11: true,
                    12: true,
                }),
            },
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
                axios.get("/api/environment/ListByCounty/" + this.user_county_id + "/" + this.date_from + "/" + this.date_to).then(({data}) => (this.markers = data)).then(() => {
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


            iconCheck(val) {
                if (val.status == '1')
                    val = '/images/vendor/leaflet/dist/marker-ok.png';
                else if (val.status == '2')
                    val = '/images/vendor/leaflet/dist/marker-red.png';
                else if (val.status == '0')
                    val = '/images/vendor/leaflet/dist/marker-freeze.png';
                else
                    val = '/images/vendor/leaflet/dist/marker-icon.png';
                return val;
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
                let y ;
                let z ;
                let w=[] ;

                if (this.show_low) //
                {
                    w[0] = marker.status === 0;
                }
                if (this.show_ok) //
                {
                    w[1] = marker.status === 1;
                }
                if (this.show_high) //
                {
                    w[2] = marker.status === 2;
                }
                if (this.show_item[marker.environment_item_id])
                {
                    x[marker.environment_item_id] = true;
                }

                if (this.show_latest)
                {
                    y = !this.connectionChack(marker.updated_at);
                } else {
                    y = true;
                }
                z=x.find(element => element === true);
                return (z && y && (w[0]||w[1]||w[2]));
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
            loadItemList() {
                if (this.$gate.isOstan()) {
                    this.user_county_id = this.county_id;

                } else {
                    this.user_county_id = this.$gate.user.region_point.region_center.county_id;
                    this.zoom = 10;
                }
                axios.get("api/environment/itemList" ).then(({data}) => (this.environment_item = data)).then(() => {


                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود مقادیر بهداشت محیط رخ داد'
                    });
                });

            },

        },


        created() {
//console.log(this.subDate(Date(), Date()));


            this.loadCounties();
            this.loadTemps();
            this.loadItemList();

            this.loadPoints();


            //setInterval(this.loadTemps, 300000);
            // setInterval(this.loadStat, 300000);



        }
    };
</script>

