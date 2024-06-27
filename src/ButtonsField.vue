<template>
  <k-field :name="name" :label="label" :help="help">
    <k-button
      :style="{ width: fullwidth && '100%' }"
      variant="filled"
      :theme="hasError ? 'negative' : theme"
      :size="size"
      :icon="!hasError && !isLoading && icon"
      :disabled="hasError || isLoading || disabled"
      @click="onClick"
      >{{ hasError ? "Error" : isLoading ? "Please wait…" : text }}</k-button
    >
  </k-field>
</template>

<script>
export default {
  props: {
    name: String,
    label: String,
    text: String,
    url: String,
    theme: String,
    fullwidth: Boolean,
    size: String,
    icon: String,
    help: String,
    disabled: Boolean,
    open: Boolean,
    reload: Boolean,
    isLoading: true,
    hasError: false,
  },
  methods: {
    onClick() {
      if (this.open === true) {
        // open url in new window
        window.open(this.url, "_blank");
      } else {
        // call webhook
        this.isLoading = true;
        fetch(this.url)
          .then((resp) => {
            if (!resp.ok) throw resp;
            return this.reload && this.$reload();
          })
          .catch(() => {
            this.hasError = true;
          })
          .then(() => {
            this.isLoading = false;
          });
      }
    },
  },
};
</script>
