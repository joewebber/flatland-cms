<h1>Pages</h1>
<?php

  if (!empty($this->data))
  {
  ?>
<table cellspacing="0">
  <thead>
    <th>
      <td>Name</td>
      <td>Filename</td>
      <td>Page Title</td>
    </th>
  </thead>
  <tbody>
  <?php foreach ($this->data as $_page)
        {
        ?>
        <tr>
            <td><?php echo $_page['title']; ?></td>
            <td><?php echo $_page['filename']; ?></td>
            <td><?php echo $_page['head-page-title']; ?></td>
            <td><a onclick="showEditor()" href="#">Edit</a></td>
            <div id="content" style="display: none"><?php echo $_page['content']; ?></div>
        </tr>
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
                  <textarea id="pageEditor"
                    onChange={this.handleChange}
                    ref="textarea"
                    defaultValue={this.state.value} />
                  <div
                    className="content"
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
        </script>
  <?php  } ?>
  </tbody>
</table>
<?php
  }
  ?>
<div id="editor"></div>
