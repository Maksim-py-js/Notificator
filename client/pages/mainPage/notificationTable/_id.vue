<template>
	<div class="notification_table">
		<div 
			class="assignments__card"
		>
			<div class="assignments__card_content">
				<div class="assignments__card_top">
					<div class="assignments__card_time">21.04.2021 12:45</div>
					<div class="assignments__card_number">
						Хабарнома № {{id}}
						<div class="assignments__card_icon">
							<img src="@/assets/images/svg/pen.svg" alt="pen">
						</div>
					</div>
				</div>
				<h3 class="assignments__card_name">
					* Аппарат йиғилиши
				</h3>
				<p class="assignments__card_text">
					Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни бириктириш ва доимий тарзда назорат ўрнатиш вазифалари юклатилсин
				</p>
			</div>
			<div class="assignments__card_footer">
				<button class="assignments__file_btn">
					<div class="assignments__file_icon">
						<img src="@/assets/images/svg/clip.svg" alt="clip">
					</div>
					<div class="assignments__file_text">
						илова
					</div>
				</button>
				<div class="flex">
					<div class="assignments__progress bigCard">
						<div class="assignments__progress_count" style="width: 100%">
							100%
						</div>
					</div>     
					<div class="assignments__card_count">7/14</div> 
				</div>
				<div class="assignments__card_lable">
					Архивга
				</div>
			</div>
		</div>
		<div class="table scroll">
			<div class="table__td table__discription">
				<div class="table__discription_item">Дастур</div>
				<div class="table__discription_item">СМС</div>
			</div>
			<div class="table__td table__head">
				<div class="table__title nameTr">Ф.И.О</div>
				<div class="table__title positionTr">Ташкилот номи</div>
				<div class="table__title dateTr">Етказилди</div>
				<div class="table__title dateTr">Танишди</div>
				<div class="table__title dateTr">Юборилди</div>
				<div class="table__title dateTr">Танишди</div>
			</div>
			<div class="table__border">
				<div 
					class="table__td table__data"
					v-for="item in tableData"
					:key="item.index"
				>
					<div class="nameData nameTr">{{item.name}}</div>
					<div class="positionData positionTr">{{item.position}}</div>
					<div class="dateData dateTr">{{item.delivered}}</div>
					<div class="dateData dateTr borderTr">{{item.met}}</div>
					<div class="dateData dateTr">{{item.sent}}</div>
					<div class="dateData dateTr">{{item.smsMet}}</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		async asyncData({ params }) {
	        const id = params.id   
	        return { id }    
	    },
		data() {
			return {
				tableData: [
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					},
					{
						name: 'Махмудов Сирожиддин Адхамович',
						position: 'Электрон ҳокимиятни ривожлантириш маркази директори',
						delivered: '20.04.21 11:48',
						met: '20.04.21 11:48',
						sent: '20.04.21 11:48',
						smsMet: '20.04.21 11:48'
					}
				]
			}
		}
	}
</script>