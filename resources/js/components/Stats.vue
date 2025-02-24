<script>
    import { defineComponent } from 'vue';
    import moment from 'moment';

    import {
        Chart as ChartJS,
        CategoryScale,
        LinearScale,
        PointElement,
        LineElement,
        Title,
        Tooltip,
        Legend
    } from 'chart.js'

    import { Line } from 'vue-chartjs'

    ChartJS.register(
        CategoryScale,
        LinearScale,
        PointElement,
        LineElement,
        Title,
        Tooltip,
        Legend
    )

    export default defineComponent({
		components: {
            Line,
		},
		data: () => ({
            options: {
                responsive: true,
                maintainAspectRatio: false
            },
            stats: {
                labels: [
                    moment().subtract(6, 'd').format('dddd'),
                    moment().subtract(5, 'd').format('dddd'),
                    moment().subtract(4, 'd').format('dddd'), 
                    moment().subtract(3, 'd').format('dddd'), 
                    moment().subtract(2, 'd').format('dddd'), 
                    moment().subtract(1, 'd').format('dddd'), 
                    moment().format('dddd'),
                ],
                datasets: [
                    {
                    label: 'Data One',
                    backgroundColor: '#f87979',
                    data: [40, 39, 10, 40, 39, 80, 40]
                    },
                ]
            },
		}),
		computed: {
			
		},
		mounted() {
            
		},
		methods: {
          
            // fillDates() {

            //     for (let i = 0; i < 7; i++) {
            //         console.log(i);
            //         this.stats.labels.push(moment().subtract(i, 'd').format('dddd'));
            //     }
            // }
		}
	});

</script>


<template>

    <Line :data="stats" :options="options" />

</template>