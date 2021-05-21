<template>
	<div class="main_admin">
		<div class="main_admin__header">
			<h2 class="main_admin__title">
				Админ панель
			</h2>
			<div class="main_admin__header-nav">
				<date/>
				<div class="main_admin__user">
					<img src="@/assets/images/svg/userIcon.svg" alt="user">
				</div>				
			</div>
		</div>
		<div class="main_admin__content">
			<div class="main_admin__data">
				<div class="main_admin__card" v-for="card in dataCards" :key="card.index">
					<div class="main_admin__card-icon">
						<!-- <img :src="card.icon" alt="icon"> -->
						<img src="@/assets/images/svg/main-admin/cardIcon.svg" alt="icon">
					</div>
					<div class="main_admin__card-count">{{card.count}}</div>
					<h3 class="main_admin__card-title">{{card.title}}</h3>
				</div>
			</div>
		</div>
		<div class="main_admin__tables">
			<div class="main_admin__tables_head">
				<div class="main_admin__tables_title">Модератор</div>
				<div class="main_admin__tables_nav">
					<b-input-group size="sm" class="main_admin__tables_search">
						<b-form-input
							id="filter-input"
							v-model="moderatorsFilter"
							type="text"
							placeholder="Type to Search"
						></b-form-input>

						<b-input-group-append>
							<b-button @click="moderatorsFilter = ''">Излаш</b-button>
						</b-input-group-append>
					</b-input-group>
					<button class="btn" @click="$bvModal.show('addModerators')">
						<div class="btn_icon">
							<img src="@/assets/images/svg/plus.svg" alt="add">
						</div>
						Яратиш
					</button>
				</div>
			</div>
			<div class="main_admin__tableBorder">
				<div>
					<h3 class="main_admin__table_name">
						Топ
					</h3>
					<b-table
		                :items="moderators"
		                :fields="moderatorsFields"
		                :filter="moderatorsFilter"
		                :filter-included-fields="moderatorsFilterOn"
		                :sort-by.sync="moderatorsSortBy"
		                :sort-desc.sync="moderatorsSortDesc"
		                :sort-direction="moderatorsSortDirection"
		                stacked="md"
		                show-empty
		                small
		                table-variant=""
		                tbody-tr-class="main_admin__table_tr"
		         	>
		         		<template #cell(name)="row">
		                    {{ row.value }}
		                </template>

		                <template #cell(name)="row">
		                	<div class="main_admin__td_box">
			                    <div class="main_admin__number">
			                    	{{ row.index + 1 }}
			                    </div>                                       
			                    <div>
			                    	<div class="main_admin__user_position">
			                    		Вилоят ҳокимлиги  ахборот тахлил
			                    	</div>
			                    	<div class="main_admin__user_name">
			                    		{{row.item.name}}
			                    	</div>
			                    </div>
		                	</div>
		                </template>

		                <template #cell(units)="row">
		                    <div class="main_admin__check_marker" v-if="row.item.units">
		                    	<img src="@/assets/images/svg/checkMark.svg" alt="check">
		                    </div>
		                </template>
		                <template #cell(notifications)="row">
		                    <div class="main_admin__check_marker" v-if="row.item.notifications">
		                    	<img src="@/assets/images/svg/checkMark.svg" alt="check">
		                    </div>
		                </template>
		                <template #cell(contacts)="row">
		                    <div class="main_admin__check_marker" v-if="row.item.contacts">
		                    	<img src="@/assets/images/svg/checkMark.svg" alt="check">
		                    </div>
		                </template>
		                <template #cell(message_count)="row">
		                    <div class="main_admin__message_count">
		                    	{{row.item.message_count}}
		                    </div>
		                </template>
		                <template #cell(status)="row">
		                	<div 
		                		class="switch" 
		                		:active="`${row.item.status}`" 
		                		@click="() => { 
		                			row.item.status = !row.item.status;
		                			activeModeratorsItem(row.index, row.item.status);
		                		}"
		                	>
								<div 
									class="slider" 
								></div>
							</div>
		                </template>	
		                <template #cell(menu)="row">
		                	<div class="main_admin__menu_btn">
		                		<img src="@/assets/images/svg/menuDots.svg" alt="menu">
			                	<div class="main_admin__menu_table">
			                		<button class="main_admin__menu_item">
			                			Редактировать
			                		</button>
			                		<button class="main_admin__menu_item">
			                			Удалить
			                		</button>
			                	</div>
		                	</div>
		                </template>	
					</b-table>
				</div>
				<div class="main_admin__table_options">
					<div class="main_admin__quantity_item">
						<div class="main_admin__quantity_text">Кўрсатиш:</div>
						<select 
							name="quantity" 
							id="quantity" 
						>
							<option  
								v-for="item in quantityItems"
							>
								{{item}}
							</option>
						</select>
					</div>
					<div class="main_admin__pagination">
						<div class="main_admin__pagination_data">
							1-8 of {{moderatorsRows}}
						</div>
						<div class="main_admin__pagination_nav"></div>
					</div>
					<!-- <b-pagination
				      v-model="moderatorsCurrentPage"
				      :total-rows="moderatorsRows"
				      :per-page="moderatorsPerPage"
				      aria-controls="my-table"
				    ></b-pagination> -->
				</div>
			</div>
		</div>

		<div class="main_admin__tables">
			<div class="main_admin__tables_head">
				<div class="main_admin__tables_title">Фойдаланувчилар</div>
				<div class="main_admin__tables_nav">
					<b-input-group size="sm" class="main_admin__tables_search">
						<b-form-input
							id="filter-input"
							v-model="moderatorsFilter"
							type="text"
							placeholder="Type to Search"
						></b-form-input>

						<b-input-group-append>
							<b-button @click="moderatorsFilter = ''">Излаш</b-button>
						</b-input-group-append>
					</b-input-group>
					<button class="btn marginRL" @click="$bvModal.show('addSection')">
						<div class="btn_icon">
							<img src="@/assets/images/svg/plus.svg" alt="add">
						</div>
						Бўлим
					</button>
					<button class="btn" @click="$bvModal.show('addContact')">
						<div class="btn_icon">
							<img src="@/assets/images/svg/plus.svg" alt="add">
						</div>
						Ҳодим
					</button>   
				</div>
			</div>
			<div class="main_admin__tableBorder">
				<div>
					<h3 class="main_admin__table_name">
						Топшириқлар
					</h3>
					<b-table
		                :items="users"
		                :fields="usersFields"
		                :filter="usersFilter"
		                :filter-included-fields="usersFilterOn"
		                :sort-by.sync="usersSortBy"
		                :sort-desc.sync="usersSortDesc"
		                :sort-direction="usersSortDirection"
		                stacked="md"
		                show-empty
		                small
		                table-variant=""
		                tbody-tr-class="main_admin__user_table_tr"
		         	>
		         		<template #cell(name)="row">
		                    {{ row.value }}
		                </template>

		                <template #cell(name)="row">
		                	<div class="main_admin__td_box">
			                    <button class="main_admin__open_data" @click="row.toggleDetails">
			                    	<img v-if="!row.detailsShowing" src="@/assets/images/svg/plusDark.svg" alt="open">
			                    	<img v-else src="@/assets/images/svg/minus.svg" alt="open">
			                    </button>                                       
			                    <div>
			                    	<div class="main_admin__user_position">
			                    		{{row.item.name}}
			                    	</div>
			                    </div>
		                	</div>
		                </template>

		                <template #row-details="row">
							<div 
								class="main_admin__user_subtable" 
								v-for="(elem, index) in row.item.subTable"
								:key="index"
								:active="elem.status.toString() && row.item.status.toString()"
							>
								<div class="main_admin__table_content">
									<div class="main_admin__td_box">
					                    <div class="main_admin__number">
					                    	{{ index + 1 }}
					                    </div>                                       
					                    <div>
					                    	<div class="main_admin__user_position">
					                    		{{elem.position}}
					                    	</div>
					                    	<div class="main_admin__user_name">
					                    		{{elem.position}}
					                    	</div>
					                    </div>
				                	</div>
				                	<div class="main_admin__right_data">
				                		<div class="main_admin__user_data">{{elem.phoneNumber}}</div>
				                		<div class="main_admin__user_data">{{elem.password}}</div>
				                		<div class="main_admin__user_date">
				                			<div>{{elem.lastTime}}</div>
				                			<div>{{elem.lastDate}}</div>
					                    </div>
					                    <div class="main_admin__user_data">
						                    <div 
						                		class="switch" 
						                		:active="`${elem.status && row.item.status}`" 
						                		@click="() => { 
						                			elem.status = !elem.status;
						                		}"
						                	>
												<div 
													class="slider" 
												></div>
											</div>
					                    </div>
					                    <div class="main_admin__user_data">
					                    	<div class="main_admin__menu_btn">
						                		<img src="@/assets/images/svg/menuDots.svg" alt="menu">
							                	<div class="main_admin__menu_table">
							                		<button class="main_admin__menu_item">
							                			Редактировать
							                		</button>
							                		<button class="main_admin__menu_item">
							                			Удалить
							                		</button>
							                	</div>
						                	</div>
					                    </div>
				                	</div>
				                </div>
							</div>
						</template>

		                <template #cell(status)="row">
		                	<div 
		                		class="switch" 
		                		:active="`${row.item.status}`" 
		                		@click="() => { 
		                			row.item.status = !row.item.status;
		                			activeUsersItem(row.index, row.item.status);
		                		}"
		                	>
								<div 
									class="slider" 
								></div>
							</div>
		                </template>	

		                <template #cell(menu)="row">
		                	<div class="main_admin__menu_btn">
		                		<img src="@/assets/images/svg/menuDots.svg" alt="menu">
			                	<div class="main_admin__menu_table">
			                		<button class="main_admin__menu_item">
			                			Редактировать
			                		</button>
			                		<button class="main_admin__menu_item">
			                			Удалить
			                		</button>
			                	</div>
		                	</div>
		                </template>	
					</b-table>
				</div>
				<div class="main_admin__table_options">
					<div class="main_admin__quantity_item">
						<div class="main_admin__quantity_text">Кўрсатиш:</div>
						<select 
							name="quantity" 
							id="quantity" 
						>
							<option  
								v-for="item in quantityItems"
							>
								{{item}}
							</option>
						</select>
					</div>
					<div class="main_admin__pagination">
						<div class="main_admin__pagination_data">
							1-8 of 1240
						</div>
						<div class="main_admin__pagination_nav"></div>
					</div>
					<!-- <b-pagination
				      v-model="moderatorsCurrentPage"
				      :total-rows="moderatorsRows"
				      :per-page="moderatorsPerPage"
				      aria-controls="my-table"
				    ></b-pagination> -->
				</div>
			</div>
		</div>
		<b-modal body-class="moderators_modal" size="xl" id="addModerators" hide-header hide-footer centered>
			<div class="moderators_modal__header">
				<h2 class="moderators_modal__title">
					Модератор қўшиш
				</h2>
				<button class="moderators_modal__close" @click="$bvModal.hide('addModerators')">
					<div class="moderators_modal__close_icon">
						<img src="@/assets/images/svg/closeModal.svg" alt="close">
					</div>	
				</button>
			</div>
			<div class="moderators_modal__inputs">
				<input type="text" class="moderators_modal__input" placeholder="Ташкилот номи">
				<input type="text" class="moderators_modal__input" placeholder="Бўлим номи">
				<input type="text" class="moderators_modal__input" placeholder="Лавозими">
				<input type="text" class="moderators_modal__input" placeholder="Ф.И.Ш">
				<h2 class="moderators_modal__second_title">Актив модуллар:</h2>
				<input type="text" class="moderators_modal__input" placeholder="Телефон рақами">
			</div>
			<div class="moderators_modal__modals">
				<div class="moderators_modal__item permissions">
					<span class="moderators_modal__item_title">Топшириқ</span>
					<div 
		        		class="switch big" 
		        		:active="`${active}`" 
		        		@click="() => { 
		        			active = !active;
		        		}"
		        	>
						<div 
							class="slider" 
						></div>
					</div>
				</div>
				<div class="moderators_modal__item permissions">
					<span class="moderators_modal__item_title">Контактлар</span>
					<div 
		        		class="switch big" 
		        		:active="`${active}`" 
		        		@click="() => { 
		        			active = !active;
		        		}"
		        	>
						<div 
							class="slider" 
						></div>
					</div>
				</div>
				<div class="moderators_modal__item permissions">
					<span class="moderators_modal__item_title">Хабарнома</span>
					<div 
		        		class="switch big" 
		        		:active="`${active}`" 
		        		@click="() => { 
		        			active = !active;
		        		}"
		        	>
						<div 
							class="slider" 
						></div>
					</div>
				</div>


				<div class="moderators_modal__item">
					<span class="moderators_modal__item_title">Индекс</span>
					<input type="text" class="moderators_modal__item_input" placeholder="ВХ/АТ">
				</div>
				<div class="moderators_modal__item">
					<span class="moderators_modal__item_title">СМС</span>
					<input type="number" class="moderators_modal__item_input">
					<span class="moderators_modal__item_title">дона</span>
				</div>
			</div>
			<div class="moderators_modal__footer">
				<button class="btn light">Бекор қилиш</button>
				<div class="moderators_modal__switch">
					<div class="moderators_modal__switch_text">Статус</div>
					<div 
		        		class="switch big" 
		        		:active="`${active}`" 
		        		@click="() => { 
		        			active = !active;
		        		}"
		        	>
						<div 
							class="slider" 
						></div>
					</div>
				</div>
				<div class="moderators_modal__footer_buttons">
					<button class="moderators_modal__footer__button">Тозалаш</button>
					<button class="moderators_modal__footer__button active">Сақлаш</button>
				</div>
			</div>
		</b-modal>
		<b-modal body-class="section" size="xl" id="addSection" hide-header hide-footer centered>
			<div class="section__header">
				<h2 class="section__title">
					Бўлим қўшиш
				</h2>
				<button class="section__close" @click="$bvModal.hide('addSection')">
					<div class="section__close_icon">
						<img src="@/assets/images/svg/closeModal.svg" alt="close">
					</div>	
				</button>
			</div>
			<div class="section__form">
				<div class="section__left">
					<input 
						type="text" 
						class="section__input" 
						v-model="sectionInput" 
						@keyup.enter="addSection()"
						placeholder="Ташкилот номи"
					>
					<div class="section__feeld">
						<div class="section__item" v-for="(item, index) in sections" :key="index">
							<div class="section__name">{{item.name}}</div>
							<button class="section__delete" @click="deleteSection(index)">
								<div class="section__delete_icon">
									<img src="@/assets/images/svg/closeModal.svg" alt="close">
								</div>	
							</button>
						</div>
					</div>
				</div>
				<div class="section__right">
					<input 
						type="text" 
						class="section__input" 
						v-model="positionInput" 
						@keyup.enter="addPosition()"
						placeholder="Лавозими"
					>
					<div class="section__feeld">
						<div class="section__item" v-for="(position, index) in positions" :key="index">
							<div class="section__name">{{position.name}}</div>
							<button class="section__delete" @click="daletePosition(index)">
								<div class="section__delete_icon">
									<img src="@/assets/images/svg/closeModal.svg" alt="close">
								</div>	
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="section__footer">
				<button class="section__light_btn">Бекор қилиш</button>
				<button class="section__footer__button active">ОК</button>
			</div>
		</b-modal>
		<b-modal body-class="contact" size="xl" id="addContact" hide-header hide-footer centered>
			<div class="contact__header">
				<h2 class="contact__title">
					Фойдаланувчи қўшиш
				</h2>
				<button class="contact__close" @click="$bvModal.hide('addContact')">
					<div class="contact__close_icon">
						<img src="@/assets/images/svg/closeModal.svg" alt="close">
					</div>	
				</button>
			</div>
			<div class="contact__inputs">
				<div class="contact__inputs_section">
					<input type="text" class="contact__input" placeholder="Ф.И.Ш">
				</div>
				<div class="contact__inputs_section">
					<input type="text" class="contact__input" placeholder="Телефон рақами (мобил)">
					<input type="text" class="contact__input" placeholder="Телефон рақами (Ишхона)">
				</div>
			</div>
			<div class="contact__footer">
				<button class="contact__light_btn">Бекор қилиш</button>
				<div class="contact__switch">
					<div class="contact__switch_text">Статус</div>
					<div 
		        		class="switch big" 
		        		:active="`${active}`" 
		        		@click="() => { 
		        			active = !active;
		        		}"
		        	>
						<div 
							class="slider" 
						></div>
					</div>
				</div>
				<div class="contact__footer_buttons">
					<button class="contact__footer__button">Тозалаш</button>
					<button class="contact__footer__button active">Сақлаш</button>
				</div>
			</div>
		</b-modal>
	</div>
</template>

<script>
	// import 'selectize/dist/css/selectize.css'
	// import VSelectize from '@isneezy/vue-selectize'
	import date from '@/components/date.vue'      
	export default {     
		components: {
			date
		},
	    data() {
	      	return {
	      		active: true,
	      		dataCards: [
	      			{
	      				icon: '@/assets/images/svg/main-admin/cardIcon.svg',
	      				count: '3',
	      				title: 'Модератор'
	      			},
	      			{
	      				icon: '@/assets/images/svg/main-admin/cardMessage.svg',
	      				count: '120/128',
	      				title: 'смс'
	      			},
	      			{
	      				icon: '@/assets/images/svg/main-admin/cardUsers.svg',
	      				count: '180',
	      				title: 'Фойдаланувчилар'
	      			}
	      		],
	      		moderators: [
	      			{
	      				name: 'Алишер Ахмадович',
	      				position: 'Вилоят ҳокимлиги  ахборот тахлил',
	      				units: true,
	      				notifications: false,
	      				contacts: true,
	      				message_count: 3,
	      				status: true
	      			},
	      			{
	      				name: 'Азимов Алишер Ахмадович',
	      				position: 'Вилоят молия бошқармаси',
	      				units: true,
	      				notifications: false,
	      				contacts: false,
	      				message_count: 3,
	      				status: true
	      			},
	      			{
	      				name: 'Азимов Алишер Ахмадович',
	      				position: 'Вилоят молия бошқармаси',
	      				units: true,
	      				notifications: true,
	      				contacts: true,
	      				message_count: 3,
	      				status: false
	      			}
	      		],
                // tables options begin
                moderatorsSortBy: '',
                moderatorsSortDesc: false,
                moderatorsSortDirection: 'asc',
                moderatorsFilter: null,
                moderatorsFilterOn: [],
		        moderatorsFields: [
                    { key: 'name', label: 'Ташкилот номи ва Ф.И.Ш', sortable: false, class: 'tables_style' },
                    { key: 'units', label: 'Топшириқ', class: 'center_block tables_style' },
                    { key: 'notifications', label: 'Хабарнома', class: 'center_block tables_style' },
                    { key: 'contacts', label: 'Контактлар', class: 'center_block tables_style' },
                    { key: 'message_count', label: 'СМС', class: 'center_block tables_style' },
                    { key: 'status', label: 'Статус', class: 'center_block tables_style' },
                    { key: 'menu', label: '', class: 'center_block tables_style' }
                ],
                moderatorsTableTr: null,
                moderatorsPerPage: 6,
        		moderatorsCurrentPage: 1,
                // table options
                quantityItems: [
                	10,
                	20,
                	30
                ],

                // main admin users table
                users: [
                	{
                		name: 'Вилоят ҳокимлиги  ахборот тахлил',
	      				status: true,
                		subTable: [
	                		{
			      				name: 'Алишер Ахмадович',
			      				position: 'Вилоят ҳокимлиги  ахборот тахлил',
			      				phoneNumber: '+99893 371 63 63',
			      				password: '123454',
			      				lastTime: '12:38',    
								lastDate: '20.04.21',                                                  
			      				status: true
			      			},
			      			{
			      				name: 'Алишер Ахмадович',
			      				position: 'Вилоят ҳокимлиги  ахборот тахлил',
			      				phoneNumber: '+99893 371 63 63',
			      				password: '123454',
			      				lastTime: '12:38',    
								lastDate: '20.04.21',                                                  
			      				status: true
			      			},
			      			{
			      				name: 'Алишер Ахмадович',
			      				position: 'Вилоят ҳокимлиги  ахборот тахлил',
			      				phoneNumber: '+99893 371 63 63',
			      				password: '123454',
			      				lastTime: '12:38',    
								lastDate: '20.04.21',                                                  
			      				status: true
			      			},

		      			]
                	},
	      			{
                		name: 'Вилоят ҳокимлиги  ахборот тахлил',
	      				status: true,
                		subTable: [
	                		{
			      				name: 'Алишер Ахмадович',
			      				position: 'Вилоят ҳокимлиги  ахборот тахлил',
			      				phoneNumber: '+99893 371 63 63',
			      				password: '123454',
			      				lastTime: '12:38',    
								lastDate: '20.04.21',                                                  
			      				status: true
			      			},
			      			{
			      				name: 'Алишер Ахмадович',
			      				position: 'Вилоят ҳокимлиги  ахборот тахлил',
			      				phoneNumber: '+99893 371 63 63',
			      				password: '123454',
			      				lastTime: '12:38',    
								lastDate: '20.04.21',                                                  
			      				status: true
			      			},
			      			
		      			]
                	},
                	{
                		name: 'Вилоят ҳокимлиги  ахборот тахлил',
	      				status: true,
                		subTable: [
	                		{
			      				name: 'Алишер Ахмадович',
			      				position: 'Вилоят ҳокимлиги  ахборот тахлил',
			      				phoneNumber: '+99893 371 63 63',
			      				password: '123454',
			      				lastTime: '12:38',    
								lastDate: '20.04.21',                                                  
			      				status: true
			      			},
			      			{
			      				name: 'Алишер Ахмадович',
			      				position: 'Вилоят ҳокимлиги  ахборот тахлил',
			      				phoneNumber: '+99893 371 63 63',
			      				password: '123454',
			      				lastTime: '12:38',    
								lastDate: '20.04.21',                                                  
			      				status: true
			      			},
			      			
		      			]
                	}
	      		],
                // tables options begin
                usersSortBy: '',
                usersSortDesc: false,
                usersSortDirection: 'asc',
                usersFilter: null,
                usersFilterOn: [],
		        usersFields: [
                    { key: 'name', label: 'Ташкилот номи ва Ф.И.Ш', sortable: false, class: 'tables_style' },
                    { key: 'phoneNumber', label: 'Телефон', class: 'center_block tables_style' },
                    { key: 'password', label: 'Парол', class: 'center_block tables_style' },
                    { key: 'lastBeing', label: 'Ҳолат', class: 'center_block tables_style' },
                    { key: 'status', label: 'Статус', class: 'center_block tables_style' },
                    { key: 'menu', label: '', class: 'center_block tables_style' }
                ],
                usersTableTr: null,
                usersPerPage: 6,
        		usersCurrentPage: 1,
                // table options
                quantityItems: [
                	10,
                	20,
                	30
                ],

                // sections array
                sectionInput: '',
                sections: [
                	{
                		name: "Фарғона вилояти ҳокимлиги"
                	},
                	{
                		name: "Вилоят қурилиш бош бошқармаси"
                	},
                	{
                		name: "Вилоят қурилиш бош бошқармаси"
                	}
                ],
                positionInput: '',
                positions: [
                	{
                		name: "Ҳоким"
                	},
                	{
                		name: "Бошлиқ"
                	},
                	{
                		name: "Бўлим бошлиғи"
                	},
                	{
                		name: "Мутахассис"
                	}
                ]
	      	}
	    },
	    mounted() {
	    	this.moderatorsTableTr = document.querySelectorAll(".main_admin__table_tr");
			this.moderatorsTableTr.forEach(item => {
				let switchItem = item.querySelector(".switch");
				item.setAttribute("active", switchItem.getAttribute('active').toString())
			});

			this.usersTableTr = document.querySelectorAll(".main_admin__user_table_tr");
			this.usersTableTr.forEach(item => {
				let switchItem = item.querySelector(".switch");
				item.setAttribute("active", switchItem.getAttribute('active').toString())
			});
	    },
	    computed: {
			moderatorsRows() {
				return this.moderators.length
			}
		},
	    methods: {
	    	activeModeratorsItem(index, status) {
	    		this.moderatorsTableTr[index].setAttribute("active", status.toString());
	    	},
	    	activeUsersItem(index, status) {
	    		this.usersTableTr[index].setAttribute("active", status.toString());
	    	},

	    	addPosition() {
	    		this.positions.push({name: this.positionInput});
	    		this.positionInput = '';
	    	},
	    	daletePosition(index) {
	    		this.positions.splice(index, 1);
	    	},

	    	addSection() {
	    		this.sections.push({name: this.sectionInput});
	    		this.sectionInput = '';
	    	},
	    	deleteSection(index) {
	    		this.sections.splice(index, 1);
	    	}

	    }
  	}
</script>