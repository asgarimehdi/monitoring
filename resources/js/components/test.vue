<template>
  <!-- /.content-header -->
  <div class="container">
    <div class="row mt-5"  v-if="$gate.isAdminOrGroup_admin()">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
تست قشنگ
            </h3>

<div class="card bg-info-gradient">
              <div class="card-header no-border ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fa fa-th mr-1"></i>
                  نمودار فروش
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="line-chart" style="height: 250px;"><svg height="250" version="1.1" width="493.75" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.25px; top: -0.666687px;"><desc>Created with Raphaël 2.1.0</desc><defs></defs><text style="text-anchor: end; font: 10px Open Sans;" x="40" y="214" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5">0</tspan></text><path style="" fill="none" stroke="#efefef" d="M52.5,214H468.75" stroke-width="0.4"></path><text style="text-anchor: end; font: 10px Open Sans;" x="40" y="166.75" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5">5,000</tspan></text><path style="" fill="none" stroke="#efefef" d="M52.5,166.75H468.75" stroke-width="0.4"></path><text style="text-anchor: end; font: 10px Open Sans;" x="40" y="119.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5">10,000</tspan></text><path style="" fill="none" stroke="#efefef" d="M52.5,119.5H468.75" stroke-width="0.4"></path><text style="text-anchor: end; font: 10px Open Sans;" x="40" y="72.25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5">15,000</tspan></text><path style="" fill="none" stroke="#efefef" d="M52.5,72.25H468.75" stroke-width="0.4"></path><text style="text-anchor: end; font: 10px Open Sans;" x="40" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5">20,000</tspan></text><path style="" fill="none" stroke="#efefef" d="M52.5,25H468.75" stroke-width="0.4"></path><text style="text-anchor: middle; font: 10px Open Sans;" x="392.39570148346917" y="226.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan dy="3.5">2013</tspan></text><text style="text-anchor: middle; font: 10px Open Sans;" x="207.27393549693684" y="226.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="10px" font-family="Open Sans" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan dy="3.5">2012</tspan></text><path style="" fill="none" stroke="#efefef" d="M52.5,188.8063C64.12806630044048,188.5417,87.38419890132145,190.40038657417895,99.01226520176193,187.74790000000002C110.64560022277352,185.09421157417896,133.91227026479672,168.75597277486912,145.5456052858083,167.5816C157.05775973368435,166.41946027486912,180.0820686294365,180.64437566376745,191.59422307731253,178.40185C203.10110880461747,176.16035066376745,226.1148802592274,151.88164418127988,237.62176598653232,149.6455C249.2498322869728,147.3858066812799,272.50596488785374,158.06834493204983,284.1340311882942,160.4185C295.7673662093058,162.76971993204984,319.03403625132904,179.61644712041885,330.66737127234063,168.451C342.1795257202167,157.40185962041883,365.2038346159688,78.53041943325661,376.71598906384486,71.56015C388.09642549744314,64.66963193325661,410.85729836463975,105.24759742386078,422.237734798238,113.00785C433.8658010986785,120.93695992386078,457.1219336995595,128.9901625,468.75,134.3176" stroke-width="2"></path><circle cx="52.5" cy="188.8063" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle><circle cx="99.01226520176193" cy="187.74790000000002" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle><circle cx="145.5456052858083" cy="167.5816" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle><circle cx="191.59422307731253" cy="178.40185" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle><circle cx="237.62176598653232" cy="149.6455" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle><circle cx="284.1340311882942" cy="160.4185" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle><circle cx="330.66737127234063" cy="168.451" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle><circle cx="376.71598906384486" cy="71.56015" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle><circle cx="422.237734798238" cy="113.00785" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle><circle cx="468.75" cy="134.3176" r="4" fill="#efefef" stroke="#efefef" style="" stroke-width="1"></circle></svg><div class="morris-hover morris-default-style" style="left: 322.632px; top: 81px; display: none;"><div class="morris-hover-row-label">2012 Q4</div><div class="morris-hover-point" style="color: #efefef">
  Item 1:
  15,073
</div></div></div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; -moz-appearance: none;"></div>

                    <div class="text-white">سفارش ایمیلی</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; -moz-appearance: none;"></div>

                    <div class="text-white">سفارش آنلاین</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; -moz-appearance: none;"></div>

                    <div class="text-white">سفارش فیزیکی</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <div class="form-group">
              <select name="region" v-model="region" id="region" class="form-control" @change="loadRoles">
                <option value="">انتخاب نقش</option>
                <option
                        v-for="r in regions"
                        :value="r.id"
                >
                  {{r.name}}
                </option>
              </select>

            </div>

              <div class="form-role">
              <select name="role" v-model="role" id="name" class="form-control" v-if="region">
                <option value="">انتخاب نوع مرکز</option>
                <option
                        v-for="n in roles"
                        :value="n.id"
                >
                  {{n.name}}
                </option>
              </select>

            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer" >


{{now}}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div v-if="!$gate.isAdminOrGroup_admin()">
      <not-found></not-found>
    </div>

  </div>
</template>

<script>
  export default {
    data () {
      return {
        roles:{},
        groups:{},
        regions:{},
          role:'',
          group:'',
          region:''
        }

    },
    methods:{

      loadRoles(){
          axios.get("api/roleList").then(({data}) => (this.roles = data)).then(() => {
          }).catch(() => {
            toast.fire({
              type: 'error',
              title: 'خطایی در لود اطلاعات رخ داد'
            });
          });

       },
      loadNames(){
          axios.get("api/groupList").then(({data}) => (this.groups = data)).then(() => {
          }).catch(() => {
            toast.fire({
              type: 'error',
              title: 'خطایی در لود اطلاعات رخ داد'
            });
          });

       },
      loadRegions(){
          axios.get("api/regionList").then(({data}) => (this.regions = data)).then(() => {
          }).catch(() => {
            toast.fire({
              type: 'error',
              title: 'خطایی در لود اطلاعات رخ داد'
            });
          });

       },

    },
      computed: {
          now: function () {
              return Date.now()
          }
      },
    created(){

      this.loadRegions();

      }


     // setInterval(()=>this.loadUsers(),5000);
  }


</script>
