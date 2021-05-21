<template>
	<div class="date">
		{{ date | formatDate1 }}
	</div>
</template>

<script>
	export default {
		data: () => ({
			date: new Date(),
		}),
		filters: {
			formatDate1: d => d.toLocaleString('ru-RU').replace(',', '').slice(0, -3)
		}
	}
</script>	