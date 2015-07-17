<h1 class="heading-admin">Edit Page</h1>

<form name="edit" action="index.php?a=Page/Save&title=<?php echo $this->data['get']['title']; ?>" method="post">
  <div class="editor-toolbar">
    <div class="button-set">
      <button class="faded-blue">Cancel</button>
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
}

showEditor()
</script>
