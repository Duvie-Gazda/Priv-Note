<link rel="stylesheet" href="../css/form.css">
Write please your new note:<br>
(In standart options your note will be saved for 5 minutes)
<form action="../index.php" method="POST" id="sendNote">
    <textarea name="noteText" form="sendNote" id="noteText" cols="30" rows="10"></textarea>
    <br>
    <div id="hiddenOnForm" style="display:block;">
        <br>
        Delete note:
        <select name="date" id="date" id="sendNote">
            <option  value="standart" hidden>Choose</option>
            <option value="afterOpen">After open</option>
            <option value="after2Minute">After 2 minute</option>
            <option value="after1Hour">After 1 hour</option>
            <option value="after24Hour">After 24 hour</option>
            <option value="oneDay">After 1 day</option>
        </select>
        <br>
        If you choose after open note will be saved for 3 minutes
        <br><br>
        Pass is not important
        <br>
        <input type="password" name="pass" id="pass">
        <br><br>
        Enter email to send your link 
        <input type="email" name="emailLink" id="emailLink">

    </div>
    <!-- <div id="hButton">Extra options</div> -->
    <input type="submit" value="Ok" name="submit">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</form>