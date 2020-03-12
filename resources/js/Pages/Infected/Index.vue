<template>
    <div>
        <h-title>Wykaz zarażeń koronawirusem</h-title>

        <div>
            <h5>{{ date_string }}</h5>
            <ul>
                <li>Liczba przypadków: <span class="font-weight-bold">{{ liczba_przypadkow }}</span></li>
                <li>Liczba zgonów: <span class="font-weight-bold text-danger">{{ liczba_zgonow }}</span></li>
            </ul>
        </div>

        <div class="mb-1">
            <b-form-input v-model="search" placeholder="Szukaj" />
        </div>

        <b-table-simple hover small caption-top responsive>
            <b-thead head-variant="light">
                <b-tr>
                    <b-th>Województwo</b-th>
                    <b-th>Powiat/Miasto</b-th>
                    <b-th>Liczba przypadków</b-th>
                    <b-th>Liczba zgonów</b-th>
                </b-tr>
            </b-thead>
            <b-tbody>
                <template v-for="(infected, key) in data">
                    <b-tr :key="key">
                        <td>{{ infected['Województwo'] }}</td>
                        <td>{{ infected['Powiat/Miasto'] }}</td>
                        <td>{{ infected['Liczba'] }}</td>
                        <td>{{ infected['Liczba zgonów'] }}</td>
                    </b-tr>
                </template>
            </b-tbody>
        </b-table-simple>
    </div>
</template>

<script>
import Layout from '@/Shared/Layout'
import HTitle from '@/Shared/Header'

export default {
    layout: Layout,
    components: {
        HTitle,
    },
    props: {
        date_string: String,
        data: Array,
    },
    data() {
        return {
            search: '',
        }
    },
    computed: {
        liczba_przypadkow() {
            let sum = 0
            this.data.forEach(infected => {
                sum += Number(infected['Liczba'])
            });
            return sum
        },
        liczba_zgonow() {
            let sum = 0
            this.data.forEach(infected => {
                sum += Number(infected['Liczba zgonów'])
            });
            return sum
        },
    },
}
</script>
