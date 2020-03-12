<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="dark" :fixed="$page.agent.is_mobile ? 'bottom' : 'top'">
            <b-navbar-brand @click="redirect(route('home'))" href="javascript:void(0)">Koronawirus</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item @click="redirect(route('infected.index'))" href="javascript:void(0)">Wykaz zarażeń</b-nav-item>
                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <!-- <b-navbar-nav class="ml-auto">
                    <b-nav-item-dropdown text="Lang" right>
                        <b-dropdown-item href="#">EN</b-dropdown-item>
                        <b-dropdown-item href="#">ES</b-dropdown-item>
                        <b-dropdown-item href="#">RU</b-dropdown-item>
                        <b-dropdown-item href="#">FA</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav> -->
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
export default {
    props: {
        url: String,
    },
    methods: {
        redirect(url, method = 'get') {
            this.$inertia.visit(url, {
                method,
                data: {},
            })
        },

        isUrl(...urls) {
            if (urls[0] === '') {
                return this.url === ''
            }

            return urls.filter(url => this.url.startsWith(url)).length
        },
    },
}
</script>
