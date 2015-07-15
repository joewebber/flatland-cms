<h1>Pages</h1>
<?php

  if (!empty($this->data))
  {
  ?>
<table cellspacing="0" class="width-100">
  <thead>
    <tr>
      <th>Name</th>
      <th>Filename</th>
      <th>Page Title</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php

      $i = 0;

      foreach ($this->data as $_page) {

        $rowClass = ($i % 2 == 0) ? 'row-even' : 'row-odd';

        ?>
        <tr class="<?php echo $rowClass; ?>">
            <td class="width-25"><?php echo $_page['title']; ?></td>
            <td class="width-25"><?php echo $_page['filename']; ?></td>
            <td class="width-25"><?php echo $_page['head-page-title']; ?></td>
            <td class="width-10 text-right"><button onclick="window.location.href = '/Admin/index.php?a=Page/Edit&title=<?php echo strtolower($_page['title']); ?>'">Edit</button></td>
        </tr>
  <?php $i++; } ?>
  </tbody>
</table>
<?php
  }
  ?>
