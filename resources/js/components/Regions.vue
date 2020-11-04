<template>
    <!-- /.content-header -->
    <div class="container">
        <div id="isAdmin" v-if="$gate.isAdmin()">
            <div class="row">

                <div class="col-md-3">
                    <div class="card bg-info-gradient">
                        <div class="card-header ui-sortable-handle">
                            <h3 class="card-title">
                                <!--   <i class="fa fa-home"></i>-->
                                <!--  <i class="fa fa-building"></i>-->
                                <i class="fa fa-university yellow"></i>
                                شهرستانها
                            </h3>

                            <div class="card-tools">
                                <button class="btn bg-info btn-sm" data-widget="collapse" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-info btn-block btn-sm county" type="button" v-for="r in counties"
                                    :ref="'c'+r.id" :value="r.id" @click="loadTypes(r.id)">{{r.name}}
                            </button>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-transparent">
                            <div class="row" v-if="$gate.isOstan()">
                                <div class="col-md-12 text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm" @click="modalCounty" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                            <i class="fa fa-plus"></i>
                                        </button>

                                        <button class="btn btn-warning btn-sm" @click="editmodalCounty"
                                                data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-tag"></i>
                                        </button>

                                        <button class="btn btn-danger btn-sm" @click="deleteCounty(county_id)">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success-gradient " v-bind:class="{ 'collapsed-card': typeIsNotActive }">
                        <div class="card-header ui-sortable-handle">
                            <h3 class="card-title">
                                <!--   <i class="fa fa-home"></i>-->
                                <i class="fa fa-building "></i>
                                <!--<i class="fa fa-university yellow"></i>-->
                                نوع مکانها
                            </h3>

                            <div class="card-tools">
                                <button class="btn btn-success btn-sm" data-widget="collapse" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <button class="btn btn-success btn-block btn-sm type" type="button" v-for="r in types"
                                    :ref="'t'+r.id" v-if="$gate.isOstan() || r.id!=11" @click="loadCenters(r.id)">{{r.name}}
                            </button>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-transparent">
                            <div class="row" v-if="$gate.isOstan()">
                                <div class="col-md-12 text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm" @click="modalType" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                            <i class="fa fa-plus"></i>
                                        </button>

                                        <button class="btn btn-warning btn-sm" @click="editmodalType"
                                                data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-tag"></i>
                                        </button>

                                        <button class="btn btn-danger btn-sm" @click="deleteType(type_id)">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info-gradient" v-bind:class="{ 'collapsed-card': centerIsNotActive }">
                        <div class="card-header ui-sortable-handle">
                            <h3 class="card-title">
                                <i class="fa fa-hospital-o yellow"></i>
                                <!--  <i class="fa fa-building"></i>-->
                                <!--<i class="fa fa-university"></i>-->
                                مراکز
                            </h3>

                            <div class="card-tools">
                                <button class="btn bg-info btn-sm" data-widget="collapse" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div v-if="centers[0]">
                                <button class="btn btn-info btn-block btn-sm center" type="button" v-for="r in centers"
                                        v-if="r.id" :ref="'ce'+r.id" @click="loadPoints(r.id,type_id),loadPoints2(r.id)">{{r.name}}
                                </button>
                            </div>
                            <div v-else>چیزی برای نمایش وجود ندارد</div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-transparent" v-show="(type_id!=5)&&(type_id!=6)&&(type_id!=12)">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm" @click="modalCenter" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                            <i class="fa fa-plus"></i>
                                        </button>

                                        <button class="btn btn-warning btn-sm" @click="editmodalCenter"
                                                data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-tag"></i>
                                        </button>

                                        <button class="btn btn-danger btn-sm" @click="deleteCenter(center_id)">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success-gradient " v-bind:class="{ 'collapsed-card': pointIsNotActive }">
                        <div class="card-header ui-sortable-handle">
                            <h3 class="card-title">
                                <!--   <i class="fa fa-home"></i>-->
                                <i class="fa fa-home "></i>
                                <!--<i class="fa fa-university yellow"></i>-->
                                نقاط
                            </h3>

                            <div class="card-tools">
                                <button class="btn btn-success btn-sm" data-widget="collapse" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div v-if="points[0]">
                                <button class="btn btn-success btn-block btn-sm po" type="button" @click="pointed(r.id)"
                                        v-for="r in points" :ref="'po'+r.id"
                                        :value="r.id">{{r.name}}
                                </button>
                            </div>
                            <div v-else>چیزی برای نمایش وجود ندارد</div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-transparent">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm" @click="modalPoint" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                            <i class="fa fa-plus"></i>
                                        </button>

                                        <button class="btn btn-warning btn-sm" @click="editmodalPoint"
                                                data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-tag"></i>
                                        </button>

                                        <button class="btn btn-danger btn-sm" @click="deletePoint(point_id)">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>

            </div> <!-- end row -->
            <!-- Modal county -->
            <div class="modal rtl fade" id="modalCounty" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">ویرایش نام شهرستان</h5>
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ایجاد شهرستان جدید</h5>

                        </div>
                        <form @submit.prevent="editmode ? updateCounty() : createCounty()">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.name" type="text" name="name"
                                           placeholder="نام"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.lat" type="text" name="lat"
                                           placeholder="lat"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('lat') }">
                                    <has-error :form="form" field="lat"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.lng" type="text" name="lng"
                                           placeholder="lng"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('lng') }">
                                    <has-error :form="form" field="lng"></has-error>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                                <button type="submit" v-show="!editmode" class="btn btn-primary">ایجاد</button>
                                <button type="submit" v-show="editmode" class="btn btn-success">ویرایش</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /Modal county -->
            <!-- Modal type -->
            <div class="modal rtl fade" id="modalType" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">ویرایش نوع</h5>
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ایجاد نوع جدید</h5>

                        </div>
                        <form @submit.prevent="editmode ? updateType() : createType()">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.name" type="text" name="name"
                                           placeholder="نام"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                                <button type="submit" v-show="!editmode" class="btn btn-primary">ایجاد</button>
                                <button type="submit" v-show="editmode" class="btn btn-success">ویرایش</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /Modal county -->
            <!-- Modal center -->
            <div class="modal rtl fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">ویرایش مرکز</h5>
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ایجاد مرکز جدید</h5>

                        </div>
                        <form @submit.prevent="editmode ? updateCenter() : createCenter()">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.name" type="text" name="name"
                                           placeholder="نام"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                                <button type="submit" v-show="!editmode" class="btn btn-primary">ایجاد</button>
                                <button type="submit" v-show="editmode" class="btn btn-success">ویرایش</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /Modal county -->
            <!-- Modal point -->
            <div class="modal rtl fade" id="modalPoint" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">ویرایش نقطه</h5>
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ایجاد نقطه جدید</h5>

                        </div>
                        <form @submit.prevent="editmode ? updatePoint() : createPoint()">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form.name" type="text" name="name"
                                           placeholder="نام"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.lat" type="text" name="lat"
                                           placeholder="lat"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('lat') }">
                                    <has-error :form="form" field="lat"></has-error>
                                </div>
                                <div class="form-group">
                                    <input v-model="form.lng" type="text" name="lng"
                                           placeholder="lng"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('lng') }">
                                    <has-error :form="form" field="lng"></has-error>
                                </div>
                                <div class="form-group" v-if="(type_id!=12)">
                                    <input v-model="form.device_id" type="text" name="device_id"
                                           placeholder="device_id"
                                           class="form-control" :class="{ 'is-invalid': form.errors.has('device_id') }">
                                    <has-error :form="form" field="device_id"></has-error>
                                </div>
                                <div class="form-group" v-if="(type_id==12)">
                                    <div class="input-group mb-3">
                                        <select name="point_id" v-model="form.point_id" id="point_id" class="form-control"
                                                :class="{ 'is-invalid': form.errors.has('point_id') }">
                                            <option
                                                v-for="g in points2"
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
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                                <button type="submit" v-show="!editmode" class="btn btn-primary">ایجاد</button>
                                <button type="submit" v-show="editmode" class="btn btn-success">ویرایش</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /Modal county -->

        </div> <!-- end is admin -->
        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>

    </div>

</template>

<script>
    export default {
        data() {
            return {
                counties: {},
                county: '',
                types: {},
                type: '',
                typeIsNotActive: true,
                centers: {},
                center: '',
                centerIsNotActive: true,
                points: {},
                points2: {},
                point: '',
                pointIsNotActive: true,
                type_id: '',
                center_id: '',
                county_id: '',
                point_id: '',

                sel: '',
                sel2: '',
                sel3: '',
                sel4: '',
                editmode: false,
                form: new Form({
                    id: '',
                    name: '',
                    county_id: '',
                    type_id: '',
                    center_id: '',
                    lat: '',
                    lng: '',
                    device_id: '',
                    point_id: '',

                }),
                countyById: [],
                centerByCountyId: {},
                typeById: [],
                centerByTypeId: {},
                centerById: [],
                pointByCenterId: {},
                pointById: [],


            }
        },
        methods: {
            loadCounties() {
                axios.get("api/countyList").then(({data}) => (this.counties = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });


            },
            loadTypes(county_id) {
                axios.get("api/typeList").then(({data}) => (this.types = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });
                axios.get("api/county/" + county_id).then(({data}) => (this.countyById = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });
                this.typeIsNotActive = false;
                this.centerIsNotActive = true;
                this.pointIsNotActive = true;
                this.county_id = county_id;

                this.sel = this.$el.querySelector('.county.btn-warning');
                if (this.sel) {
                    this.sel.classList.remove('btn-warning');
                    this.sel.classList.add('btn-info');
                }

                //console.log(this.sel);
                this.$refs['c' + county_id][0].classList.add('btn-warning');
                this.$refs['c' + county_id][0].classList.remove('btn-info');

                this.sel2 = this.$el.querySelector('.type.btn-warning');
                if (this.sel2) {
                    this.sel2.classList.remove('btn-warning');
                    this.sel2.classList.add('btn-success');
                }

                this.sel3 = this.$el.querySelector('.center.btn-warning');
                if (this.sel3) {
                    this.sel3.classList.remove('btn-warning');
                    this.sel3.classList.add('btn-info');
                }

            },

            loadCenters(type_id) {
                axios.get("api/centerList/" + this.county_id + '/' + type_id).then(({data}) => (this.centers = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });
                axios.get("api/type/" + type_id).then(({data}) => (this.typeById = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });
                this.centerIsNotActive = false;
                this.pointIsNotActive = true;
                this.type_id = type_id;

                //start reest for next type selection
                this.center_id = '';
                this.centerByCountyId = {};
                this.centerByTypeId = {};
                this.centerById = [];
                this.sel3 = this.$el.querySelector('.center.btn-warning');
                if (this.sel3) {
                    this.sel3.classList.remove('btn-warning');
                    this.sel3.classList.add('btn-info');
                }
                //end reest for next type selection

                this.sel2 = this.$el.querySelector('.type.btn-warning');
                if (this.sel2) {
                    this.sel2.classList.remove('btn-warning');
                    this.sel2.classList.add('btn-success');
                }
                //console.log(this.sel);

                this.$refs['t' + type_id][0].classList.add('btn-warning');
                this.$refs['t' + type_id][0].classList.remove('btn-success');
            },
            loadPoints(center_id,type_id) {
                axios.get("api/pointList/" + center_id+"/"+type_id).then(({data}) => (this.points = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

                axios.get("api/center/" + center_id).then(({data}) => (this.centerById = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

                //start reset for next center selection
                this.sel4 = this.$el.querySelector('.po.btn-warning');
                if (this.sel4) {
                    this.sel4.classList.remove('btn-warning');
                    this.sel4.classList.add('btn-success');
                }
                this.pointByCenterId = {};
                this.pointById = [];
                this.point_id = '';
                //end reset for next center selection

                this.center_id = center_id;
                this.pointIsNotActive = false;
                this.sel3 = this.$el.querySelector('.center.btn-warning');
                if (this.sel3) {
                    this.sel3.classList.remove('btn-warning');
                    this.sel3.classList.add('btn-info');
                }
                //console.log(this.sel);
                this.$refs['ce' + center_id][0].classList.add('btn-warning');
                this.$refs['ce' + center_id][0].classList.remove('btn-info');

            },
            loadPoints2(center_id) {
                axios.get("api/pointList/" + center_id+"/5").then(({data}) => (this.points2 = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });
            },
            pointed(point_id) {
                axios.get("api/point/" + point_id).then(({data}) => (this.pointById = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });
                this.point_id = point_id;
                this.sel4 = this.$el.querySelector('.po.btn-warning');
                if (this.sel4) {
                    this.sel4.classList.remove('btn-warning');
                    this.sel4.classList.add('btn-success');
                }
                //console.log(this.sel);
                this.$refs['po' + point_id][0].classList.add('btn-warning');
                this.$refs['po' + point_id][0].classList.remove('btn-success');

            },
            modalCounty() {
                this.editmode = false;
                this.form.reset();
                $('#modalCounty').modal('show');
            },
            modalType() {
                this.editmode = false;
                this.form.reset();
                $('#modalType').modal('show');
            },
            modalCenter() {
                this.editmode = false;
                this.form.reset();
                $('#modalCenter').modal('show');
            },
            modalPoint() {
                this.editmode = false;
                this.form.reset();
                $('#modalPoint').modal('show');
            },
            editmodalCounty() {
                if (this.countyById.id) {
                    //console.log();
                    this.editmode = true;
                    this.form.reset();
                    $('#modalCounty').modal('show');
                    this.form.fill(this.countyById);
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'لطفا یک مورد برای ویرایش انتخاب نمائید'
                    });
                }

            },
            editmodalType() {
                if (this.typeById.id) {
                    //console.log();
                    this.editmode = true;
                    this.form.reset();
                    $('#modalType').modal('show');
                    this.form.fill(this.typeById);
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'لطفا یک مورد برای ویرایش انتخاب نمائید'
                    });
                }

            },
            editmodalCenter() {
                if (this.centerById.id) {
                    //console.log();
                    this.editmode = true;
                    this.form.reset();
                    $('#modalCenter').modal('show');
                    this.form.fill(this.centerById);
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'لطفا یک مورد برای ویرایش انتخاب نمائید'
                    });
                }

            },
            editmodalPoint() {
                if (this.pointById.id) {
                    //console.log();
                    this.editmode = true;
                    this.form.reset();
                    $('#modalPoint').modal('show');
                    this.form.fill(this.pointById);
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'لطفا یک مورد برای ویرایش انتخاب نمائید'
                    });
                }

            },
            createCounty() {
                this.$Progress.start();
                this.form.post('api/county')
                    .then(() => {
                        this.$emit('CountyTableChanged');
                        $('#modalCounty').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'شهرستان با موفقیت افزوده شد'
                        });
                        this.$Progress.finish();

                    })
                    .catch(() => {
                    });

            },
            createType() {
                this.$Progress.start();
                this.form.post('api/type')
                    .then(() => {
                        this.$emit('TypeTableChanged');
                        $('#modalType').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'نوع با موفقیت افزوده شد'
                        });
                        this.$Progress.finish();

                    })
                    .catch(() => {
                    });

            },
            createCenter() {
                this.$Progress.start();
                this.form.county_id = this.county_id;
                this.form.type_id = this.type_id;
                this.form.post('api/center')
                    .then(() => {
                        this.$emit('CenterTableChanged');
                        $('#modalCenter').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'مرکز با موفقیت افزوده شد'
                        });
                        this.$Progress.finish();

                    })
                    .catch(() => {
                    });

            },
            createPoint() {
                this.$Progress.start();
                this.form.center_id = this.center_id;
                this.form.type_id = this.type_id;
                this.form.post('api/point')
                    .then(() => {
                        this.$emit('PointTableChanged');
                        $('#modalPoint').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'نقطه با موفقیت افزوده شد'
                        });
                        this.$Progress.finish();

                    })
                    .catch(() => {
                        toast.fire({
                            type: 'error',
                            title: 'خطا در ثبت'
                        });
                        this.$Progress.fail();
                    });

            },
            updateCounty() {
                this.$Progress.start();
                //console.log('editmode');
                this.form.put('api/county/' + this.form.id)
                    .then(() => {
                        this.$emit('CountyTableChanged');
                        $('#modalCounty').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'شهرستان با موفقیت ویرایش شد'
                        });
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });

            },
            updateType() {
                this.$Progress.start();
                //console.log('editmode');
                this.form.put('api/type/' + this.form.id)
                    .then(() => {
                        this.$emit('TypeTableChanged');
                        $('#modalType').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'نوع با موفقیت ویرایش شد'
                        });
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });

            },
            updateCenter() {
                this.$Progress.start();
                //console.log('editmode');
                this.form.put('api/center/' + this.form.id)
                    .then(() => {
                        this.$emit('CenterTableChanged');
                        $('#modalCenter').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'مرکز با موفقیت ویرایش شد'
                        });
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });

            },
            updatePoint() {
                this.$Progress.start();
                //console.log('editmode');
                this.form.put('api/point/' + this.form.id)
                    .then(() => {
                        this.$emit('PointTableChanged');
                        $('#modalPoint').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'نقطه با موفقیت ویرایش شد'
                        });
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });

            },
            deleteCounty(id) {
                if (id) {
                    axios.get("api/center/county/" + id).then(({data}) => (this.centerByCountyId = data)).then(() => {
                        if (this.centerByCountyId[0].id) {

                            swal.fire(
                                'اخطار',
                                'ابتدا مراکز زیر مجموعه را حذف نمائید',
                                'warning'
                            );
                        }

                    }).catch(() => {

                    });


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
                            this.form.delete('/api/county/' + id).then(() => {
                                swal.fire(
                                    'پاک شد',
                                    'با موفقیت حذف شد',
                                    'success'
                                );
                                this.$emit('CountyTableChanged');
                                this.county_id = '';
                            }).catch(() => {
                                swal("Failed!", "خطایی رخ داده", "warning");
                            });

                        }
                    })
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'لطفا یک مورد برای حذف انتخاب نمائید'
                    });
                }
            },
            deleteType(id) {
                if (id) {
                    axios.get("api/center/type/" + id).then(({data}) => (this.centerByTypeId = data)).then(() => {
                        if (this.centerByTypeId[0].id) {

                            swal.fire(
                                'اخطار',
                                'ابتدا مراکز زیر مجموعه را حذف نمائید',
                                'warning'
                            );
                        }

                    }).catch(() => {

                    });


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
                            this.form.delete('/api/type/' + id).then(() => {
                                swal.fire(
                                    'پاک شد',
                                    'با موفقیت حذف شد',
                                    'success'
                                );
                                this.$emit('TypeTableChanged');
                                this.type_id = '';
                            }).catch(() => {
                                swal("Failed!", "خطایی رخ داده", "warning");
                            });

                        }
                    })
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'لطفا یک مورد برای حذف انتخاب نمائید'
                    });
                }
            },
            deleteCenter(id) {
                if (id) {
                    axios.get("api/point/center/" + id).then(({data}) => (this.pointByCenterId = data)).then(() => {
                        if (this.pointByCenterId[0].id) {

                            swal.fire(
                                'اخطار',
                                'ابتدا مراکز زیر مجموعه را حذف نمائید',
                                'warning'
                            );
                        }

                    }).catch(() => {

                    });


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
                            this.form.delete('/api/center/' + id).then(() => {
                                swal.fire(
                                    'پاک شد',
                                    'با موفقیت حذف شد',
                                    'success'
                                );
                                this.$emit('CenterTableChanged');
                                this.type_id = '';
                            }).catch(() => {
                                swal("Failed!", "خطایی رخ داده", "warning");
                            });

                        }
                    })
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'لطفا یک مورد برای حذف انتخاب نمائید'
                    });
                }
            },
            deletePoint(id) {
                if (id) {
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
                        if (result.value && this.type_id==12) {
                        // if (result.value) {
                        // if (1==2) {
                            this.form.delete('/api/point/' + id).then(() => {
                                swal.fire(
                                    'پاک شد',
                                    'با موفقیت حذف شد',
                                    'success'
                                );
                                this.$emit('PointTableChanged');
                                this.point_id = '';
                            }).catch(() => {
                                swal("Failed!", "خطایی رخ داده", "warning");
                            });

                        }
                    })
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'لطفا یک مورد برای حذف انتخاب نمائید'
                    });
                }
            },
        },


        created() {
            this.loadCounties();
            this.$on('CountyTableChanged', () => {
                this.loadCounties();
                this.typeIsNotActive = true;
                //this.loadTypes(this.county_id);
            });
            this.$on('TypeTableChanged', () => {
                //this.loadCounties();
                this.loadTypes(this.county_id);
            });
            this.$on('CenterTableChanged', () => {
                //this.loadCounties();
                this.loadCenters(this.type_id);
            });
            this.$on('PointTableChanged', () => {
                //this.loadCounties();
                this.loadPoints(this.center_id,this.type_id);
            });
        }
    }

</script>
