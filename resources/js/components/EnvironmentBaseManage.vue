<template>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div id="isAdmin" v-if="$gate.isAdmin()||($gate.isGroup_admin() && $gate.isEnvironment())||($gate.isMarkaz() && $gate.isEnvironment())">
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
                                        v-if="r.id" :ref="'ce'+r.id" @click="loadPoints(r.id,type_id)">{{r.name}}
                                </button>
                            </div>
                            <div v-else>چیزی برای نمایش وجود ندارد</div>
                        </div>
                        <!-- /.card-body -->

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
                                    <div class="btn-group" v-if="(type_id==5)||(type_id==6)||(type_id==12)">

                                        <button v-if="pointById.environment_base" class="btn btn-warning btn-sm" @click="editmodalPoint"
                                                data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-tag"></i>
                                        </button>
                                        <button v-else-if="point_id" class="btn btn-warning btn-sm" @click="modalPoint"
                                                data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-plus"></i>
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
            <!-- Modal point -->
            <div class="modal rtl fade" id="modalPoint" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="editmode">ویرایش اطلاعات پایه بهداشت محیط </h5>
                            <h5 class="modal-title" v-show="!editmode">ثبت اطلاعات پایه بهداشت محیط </h5>

                        </div>
                        <form @submit.prevent="editmode ? updatePoint() : createPoint()">
                            <div class="modal-body">
                                <div class="form-group input-group">
                                    <select :class="{ 'is-invalid': form.errors.has('covered') }" class="form-control"
                                            name="covered" v-model="form.covered">
                                        <option value="1">
                                            آبفا
                                        </option>
                                        <option value="2">
                                            هیئت امنا
                                        </option>
                                        <option value="3">
                                            دهیاری
                                        </option>
                                        <option value="4">
                                            شورا
                                        </option>
                                        <option value="5">
                                            غیره
                                        </option>
                                    </select>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text pl-5">تحت پوشش</span>
                                    </div>
                                    <has-error :form="form" field="covered"></has-error>
                                </div>
                                <div class="form-group input-group">
                                    <select :class="{ 'is-invalid': form.errors.has('piping') }" class="form-control"
                                            name="piping" v-model="form.piping">
                                        <option value="1">
                                            دارد
                                        </option>
                                        <option value="2">
                                            ندارد
                                        </option>
                                    </select>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text pl-5">لوله کشی</span>
                                    </div>
                                    <has-error :form="form" field="piping"></has-error>
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
        <div v-if="!($gate.isAdmin()||($gate.isGroup_admin() && $gate.isEnvironment())||($gate.isMarkaz() && $gate.isEnvironment()))">
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
                    covered: '',
                    piping: '',

                }),
                countyById: [],
                centerByCountyId: {},
                typeById: [],
                centerByTypeId: {},
                centerById: [],
                pointByCenterId: {},
                pointById: [],
                covered: '',
                piping: '',

            }
        },
        methods: {
            loadCounties() {
                axios.get("/api/countyList").then(({data}) => (this.counties = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });


            },
            loadTypes(county_id) {
                axios.get("/api/typeList").then(({data}) => (this.types = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });
                axios.get("/api/county/" + county_id).then(({data}) => (this.countyById = data)).then(() => {
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
                axios.get("/api/centerList/" + this.county_id + '/' + type_id).then(({data}) => (this.centers = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });
                axios.get("/api/type/" + type_id).then(({data}) => (this.typeById = data)).then(() => {
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

                axios.get("/api/pointList/" + center_id+"/"+type_id).then(({data}) => (this.points = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

                axios.get("/api/center/" + center_id).then(({data}) => (this.centerById = data)).then(() => {
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
            pointed(point_id) {
                axios.get("/api/point/" + point_id).then(({data}) => (this.pointById = data)).then(() => {
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
            modalPoint() {
                this.editmode = false;
                this.form.reset();
                $('#modalPoint').modal('show');
            },
            editmodalPoint() {
                if (this.pointById.id) {
                    //console.log();
                    this.editmode = true;
                    this.form.reset();
                    $('#modalPoint').modal('show');
                    this.form.fill(this.pointById.environment_base);
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'لطفا یک مورد برای ویرایش انتخاب نمائید'
                    });
                }

            },
            createPoint() {
                this.$Progress.start();
                this.form.point_id = this.point_id;

                this.form.post('/api/environment/base')
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
            updatePoint() {
                this.$Progress.start();
                //console.log('editmode');
                this.form.put('/api/environment/base/' + this.form.id)
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
