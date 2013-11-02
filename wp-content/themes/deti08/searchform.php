<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div>
    <input type="text" value="Слово для поиска" name="s" id="s" onfocus="if (this.value != '') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Слово для поиска';}"/>
    <input type="submit" id="searchsubmit" value="Искать" />
</div>
</form>