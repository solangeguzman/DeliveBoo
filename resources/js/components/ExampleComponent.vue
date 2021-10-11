<template>
  <div class="container">
    <form>
      <div class="form-group">
        <label for="name">Name</label>
        <input
          v-model="customer_name"
          type="text"
          class="form-control"
          id="name"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
        <label for="surname">surname</label>
        <input
          v-model="customer_surname"
          type="text"
          class="form-control"
          id="price"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
        <label for="address">address</label>
        <input
          v-model="customer_address"
          type="text" 
          class="form-control"
          id="resturant"
          placeholder="nameTest"
        />
      </div>
      <div class="form-group">
      <label for="email">email</label>
      <input
        v-model="customer_email"
        type="text" 
        class="form-control"
        id="order"
        placeholder="nameTest"
      />
      </div>
      <div class="form-group">
     <label for="phone">phone number</label>
     <input
       v-model="customer_phone"
       type="text" 
       class="form-control"
       id="order"
      placeholder="nameTest"
      />
     </div>
     <div class="form-group">
    <label for="price">Total Price</label>
    <input
      v-model="total_price"
      type="text" 
      class="form-control"
      id="order"
      placeholder="nameTest"
    />
  </div>
   <div class="form-group">
   <label for="status">status</label>
  <input
    v-model="status"
    type="text" 
    class="form-control"
    id="order"
    placeholder="nameTest"
  />
  </div>
  <div class="form-group">
<label for="Discount">Discount</label>
<input
  v-model="discount"
  type="text" 
  class="form-control"
  id="order"
  placeholder="nameTest"
/>
</div>
<div class="form-group">
<label for="notes">notes</label>
<input
  v-model="notes"
  type="text" 
  class="form-control"
  id="order"
  placeholder="nameTest"
/>
</div>

      <div class="form-group">

        <small id="addressHelp" class="form-text text-muted"
          >We'll never share your email with anyone else.</small
        >
      </div>

      <button @click="postOrder()" type="button" class="btn btn-primary">
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
      customer_name: "",
      customer_surname: "",
      customer_address: "",
      customer_email: "",
      customer_phone: "",
      total_price: "",
      status:"",
      discount:"",
      notes:"",
      text: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.getRestaurant();
  },
  methods: {
    postOrder() {
      axios
        .post("/api/orders", {
          name: this.customer_name,
          surname: this.customer_surname,
          address: this.customer_address,
          email: this.customer_email,
          phone: this.customer_phone,
          price: this.total_price,
          status: this.status,
          discount: this.discount,
          notes: this.notes,
          dish: [
            1
          ]
        })
        .then((response) => {
          this.text = response.data;
        });
    },
    getRestaurant() {
      axios.get("/api/restaurants/21").then((response) => {
        console.log(response.data.data)

        this.nameRe = response.data.data.name
        this.addressRe = response.data.data.address
        this.category = response.data.data.category

      }); 
    },
    destroyRestaurant() {
      axios.delete("/api/restaurants/" + this.dish.id).then((response) => {
          this.text = response.data;
      }); 
    }
  },
};
</script>

<style lang="sass" scoped>

</style>
