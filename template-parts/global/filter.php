<select name="postsperpage" id="postsperpage" onchange="this.form.submit()" class="select mr3 display-none md-block" name="" style="min-width:13rem;">
    <option value="12" <?php echo ($postsperpage == 12) ? 'selected' : '' ; ?>>Show 15</option>
    <option value="24" <?php echo ($postsperpage == 24) ? 'selected' : '' ; ?>>Show 24</option>
</select>
