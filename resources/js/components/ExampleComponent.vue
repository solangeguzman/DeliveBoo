<template>
  <div class="container">
    <form>
      <div class="form-group">
        <label for="name">Name</label>
        <input
          v-model="nameTest"
          type="text"
          class="form-control"
          id="name"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input
          v-model="addressTest"
          type="text"
          class="form-control"
          id="address"
          aria-describedby="addressHelp"
          placeholder="addressTest"
        />
        <small id="addressHelp" class="form-text text-muted"
          >We'll never share your email with anyone else.</small
        >
      </div>

      <button @click="postRestaurant()" type="button" class="btn btn-primary">
        Submit
      </button>
      <button @click="getRestaurant()" type="button" class="btn btn-primary">
        Get
      </button>
      <h1>{{ text }}</h1>
      <p>{{ responseEx }}</p>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      nameRe: "",
      addressRe: "",
      text: "",
      responseEx: "",
      nameTest: "",
      addressTest: "",
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.getRestaurant();
  },
  methods: {
    postRestaurant() {
      axios
        .post("/api/restaurants", {
          name: this.nameRe,
          address: this.addressRe,
        })
        .then((response) => {
          this.text = response.data;
        });
    },
    getRestaurant() {
      axios.get("/api/restaurants/17").then((response) => {
        console.log(response);
      });
    },
  },
};
</script>
