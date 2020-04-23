

        <bar :chart-data="datacollection"></bar>




<script>


    import { Pie, Bar, mixins } from 'vue-chartjs'
    export default {
        components: {
                Bar
        },
        extends: Bar,
        mixins: [mixins.reactiveData],
        data () {

            return {
                datacollection: null,
                    user_county_id:'',
                    county_id:'2',
                markers: {},
                chartData:null
            }
        },
        created () {

                this.newCasePerDiagnosis();

        },
        methods: {
            newCasePerDiagnosis(){
                    if(this.$gate.isOstan()){
                            this.user_county_id= 9;
                    }
                    else{
                            this. user_county_id=this.$gate.user.region_point.region_center.county_id;

                    }       axios.get("/api/cd/corona/newCasePerDiagnosis/"+this.user_county_id).then(({data}) => (this.markers = data)).then(() => {
                    //  console.log(this.markers);

                    this.chartData = {
                        labels: this.markers[0].map(item => item.diagnosis_at),
                        datasets: [{
                            label: 'covid19',
                            backgroundColor: '#080979',
                            data: this.markers[0].map(item=> item.count)
                        }
                            /*,{
                                label: 'سرپایی مثبت',
                                backgroundColor: '#e87979',
                                data: this.markers[1].map(item=> item.count)
                          },{
                                label: 'بستری مثبت',
                                backgroundColor: '#5879f9',
                                data: this.markers[2].map(item=> item.count)
                            }*/
						]
                    }
                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود نقاط رخ داد'
                    });
                });


            },


        }
    }
</script>

