<h1 class="heading-admin">Menus</h1>
<?php

  if (!empty($this->data))
  {
  ?>
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

      $i = 0;

      foreach ($this->data['menus']['menu-1']['items'] as $_menu) {

        $rowClass = ($i % 2 == 0) ? 'row-even' : 'row-odd';

        ?>
        <tr class="<?php echo $rowClass; ?>">
            <td class="width-25"><?php echo $_menu['title']; ?></td>
            <td class="width-25"><?php echo $_menu['page']; ?></td>
            <td class="width-25"><?php echo $_menu['slug']; ?></td>
            <td class="width-10 text-right"><button onclick="window.location.href = '/Admin/index.php?a=Menu/Edit&title=<?php echo strtolower($_menu['title']); ?>'">Edit</button></td>
        </tr>
  <?php $i++; } ?>
  </tbody>
</table>
<?php
  }
  ?>
