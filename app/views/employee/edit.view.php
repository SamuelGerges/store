<style>
    *{
        margin: 0px;
        padding: 0px;
        border: 0px;
        outline: none;
        line-height: 1.2;
        font-size: 1em;
    }
    .appform{

        width: 500px;
        margin: 0px auto;
    }
    .appform fieldset{
        padding:  10px;
        background: #f1f1f1;
        border: solid 1px #e4e4e4;
    }
    .appform fieldset legend{
        background: #e4e4e4;
        padding: 10px;
        font: 1em 'Arial,Helvetica ,sans-serif';
    }
    .appform table {
        width: 100%;
    }
    .appform lable{
        font-size: 0.85em;
        color:#666666;
    }
    .appform table tr td input[type=text]{
        width: 97%;
        padding: 2%;
        font-family: Arial;
        font-size: 0.85em;
    }
    .appform table tr td input[type=number]{
        width: 97%;
        padding: 2%;
        font-family: Arial;
        font-size: 0.85em;
    }
    .appform table tr td input[type=password]{
        width: 97%;
        padding: 2%;
        font-family: Arial;
        font-size: 0.85em;
    }
    .appform table tr td input[type=submit]{
        padding: 8px;
        border-radius: 3px;
        background: #22d0a8;
        color: #FFF;
        font-family: Arial;
        font-size: 0.85em;
    }
    .appform table tr td
    {
        padding: 3px 0 ;
    }
</style>
<form class="appform" method="post" enctype="application/x-www-form-urlencoded" autocomplete="off">
    <fieldset>
        <legend>Edit Info of User</legend>
        <table>
            <tr>
                <td>
                    <label for="name">User Name </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="name" maxlength="100" value="<?= $users->user_name ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for=" age ">User Age </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="age" min="10" max="100" value="<?= $users->user_age ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for=" name">User Address </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="address" maxlength="50" value="<?= $users->user_address ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">User Phone </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="phone" maxlength="100" value="<?= $users->user_phone ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for=" name">User Email </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" maxlength="100" value="<?= $users->user_email?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for=" name">User Password
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" maxlength="100" value="<?= $users->user_password ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Save">
                </td>
            </tr>
        </table>
    </fieldset>
</form>
