<form name="update" method="POST">

    <label for="">Subject:
        <input type="text" name="subject" value="<?=$data['subject']?>">
    </label>

    <label> detail:
        <input type="text" name="detail" value="<?=$data['detail']?>">
    </label>

    <label> author:
        <input type="text" name="author" value="<?=$data['author_id']?>">
    </label>

    <input type="text" name="author" value="<?=$data['id']?>" hidden>

    <input type="submit" name="send" value="Отправить">
</form>
