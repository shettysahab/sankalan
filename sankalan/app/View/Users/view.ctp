<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emailid'); ?></dt>
		<dd>
			<?php echo h($user['User']['emailid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Codes'), array('controller' => 'codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code'), array('controller' => 'codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Codes'); ?></h3>
	<?php if (!empty($user['code'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Log'); ?></th>
		<th><?php echo __('Output'); ?></th>
		<th><?php echo __('Createdby'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['code'] as $code): ?>
		<tr>
			<td><?php echo $code['id']; ?></td>
			<td><?php echo $code['filename']; ?></td>
			<td><?php echo $code['code']; ?></td>
			<td><?php echo $code['created']; ?></td>
			<td><?php echo $code['modified']; ?></td>
			<td><?php echo $code['log']; ?></td>
			<td><?php echo $code['output']; ?></td>
			<td><?php echo $code['createdby']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'codes', 'action' => 'view', $code['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'codes', 'action' => 'edit', $code['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'codes', 'action' => 'delete', $code['id']), null, __('Are you sure you want to delete # %s?', $code['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Code'), array('controller' => 'codes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
