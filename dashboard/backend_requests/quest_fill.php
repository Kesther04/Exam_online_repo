
<?php if (isset($_GET['items']) ) { ?>

<?php
    $items = $_GET['items'];
    for ($i=1; $i <= $items; $i++) {  
?>

<tr>
    
    <td>
        <span><?php echo 'Question '.$i; ?></span>
        <input type="hidden" name="qno[]" value="<?php echo $i; ?>" required readonly>
        <textarea name="quest[]" required placeholder="Enter Question"></textarea>
        <span>Select Question Correct Option</span>
        <select name="corr[]" required>
            <option></option>
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
        </select>
    </td>

    <td>
        <span>A</span>
        <input type="text" name="A[]" required Placeholder="Enter text for Option A ">
        <span>B</span>
        <input type="text" name="B[]" required Placeholder="Enter text for Option B ">
        <span>C</span>
        <input type="text" name="C[]" required Placeholder="Enter text for Option C ">
        <span>D</span>
        <input type="text" name="D[]" required Placeholder="Enter text for Option D ">
    </td>
    
</tr>

<?php  } ?>

<?php } ?>

