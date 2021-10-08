<template>
  <div class="container">
    <form>
      <div class="form-group">
        <label for="name">Name</label>
        <input
          v-model="nameRe"
          type="text"
          class="form-control"
          id="name"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
        <label for="price">address</label>
        <input
          v-model="addressRe"
          type="text"
          class="form-control"
          id="price"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
        <label for="resturant">category</label>
        <input
          v-model="category"
          type="number"
          class="form-control"
          id="resturant"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">

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
      <button @click="destroyRestaurant()" type="button" class="btn btn-primary">
        Destroy
      </button>
      <h1>{{ text }}</h1>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dish: "",
      nameRe: "",
      addressRe: "",
      category: 0,
      text: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.getRestaurant();
  },
  methods: {
    postRestaurant() {
      axios
        .put("/api/restaurants/21", {
          name: this.nameRe,
          address: this.addressRe,
          category_id: parseInt(this.category),
        })
        .then((response) => {
          this.text = response.data;
        });
    },
    getRestaurant() {
      axios.get("/api/restaurants").then((response) => {
        console.log(response.data.data)

        this.nameRe = response.data.data.name
        this.addressRe = response.data.data.address
        this.category = response.data.data.category

      }); 
    },
    destroyRestaurant() {
      axios.delete("/api/dishes/" + this.dish.id).then((response) => {
          this.text = response.data;
      }); 
    }
  },
};
</script>

<style lang="sass" scoped>

</style>
