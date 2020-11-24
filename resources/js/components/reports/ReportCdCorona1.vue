<template>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row" v-if="$gate.isAdmin()|| $gate.isBimaVagir()|| $gate.isBehvarz()|| $gate.isRiasat()">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h3 class="m-0 text-dark">گزارش کرونا</h3>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <!--تاریخ وضعیت:-->
                                </div>
                                <div class="col-sm-2" >
                                    <!--<date-picker  :auto-submit="true"
                                                  v-model="date_from_status"
                                                  format="YYYY-MM-DD"
                                                  displayFormat="jYYYY/jMM/jDD"
                                    />-->
                                </div><!-- /.col -->
                                <div class="col-sm-2" >
                                    <!--<date-picker  :auto-submit="true"
                                                  v-model="date_to_status"
                                                  format="YYYY-MM-DD"
                                                  displayFormat="jYYYY/jMM/jDD"
                                    />-->
                                </div><!-- /.col -->

                                <div class="col-sm-3" v-if="$gate.isOstan()" >
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

                            </div>
                            <div class="row">

                                <div class="col-sm-2">
                                    تاریخ تولد:
                                </div>
                                <div class="col-sm-2" >
                                    <date-picker  :auto-submit="true" type="year"
                                                  v-model="date_from_birth"
                                                  format="jYYYY"
                                                  displayFormat="jYYYY"
                                    />
                                </div><!-- /.col -->
                                <div class="col-sm-2" >
                                    <date-picker  :auto-submit="true" type="year"
                                                  v-model="date_to_birth"
                                                  format="jYYYY"
                                                  displayFormat="jYYYY"
                                    />
                                </div><!-- /.col -->
                                <div class="col-sm-3" >
                                    <select name="sex"  v-model="sex" id="sex" class="form-control">
                                        <option value="all" selected>جنسیت</option>
                                        <option value="مرد">
                                            مرد
                                        </option>
                                        <option value="زن">
                                            زن
                                        </option>
                                    </select>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    تاریخ تشخیص:
                                </div>
                                <div class="col-sm-2" >
                                    <date-picker  :auto-submit="true"
                                                  v-model="date_from_diagnosis"
                                                  format="YYYY-MM-DD"
                                                  displayFormat="jYYYY/jMM/jDD"
                                    />
                                </div><!-- /.col -->
                                <div class="col-sm-2" >
                                    <date-picker  :auto-submit="true"
                                                  v-model="date_to_diagnosis"
                                                  format="YYYY-MM-DD"
                                                  displayFormat="jYYYY/jMM/jDD"
                                    />
                                </div><!-- /.col -->
                                <div class="col-sm-3" >
                                    <select name="point_type"  v-model="point_type" id="point_type" class="form-control">
                                        <option value="all" selected>شهری روستایی</option>
                                        <option value="6">
                                            پایگاه
                                        </option>
                                        <option value="5">
                                            خانه
                                        </option>
                                    </select>
                                </div><!-- /.col -->
                                <div class="col-sm-2" >
                                    <select name="diagnosis"  v-model="diagnosis" id="diagnosis" class="form-control">
                                        <option value="all" selected>تشخیص</option>
                                        <option value="1">
                                            corona +
                                        </option>
                                        <option value="2">
                                            corona -
                                        </option>
                                        <option value="0">
                                            مشکوک
                                        </option>
                                    </select>
                                </div><!-- /.col -->
                            </div><!-- /.row3 -->

                            <div class="row">


                                <div class="col-sm-2">
                                    تاریخ ثبت:
                                </div>
                                <div class="col-sm-2" >

                                    <date-picker  :auto-submit="true"
                                                  v-model="date_from"
                                                  format="YYYY-MM-DD"
                                                  displayFormat="jYYYY/jMM/jDD"
                                    />
                                </div><!-- /.col -->
                                <div class="col-sm-2" >
                                    <date-picker  :auto-submit="true"
                                                  v-model="date_to"
                                                  format="YYYY-MM-DD"
                                                  displayFormat="jYYYY/jMM/jDD"
                                    />
                                </div><!-- /.col -->

                                <div class="col-sm-2" >
                                    <select name="situation"  v-model="situation" id="situation" class="form-control">
                                        <option value="all" selected>وضعیت بیمار</option>
                                        <option value="0">
                                            ILI
                                        </option>
                                        <option value="1">
                                            SARI
                                        </option>
                                    </select>
                                </div><!-- /.col -->
                                <div class="col-sm-2" >
                                    <select name="hospitalization"  v-model="hospitalization" id="hospitalization" class="form-control">
                                        <option value="all" selected>وضعیت بستری</option>
                                        <option value="0">
                                            سرپایی
                                        </option>
                                        <option value="1">
                                            بستری
                                        </option>
                                    </select>
                                </div><!-- /.col -->

                                <div class="col-sm-1">
                                    <a href="#" class="btn btn-primary" @click="loadValues">فیلتر</a>
                                </div><!-- /.col -->
                            </div>
                        </div>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>مرکز</th>
                                <th>نام نقطه</th>
                                <th>درحال درمان</th>
                                <th>بستری ویژه</th>
                                <th>مرگ</th>
                                <th>بهبود</th>
                                <th>بستری در منزل</th>
                                <th>نقاهتگاه</th>

                            </tr>
                            <tr v-for="value in values.data" :key="value.id" class="small">

                                <td>
                                    {{value.region_point.region_center.region_county.name}} -
                                    {{value.region_point.region_center.name}}
                                </td>
                                <td>{{value.region_point.name}}</td>
                                <td>{{value.s_0}}</td>
                                <td>{{value.s_1}}</td>
                                <td>{{value.s_2}}</td>
                                <td>{{value.s_3}}</td>
                                <td>{{value.s_4}}</td>
                                <td>{{value.s_5}}</td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <pagination :data="values" size="small" :limit="100" @pagination-change-page="getResults"></pagination>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div v-if="!($gate.isAdmin()|| $gate.isBimaVagir()|| $gate.isBehvarz()|| $gate.isRiasat())">
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
        name: "ReportCdCorona",

        components: {
            'datePicker': VuePersianDatetimePicker,
        },


        data() {
            return {
                num:1,
                values: {},

                counties: {},
                types: {},
                centers: {},
                points: {},
                county_id: '',
                user_county: '',

                point_type: 'all',
                diagnosis: 'all',
                situation: 'all',
                hospitalization: 'all',
                sex: 'all',
                date_to: new Date().toISOString().slice(0,10),
                date_from:moment(new Date()).subtract(11, 'months').format('YYYY-MM-DD') ,
                date_to_diagnosis: new Date().toISOString().slice(0,10),
                date_from_diagnosis:moment(new Date()).subtract(11, 'months').format('YYYY-MM-DD') ,
                date_to_status: new Date().toISOString().slice(0,10),
                date_from_status:moment(new Date()).subtract(11, 'months').format('YYYY-MM-DD') ,
                date_to_birth: moment(new Date()).subtract(0, 'years').format('jYYYY'),
                date_from_birth:moment(new Date()).subtract(110, 'years').format('jYYYY') ,
            }
        },
        methods: {


            getResults(page = 1) {
                if (this.$gate.isOstan()) {
                    if( this.county_id) // agar az list entekhab kard
                        this.user_county = this.county_id;
                    else
                        this.user_county = this.$gate.user.region_point.region_center.county_id;

                } else {
                    this.user_county = this.$gate.user.region_point.region_center.county_id;
                }
                axios.get("/api/cd/corona/report/"+ this.user_county+ "/" + this.date_from + "/" + this.date_to+ "/" + this.date_from_diagnosis + "/" + this.date_to_diagnosis+ "/"+  this.date_from_status + "/" + this.date_to_status+ "/"+  this.date_from_birth + "/" + this.date_to_birth+ "/" + this.point_type+ "/" + this.diagnosis+ "/" + this.situation+ "/" + this.hospitalization+ "/" + this.sex+'/?page=' + page)
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
                axios.get("/api/cd/corona/report/"+ this.user_county+ "/" + this.date_from + "/" + this.date_to+ "/" + this.date_from_diagnosis + "/" + this.date_to_diagnosis+ "/"+  this.date_from_status + "/" + this.date_to_status+ "/"+  this.date_from_birth + "/" + this.date_to_birth+ "/" + this.point_type+ "/" + this.diagnosis+ "/" + this.situation+ "/" + this.hospitalization+ "/" + this.sex).then(({data}) => (this.values = data)).then(() => {
                    this.$Progress.finish();
                }).catch(() => {
                    this.$Progress.fail();
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود مقادیر بهداشت محیط رخ داد'
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

            this.$on('ValueTableChanged', () => {
                this.loadValues();
            });

            //this.loadItems();
            this.loadCounties();



        }

    }
</script>
