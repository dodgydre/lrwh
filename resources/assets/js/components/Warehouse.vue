<template lang="html">
  <section class="section">

    <div class="card is-fullwidth">
      <div class="card-header">
        <p class="card-header-title">
          Add New Item
        </p>
      </div>
      <div class="card-content">
        <div class="content">
          <form v-on:submit.prevent="createItem" method="POST">
            <table class="table">
              <tbody>
                <tr>

                  <td>
                    <p class="control">
                      <input class="input" type="text" placeholder="shelf" v-model="item.shelf" />
                      <span class="help is-danger" v-for="error in errors.shelf">{{ error }}</span>
                    </p>
                  </td>
                  <td>
                    <p class="control">
                      <input class="input" type="text" placeholder="code" v-model="item.code" />
                      <span class="help is-danger" v-for="error in errors.code">{{ error }}</span>
                    </p>
                  </td>
                  <td>
                    <p class="control">
                      <input class="input" type="text" placeholder="description" v-model="item.description" />
                      <span class="help is-danger" v-for="error in errors.description">{{ error }}</span>
                    </p>
                  </td>
                  <td>
                    <p class="control">
                      <input class="input" type="text" placeholder="colour" v-model="item.colour" />
                      <span class="help is-danger" v-for="error in errors.colour">{{ error }}</span>
                    </p>
                  </td>
                  <td>
                    <p class="control">
                      <input class="input" type="text" placeholder="quantity" v-model="item.quantity" />
                      <span class="help is-danger" v-for="error in errors.quantity">{{ error }}</span>
                    </p>
                  </td>
                  <td>
                    <p class="control">
                      <input class="input" type="text" placeholder="make" v-model="item.make" />
                      <span class="help is-danger" v-for="error in errors.make">{{ error }}</span>
                    </p>
                  </td>
                  <td>
                    <p class="control">
                      <input class="input" type="text" placeholder="group" v-model="item.group" />
                      <span class="help is-danger" v-for="error in errors.group">{{ error }}</span>
                    </p>
                  </td>
                  <td>
                    <button class="button is-primary is-small">Create New</button>
                  </td>

                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>

    <div class="card is-fullwidth">
      <div class="card-header">
        <p class="card-header-title">
          Inventory
        </p>
        <p class="filter-label">
          Filter
        </p>
        <p class="control has-icon has-icon-right padded">
          <input class="input" type="text" v-model="search" />
          <i class="padded fa fa-search"></i>
        </p>

      </div>
      <div class="card-content">
        <table class="table is-striped">
          <thead>
            <tr>
              <th v-for="column in columns">

                <a v-if="column != 'actions' && column != 'pull'" href="#" @click="sortBy(column)" class="button is-link" v-bind:class="{ 'is-primary': sortKey == column }">
                  {{ column }}
                </a>
                <a class="button is-link is-disabled" v-else>{{ column }}</a>
              </th>
            </tr>
          </thead>
          <tbody>
            <Item
              v-for="item in sorted"
              v-bind:item="item"
              v-on:delete-item="deleteItem"
              v-on:update-item="fetchItems"
              v-on:pull-item="pullItems"
            >
            </Items>

          </tbody>
        </table>
      </div>
    </div>
  </section>

</template>

<script>
import Item from './Item.vue';

export default {
  data() {
    return {
      edit: false,
      sortKey: 'code',
      sortDir: 'asc',
      search: '',
      errors: [],
      toPull: [],
      items: [],
      columns: [ 'pull', 'shelf', 'code', 'description', 'colour', 'quantity', 'make', 'group', 'actions' ],
      item: {
        shelf: '',
        code: '',
        colour: '',
        description: '',
        quantity: '',
        make: '',
        group: '',
        selected: false,
      },
    }
  },

  created() {
    this.fetchItems();
  },

  methods: {
    fetchItems() {
      axios.get('api/items').then(response => {
        this.items = response.data.items;
      }, response => {
        console.log(response);
      });
    },

    createItem() {
      axios.post('api/items/', this.item).then(response => {
        this.items.push(response.data.item);
        this.item = { shelf: '', code: '', colour: '', description: '', quantity: '', make: '', group: '', selected: false };
        if(this.errors) {
          this.errors = [];
        }
        console.log(response.data);
      }, response => {
        this.errors = response.data;
      });

    },

    deleteItem(item) {
      axios.delete('api/items/'+item.id).then(response => {
        let index = this.items.indexOf(item);
        this.items.splice(index, 1);
        console.log(response.data);
      });
    },

    pullItems(code, pull) {
      if ( pull ) {
        this.toPull.push(code);
        console.log(this.toPull);
      } else {
        this.toPull.splice(this.toPull.indexOf(code),1);
        console.log(this.toPull);
      }
    },

    sortBy(column) {
      if(this.sortKey == column) {
        if(this.sortDir == 'asc') this.sortDir = 'desc';
        else this.sortDir = 'asc';
      } else {
        this.sortKey = column;
        this.sortDir = 'asc';
      }

    },
  },

  computed: {
    sorted() {
      var self = this;
      var filtered = self.items.filter(function(item) {
        var searchRegex = new RegExp(self.search, 'i');
        return (searchRegex.test(item.description) ||
                searchRegex.test(item.code) ||
                searchRegex.test(item.make) ||
                searchRegex.test(item.group));
      })
      return _.orderBy(filtered, this.sortKey, this.sortDir);
    }
  },

  components: {
    Item,
  }
}
</script>

<style lang="css" scoped>
  a.is-link {
    text-decoration: none;
  }
  a.is-link.is-primary {
    color: blue;
  }

  .padded {
    padding: 10px;
  }

  .padded.fa {
    padding: 10px;
    padding-right: 24px;
  }

  .filter-label {
    padding-bottom: 10px;
    padding-top: 10px;
    text-align: right;
  }
</style>
