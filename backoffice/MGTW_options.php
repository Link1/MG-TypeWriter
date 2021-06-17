<?php

if(!get_option("mgtw_options")){
	$default['strings'] = "1\n2\n3\n";
	
	$default['typespeed']=80;
	$default['backspaceSpeed']=80;
	$default['backspaceDelay']=80;
	$default['repeatDelay']=80;
	$default['startDelay']=80;
	
	$default['autoPlay'] = true;
	$default['loop'] = true;
	$default['cursor'] = true;
	
} else {
	$options = get_option("mgtw_options");
	$default = $options;
	$string = "";
	foreach ($options['strings'] as $strings){
		if ($strings != ""){
			$string .= $strings."\n";
		}
	}
	$default['strings'] = $string;
}

	if ($default['autoPlay'] == true){$autoplay = "checked";} else {$autoplay = "";}
	if ($default['loop'] == true){$loop = "checked";} else {$loop = "";}
	if ($default['cursor'] == true){$cursor = "checked";} else {$cursor = "";}
?>

<div id="mgtw_container">
	<h1>Typewriter</h1>

	<form method="post">
		<h3>Phrases</h3>Add one phrase per line<br/>
		<textarea id="mgtw_phrases" rows="8"><?php echo $default['strings']; ?></textarea>
		<div class="clear"></div>
		<div class="sliders">
			<h3>Timing</h3>
			Type Speed (5=fast - 200=slow)<br>
				<input type="range" min="5" max="200" value="<?php echo $default['typespeed']; ?>" class="slider" id="typeSpeed">
				<input type="number" value="<?php echo $default['typespeed']; ?>" data-slider="typeSpeed" min="5" max="200" step="1" class="sliderValue"> 
			<br><br>

			Backspace speed (5=fast - 200=slow)<br>
				<input type="range" min="5" max="200" value="<?php echo $default['backspaceSpeed']; ?>" class="slider" id="backspaceSpeed">
				<input type="number" value="<?php echo $default['backspaceSpeed']; ?>" data-slider="backspaceSpeed" min="5" max="200" step="1" class="sliderValue"> 
			<br><br>

			Backspace delay (ms)<br>
				<input type="range" min="500" max="9999" value="<?php echo $default['backspaceDelay']; ?>" class="slider" id="backspaceDelay">
				<input type="number" value="<?php echo $default['backspaceDelay']; ?>" data-slider="backspaceDelay" min="500" max="9999" step="1" class="sliderValue"> 
			<br><br>

			Repeat Delay (ms)<br>
				<input type="range" min="500" max="9999" value="<?php echo $default['repeatDelay']; ?>" class="slider" id="repeatDelay">
				<input type="number" value="<?php echo $default['repeatDelay']; ?>" data-slider="repeatDelay" min="500" max="9999" step="1" class="sliderValue"> 
			<br><br>

			Start Delay (ms)<br>
				<input type="range" min="100" max="1000" value="<?php echo $default['startDelay']; ?>" class="slider" id="startDelay">
				<input type="number" value="<?php echo $default['startDelay']; ?>" data-slider="startDelay" min="100" max="1000" step="1" class="sliderValue"> 
			<br><br>
		</div>

		<div class="checks">
			<h3>Controls</h3>
				<input type="checkbox" class="checkbox" id="autoPlay" <?php echo $autoplay; ?>></input><label for="autoPlay">Autoplay</label><br/><br/>
				<input type="checkbox" class="checkbox" id="loop" <?php echo $loop; ?>><label for="loop">Loop</label><br/><br/>
				<input type="checkbox" class="checkbox" id="cursor" <?php echo $cursor; ?>><label for="cursor">Show cursor</label><br/><br/>
		</div>
		<div class="clear"></div>
		<input type="submit" value="save" id="mgtw_save" class="components-button is-primary">
	
	</form>
	<div class="success">Options saved</div>

</div>
