<script>
    import {Line} from 'vue-chartjs'

    export default {
        extends: Line,

        props: [],

        data() {
            return {
                'measurements': [],
                'data': {
                    datasets: [
                        {
                            data: [],
                            label: 'Temperatura [oC]',
                            pointBackgroundColor: '#ff0000',
                            pointBorderColor: '#ff0000',
                            borderColor: '#ff0000',
                            yAxisId:0,
                            yAxesGroup: 'A',
                        },
                        {
                            data: [],
                            label: 'Wilgotnosc [%]',
                            pointBackgroundColor: '#00ff00',
                            pointBorderColor: '#00ff00',
                            borderColor: '#00ff00',
                            yAxesGroup: 'B',
                        }
                    ],
                },
                'options': {
                    scales: {
                        xAxes: [{
                            type: 'time'
                        }],
                        yAxes: [
                            {
                                name: 'Temperatura',
                                type: 'linear',
                                position: 'left',
                                scalePositionLeft: true
                            },
                            {
                                name: 'Wilgotność',
                                type: 'linear',
                                position: 'right',
                                scalePositionLeft: false,
                                min: 0,
                                max: 100
                            }
                        ]
                    }
                }
            }
        },

        mounted() {
            this.loadData();
        },

        methods: {
            loadData() {
                axios.get('/api/measurements').then(response => {
                    console.log(response.data);
                    this.measurements = response.data;
                    this.data.datasets[0].data = this.measurements.map(function (item) {
                        return {
                            x: new Date(item.created_at),
                            y: item.temp
                        }
                    });
                    this.data.datasets[1].data = this.measurements.map(function (item) {
                        return {
                            x: new Date(item.created_at),
                            y: item.humidity
                        }
                    });
                    this.renderChart(this.data, this.options)
                });
            }
        }
    }
</script>

<style>
</style>
