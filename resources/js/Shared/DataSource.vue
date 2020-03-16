<template>
    <div>
        <small v-if="source" class="text-secondary">
            Źródło:
            <span v-if="source == 'gov'">https://www.gov.pl/web/koronawirus</span>
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
