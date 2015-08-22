<h1 class="heading-admin">Edit Menu Item <?php echo (isset($this->data[0]['title'])) ? ' - ' . $this->data[0]['title'] : ''; ?></h1>

<form name="edit" action="index.php?a=Menu/Save&title=<?php echo $this->data['get']['menuItem']; ?>&folder=<?php echo $this->data['get']['menu']; ?>" method="post">
  <div class="editor-toolbar">
    <div class="button-set">
      <button type="button" class="faded-blue" onclick="window.location.href = 'index.php?a=Menu'">Cancel</button>
      <button type="submit">Save</button>
    </div>
  </div>
  
  <?php if (!isset($this->data[0]['title'])) { ?>
  <label for="title">Title</label>
  <input type="text" name="title" id="title" value="">
  <?php } ?>
  
  <label for="slug">Slug</label>
  <input type="text" name="slug" id="slug" value="<?php echo (isset($this->data[0]['slug'])) ? $this->data[0]['slug'] : ''; ?>">
  
  <label for="index">Index</label>
  <input type="text" name="index" id="index" value="<?php echo (isset($this->data[0]['index'])) ? $this->data[0]['index'] : ''; ?>">
  
  <label for="index">Parent</label>
  <input type="text" name="parent" id="parent" value="<?php echo (isset($this->data[0]['parent'])) ? $this->data[0]['parent'] : ''; ?>">
  
  <label for="page">Page</label>
  <input type="text" name="page" id="page" value="<?php echo (isset($this->data[0]['page'])) ? $this->data[0]['page'] : ''; ?>">
</form>
