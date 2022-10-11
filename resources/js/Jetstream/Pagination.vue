<template>
  <div
      class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      <span class="flex items-center col-span-2">
        Показано {{ entity.to }} из {{ entity.total }}
      </span>
    <!-- Pagination -->
    <span class="flex col-span-7 mt-2 sm:mt-auto sm:justify-end">
      <nav aria-label="Table navigation">
        <div class="inline-flex items-center">
          <template v-for="item in entity.links">
            <inertia-link v-if="item.url" :href="item.url"
                          v-bind:style="{'color': +item.label === page ? 'black' : 0}"
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
              <span v-html="item.label"></span>
            </inertia-link>
            <span v-if="!item.url"
                  class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                  v-html="item.label"
            ></span>
          </template>
        </div>
      </nav>
    </span>
  </div>
</template>

<script>
export default {
  props: ['entity'],
  data() {
    return {
      page: null,
    }
  },
  mounted() {
    let url = window.location.search.substring(1);
    let params = new URLSearchParams(url);
    this.page = +(params.get("page") ?? 1);
  }
}
</script>
