import {LMap} from "vue2-leaflet";import {LTileLayer} from "vue2-leaflet";import {LMarker} from "vue2-leaflet";import {LPopup} from "vue2-leaflet";import {LIcon} from "vue2-leaflet";
<template>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row" v-if="$gate.isAdmin()|| $gate.isEnvironment()|| $gate.isBehvarz()">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <div class="row">
                            <div class="col-sm-2" v-if="$gate.isOstan()" >
                                    <select  class="form-control"
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
                            </div><!-- /.col -->
                            <div class="col-sm-2" v-if="$gate.isOstan()" >
                                <select name="environment_item_id" v-model="environment_item_id" id="environment_item_id" class="form-control"
                                        >
                                    <option value="" selected>انتخاب آیتم مورد نظر</option>
                                    <option
                                        v-for="r in environment_items"
                                        :value="r.id"
                                    >
                                        {{r.name}}
                                    </option>
                                </select>
                            </div><!-- /.col -->
                            <div class="col-sm-2" >
                                <select name="point_type"  id="point_type" class="form-control"
                                >
                                    <option value="" selected>شهری روستایی</option>
                                    <option value="5">
                                        پایگاه
                                    </option>
                                    <option value="6">
                                        خانه
                                    </option>
                                </select>
                            </div><!-- /.col -->
                            <div class="col-sm-2" >
                                <date-picker  :auto-submit="true"
                                              v-model="date_from"
                                              format="YYYY-MM-DD"
                                />
                            </div><!-- /.col -->
                            <div class="col-sm-2" >
                                <date-picker  :auto-submit="true"
                                              v-model="date_to"
                                              format="YYYY-MM-DD"
                                />
                            </div><!-- /.col -->
                            <div class="col-sm-2 m-0 p-0">
                                <a href="#" class="btn btn-primary" @click="loadValues">فیلتر</a>
                            </div><!-- /.col -->
                            </div>
                        </h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>مرکز</th>
                                <th>نام نقطه</th>
                                <th>تعداد مطلوب</th>
                                <th>تعداد نامطلوب</th>
                                <th>بازه زمانی</th>

                            </tr>
                            <tr v-for="value in values.data" :key="value.id" class="small">

                                <td>
                                    {{value.region_point.region_center.region_county.name}} -
                                    {{value.region_point.region_center.name}}
                                </td>
                                <td>{{value.region_point.name}}</td>
                                <td>{{value.ok}}</td>
                                <td>{{value.Nok}}</td>
                                <td>

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <pagination :data="values" size="small" :limit="8" @pagination-change-page="getResults"></pagination>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div v-if="!($gate.isAdmin()|| $gate.isEnvironment()|| $gate.isBehvarz())">
            <not-found></not-found>
        </div>
    </div>
    <!-- Button trigger modal -->
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
    import Vue2LeafletMarkercluster from "vue2-leaflet-markercluster";
    var moment = require('moment-jalaali');
    export default {
        name: "Environment-Report",

        components: {
            'datePicker': VuePersianDatetimePicker,
        },


        data() {
            return {
                num:1,
                values: {},
                environment_items: {},
                counties: {},
                types: {},
                centers: {},
                points: {},
                county_id: '',
                environment_item_id:'',
                user_county: '',
                date_to: new Date().toISOString().slice(0,10),
                date_from:moment(new Date()).subtract(2, 'days').format('YYYY-MM-DD') ,
            }
        },
        methods: {

            getResults(page = 1) {
                axios.get('/api/environment/report/?page=' + page)
                    .then(response => {
                        this.values = response.data;
                    });
            },

            loadValues() {
                if (this.$gate.isOstan()) {
                    if( this.county_id) // agar az list entekhab kard
                        this.user_county = this.county_id;
                    else
                        this.user_county = this.$gate.user.region_point.region_center.county_id;

                } else {
                    this.user_county = this.$gate.user.region_point.region_center.county_id;
                }
                this.$Progress.start();
                axios.get("/api/environment/report/"+ this.user_county).then(({data}) => (this.values = data)).then(() => {
                    this.$Progress.finish();
                }).catch(() => {
                    this.$Progress.fail();
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود مقادیر بهداشت محیط رخ داد'
                    });
                });

            },
            loadItems() {
                axios.get("/api/environment/itemList").then(({data}) => (this.environment_items = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },

            loadCounties() {
                this.user_county = this.$gate.user.region_point.region_center.county_id;
                if (this.$gate.isOstan()) {
                    axios.get("/api/countyList").then(({data}) => (this.counties = data)).then(() => {
                    }).catch(() => {
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود اطلاعات رخ داد'
                        });
                    });
                } else {
                    axios.get("/api/county/" + this.user_county).then(({data}) => (this.counties = data)).then(() => {

                    }).catch(() => {
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود لیست شهرستان رخ داد'
                        });
                    });
                }
                //console.log(this.counties);

            },


        },
        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('/api/environment/findValue?q=' + query)
                    .then((data) => {
                        this.users = data.data
                    })
                    .catch(() => {

                    })
            });
            this.loadValues();
            this.loadItems();
            this.$on('ValueTableChanged', () => {
                this.loadValues();
            });

            //this.loadItems();
            this.loadCounties();



        }

    }
</script>
