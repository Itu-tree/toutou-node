<template>
  <div id="app-editor">
    <div id="main">
      <mavon-editor
        v-model="value"
        language="en"
        :toolbars="toolbars"
        @change="changeText"
        ref="md"
        @imgAdd="$imgAdd"
        @imgDel="$imgDel"
      />
    </div>
    <textarea v-model="mdbody" name="mdbody" class="form-control"></textarea>
    <textarea v-model="htmlbody" name="body" class="form-control"></textarea>
  </div>
</template>

<script>
import Vue from "vue";
import mavonEditor from "mavon-editor";
import "mavon-editor/dist/css/index.css";

Vue.use(mavonEditor);
export default {
  // el: "#app-editor",
  name: "editor",
  props: ["mdbody", "post_id", "url"],
  data() {
    return {
      value: this.mdbody,
      post_id: this.post_id,
      mdbody: "",
      htmlbody: "",
      toolbars: {
        bold: true,
        italic: true,
        header: true,
        underline: true,
        strikethrough: true,
        mark: true,
        superscript: true,
        subscript: true,
        quote: true,
        ol: true,
        ul: true,
        link: true,
        imagelink: true,
        code: true,
        table: true,
        help: true,
        alignleft: true,
        aligncenter: true,
        alignright: true,
        subfield: true,
        preview: true,
        save: true,
        // false
        undo: false,
        redo: false,
        fullscreen: false,
        readmodel: false,
        htmlcode: false,
        trash: false,
        navigation: false
      }
    };
  },
  methods: {
    changeText(value, reder) {
      this.mdbody = value;
      this.htmlbody = reder;
    },
    $imgAdd(pos, $file) {
      // step 1. upload image to server.
      var formdata = new FormData();
      formdata.append("image", $file);
      formdata.append("post_id", this.post_id);
      axios({
        url: this.url,
        method: "post",
        data: formdata,
        headers: { "Content-Type": "multipart/form-data" }
      }).then(response => {
        // step 2. replace url ![...](./0) -> ![...](url)
        // $vm.$img2Url. The details at the end of this page
        //$vm.$img2Url(pos, url);
        this.$refs.md.$img2Url(pos, response.data);
      });
    }
  }
};
</script>