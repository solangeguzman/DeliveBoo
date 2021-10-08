<template>
  <div class="container">
    <form>
      <div class="form-group">
        <label for="name">Name</label>
        <input
          v-model="nameDi"
          type="text"
          class="form-control"
          id="name"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
        <label for="price">price</label>
        <input
          v-model="priceDi"
          type="number"
          class="form-control"
          id="price"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
        <label for="resturant">restaurant</label>
        <input
          v-model="restaurantDi"
          type="text"
          class="form-control"
          id="resturant"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
        <label for="courseDi">courseDi</label>
        <input
          v-model="courseDi"
          type="text"
          class="form-control"
          id="courseDi"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
        <label for="ingredients">ingredients</label>
        <input
          v-model="ingredientsDi"
          type="text"
          class="form-control"
          id="ingredients"
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
      nameDi: "",
      priceDi: 0,
      text: "",
      restaurantDi: "",
      ingredientsDi: "",
      courseDi: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.getRestaurant();
  },
  methods: {
    postRestaurant() {
      axios
        .put("/api/dishes/" + this.dish.id, {
          name: this.nameDi,
          price: parseInt(this.priceDi),
          restaurant_id: parseInt(this.restaurantDi),
          course_id: parseInt(this.courseDi),
          ingredients: this.ingredientsDi
        })
        .then((response) => {
          this.text = response.data;
        });
    },
    getRestaurant() {
      axios.get("/api/dishes/5").then((response) => {
        console.log(response.data.data)
        this.dish = response.data.data[0]
        this.nameDi = response.data.data[0].name
        this.priceDi = response.data.data[0].price
        this.ingredientsDi = response.data.data[0].ingredients
        this.restaurantDi = response.data.data[0].restaurant.id
        this.courseDi = response.data.data[0].course.id


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
