<h1><?= $text_headers ?></h1>

<div class="container">
    <a href="/users/create" class="buttom"><i class="fa-da-plus"></i><?= $text_new_item ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_table_username ?></th>
                <th><?= $text_table_group ?></th>
                <th><?= $text_table_email ?></th>
                <th><?= $text_table_subscription_date ?></th>
                <th><?= $text_table_last_login ?></th>
                <th><?= $text_table_control ?></th>

            </tr>
        </thead>
        <tbody>
        <?php if(false !== $users) : foreach ($users as $user) :?>
            <tr>
                <td><?= $user->getName()    ?></td>
                <td><?= $user->getGroupId()     ?></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getSubscriptionDate()   ?></td>
                <td><?= $user->getLastLogIn()   ?></td>
                <td>

                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>