<template>
    <select @change="$emit('input', $event.target.value)" ref="foo" required>
      <option value="">Saýla</option>
      <option v-for="d in data" :value="d[content]" :selected="select_it_ok">
        {{ d[title] }}
      </option>
    </select>
</template>

<script>
    export default {
      props: ['data', 'title', 'content', 'update'],
      data() { return {count: 1}; },
      methods: {
        select_it_ok() {
          if (this.count == 1) {
            count++;
            return 'selected';
          }

          return '';
        }
      },
      mounted() {
        const instance = NiceSelect.bind(this.$refs.foo, {searchable: true});

        this.$on('fuckyou', () => {
          console.log('obj');
        });
      }
    };
</script>
