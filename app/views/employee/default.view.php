<?php
namespace PHPMVC\Models;


$result = CrudModel::getALL();



?>


<pre>

</pre>
<div class="user">
    <table>
        <thead>

        </thead>
        <tbody>

        <?php if(false !== $result ) : foreach($result as $user ) : ?>

            <tr>
                <td><?= $user->getId()      ?></td>
                <td><?= $user->getName()    ?></td>
                <td><?= $user->getAge()     ?></td>
                <td><?= $user->getAddress() ?></td>
                <td><?= $user->getPhone()   ?></td>
                <td><?= $user->getEmail()   ?></td>
                <td>
                    <a href="/user/edit/<?= $user->getId(); ?>"> <input type="button" name="delete" value="Edit"> </a>
                </td>
                <td>
                    <a href="/user/delete/<?= $user->getId()  ?>" onclick="if (!confirm('<?= $text_Do_You_want_to_Delete_This_User ?>')) return false ;">Delete</a>
                </td>
            </tr>

        <?php endforeach; endif; ?>


        </tbody>
    </table>
</div>
