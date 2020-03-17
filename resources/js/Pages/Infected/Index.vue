<template>
    <div>
        <h-title data_source="gis">
            Wykaz zarażeń koronawirusem
        </h-title>

        <div>
            <!-- <h5>{{ date_string }}</h5> -->

            <div class="mb-2">
                <b-progress :max="infected_n" show-value>
                    <b-progress-bar :value="recovered_n" variant="success"></b-progress-bar>
                    <b-progress-bar :value="sick_n" variant="warning"></b-progress-bar>
                    <b-progress-bar :value="dead_n" variant="danger"></b-progress-bar>
                </b-progress>
            </div>

            <b-table-simple small>
                <b-tbody>
                    <b-tr>
                        <td style="width:1%">Przypadków:</td>
                        <td><span class="font-weight-bold bg-secondary text-white px-1">{{ infected_n }}</span></td>
                    </b-tr>
                    <b-tr>
                        <td>Chorych:</td>
                        <td><span class="font-weight-bold bg-warning px-1">{{ sick_n }}</span></td>
                    </b-tr>
                    <b-tr>
                        <td>Wyzdrowień:</td>
                        <td><span class="font-weight-bold bg-success text-white px-1">{{ recovered_n }}</span></td>
                    </b-tr>
                    <b-tr>
                        <td>Zgonów:</td>
                        <td><span class="font-weight-bold bg-danger text-white px-1">{{ dead_n }}</span></td>
                    </b-tr>
                </b-tbody>
            </b-table-simple>
            <!-- <ul>
                <li>Przypadków: <span class="font-weight-bold bg-secondary text-white px-1">{{ infected_n }}</span></li>
                <li>Chorych: <span class="font-weight-bold bg-warning px-1">{{ sick_n }}</span></li>
                <li>Wyzdrowień: <span class="font-weight-bold bg-success text-white px-1">{{ recovered_n }}</span></li>
                <li>Zgonów: <span class="font-weight-bold bg-danger text-white px-1">{{ dead_n }}</span></li>
            </ul> -->
        </div>

        <div class="mb-2">
            <h5 class="mb-0">Wykres aktualnie chorych</h5>
            <GChart
                type="LineChart"
                :data="chart_data"
            />
        </div>

        <div>
            <h5>Tabela zachorowań</h5>

            <div class="mb-1">
                <b-form-input v-model="search" placeholder="Szukaj" />
            </div>

            <b-table-simple hover small caption-top responsive>
                <b-thead head-variant="light">
                    <b-tr>
                        <b-th>Województwo</b-th>
                        <!-- <b-th>Powiat/Miasto</b-th> -->
                        <b-th>Liczba przypadków</b-th>
                        <b-th>Liczba zgonów</b-th>
                    </b-tr>
                </b-thead>
                <b-tbody>
                    <template v-for="(infected, key) in data_filtered">
                        <b-tr :key="infected['Id']">
                            <td>{{ infected['Województwo'] }}</td>
                            <!-- <td>{{ infected['Powiat/Miasto'] }}</td> -->
                            <td>{{ infected['Liczba'] }}</td>
                            <td>{{ infected['Liczba zgonów'] }}</td>
                        </b-tr>
                    </template>
                </b-tbody>
            </b-table-simple>
        </div>
    </div>
</template>

<script>
import { GChart } from 'vue-google-charts'
import Layout from '@/Shared/Layout'
import HTitle from '@/Shared/Header'

export default {
    layout: Layout,
    components: {
        GChart,
        HTitle,
    },
    props: {
        date_string: String,
        data: Array,
        info: Object,
        infected_database: Array,
    },
    data() {
        return {
            search: '',
        }
    },
    computed: {
        data_filtered() {
            return this.data.filter(infected => {
                return infected['Województwo'].toLowerCase().includes(this.search.toLowerCase())
                    // || infected['Powiat/Miasto'].toLowerCase().includes(this.search.toLowerCase())
            })
        },

        chart_data() {
            let array = [ ['Data', 'Chorzy'] ]
            this.infected_database.reverse().forEach((infected_data) => {
                array.push([infected_data.date_shorter, Number(infected_data.sick)])
            })
            array.push(['Teraz', this.sick_n])
            return array
        },

        infected_database2() {
            let array = []
            this.infected_database.forEach((infected_data, i, arr) => {
                if ( ! arr[i + 1]) return
                infected_data.infected_increase = infected_data.infected - arr[i + 1].infected
                array.push(infected_data)
            })
            return array
        },

        infected_n() {
            return this.info['Liczba']
        },
        dead_n() {
            return this.info['Liczba zgonów']
        },
        sick_n() {
            return this.infected_n - this.dead_n - this.recovered_n
        },
        recovered_n() {
            return this.info['recovered']
        },
    },
    watch: {
        search(val) {
            localStorage.search = val
        }
    },
    mounted() {
        if (localStorage.search) {
            this.search = localStorage.search
        }
    },
}
</script>
