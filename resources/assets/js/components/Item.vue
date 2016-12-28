<template lang="html">
  <tr>
    <td width="8%">
      <input type="text" class="input is-small" v-model="editForm.shelf" v-if="edit" />
      <template v-else>{{ item.shelf }}</template>
    </td>
    <td width="10%">
      <input type="text" class="input is-small" v-model="editForm.code" v-if="edit" />
      <template v-else>{{ item.code }} </template>
    </td>
    <td width="25%">
      <input type="text" class="input is-small" v-model="editForm.description" v-if="edit" />
      <template v-else>{{ item.description }}</template>
    </td>
    <td width="10%">
      <input type="text" class="input is-small" v-model="editForm.colour" v-if="edit" />
      <template v-else>{{ item.colour }}</template>
    </td>
    <td width="5%" class="has-text-centered">
      <input type="text" class="input is-small" v-model="editForm.quantity" v-if="edit" />
      <template v-else>{{ item.quantity }}</template>
    </td>
    <td width="10%">
      <input type="text" class="input is-small" v-model="editForm.make" v-if="edit" />
      <template v-else>{{ item.make }}</template>
    </td>
    <td width="10%">
      <input type="text" class="input is-small" v-model="editForm.group" v-if="edit" />
      <template v-else>{{ item.group }}</template>
    </td>
    <td width="15%">
      <a class="button is-primary is-small" v-on:click="editItem" v-if="!edit">
        <span></span>
        <span class="icon is-small">
          <i class="fa fa-edit"></i>
        </span><span></span>
      </a>
      <a class="button is-small  is-success" v-on:click="updateItem(item, editForm)" v-if="edit">
        <span></span>
        <span class="icon is-small">
          <i class="fa fa-check"></i>
        </span><span></span>
      </a>
      <a class="button is-small " v-on:click="cancelEdit" v-if="edit">
        <span></span>
        <span class="icon is-small">
          <i class="fa fa-undo"></i>
        </span><span></span>
      </a>
      <a class="button is-small  is-danger" v-on:click="$emit('delete-item', item)" v-if="!edit">
        <span></span>
        <span class="icon is-small">
          <i class="fa fa-trash"></i>
        </span><span></span>
      </a>
    </td>
    <td width="13%">
      <template v-if="item.updated_at != null">{{ moment(item.updated_at, "YYYY-MM-DD hh:mm:ss").format("ll") }}</template>
      <template v-else>-</template>
    </td>
  </tr>
</template>

<script>
export default {
  props: [ 'item' ],

  data() {
    return {
      pull: false,
      edit: false,
      editForm: {
        id: '',
        shelf: '',
        code: '',
        description: '',
        colour: '',
        quantity: '',
        make: '',
        group: '',
      }
    }
  },

  methods: {
    editItem() {
      this.edit = true;
      this.editForm.id = this.item.id;
      this.editForm.shelf = this.item.shelf;
      this.editForm.code = this.item.code;
      this.editForm.description = this.item.description;
      this.editForm.colour = this.item.colour;
      this.editForm.quantity = this.item.quantity;
      this.editForm.make = this.item.make;
      this.editForm.group = this.item.group;
    },

    cancelEdit() {
      this.edit = false;
    },

    updateItem(oldItem, newItem) {
      axios.patch('api/items/' + oldItem.id, newItem).then(response => {
        this.$emit('update-item', newItem);
        this.cancelEdit();
      });
    },

    pullItem() {
      this.$emit('pull-item', this.item.code, this.pull);
    }
  }
}
</script>

<style lang="css" scoped>
td {
  font-size: smaller;
}
</style>
