<template>
	<div class="notifications">
		<div class="notifications__control">
			<button class="btn">
				<div class="btn_icon">
					<img src="@/assets/images/svg/plus.svg" alt="add">
				</div>
				Яратиш
			</button>	
			<div class="notificaitons__filters">
				         
			</div>
		</div>		
		<div class="notifications__content">
			<div class="notifications__tabs">
				<b-tabs card>
				 	<b-tab active>
						<template #title>
							<span class="notifications__tab_name">Янги </span>
							<span class="notifications__tab_count">{{processUnits.length}} та</span>
						</template>
						<div class="notifications__tab_content">
							<div 
								class="assignments__units"
								v-for="unit in processUnits"
								:key="unit.index"
							>
								<div class="assignments__units_date">
									{{unit.date}}
								</div>
								<router-link 
									class="assignments__card"
									v-for="card in unit.cards"
									:key="card.index"
									:to="`/notifications/${card.id}`"
								>
									<div class="assignments__card_content">
										<div class="assignments__card_top">
											<div class="assignments__card_time">{{card.time}}</div>
											<div class="assignments__card_number">
												Топшириқ № {{card.number}}
											</div>
										</div>
										<h3 class="assignments__card_name">
											* {{card.name}}
										</h3>
										<div class="assignments__car_line"></div>
										<p class="assignments__card_text">
											{{card.text}}
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
										<div class="assignments__progress">
											<div class="assignments__progress_count" style="width: 100%">
												100%
											</div>
										</div>     
										<div class="assignments__card_count">7/14</div>
									</div>
								</router-link>
							</div>
						</div>
					</b-tab>
					<b-tab>
						<template #title>
							<span class="notifications__tab_name">Архив </span>
							<span class="notifications__tab_count">{{processUnits.length}} та</span>
						</template>
						<div class="notifications__tab_content">
							<div 
								class="assignments__units"
								v-for="unit in processUnits"
								:key="unit.index"
							>
								<div class="assignments__units_date">
									{{unit.date}}
								</div>
								<router-link 
									class="assignments__card"
									v-for="card in unit.cards"
									:key="card.index"
									:to="`/notifications/${card.id}`"
								>
									<div class="assignments__card_content">
										<div class="assignments__card_top">
											<div class="assignments__card_time">{{card.time}}</div>
											<div class="assignments__card_number">
												Топшириқ № {{card.number}}
											</div>
										</div>
										<h3 class="assignments__card_name">
											* {{card.name}}
										</h3>
										<div class="assignments__car_line"></div>
										<p class="assignments__card_text">
											{{card.text}}
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
										<div class="assignments__progress">
											<div class="assignments__progress_count" style="width: 100%">
												100%
											</div>
										</div>     
										<div class="assignments__card_count">7/14</div>
									</div>
								</router-link>
							</div>
						</div>
					</b-tab>
			    </b-tabs>
			</div>	
			<div class="notifications__data">
				<nuxt-child />
				<!-- <div
					v-else
				>
					выберете карточку!
				</div> -->
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				id: '', 
				processUnits: [
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "5",
								id: 5,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 6,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 7,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							}
						]
					},
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "5",
								id: 8,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 9,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 10,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							}
						]
					},
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "5",
								id: 11,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 12,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 13,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							}
						]
					},
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "5",
								id: 14,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 5,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 5,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							}
						]
					}
				],
			}
		}
	}
</script>