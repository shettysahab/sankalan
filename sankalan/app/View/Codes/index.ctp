<html>
<h2>Your Codes</h2>
<table>
    <tr>
        <th>Name</th>
    </tr>
    <?php foreach($codes as $code): ?>
    <tr>
        <td><?php echo $this->Html->link($code['Code']['filename'], array('action'=>'Compile',$code['Code']['id']));?></td>
    </tr>
<?php endforeach; ?>
</table> 
</html>