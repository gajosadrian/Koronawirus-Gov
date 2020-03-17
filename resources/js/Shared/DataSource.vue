<template>
    <div>
        <small v-if="source" class="text-secondary">
            Źródło:
            <span v-if="source == 'gov'">www.gov.pl/web/koronawirus</span>
            <span v-if="source == 'gis'">Główny Inspektorat Sanitarny</span>
        </small>
    </div>
</template>

<script>
export default {
    props: {
        source: String,
    },
}
</script>
