<template>
    <div>
        <h-title>Wykaz zarażeń koronawirusem</h-title>

        <div class="mb-2">
            <h5>{{ date_string }}</h5>
            <ul>
                <li>Liczba przypadków: <span class="font-weight-bold bg-secondary text-white px-1">{{ liczba_przypadkow }}</span></li>
                <li>Liczba chorych: <span class="font-weight-bold bg-warning px-1">{{ liczba_chorych }}</span></li>
                <li>Liczba zgonów: <span class="font-weight-bold bg-danger text-white px-1">{{ liczba_zgonow }}</span></li>
            </ul>
            <b-progress :max="liczba_przypadkow" show-value>
                <b-progress-bar :value="liczba_chorych" variant="warning"></b-progress-bar>
                <b-progress-bar :value="liczba_zgonow" variant="danger"></b-progress-bar>
            </b-progress>
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
        liczba_chorych() {
            return this.liczba_przypadkow - this.liczba_zgonow
        },
    },
}
</script>
