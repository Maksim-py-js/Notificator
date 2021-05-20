<template>
  <div class="row">
    <div class="col-lg-8 m-auto">
      <card v-if="mustVerifyEmail" :title="$t('register')">
        <div class="alert alert-success" role="alert">
          {{ $t('verify_email_address') }}
        </div>
      </card>
      <card v-else :title="$t('register')">
        <form @submit.prevent="register" @keydown="form.onKeydown($event)">
          <!-- Name -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
            <div class="col-md-7">
              <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" type="text" name="name" class="form-control">
              <has-error :form="form" field="name" />
            </div>
          </div>

          <!-- Email -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
            <div class="col-md-7">
              <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" type="email" name="email" class="form-control">
              <has-error :form="form" field="email" />
            </div>
          </div>

          <!-- cell_phone_number -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('cell_phone_number') }}</label>
            <div class="col-md-7">
              <input v-model="form.cell_phone_number" :class="{ 'is-invalid': form.errors.has('cell_phone_number') }" type="text" name="cell_phone_number" class="form-control">
              <has-error :form="form" field="cell_phone_number" />
            </div>
          </div>

          <!-- office_phone_number -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('office_phone_number') }}</label>
            <div class="col-md-7">
              <input v-model="form.office_phone_number" :class="{ 'is-invalid': form.errors.has('office_phone_number') }" type="text" name="office_phone_number" class="form-control">
              <has-error :form="form" field="office_phone_number" />
            </div>
          </div>

          <!-- work_place -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('work_place') }}</label>
            <div class="col-md-7">
              <input v-model="form.work_place" :class="{ 'is-invalid': form.errors.has('work_place') }" type="text" name="work_place" class="form-control">
              <has-error :form="form" field="work_place" />
            </div>
          </div>

          <!-- job -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('job') }}</label>
            <div class="col-md-7">
              <input v-model="form.job" :class="{ 'is-invalid': form.errors.has('job') }" type="text" name="job" class="form-control">
              <has-error :form="form" field="job" />
            </div>
          </div>
          
          <!-- department_name -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('department_name') }}</label>
            <div class="col-md-7">
              <input v-model="form.department_name" :class="{ 'is-invalid': form.errors.has('department_name') }" type="text" name="department_name" class="form-control">
              <has-error :form="form" field="department_name" />
            </div>
          </div>

          <!-- tasks -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('tasks') }}</label>
            <div class="custom-control custom-switch">
              <input v-model="form.tasks" type="checkbox" class="custom-control-input" id="tasks">
              <label class="custom-control-label" for="tasks"></label>
            </div>
            {{ form.tasks }}
          </div>

          <!-- numbers -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('numbers') }}</label>
            <div class="custom-control custom-switch">
              <input v-model="form.numbers" type="checkbox" class="custom-control-input" id="numbers">
              <label class="custom-control-label" for="numbers"></label>
            </div>
            {{ form.numbers }}
          </div>

          <!-- notifications -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('notifications') }}</label>
            <div class="custom-control custom-switch">
              <input v-model="form.notifications" type="checkbox" class="custom-control-input" id="notifications">
              <label class="custom-control-label" for="notifications"></label>
            </div>
            {{ form.notifications }}
          </div>



          <!-- sms -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('sms') }}</label>
            <div class="col-md-7">
              <input v-model="form.sms" :class="{ 'is-invalid': form.errors.has('sms') }" type="number" name="sms" class="form-control">
              <has-error :form="form" field="sms" />
            </div>
          </div>
          
          <!-- moderator_index -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('moderator_index') }}</label>
            <div class="col-md-7">
              <input v-model="form.moderator_index" :class="{ 'is-invalid': form.errors.has('moderator_index') }" type="text" name="moderator_index" class="form-control">
              <has-error :form="form" field="moderator_index" />
            </div>
          </div>



          <!-- status -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('status') }}</label>
            <div class="custom-control custom-switch">
              <input v-model="form.status" type="checkbox" class="custom-control-input" id="status">
              <label class="custom-control-label" for="status"></label>
            </div>
            {{ form.status }}
          </div>

          <!-- role -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('role') }}</label>
            <div class="custom-control custom-switch">
              <input v-model="form.role" type="checkbox" class="custom-control-input" id="role">
              <label class="custom-control-label" for="role"></label>
            </div>
            {{ form.role }}
          </div>




          <!-- Password -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
            <div class="col-md-7">
              <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" type="password" name="password" class="form-control">
              <has-error :form="form" field="password" />
            </div>
          </div>

          <!-- Password Confirmation -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('confirm_password') }}</label>
            <div class="col-md-7">
              <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" type="password" name="password_confirmation"
                     class="form-control"
              >
              <has-error :form="form" field="password_confirmation" />
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-7 offset-md-3 d-flex">
              <!-- Submit Button -->
              <v-button :loading="form.busy">
                {{ $t('register') }}
              </v-button>

              <!-- GitHub Login Button -->
              <login-with-github />
            </div>
          </div>
        </form>
      </card>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  middleware: 'guest',

  data: () => ({
    form: new Form({
      name: '',
      email: '',
      cell_phone_number: '',

      office_phone_number: '',
      work_place: '',
      job: '',
      department_name: '',

      tasks: false,
      numbers: false,
      notifications: false,

      sms: '',
      moderator_index: '',

      status: false,
      role: false,

      password: '',
      password_confirmation: ''
    }),
    mustVerifyEmail: false
  }),

  head () {
    return { title: this.$t('register') }
  },

  methods: {
    async register () {
      let data

      // Register the user.
      try {
        const response = await this.form.post('/register')
        data = response.data
      } catch (e) {
        return
      }

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
    }
  }
}
</script>
