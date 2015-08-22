<h1 class="heading-admin">Edit Module</h1>

<form name="edit" action="index.php?a=Module/Save&title=<?php echo (isset($this->data['get']['title'])) ? $this->data['get']['title'] : ''; ?>" method="post">

  <label for="title">Title</label>
  <input type="text" name="title" id="title" value="<?php echo (isset($this->data[0]['title'])) ? $this->data[0]['title'] : ''; ?>">

  <div class="editor-toolbar">
    <div class="button-set">
      <button type="button" class="faded-blue" onclick="window.location.href = 'index.php?a=Module'">Cancel</button>
      <button type="submit">Save</button>
    </div>
  </div>
  <div id="editor" class="clearfix"></div>
</form>

<div id="content" style="display: none"><?php echo $this->data[0]['content']; ?></div>
<script type="text/jsx">
  function showEditor() {
  var MarkdownEditor = React.createClass({
    getInitialState: function() {
      return {value: document.getElementById("content").innerHTML};
    },
    handleChange: function() {
      this.setState({value: React.findDOMNode(this.refs.textarea).value});
    },
    render: function() {
      return (
        <div className="MarkdownEditor">
          <textarea name="content" className="width-50 left" id="pageEditor"
            onChange={this.handleChange}
            ref="textarea"
            defaultValue={this.state.value} />
          <div
            className="content width-50 left"
            dangerouslySetInnerHTML={{
              __html: marked(this.state.value, {sanitize: true})
            }}
          />
        </div>
      );
    }
  });

  React.render(<MarkdownEditor />, document.getElementById("editor"));

  window.onload = function() { document.getElementById("pageEditor").focus(); }
}

showEditor()
</script>
