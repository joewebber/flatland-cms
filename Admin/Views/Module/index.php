<h1 class="heading-admin left">Modules</h1>
<button class="new-button right" onclick="window.location.href = '/Admin/index.php?a=Module/Edit&title='"><i class="fa fa-plus"></i> New Module</button>
<?php

  if (!empty($this->data))
  {
  ?>
<table cellspacing="0" class="width-100">
  <thead>
    <tr>
      <th>Name</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php

      $i = 0;

      foreach ($this->data['modules'] as $_module) {

        $rowClass = ($i % 2 == 0) ? 'row-even' : 'row-odd';

        ?>
        <tr class="<?php echo $rowClass; ?>">
            <td><?php echo $_module['title']; ?></td>
            <td class="width-10 text-right"><button onclick="window.location.href = '/Admin/index.php?a=Module/Edit&title=<?php echo strtolower($_module['title']); ?>'"><i class="fa fa-pencil"></i> Edit</button></td>
        </tr>
  <?php $i++; } ?>
  </tbody>
</table>
<?php
  }
  ?>
