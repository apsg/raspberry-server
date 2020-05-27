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
                            yAxisId: 'y-temp',
                        },
                        {
                            data: [],
                            label: 'Wilgotnosc [%]',
                            pointBackgroundColor: '#00ff00',
                            pointBorderColor: '#00ff00',
                            borderColor: '#00ff00',
                            yAxisId: 'y-hum',
                        }
                    ],
                },
                options: {
                    scales: {
                        xAxes: [{
                            type: 'time'
                        }],
                        yAxes: [
                            {
                                id: 'y-temp',
                                type: 'linear',
                                position: 'left',
                                scalePositionLeft: true,
                                ticks: {
                                    min: 0,
                                    max: 40
                                }
                            },
                            {
                                id: 'y-hum',
                                type: 'linear',
                                position: 'right',
                                scalePositionLeft: false,
                                ticks: {
                                    min: 0,
                                    max: 100
                                },
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
                    this.data.labels = this.measurements.map(function (item) {
                        return new Date(item.created_at);
                    });
                    this.data.datasets[0].data = this.measurements.map(function (item) {
                        return item.temp;
                    });
                    this.data.datasets[1].data = this.measurements.map(function (item) {
                        return item.humidity
                    });
                    this.renderChart(this.data, this.options)
                });
            }
        }
    }
</script>

<style>
</style>
