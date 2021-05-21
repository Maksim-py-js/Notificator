<template>
	<div class="form">
		<h2 class="form__title">Топшириқ</h2>
		<h3 class="form__two_title">Кириш</h3>
		<div class="form__input_box">
			<div class="form__lable">Телефон рақами</div>
			<div class="form__input_group">
				<input type="text" class="form__input" placeholder="+998 93 371 63 63">
				<button class="form__input_button">
					<div class="form__input_button_icon">
						<img src="@/assets/images/svg/arrayWhite.svg" alt="array">
					</div>
				</button>
			</div>
		</div>
		<div class="form__error">
			<div class="form__error_title">
				<div class="form__error_icon">
					<img src="@/assets/images/svg/error.svg" alt="Error">
				</div>
				Кечирасиз!
			</div>
			<span class="form__error_text">Тизимда бундай фойдаланувчи мавжуд эмас!</span>
		</div>
		<p class="form__text">
			Тизимдан фойдаланиш учун администратордан рухсат олиш талаб этилади! боғланиш учун телефон +99873 244 05 35
		</p>
	</div>
</template>

<script>
	export default {
		layout: 'default'
	}
</script>