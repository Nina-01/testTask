<template>
  <div class="container">
    <b-alert :show="error" variant="danger">{{ message }}</b-alert>
    <b-alert :show="success" variant="success">{{ message }}</b-alert>
    <b-form @submit.stop.prevent >
      <b-row>
        <b-col sm="12" md="6">
          <b-form-group
            id="input-group-1"
            label="Brand Name:"
            label-for="brand_name"
          >
            <b-form-input
              id="brand_name"
              v-model="form.name"
              type="text"
              required
              placeholder="Please enter brand name"
            ></b-form-input>
          </b-form-group>
        </b-col>
        <b-col sm="12" md="6">
          <b-form-group
            id="input-group-2"
            label="Email Address"
            label-for="email_address"
          >
            <b-form-input
              id="email_adderss"
              v-model="form.email"
              type="email"
              required
              placeholder="Please enter email address"
            >
            </b-form-input>
          </b-form-group>
        </b-col>
        <b-col cols="12" class="d-flex justify-content-start">
          <b-form-group id="input-group-7">
            <b-form-group id="checkboxes-4">
              <b-form-checkbox v-model="form.checked" value="1" unchecked-value="0">Do you want to input commercial register?</b-form-checkbox>
            </b-form-group>
          </b-form-group>
        </b-col>
      </b-row>
      <b-row  v-if="form.checked === '1' ">
        <b-col sm="12" md="6">
          <b-form-group
            id="input-group-3"
            label="Commercial register number"
            label-for="register_number"
          >
            <b-form-input
              id="register_number"
              v-model="form.registerNumber"
              type="text"
              required
              placeholder="Please enter register number"
            >
            </b-form-input>
          </b-form-group>
        </b-col>
        <b-col sm="12" md="6">
          <b-form-group
            id="input-group-4"
            label="City name"
            label-for="city_name"
          >
            <b-form-input
              id="city_name"
              v-model="form.cityName"
              type="text"
              required
              placeholder="Please enter city name"
            >
            </b-form-input>
          </b-form-group>
        </b-col>
        <b-col cols="12" class="d-flex justify-content-start">
          <input type="file" class="forms__resume--upload" @change="selectFile" accept="application/pdf">
        </b-col>
      </b-row>
      <b-button type="submit" variant="primary" @click="sendForm">Submit</b-button>
    </b-form>
  </div>
<!--  <b-row>-->
<!--    <button @click="test">click</button>-->
<!--  </b-row>-->
</template>

<script>
export default {
  name: 'BrandComponent',
  data: function () {
    return {
      form: {
        name: '',
        email: '',
        checked: 0,
        registerNumber: '',
        cityName: '',
        pdfFile: ''
      },
      error: false,
      success: false,
      message: ''
    }
  },
  methods: {
    selectFile (event) {
      if (event === '') return false
      this.form.pdfFile = event.target.files[0]
    },
    validate () {
      if (!(this.form.name && this.form.email)) {
        return false
      }
      if (this.form.checked === '1' && !(this.form.cityName && this.form.registerNumber && this.form.pdfFile)) {
        return false
      }
      return true
    },
    sendForm () {
      this.success = false
      this.error = false
      this.message = ''
      if (!this.validate()) {
        this.error = true
        this.message = 'Please make sure that you have filled in all the fields correctly'
        return false
      }
      let formData = new FormData()
      for (const key in this.form) {
        formData.append(key, this.form[key])
      }
      this.axios.post('/brand', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
        .then(response => {
          console.log(response)
          this.success = true
          this.message = response.data.message
        })
        .catch(error => {
          this.message = error.response.data.message
          this.error = true
          console.log(error.response)
        })
    }
  }
}
</script>

<style scoped>

</style>
