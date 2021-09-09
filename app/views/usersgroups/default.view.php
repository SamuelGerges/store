<div class="container">
    <a href="/usersgroups/create" class="buttom"><i class="fa-da-plus"></i><?= $text_new_item ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_table_group_name ?></th>
                <th><?= $text_table_control ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if(false !== $groups) : foreach ($groups as $group) :?>
            <tr>
                <td><?= $group->getGroupName()    ?></td>
                <td>
                    <a href="/usersgroups/edit/<?= $group->getGroupId() ?>"> <i class="fa fa-edit"></i></a>
                    <a href="/usersgroups/delete/<?=  $group->getGroupId() ?>" onclick="if (!confirm('<?= $text_table_control_delete_confirm ?>')) return false;">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>