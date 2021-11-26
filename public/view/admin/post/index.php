<form name="feedback" method="POST" action="" autocomplete="on">

    <label> subject:
        <input type="text" name="subject">
    </label>

    <label> detail:
        <input type="text" name="detail">
    </label>

    <label> author:
        <input type="text" name="author">
    </label>


    <input type="submit" name="send" value="Отправить">
</form>

<a href="post/create"> Create</a>

<table>

    <?php foreach ($data as $key =>$row) : ?>
    <tr>
        <?php foreach ($row as $key => $value) : ?>
        <td><?=$value ?> </td>
        <?php endforeach ?>
        <td><a href="post/update?id=<?=$row['id'] ?>"> Update</a></td>
        <td><a href="post/delete?id=<?=$row['id'] ?>"> Delete</a></td>
    </tr>
    <?php endforeach ?>
</table>


<?php //var_dump($flowers, $fruits) ?>
