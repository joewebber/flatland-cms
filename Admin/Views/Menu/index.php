<div class="clearfix">
  <h1 class="heading-admin left">Menus</h1>
  <button class="new-button right" onclick="window.location.href = '/Admin/index.php?a=Menu/Edit&menuItem=&folder='"><i class="fa fa-plus"></i> New Item</button>
</div>
<?php

  if (!empty($this->data))
  {

      $i = 0;

      foreach ($this->data['menus'] as $menuTitle => $items) {
        
        ?>
        <h2><?php echo $menuTitle; ?></h2>
        <table cellspacing="0" class="width-100">
          <thead>
            <tr>
              <th>Title</th>
              <th>Page</th>
              <th>Slug</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
        <?php
        
        foreach ($items as $_menu) { ?>

        <?php $rowClass = ($i % 2 == 0) ? 'row-even' : 'row-odd';

        ?>
        <tr class="<?php echo $rowClass; ?>">
            <td class="width-25"><?php echo $_menu['title']; ?></td>
            <td class="width-25"><?php echo $_menu['page']; ?></td>
            <td class="width-25"><?php echo $_menu['slug']; ?></td>
            <td class="width-10 text-right"><button onclick="window.location.href = '/Admin/index.php?a=Menu/Edit&menu=<?php echo $menuTitle; ?>&menuItem=<?php echo strtolower($_menu['title']); ?>.xml'">Edit</button></td>
        </tr>
  <?php $i++; } ?>
  </tbody>
</table>
<?php } ?>
<?php } ?>
