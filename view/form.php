<link rel="stylesheet" href="../style/css/form.css">
<div class="forma">
    <h1 class="no-padding no-margin">Write please your new note:</h1><br>
    <h5 class="no-padding no-margin">(In standart options your note will be saved for 5 minutes)</h5>
    <form action="../index.php" method="POST" id="sendNote" class="form">
    <textarea name="noteText" form="sendNote" id="noteText" cols="30" rows="10"></textarea>
    <br>
    <div id="hiddenOnForm" class="hide">
        Delete note:
        <select name="date" id="date">
            <option  value="standart" hidden>Choose</option>
            <option value="afterOpen">After open</option>
            <option value="after2Minute">After 2 minute</option>
            <option value="after1Hour">After 1 hour</option>
            <option value="after24Hour">After 24 hour</option>
            <option value="oneDay">After 1 day</option>
        </select>
        <br>
        If you choose after open note will be saved for 3 minutes
        <br>
        Pass is not important
        <br>
        <input type="password" name="pass" id="pass">
    </div>
    <!-- <div id="hButton">Extra options</div> -->
    <input type="submit" value="Ok" name="submit" id="submit" class="no-margin">
    <input type="button" value="More Options" id="moreOptions">
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="/view/js/form.js"></script>