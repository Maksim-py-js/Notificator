<template>
	<div class="report">
		<div class="main_admin__content">
			<div class="main_admin__data">
				<div class="main_admin__card" v-for="card in dataCards" :key="card.index">
					<div class="main_admin__card-icon">
						<img src="@/assets/images/svg/main-admin/cardIcon.svg" alt="icon">
					</div>
					<div class="main_admin__card-count">{{card.count}}</div>
					<h3 class="main_admin__card-title">{{card.title}}</h3>
				</div>
			</div>
		</div>
		<div class="main_admin__tableBorder report_table">
			<div>
				<h3 class="main_admin__table_name">
					Топшириқлар
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

	                
	                <template #cell(totalAssignments)="row">
	                    <div class="report__table_data">
	                    	{{row.item.totalAssignments}}
	                    </div>
	                </template>

	                <template #cell(late)="row">
	                    <div class="report__table_data">
	                    	{{row.item.late}}
	                    </div>
	                </template>

	                <template #cell(status)="row">
	                    <div>
	                    	<div 
	                    		v-if="userStatus(row.item.totalAssignments, row.item.late) == 'good'"
	                    		class="report__status green"
	                    	>
	                    		Яхши
	                    	</div>
	                    	<div 
	                    		v-else-if="userStatus(row.item.totalAssignments, row.item.late) == 'middle'"
	                    		class="report__status yellow"
	                    	>
	                    		ўрта
	                    	</div>
	                    	<div 
	                    		v-else-if="userStatus(row.item.totalAssignments, row.item.late) == 'unsatisfactory'"
	                    		class="report__status red"
	                    	>
	                    		Қониқарсиз
	                    	</div>
	                    	<div 
	                    		v-else
	                    	>
	                    		Underfined
	                    	</div>
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
</template>

<script>
	export default {
		data() {
			return {
				dataCards: [
	      			{
	      				icon: '@/assets/images/svg/main-admin/cardIcon.svg',
	      				count: '26/32',
	      				title: 'Топшириқлар'
	      			},
	      			{
	      				icon: '@/assets/images/svg/main-admin/cardMessage.svg',
	      				count: '40/42',
	      				title: 'Хабарномалар'
	      			},
	      			{
	      				icon: '@/assets/images/svg/main-admin/cardUsers.svg',
	      				count: '180',
	      				title: 'Контактлар'
	      			}
	      		],
	      		moderators: [
	      			{
	      				name: 'Азимов Алишер Ахмадович',
	      				position: 'Вилоят молия бошқармаси',
	      				totalAssignments: 18,
	      				late: 17,
	      				status: 'ўрта'
	      			},
	      			{
	      				name: 'Азимов Алишер Ахмадович',
	      				position: 'Вилоят молия бошқармаси',
	      				totalAssignments: 18,
	      				late: 10,
	      				status: 'Яхши'
	      			},
	      			{
	      				name: 'Азимов Алишер Ахмадович',
	      				position: 'Вилоят молия бошқармаси',
	      				totalAssignments: 18,
	      				late: 5,
	      				status: 'Қониқарсиз'
	      			},
	      			{
	      				name: 'Азимов Алишер Ахмадович',
	      				position: 'Вилоят молия бошқармаси',
	      				totalAssignments: 18,
	      				late: 7,
	      				status: 'Қониқарсиз'
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
                    { key: 'totalAssignments', label: 'Жами топшириқлар', class: 'center_block tables_style' },
                    { key: 'late', label: 'Кечикаётган', class: 'center_block tables_style' },
                    { key: 'Status', label: 'Статус', class: 'center_block tables_style mrStatus' },
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
                ]
			}
		},
		computed: {
			moderatorsRows() {
				return this.moderators.length
			}
		},
		methods: {
			userStatus(totalAssignments, late) {
				let result = (late / totalAssignments) * 100;
				return result >= 60 ? 'unsatisfactory' :  result <= 30 ? 'good' : 'middle';
			}
		}
	}
</script>