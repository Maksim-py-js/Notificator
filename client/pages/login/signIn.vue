<template>
	<div class="form">
		<h2 class="form__title">Топшириқ</h2>
		<h3 class="form__two_title">Кириш</h3>
		<div class="form__input_box signIn">
			<div class="form__lable">Телефон рақами</div>
			<input type="text" class="form__input signIn" placeholder="+998 93 371 63 63">
		</div>
		<div class="form__input_box signIn">
			<div class="form__lable">Парол</div>
			<input type="text" class="form__input signIn" placeholder="Паролни киритинг">
		</div> 
		<div class="form__footer">
			<div>
				<label class="container form_check">
					Эслаб қолиш
					<input type="checkbox">
					<span class="checkmark"></span>
				</label>
			</div>
			<button class="form__button">Кириш</button>
		</div> 
	</div>
</template>

<script>
	export default {
		layout: 'default'
	}
</script>