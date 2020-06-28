<template>
  <div id="app-show">
    <div id="main">
      <mavon-editor
        v-model="value"
        language="en"
        editable="false"
        toolbarsFlag="false"
        shortCut="false"
        defaultOpen="preview"
        subfield="false"
      />
    </div>
  </div>
</template>

<script>
import Vue from "vue";
import mavonEditor from "mavon-editor";
import "mavon-editor/dist/css/index.css";

Vue.use(mavonEditor);
export default {
  //   el: "#main",
  name: "show",
  data() {
    return {
      value: ""
    };
  }
};
</script>