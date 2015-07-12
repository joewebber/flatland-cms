<h1>Pages</h1>
<?php

  if (!empty($this->data))
  {
  ?>
<table cellspacing="0">
  <thead>
    <th>
      <td>Title</td>
      <td></td>
    </th>
  </thead>
  <tbody>
  <?php foreach ($this->data as $_page)
        {
        ?>
        <tr>
            <td><?php echo $_page['title']; ?></td>
        </tr>
  <?php  } ?>
  </tbody>
</table>
<?php
  }
