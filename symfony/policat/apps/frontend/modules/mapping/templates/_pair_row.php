<?php /* @var $pair MappingPair */
$form = new BaseForm();
$form->getWidgetSchema()->setNameFormat('delete_pair[%s]');
?>
<tr id="pair_<?php echo $pair['id'] ?>">
  <td><?php echo $pair['a'] ?></td>
  <td><?php echo $pair['b'] ?></td>
  <td>
    <form class="ajax_form" method="post" action="<?php echo url_for('mapping_delete_pair', array('id' => $pair['id'])) ?>"><?php echo $form ?>
      <a class="btn btn-mini ajax_link" href="<?php echo url_for('mapping_edit_pair', array('id' => $pair['id'])) ?>">edit</a>
      <button class="btn btn-mini  btn-warning">delete</button>
    </form>
  </td>
</tr>