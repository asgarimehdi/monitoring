<template>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row" v-if="$gate.isAdmin()||$gate.isBehvarz()||$gate.isKarshenasNazer()||($gate.isGroup_admin() && $gate.isBimaVagir())">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">

                        </h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr>

                                <th>نام</th>
                                <th>شغل</th>
                                <th>تشخیص</th>
                                <th>وضعیت</th>
                                <th>مرکز تحت پوشش</th>
                                <th>ثبت کننده</th>
                                <th>تغییر</th>

                            </tr>
                            <tr v-for="(corona , index) in coronas.data" :key="index" class="small">

                                <td>{{corona.first_name}} {{corona.last_name}}</td>
                                <td>{{corona.occupation}}</td>

                                <td v-if="corona.diagnosis==0">منتظر آزمایش</td>
                                <td v-else-if="corona.diagnosis==1">کرونا مثبت</td>
                                <td v-else-if="corona.diagnosis==2">کرونا منفی</td>

                                <td v-if="corona.status==0">درحال درمان</td>
                                <td v-else-if="corona.status==1">بستری ویژه</td>
                                <td v-else-if="corona.status==4">بستری در منزل</td>
                                <td v-else-if="corona.status==5">نقاهتگاه</td>
                                <td v-else-if="corona.status==2">مرگ</td>
                                <td v-else-if="corona.status==3">بهبود</td>
                                <td>
                                    {{corona.region_point.region_center.region_county.name}} -
                                    {{corona.region_point.region_center.name}} -
                                    {{corona.region_point.name}}
                                </td>
                                <td v-bind:title=" corona.user.role.name +' '+ corona.user.group.name+' '+ corona.user.region_point.name">
                                    {{corona.user.name}}
                                </td>

                                <td>
                                    <a href="#" @click="edit(corona)" >
                                        <i class="fa fa-edit blue"></i>
                                    </a>

                                    <a href="#" @click="deleteValue(corona.id)" v-if="!($gate.isBehvarz())">
                                        /    <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <pagination :data="coronas" size="small" :limit="8" @pagination-change-page="getResults"></pagination>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row" v-if="$gate.isAdmin()||$gate.isBehvarz()||$gate.isKarshenasNazer()||($gate.isGroup_admin() && $gate.isBimaVagir())">
            <div class="col-md-6">
                <div class="card">

                    <form @submit.prevent="editmode ? updateValue() : createValue()">
                        <div class="card-header">
                            <h5 class="card-title" v-show="editmode">ویرایش اطلاعات </h5>
                            <h5 class="card-title" v-show="!editmode">ثبت اطلاعات جدید</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('national_code') }" class="form-control" name="national_code"

                                       type="text" v-model="form.national_code">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">کدملی</span>
                                </div>
                                <has-error :form="form" field="national_code"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('first_name') }" class="form-control" name="first_name"

                                       type="text" v-model="form.first_name">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">نام </span>
                                </div>
                                <has-error :form="form" field="first_name"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('last_name') }" class="form-control" name="last_name"
                                       type="text" v-model="form.last_name">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">نام خانوادگی</span>
                                </div>
                                <has-error :form="form" field="last_name"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <select :class="{ 'is-invalid': form.errors.has('sex') }" class="form-control"
                                        name="sex" v-model="form.sex">
                                    <option value="مرد">
                                        مرد
                                    </option>
                                    <option value="زن">
                                        زن
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">جنسیت</span>
                                </div>
                                <has-error :form="form" field="sex"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('birth') }" class="form-control" name="birth"

                                       type="text" v-model="form.birth">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">سال تولد</span>
                                </div>
                                <has-error :form="form" field="birth"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('occupation') }" class="form-control" name="occupation"

                                       type="text" v-model="form.occupation">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">شغل</span>
                                </div>
                                <has-error :form="form" field="occupation"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <select :class="{ 'is-invalid': form.errors.has('hospitalization') }" class="form-control"
                                        name="hospitalization" v-model="form.hospitalization">

                                    <option value="0">
                                        سرپایی
                                    </option>
                                    <option value="1">
                                        بستری
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">وضعیت بستری</span>
                                </div>
                                <has-error :form="form" field="hospitalization"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <select :class="{ 'is-invalid': form.errors.has('situation') }" class="form-control"
                                        name="situation" v-model="form.situation">

                                    <option value="0">
                                        ILI
                                    </option>
                                    <option value="1">
                                        SARI
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">وضعیت بیمار</span>
                                </div>
                                <has-error :form="form" field="situation"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <select :class="{ 'is-invalid': form.errors.has('diagnosis') }" class="form-control"
                                        name="diagnosis" v-model="form.diagnosis">

                                    <option value="1">
                                        corona +
                                    </option>
                                    <option value="2">
                                        corona -
                                    </option>
                                    <option value="0">
                                        منتظر آزمایش
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">تشخیص</span>
                                </div>
                                <has-error :form="form" field="diagnosis"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <select :class="{ 'is-invalid': form.errors.has('status') }" class="form-control"
                                        name="status" v-model="form.status">

                                    <option value="0">
                                        در حال درمان
                                    </option>
                                    <option value="3">
                                        بهبود
                                    </option>
                                    <option value="1">
                                        بستری ویژه
                                    </option>
                                    <option value="4">
                                        بستری در منزل
                                    </option>
                                    <option value="5">
                                        نقاهتگاه
                                    </option>
                                    <option value="2">
                                        مرگ
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">وضعیت درمان</span>
                                </div>
                                <has-error :form="form" field="status"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('expose') }" class="form-control" name="expose"
                                       placeholder="با کاما انگلیسی جدا شود"
                                       type="text" v-model="form.expose">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">کد ملی مواجهین</span>
                                </div>
                                <has-error :form="form" field="expose"></has-error>
                            </div>
                            <div class="input-group mb-3" v-if="(point_selected) || (!editmode)">

                                <select name="county_id" v-model="form.county_id" id="county_id" class="form-control"
                                        ref="c"
                                        :class="{ 'is-invalid': form.errors.has('county_id') }"
                                        @input="$emit('countySelected')">
                                    <option
                                        v-for="g in counties"
                                        :value="g.id"
                                    >
                                        {{g.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">شهرستان</span>
                                </div>
                                <has-error :form="form" field="county_id"></has-error>
                            </div>
                            <div class="input-group mb-3" v-if="county_selected">
                                <select name="type_id" v-model="form.type_id" id="type_id" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('type_id') }"
                                        @change="$emit('typeSelected')">
                                    <option
                                        v-for="g in types"
                                        :value="g.id"
                                        v-if="g.id==5 || g.id==6"
                                    >
                                        {{g.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">نوع</span>
                                </div>
                                <has-error :form="form" field="type_id"></has-error>
                            </div>
                            <div class="input-group mb-3" v-if="type_selected">
                                <select name="center_id" v-model="form.center_id" id="center_id" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('center_id') }"
                                        @change="$emit('centerSelected')">
                                    <option
                                        v-for="g in centers"
                                        :value="g.id"
                                    >
                                        {{g.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">مرکز</span>
                                </div>
                                <has-error :form="form" field="type_id"></has-error>
                            </div>
                            <div class="input-group mb-3" v-show="center_selected">

                                <select name="point_id" v-model="form.point_id" id="point_id" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('point_id') }"
                                        @change="$emit('pointSelected')">
                                    <option
                                        v-for="g in points"
                                        :value="g.id"
                                    >
                                        {{g.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">نقطه</span>
                                </div>
                                <has-error :form="form" field="point_id"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('lat') }" class="form-control" name="lat"

                                       type="text" v-model="form.lat">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">عرض جغرافیایی</span>
                                </div>
                                <has-error :form="form" field="lat"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('lng') }" class="form-control" name="lng"

                                       type="text" v-model="form.lng">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">طول جغرافیایی</span>
                                </div>
                                <has-error :form="form" field="lng"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <date-picker  :auto-submit="true" :class="{ 'is-invalid': form.errors.has('diagnosis_at') }"
                                              v-model="form.diagnosis_at"
                                              format="YYYY-MM-DD"
                                              displayFormat="jYYYY/jMM/jDD"
                                />
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">تاریخ تشخیص</span>
                                </div>
                                <has-error :form="form" field="diagnosis_at"></has-error>
                            </div>
                            <div class="input-group mb-3" v-if="form.status==3 || form.status==2">
                                <date-picker  :auto-submit="true" :class="{ 'is-invalid': form.errors.has('status_at') }"
                                              v-model="form.status_at"
                                              format="YYYY-MM-DD"
                                              displayFormat="jYYYY/jMM/jDD"
                                />
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">تاریخ وضعیت درمان</span>
                                </div>
                                <has-error :form="form" field="status_at"></has-error>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger" @click="closeForm()" type="button">بستن</button>
                            <button class="btn btn-primary" type="submit" v-show="!editmode">ثبت</button>
                            <button class="btn btn-success" type="submit" v-show="editmode">ویرایش</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <l-map
                        :zoom="zoom"
                        :center="center"
                        style="height:950px;width:100%"
                        @update:center="centerUpdate"
                        @update:zoom="zoomUpdate"
                    >
                        <l-tile-layer :key="tileProvider.name"
                                      :name="tileProvider.name"
                                      :url="tileProvider.url"
                                      :visible="tileProvider.visible"
                                      v-for="tileProvider in tileProviders"

                        />
                        <l-marker  :lat-lng="markerLatLng" :draggable="true"  @update:latLng="latlngUpdate">
                        </l-marker>
                        <l-circle
                            :lat-lng="circle.center"
                            :radius="circle.radius"
                            :color="circle.color"
                        />
                    </l-map>
                <div class="row">
                    <div class="col-sm-12">
                    <button @click="
                            tileProviders[1].visible=true,
                            tileProviders[0].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[3].visible=false,
                            tileProviders[4].visible=false" class="btn bg-info btn-sm" type="button">
                        <i class="fa fa-map small"></i>
                    </button>
                    <button @click="
                            tileProviders[2].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[0].visible=false,
                            tileProviders[3].visible=false,
                            tileProviders[4].visible=false" class="btn bg-info btn-sm" type="button">
                        <i class="fa fa-map-o small"></i>
                    </button>
                    <button @click="
                            tileProviders[0].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[3].visible=false,
                            tileProviders[4].visible=false" class="btn bg-info btn-sm" type="button">
                        <i class="fa fa-map-signs small"></i>
                    </button>
                    <button @click="
                            tileProviders[3].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[0].visible=false,
                            tileProviders[4].visible=false" class="btn bg-info btn-sm" type="button">
                        <i class="fa fa-map-marker small"></i>
                    </button>
                    <button @click="
                            tileProviders[4].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[0].visible=false,
                            tileProviders[3].visible=false" class="btn bg-info btn-sm" type="button">
                        <i class="fa fa-map-pin small"></i>
                    </button>
                </div></div>
                </div>
            </div>

            <cd-corona-contact-manage-component :corona_id="corona_id" v-if="editmode"></cd-corona-contact-manage-component>

        </div>
        <div v-if="!($gate.isAdmin()||$gate.isBehvarz()||$gate.isKarshenasNazer()||($gate.isGroup_admin() && $gate.isBimaVagir()))">
            <not-found></not-found>
        </div>
    </div>
    <!-- Button trigger modal -->
</template>

<script>
    import { LMap, LTileLayer, LMarker, LPopup,LIcon,LCircle } from "vue2-leaflet";
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker';

    import { latLng } from "leaflet";
    export default {


        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LIcon,
            LCircle,
            datePicker: VuePersianDatetimePicker
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
                zoom: 14,
                center: latLng(this.$gate.user.region_point.lat, this.$gate.user.region_point.lng),
                //url: "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
                url: "http://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=897f18a7e1c0407286ce168d9fdf1b09",
                attribution:'',
                currentZoom: 9,
                currentCenter: latLng(this.$gate.user.region_point.lat, this.$gate.user.region_point.lng),
                markerLatLng: [this.$gate.user.region_point.lat, this.$gate.user.region_point.lng],
                lat:'',
                lng:'',
                circle: {
                    center: [this.$gate.user.region_point.lat, this.$gate.user.region_point.lng],
                    radius: 100,
                    color: 'yellow',
                },
                num:1,
                editmode: false,
                coronas:{},
                counties: {},
                types: {},
                centers: {},
                points: {},
                county_selected: false,
                type_selected: false,
                center_selected: false,
                point_selected: false,
                user_county: '',
                corona_id:'',
                form: new Form({
                    id: '',
                    national_code: '',
                    first_name: '',
                    last_name: '',
                    birth: '',
                    sex: '',
                    occupation: '',
                    diagnosis: '',
                    hospitalization: '',
                    situation: '',
                    status: '',
                    expose: '',
                    lat: '',
                    lng: '',
                    county_id: '',
                    type_id: '',
                    center_id: '',
                    point_id: '',
                    diagnosis_at:'',
                    status_at:null,

                })
            }
        },
        methods: {
            zoomUpdate(zoom) {
                this.currentZoom = zoom;
            },
            centerUpdate(center) {
                this.currentCenter = center;
            },
            latlngUpdate(latlng) {
                this.markerLatLng = latlng;
                this.form.lat=this.markerLatLng.lat.toFixed(6);
                this.form.lng=this.markerLatLng.lng.toFixed(6);
            },
            getResults(page = 1) {
                if(this.$parent.search)
                    {
                        let query = this.$parent.search;
                        axios.get('api/cd/corona/PaginateByCounty?q=' + query+'&page=' + page)
                            .then((data) => {
                                this.coronas = data.data
                            });
                    }
                    else
                    {
                    axios.get('api/cd/corona/PaginateByCounty?page=' + page)
                        .then(response => {
                            this.coronas = response.data;
                        });
                    }
            },
            edit(value) {
                this.editmode = true;
                this.form.reset();
               // $('#addNew').modal('show');
                this.form.fill(value);
                if(this.form.status_at=="0000-00-00")
                {
                    this.form.status_at='';
                }
                this.markerLatLng.lat=this.form.lat;
                this.markerLatLng.lng=this.form.lng;

            },
            closeForm(){
                this.form.reset();
                this.editmode = false;
            },
            /**/
            updateValue() {
                this.$Progress.start();

                this.form.put('api/cd/corona/' + this.form.id)
                    .then(() => {
                        this.$emit('ValueTableChanged');
                       this.closeForm();
                        toast.fire({
                            type: 'success',
                            title: 'اطلاعات با موفقیت ویرایش شد'
                        });
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },

            deleteValue(id) {
                swal.fire({
                    title: 'آیا اطمینان دارید؟',
                    text: "این عملیات غیر قابل بازگشت است",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله حذف کن!',
                    cancelButtonText: 'بیخیال'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/cd/corona/' + id).then(() => {
                            swal.fire(
                                'پاک شد',
                                'با موفقیت حذف شد',
                                'success'
                            );
                            this.$emit('ValueTableChanged');
                        }).catch(() => {
                            swal("Failed!", "خطایی رخ داده", "warning");
                        });

                    }
                })
            },
            loadValues() {

                    this.$Progress.start();
                    axios.get("api/cd/corona/PaginateByCounty").then(({data}) => (this.coronas = data)).then(() => {
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود لیست کرونا رخ داد'
                        });
                    });

            },
            createValue() {
                this.$Progress.start();
                this.form.post('api/cd/corona')
                    .then(({data}) => (this.corona_id = data))
                    .then(() => {
                        this.$emit('ValueTableChanged');

                        toast.fire({
                            type: 'success',
                            title: 'اطلاعات با موقفیت ثبت شد'
                        });
                       // this.form.reset();
                        this.editmode=true;
                        this.$Progress.finish();

                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });

            },
            loadCounties() {
                this.user_county = this.$gate.user.region_point.region_center.county_id;
                if (this.$gate.isOstan()) {
                    axios.get("api/countyList").then(({data}) => (this.counties = data)).then(() => {
                    }).catch(() => {
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود اطلاعات رخ داد'
                        });
                    });
                } else {
                    axios.get("api/county/" + this.user_county).then(({data}) => (this.counties = data)).then(() => {

                    }).catch(() => {
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود لیست شهرستان رخ داد'
                        });
                    });
                }
                //console.log(this.counties);

            },
            loadTypes() {
                axios.get("api/typeList").then(({data}) => (this.types = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });


            },
            loadCenters() {
                axios.get("api/centerList/" + this.form.county_id + "/" + this.form.type_id).then(({data}) => (this.centers = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
            loadPoints() {
                axios.get("api/pointList/" + this.form.center_id + "/" + this.form.type_id).then(({data}) => (this.points = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
        },
        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/cd/corona/PaginateByCounty?q=' + query)
                    .then((data) => {
                        this.coronas = data.data
                    })
                    .catch(() => {

                    })
            });
            this.loadValues();
            //this.loadItems();
            this.loadCounties();
            this.$on('ValueTableChanged', () => {
                this.loadValues();
            });
            this.$on('countySelected', () => {
//if(this.$refs.c.value){}
                this.loadTypes();
                this.county_selected = true;
                this.type_selected = false;
                this.center_selected = false;
                //  this.point_selected=false;
            });

            this.$on('typeSelected', () => {
                // console.log(this.$refs.c.value);
                this.loadCenters();
                this.type_selected = true;
                this.center_selected = false;
                // this.point_selected=false;
            });
            this.$on('centerSelected', () => {
                this.loadPoints();
                this.center_selected = true;
                // this.point_selected=false;
            });
            this.$on('pointSelected', () => {

                this.point_selected = true;
            });

        }

    }
</script>
