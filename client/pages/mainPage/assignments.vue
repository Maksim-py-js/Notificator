<template>
	<div class="assignments">
		<div class="assignments__control">
			<button class="btn" @click="taskModal = !taskModal">
				<div class="btn_icon">
					<img src="@/assets/images/svg/plus.svg" alt="add">
				</div>
				Яратиш
			</button>	
			<div class="assignments__filters">
				         
			</div>
		</div>
		<div class="assignments__tabels">
			<div class="assignments__column">
				<div class="assignments__column_head">
					<div class="assignments__title_box">
						<h3 class="assignments__title">Янги</h3>
						<div class="assignments__count">{{newUnits.length}} та</div>
					</div>
					<input 
						type="text" 
						class="assignments__search"
						v-model="serachText"
						placeholder="Қидирув..." 
					>
					<!-- @input="search(newUnits, serachUnits, serachText)" -->
				</div>
				<div class="assignments__cards">
					<div 
						class="assignments__units"
						v-for="unit in serachUnits"
						:key="unit.index"
					>
						<div class="assignments__units_date">
							{{unit.date}}
						</div>
						<div 
							class="assignments__card"
							v-for="card in unit.cards"
							:key="card.index"
						>
							<div class="assignments__card_content">
								<div class="assignments__card_top">
									<div class="assignments__card_time">{{card.time}}</div>
									<div class="assignments__card_number">
										Топшириқ № {{card.number}}
										<div class="assignments__card_icon">
											<img src="@/assets/images/svg/pen.svg" alt="pen">
										</div>
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
									<div class="assignments__progress_count" style="width: 50%">
										50%
									</div>
								</div>      
								<div class="assignments__card_count">7/14</div>
								<div class="assignments__card_status">
									<img src="@/assets/images/svg/negativeStatus.svg" alt="!">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="assignments__column">
				<div class="assignments__column_head">
					<div class="assignments__title_box">
						<h3 class="assignments__title">Жараёнда</h3>
						<div class="assignments__count">{{processUnits.length}} та</div>
					</div>
					<input 
						type="text" 
						class="assignments__search"
						v-model="serachText"
						placeholder="Қидирув..." 
					>
					<!-- @input="search(newUnits, serachUnits, serachText)" -->
				</div>
				<div class="assignments__cards">
					<div 
						class="assignments__units"
						v-for="unit in processUnits"
						:key="unit.index"
					>
						<div class="assignments__units_date">
							{{unit.date}}
						</div>
						<div 
							class="assignments__card"
							v-for="card in unit.cards"
							:key="card.index"
						>
							<div class="assignments__card_content">
								<div class="assignments__card_top">
									<div class="assignments__card_time">{{card.time}}</div>
									<div class="flex">
										<div class="assignments__card_date">
											<div class="assignments__date_icon">
												<img src="@/assets/images/svg/clock.svg" alt="clock">
											</div>
											{{card.last}}
										</div>
										<div class="assignments__card_number orange">
											Топшириқ № {{card.number}}
										</div>
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
								<div class="assignments__card_status">
									<img src="@/assets/images/svg/ready.svg" alt="!">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="assignments__column">
				<div class="assignments__column_head">
					<div class="assignments__title_box">
						<h3 class="assignments__title">Бажарилган</h3>
						<div class="assignments__count">{{madeUnits.length}} та</div>
					</div>
					<input 
						type="text" 
						class="assignments__search"
						v-model="serachText"
						placeholder="Қидирув..." 
					>
					<!-- @input="search(newUnits, serachUnits, serachText)" -->
				</div>
				<div class="assignments__cards">
					<div 
						class="assignments__units"
						v-for="unit in madeUnits"
						:key="unit.index"
					>
						<div class="assignments__units_date">
							{{unit.date}}
						</div>
						<div                         
							class="assignments__card"
							v-for="card in unit.cards"
							:key="card.index"
						>
							<div class="assignments__card_content">
								<div class="assignments__card_top">
									<div class="assignments__card_time">{{card.time}}</div>
									<div class="assignments__card_number gray">
										Топшириқ № {{card.number}}
									</div>
								</div>
								<h3 class="assignments__card_name">
									* {{card.name}}
								</h3>
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
								<div class="assignments__made_date">
									Бажарилган: {{card.madeDate}}
								</div>      
								<div class="assignments__card_status">
									<img src="@/assets/images/svg/bigChek.svg" alt="!">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="assignments__column expired">
				<div class="assignments__column_head expired_head">
					<div class="assignments__title_box">
						<h3 class="assignments__title">Бажарилган</h3>
						<div class="assignments__count">{{expiredUnits.length}} та</div>
					</div>
					<input 
						type="text" 
						class="assignments__search"
						v-model="serachText"
						placeholder="Қидирув..." 
					>
					<!-- @input="search(newUnits, serachUnits, serachText)" -->

					<div class="assignments__cards">
						<div 
							class="expired__card"
							v-for="item in expiredUnits"
							:key="item.index" 
						>
							<div 
								style="display: flex; justify-content: space-between;"
							>
								<div class="expired__data">
									<div class="expired__name">{{item.name}}</div>
									<div class="expired__position">{{item.position}}</div>
								</div>
								<div class="expired__count">{{item.units.length}}</div>
							</div>
							<button 
								class="expired__button" 
								:active="item.active.toString()" 
								@click="item.active = !item.active"
							>
								<img src="@/assets/images/svg/moreArray.svg" alt="more">
							</button>
							<div 
								class="expired__more" 
								:active="item.active.toString()"
							>
								<li 
									class="expired__table_item"
									v-for="(unit, index) in item.units"
									:key="index"
								>
									<div class="expired__item_name">{{index + 1}}.Топшириқ № {{unit.number}}</div>
									<div class="expired__item_cuunt">{{unit.expired}} кун</div>
								</li>	
								<!-- <ul class="expired__more_table">
									
								</ul> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div 
			class="task-modal__view" 
    		:active="`${taskModal}`" 
		>	
			<div 
				class="task-modal__content"
    			:active="`${taskModal}`" 
			>
				<h3 class="task-modal__title">Топшириқ яратиш</h3>
				<div class="task-modal__inputs">
					<input 
						type="text" 
						placeholder="топшириқ номи" 
						class="task-modal__name"
					>
					<div class="task-modal__input-box">
						<div class="task-modal__input-name">Муддат</div>
						<input 
							type="number" 
							class="task-modal__count"
							placeholder="6" 
						>
					</div>
					<!-- <div class="task-modal__input-box">
						<div class="task-modal__input-name">Кун</div>
						<div
							class="task-modal__date"
						>
							
						</div>
						<b-calendar
					      :date-format-options="{ year: 'numeric', month: 'short', day: '2-digit', weekday: 'short' }"
					      locale="en"
					    ></b-calendar>
					</div> -->
					<div class="task-modal__input-box">
						<div class="task-modal__input-name">Вақт</div>
						<input 
							type="time" 
							class="task-modal__time"
						>
					</div>
				</div>
				<div class="flex">
					<div class="task-modal__data">
						<h3 class="task-modal__title">Топшириқ матни</h3>
						<div class="task-modal__text-field">
							<tiptap-vuetify
								v-model="content"
								:extensions="extensions"
						    />
						</div>
						<div 
							class="file"
							@click="chooseFile"
						>
							<input 
								type="file" 
								class="file__input"
								ref="fileInput"
								@input="onSelectFile"
							>
							<span class="file__text">
								<div class="file__icon">
									<img src="@/assets/images/svg/clip.svg" alt="slag">
								</div>
								Файл бириктириш
							</span>
						</div>
						<ul>
							<li class="selectedFile">
								<span>Баён бўйича... .doc</span>
								<button class="delFile">
									<div class="delFile-icon">
										<img src="@/assets/images/svg/closeModal.svg" alt="delete">
									</div>
								</button>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { TiptapVuetify, Heading, Bold, Italic, Strike, Underline, Code, Paragraph, BulletList, OrderedList, ListItem, Link, Blockquote, HardBreak, HorizontalRule, History } from 'tiptap-vuetify'
	export default {
		components: { TiptapVuetify },
		data() {
			return {
				extensions: [
					History,
					Blockquote,
					Link,
					Underline,
					Strike,
					Italic,
					ListItem,
					BulletList,
					OrderedList,
					[Heading, {
					options: {
					levels: [1, 2, 3]
					}
					}],
					Bold,
					Code,
					HorizontalRule,
					Paragraph,
					HardBreak
				],
				// starting editor's content
				content: ``,
				chooseFiles: [],
				file: [],


				taskModal: true,
				activeMore: false,
				serachText: '',
				newUnits: [
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: 8,
								time: "12:08",
								name: "Аппарат йиғилишида баёни игорь",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							},
							{
								number: 7,
								time: "08:00",
								name: "Аппарат йиғилишида баёни павлик",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							},
							{
								number: 6,
								time: "17:21",
								name: "Аппарат йиғилишида баёни игорь",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							}
						]
					},
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: 8,
								time: "12:08",
								name: "Аппарат йиғилишида баёни макс",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							},
							{
								number: 7,
								time: "08:00",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							},
							{
								number: 6,
								time: "17:21",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							}
						]
					},
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: 8,
								time: "12:08",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							},
							{
								number: 7,
								time: "08:00",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							},
							{
								number: 6,
								time: "17:21",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							}
						]
					},
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: 8,
								time: "12:08",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							},
							{
								number: 7,
								time: "08:00",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							},
							{
								number: 6,
								time: "17:21",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ҳар бирига масъулларни ........"
							}
						]
					}
				],
				serachUnits: [],
				processUnits: [
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "5",
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
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
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
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
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
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
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							}
						]
					}
				],
				madeUnits: [
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "2",
								name: "Аппарат йиғилишида баёни",
								time: "09:40",
								madeDate: "20.04.21 й"
							},
							{
								number: "2",
								name: "Аппарат йиғилишида баёни",
								time: "09:40",
								madeDate: "20.04.21 й"
							},
							{
								number: "2",
								name: "Аппарат йиғилишида баёни",
								time: "09:40",
								madeDate: "20.04.21 й"
							},
						]
					},
					{
						date: "2020 й 20 мая",
						cards: [
							{
								number: "2",
								name: "Аппарат йиғилишида баёни",
								time: "09:40",
								madeDate: "20.04.21 й"
							},
							{
								number: "2",
								name: "Аппарат йиғилишида баёни",
								time: "09:40",
								madeDate: "20.04.21 й"
							},
							{
								number: "2",
								name: "Аппарат йиғилишида баёни",
								time: "09:40",
								madeDate: "20.04.21 й"
							},
						]
					},
					{
						date: "2020 й 20 мая",
						cards: [
							{
								number: "2",
								name: "Аппарат йиғилишида баёни",
								time: "09:40",
								madeDate: "20.04.21 й"
							},
							{
								number: "2",
								name: "Аппарат йиғилишида баёни",
								time: "09:40",
								madeDate: "20.04.21 й"
							},
							{
								number: "2",
								name: "Аппарат йиғилишида баёни",
								time: "09:40",
								madeDate: "20.04.21 й"
							},
						]
					}
				],
				expiredUnits: [
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					},
					{
						name: "Махмудов Сирожиддин Адхамович",
						position: "Электрон ҳокимиятни ривожлантириш маркази директори",
						active: false,
						units: [
							{
								number: "3",
								expired: "-1"
							},
							{
								number: "4",
								expired: "-1"
							},
							{
								number: "5",
								expired: "-1"
							},
							{
								number: "6",
								expired: "-1"
							}
						]
					}
				]
			}
		},
		mounted() {
			this.serachUnits = [...this.newUnits];
		},
		methods: {
			search(arr, searchArr, searchValue) {
				if(searchValue != '') {
					// console.log(searchArr);
					searchArr.forEach(date => {
						
					});
				} else {
					searchArr = [...arr];
					console.log(searchArr);
				}

				// this.serachUnits = [...arr];
				// if(this.serachText != '') {
				// 	this.serachUnits.splice(0, this.serachUnits.length)
				// 	arr.forEach(date => {
				// 		date.cards.forEach(card => {
				// 			if(card.name.toString().search(this.serachText) != -1 || card.time.toString().search(this.serachText) != -1 || card.text.toString().search(this.serachText) != -1) {
				// 				date.cards.push(card);
				// 				this.serachUnits.push(date);

				// 			} 
				// 		});
				// 	});
				// } else {
				// 	this.serachUnits.push(...arr);
				// }

			},

			chooseFile () {
              this.$refs.fileInput.click();
              // console.log(this.developer.logo);
            },
            onSelectFile () {
                const input = this.$refs.fileInput;
                const files = input.files;

                if (files && files[0]) {
                    this.chooseFiles.push(files[0]);

                    const reader = new FileReader;
                    reader.readAsDataURL(files[0]);
                    this.$emit('input', files[0]);
                }
            }
		}
	}
</script>